const PROJECT_ID = "SK.0.H5cfVaIzpfx8smlclTlefQ9PXAnAEVe";
const PROJECT_SECRET = "MGdDWjZPU2pvQzJOdlRnVm9mQ3hPNVJWVTdrcGpJdG8=";
const BASE_URL = "https://api.stringee.com/v1/room2";

class API {
  constructor(projectId, projectSecret) {
    this.projectId = projectId;
    this.projectSecret = projectSecret;
    this.restToken = "";
  }

  async createRoom() {
    const roomName = Math.random().toFixed(4);
    const response = await axios.post(
      `${BASE_URL}/create`,
      {
        name: roomName,
        uniqueName: roomName,
      },
      {
        headers: this._authHeader(),
      }
    );

    const room = response.data;
    console.log({ room });
    return room;
  }

  /*

  - const roomName = Math.random().toFixed(4);: Tạo một tên phòng ngẫu nhiên bằng cách sử dụng hàm Math.random() 
    để sinh một số ngẫu nhiên từ 0 đến 1, và sau đó sử dụng toFixed(4) để giới hạn số lượng chữ số thập phân thành 4. 
    Kết quả là một chuỗi đại diện cho tên phòng ngẫu nhiên.

  - const response = await axios.post(...);: Sử dụng thư viện Axios để thực hiện một yêu cầu HTTP POST đến một địa chỉ 
    được xây dựng bằng cách kết hợp BASE_URL và "/create". Dữ liệu gửi đi bao gồm một đối tượng có thuộc tính name và 
    uniqueName với giá trị là roomName. Đồng thời, yêu cầu cũng đi kèm với tiêu đề xác thực được đặt bởi this._authHeader().

  - const room = response.data;: Lấy dữ liệu từ phản hồi của yêu cầu POST, giả sử phản hồi trả về một đối tượng chứa 
    thông tin về phòng đã được tạo. Dữ liệu này được gán cho biến room.

  - console.log({ room });: In thông tin về phòng đã được tạo ra console để kiểm tra hoạt động của hàm. Điều này thường 
    được sử dụng trong quá trình phát triển và kiểm thử để theo dõi các thay đổi trong dữ liệu.

  - return room;: Trả về đối tượng phòng đã được tạo từ hàm. Điều này cho phép bạn sử dụng kết quả của hàm khi gọi nó 
    từ nơi khác trong mã.

  */
  async listRoom() {
    const response = await axios.get(`${BASE_URL}/list`, {
      headers: this._authHeader(),
    });

    const rooms = response.data.list;
    console.log({ rooms });
    return rooms;
  }

  async deleteRoom(roomId) {
    const response = await axios.put(
      `${BASE_URL}/delete`,
      {
        roomId,
      },
      {
        headers: this._authHeader(),
      }
    );

    console.log({ response });

    return response.data;
  }

  async clearAllRooms() {
    const rooms = await this.listRoom();
    const response = await Promise.all(
      rooms.map((room) => this.deleteRoom(room.roomId))
    );

    return response;
  }

  async setRestToken() {
    const tokens = await this._getToken({ rest: true });
    const restToken = tokens.rest_access_token;
    this.restToken = restToken;

    return restToken;
  }

  async getUserToken(userId) {
    const tokens = await this._getToken({ userId });
    return tokens.access_token;
  }

  async getRoomToken(roomId) {
    const tokens = await this._getToken({ roomId });
    return tokens.room_token;
  }

  async _getToken({ userId, roomId, rest }) {
    const response = await axios.get(
      "https://v2.stringee.com/web-sdk-conference-samples/php/token_helper.php",
      {
        params: {
          keySid: this.projectId,
          keySecret: this.projectSecret,
          userId,
          roomId,
          rest,
        },
      }
    );

    const tokens = response.data;
    console.log({ tokens });
    return tokens;
  }

  isSafari() {
    const ua = navigator.userAgent.toLowerCase();
    return !ua.includes("chrome") && ua.includes("safari");
  }

  _authHeader() {
    return {
      "X-STRINGEE-AUTH": this.restToken,
    };
  }
}

const api = new API(PROJECT_ID, PROJECT_SECRET);
