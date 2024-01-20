const videoContainer = document.querySelector("#videos");

const vm = new Vue({
  el: "#app",
  data: {
    userToken: "",
    roomId: "",
    roomToken: "",
    room: undefined,
    callClient: undefined,
  },
  computed: {
    roomUrl: function () {
      return `https://${location.hostname}?room=${this.roomId}`;
    },
  },
  async mounted() {
    api.setRestToken(); // Gọi một phương thức setRestToken từ một đối tượng api

    const urlParams = new URLSearchParams(location.search); // Tạo một đối tượng URLSearchParams để truy cập và quản lý các tham số truy vấn trong URL
    const roomId = urlParams.get("room"); // Lấy giá trị của tham số truy vấn "room" từ URL.
    if (roomId) {
      this.roomId = roomId;

      await this.join();
    }
    // Nếu roomId tồn tại, gán giá trị cho thuộc tính roomId của đối tượng Vue và gọi phương thức join (await).
    // Việc sử dụng await trong trường hợp này giúp đảm bảo rằng quá trình tham gia vào phòng (join)
    // sẽ hoàn tất trước khi chương trình tiếp tục thực hiện các dòng mã khác trong hàm mounted.
  },
  methods: {
    authen: function () {
      return new Promise(async (resolve) => {
        // Phương thức authen trả về một promise.
        const userId = `${(Math.random() * 100000).toFixed(6)}`; // Tạo một userId ngẫu nhiên bằng cách nhân một số ngẫu nhiên với 100000 và giới hạn số lượng chữ số thập phân thành 6.
        const userToken = await api.getUserToken(userId); // Gọi hàm getUserToken từ đối tượng api bằng cách sử dụng await để đợi cho hàm này thực hiện xong.
        this.userToken = userToken;

        if (!this.callClient) {
          // Kiểm tra xem thuộc tính callClient có tồn tại không. Nếu chưa tồn tại, nghĩa là chưa có đối tượng StringeeClient được khởi tạo.
          const client = new StringeeClient();

          client.on("authen", function (res) {
            console.log("on authen: ", res);
            resolve(res);
            // Đặt một sự kiện lắng nghe ("authen") trên đối tượng client.
            // Khi sự kiện này xảy ra, hàm callback được gọi và in ra thông tin res của sự kiện.
          });

          this.callClient = client;
          // Gán giá trị của client cho thuộc tính callClient của đối tượng Vue.
          // Đảm bảo rằng callClient chỉ được khởi tạo một lần và có thể được sử dụng cho các kết nối tiếp theo.
        }

        this.callClient.connect(userToken);
        // Gọi phương thức connect trên đối tượng callClient với tham số userToken.
        // Khởi tạo quá trình kết nối của callClient với server, sử dụng userToken để xác thực.
      });
    },
    publish: async function (screenSharing = false) {
      const localTrack = await StringeeVideo.createLocalVideoTrack(
        this.callClient,
        {
          audio: true,
          video: true,
          screen: screenSharing,
          videoDimensions: { width: 345, height: 180 },
        } // Cấu hình video
      );

      const videoElement = localTrack.attach();
      this.addVideo(videoElement);
      // Gắn local track vào video element bằng cách sử dụng phương thức attach.
      // Để hiển thị video trong giao diện người dùng.

      const roomData = await StringeeVideo.joinRoom(
        this.callClient,
        this.roomToken
      );
      // Lấy thông tin về phòng và danh sách các track có sẵn trong phòng sau khi quá trình join room hoàn tất.
      const room = roomData.room; // Lấy phòng từ roomData để quản lý các sự kiện và thêm các track vào phòng.
      console.log({ roomData, room });

      if (!this.room) {
        this.room = room;
        room.clearAllOnMethos(); // Xóa các track (video, user) khi họ rời khỏi room.
        room.on("addtrack", (e) => {
          const track = e.info.track;

          console.log("addtrack", track);
          if (track.serverId === localTrack.serverId) {
            console.log("local");
            return;
          }
          this.subscribe(track);
        });
        // Đặt một sự kiện lắng nghe cho sự kiện "addtrack" của phòng. 
        // Khi một track mới được thêm vào phòng, hàm callback được gọi. 
        // Trong trường hợp này, nó kiểm tra xem track đó có phải là local track không. 
        // Nếu không phải, nó gọi phương thức subscribe để đăng ký track mới.

        room.on("removetrack", (e) => {
          const track = e.track;
          if (!track) {
            return;
          }

          const mediaElements = track.detach();
          mediaElements.forEach((element) => element.remove());
        });
        // Đặt một sự kiện lắng nghe cho sự kiện "removetrack" của phòng. Khi một track bị xóa khỏi phòng, hàm callback được gọi. 
        // Xóa đối tượng video element liên quan đến track đã bị xóa.

        // Join existing tracks
        roomData.listTracksInfo.forEach((info) => this.subscribe(info));
      }

      await room.publish(localTrack);
      // Gọi phương thức publish trên đối tượng room để xuất bản (publish) localTrack lên phòng. 
      // Giúp người dùng hiển thị video và audio của mình trong phòng.
      console.log("Room publish successful");
    },
    createRoom: async function () {
      const room = await api.createRoom(); // Gọi hàm creatRoom thông qua api.
      const { roomId } = room; // Lấy giá trị của thuộc tính roomId từ đối tượng room.
      const roomToken = await api.getRoomToken(roomId); // Lấy roomToken thông qua roomID.

      this.roomId = roomId;
      this.roomToken = roomToken;
      console.log({ roomId, roomToken });

      await this.authen(); // Xác thực thông tin người dùng trước khi khởi tạo phòng.
      await this.publish(); // Hiển thị video khi thực hiện cuộc gọi.
    },
    join: async function () {
      const roomToken = await api.getRoomToken(this.roomId);
      this.roomToken = roomToken;
      // Lấy lại roomToken vì khi được share thì người join vào chỉ có room ID.

      await this.authen();
      await this.publish();
    },
    joinWithId: async function () {
      const roomId = prompt("Dán Room ID vào đây nhé!"); // Hiển thị hộp thoại để dán room Id vào.
      if (roomId) {
        // Nếu room ID đúng thì thực hiện hàm join.
        this.roomId = roomId;
        await this.join();
      }
    },
    subscribe: async function (trackInfo) {
      const track = await this.room.subscribe(trackInfo.serverId);
      /*
      - Sử dụng await để đợi cho quá trình đăng ký (subscribe) track hoàn tất.
      - Phương thức subscribe được gọi trên đối tượng room với tham số là trackInfo.serverId, 
        chứa thông tin cần thiết để xác định track cần đăng ký.
      */
      track.on("ready", () => {
        const videoElement = track.attach();
        // Sử dụng phương thức attach của track để lấy đối tượng video element tương ứng với track.
        this.addVideo(videoElement);
        // Thêm đối tượng video element vào giao diện người dùng.
      });
    },
    addVideo: function (video) {
      video.setAttribute("controls", "true");
      // Hiển thị các nút điều khiển video (play, pause, stop,...)
      video.setAttribute("playsinline", "true");
      // Quy định rõ rằng video sau khi được add vào giao diện chỉ được phát (giữ) trong 1 phần tử thay vì hiển thị toàn màn hình.
      videoContainer.appendChild(video);
      // Thêm đối tượng video vào trong videoContainer.
    },
  },
});

// Hiện nút copy ID room khi ấn vào nút gọi:
document.getElementById("btn-call").addEventListener("click", function () {
  document.getElementById("toolbar-center").style.paddingLeft = "8%";
  document.getElementById("btn-copy").style.display = "block";
});

// Hiện nút copy ID room khi ấn vào nút join:
document.getElementById("btn-join").addEventListener("click", function () {
  document.getElementById("toolbar-center").style.paddingLeft = "8%";
  document.getElementById("btn-copy").style.display = "block";
});

// Hàm load thời gian hệ thống
const time = document.getElementById("time-display");

function getTime() {
  const currentTime = new Date();
  const hours = currentTime.getHours();
  const minutes = currentTime.getMinutes();

  const formattedTime = `${hours < 10 ? "0" + hours : hours}:${
    minutes < 10 ? "0" + minutes : minutes
  }`;

  time.innerHTML = formattedTime;
}

// Gọi hàm getTime() khi trang web được load và lặp lại sau mỗi phút (60,000 milliseconds) để cập nhật thời gian
getTime();
setInterval(getTime, 60000);

// Copy room id to clip board
function copyRoomId() {
  var copyText = document.getElementById("roomId_saved");
  copyText.value = document.querySelector(".linkroom").innerText;

  copyText.select();
  navigator.clipboard.writeText(copyText.value);
  alert(
    "Đã copy link phòng. Bạn có thể gửi nó cho những người khác cùng tham gia."
  );
}

// document
//   .getElementsByClassName("icon-showVideo")
//   .addEventListener("click", function () {
//     alert("Show");
//   });
