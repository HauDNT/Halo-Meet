<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Phòng họp của bạn</title>
    <style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    :root {
        --toolbar-color: linear-gradient(180deg, rgb(255 255 255) 0%, rgba(231, 240, 247, 1) 34%, rgb(202 212 220) 100%);
    }

    ::-webkit-scrollbar {
        width: 5px;
        border-radius: 10px;
    }

    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    ::-webkit-scrollbar-thumb {
        background: #888;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

    video::-webkit-media-controls {
        display: none !important;
    }

    .container {
        background-color: #27374d;
        height: 100vh;
    }

    .screen {
        margin: auto;
        position: relative;
        top: 5%;
        background-color: azure;
        height: 80%;
        width: 95%;
        padding: 3px 10px;
        overflow-y: scroll;
    }

    .video-element {
        height: fit-content;
        margin: 0 10px 5px 15px;
        display: table-footer-group;
    }

    .video-element video {
        border-radius: 10px;
        margin: 5px;
        width: 348px;
        height: 180px;
        border: 1px solid #eeeeee;
        padding: 10px;
        box-shadow: 1px 5px 10px #888888;
    }

    .toolbar {
        display: flex;
        width: 100%;
        height: 10%;
        position: relative;
        bottom: -10%;
    }

    .toolbar-right {
        background: var(--toolbar-color);
        width: 15%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .toolbar-left {
        background: var(--toolbar-color);
        height: 100%;
        width: 60%;
        display: flex;
        gap: 10px;
        align-items: center;
        justify-content: left;
        padding-left: 20px;
    }

    .time-linkroom {
        font-size: 18px;
        font-style: bold;
    }

    #btn-copy {
        width: 30px;
        height: 30px;
        border: none;
        border-radius: 100%;
        display: none;
    }

    #btn-copy img {
        width: 100%;
        height: 100%;
    }

    #btn-copy:hover {
        cursor: pointer;
    }

    .toolbar-center {
        background: var(--toolbar-color);
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        padding-left: 13%;
    }

    .btn-wrapper {
        width: 45px;
        height: 45px;
        margin: 0 10px;
        padding: 7px;
        background-color: #fffbf5;
        border-radius: 50%;
    }

    .toolbar-btn {
        display: block;
        background-color: white;
        border: none;
    }

    .btn-wrapper:hover,
    .toolbar-btn:hover {
        cursor: pointer;
    }

    .btn-icon {
        width: 95%;
        height: 95%;
    }
    </style>

    <!-- import the webpage's StringEE javascript file -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios@0.20.0/dist/axios.min.js"></script>
    <script src="https://cdn.stringee.com/sdk/web/2.2.1/stringee-web-sdk.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="screen">
            <div id="videos" class="video-element">
            </div>
        </div>

        <div class="toolbar" v-cloak id="app">
            <div class="toolbar-left time-linkroom info">
                <p id="time-display"></p>
                <span> | </span>
                <p class="linkroom" v-if="roomId">{{ roomId }}</p>
                <!-- <p><a v-bind:href="roomUrl" v-if="roomId" target="_blank">{{ roomUrl }}</a></p> -->
                <input type="hidden" value="" id="roomId_saved" />
                <button id="btn-copy" onclick="copyRoomId()">
                    <img src="https://cdn-icons-png.flaticon.com/128/8860/8860785.png" alt=""
                        title="Copy room ID to clip board" />
                </button>
            </div>

            <div id="toolbar-center" class="toolbar-center">
                <!-- Button Call -->
                <div class="btn-wrapper" v-if="!room">
                    <button class="toolbar-btn" id="btn-call" @click="createRoom">
                        <img src="https://cdn-icons-png.flaticon.com/128/5585/5585856.png" alt="" class="btn-icon" />
                    </button>
                    <script>
                    const btnCall = document.getElementById("btn-call");
                    btnCall.click();
                    </script>
                </div>

                <!-- Button Join -->
                <div class="btn-wrapper" v-if="!room">
                    <button class="toolbar-btn" id="btn-join" @click="joinWithId">
                        <img src="https://cdn-icons-png.flaticon.com/128/6745/6745560.png" alt="" class="btn-icon" />
                    </button>
                </div>

                <!-- Button Voice -->
                <div class="btn-wrapper" v-if="room">
                    <button href="" class="toolbar-btn">
                        <img src="https://cdn-icons-png.flaticon.com/128/3178/3178286.png" alt="" class="btn-icon" />
                    </button>
                </div>

                <!-- Button Camera -->
                <div class="btn-wrapper" v-if="room">
                    <button href="" class="toolbar-btn">
                        <img src="https://cdn-icons-png.flaticon.com/128/3687/3687416.png" alt="" class="btn-icon" />
                    </button>
                </div>

                <!-- Button Share Screen -->
                <div class="btn-wrapper" v-if="room">
                    <button href="" class="toolbar-btn" @click="publish(true)">
                        <img src="https://cdn-icons-png.flaticon.com/128/11022/11022686.png" alt="" class="btn-icon" />
                    </button>
                </div>

                <!-- Button Stop Calling -->
                <!-- Button Stop Calling -->
                <div class="btn-wrapper" v-if="room">
                    <button href="../GiaoDienChinh/index.php" class="toolbar-btn" id="exitBtn" onclick="GetLink()">
                        <img src="https://cdn-icons-png.flaticon.com/128/10211/10211054.png" alt="" class="btn-icon" />
                    </button>
                </div>
            </div>

            <div class="toolbar-right">
                <!-- Button Messages -->
                <div class="btn-wrapper">
                    <a href="" class="toolbar-btn">
                        <img src="https://cdn-icons-png.flaticon.com/128/1041/1041916.png" alt="" class="btn-icon" />
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="../api/api.js"></script>
    <script src="../js/script.js"></script>
</body>
<script>
    window.addEventListener('DOMContentLoaded', function() {
    GetLink();
});
function GetLink() {
    var exitBtn = document.getElementById("exitBtn");
    var isConfirmationShown = false; // Biến kiểm tra

    exitBtn.addEventListener("click", function(event) {
    event.preventDefault();

    if (!isConfirmationShown) {
      isConfirmationShown = true; // Đánh dấu là đã hiển thị hộp thoại

        var confirmation = confirm("Bạn có chắc chắn thoát trang không?");

        if (confirmation) {
        window.location.href = exitBtn.getAttribute("href");
        }
    }
    });
}
</script>
</html>