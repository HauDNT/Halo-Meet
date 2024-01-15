<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phòng họp của bạn</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .container {
            background-color: #27374D;
            height: 100vh;
        }

        .screen {
            margin: auto;
            position: relative;
            top: 5%;
            background-color: azure;
            height: 80%;
            width: 95%;
            border-radius: 5px;
            padding: 10px 0 10px 0;
            display: flex;
            flex-wrap: wrap;
        }

        .video-element {
            width: 400px;
            height: fit-content;
            margin: 0 10px 5px 10px;
        }

        .video-element video {
            width: 100%;
            border-radius: 15px;
        }

        .toolbar {
            display: flex;
            width: 100%;
            height: 10%;
            position: relative;
            bottom: -10%;
        }

        .toolbar-right {
            background-color: #DDE6ED;
            width: 15%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .toolbar-left {
            height: 100%;
            width: 40%;
            display: flex;
            gap: 10px;
            align-items: center;
            justify-content: left;
            padding-left: 20px;
            background-color: #DDE6ED;
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
            background-color: #DDE6ED;
            width: 63%;
            height: 100%;
            display: flex;
            align-items: center;
            padding-left: 5%;
        }

        .btn-wrapper {
            width: 45px;
            height: 45px;
            margin: 0 10px;
            padding: 7px;
            background-color: #FFFBF5;
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
        <div class="toolbar" id="app">
            <div class="toolbar-left time-linkroom">
                <p id="time-display"></p>
                <span> | </span>
                <p class="linkroom" v-if="roomId">{{roomId}}</p>

                <input type="hidden" value="" id="roomId_saved">
                <button id="btn-copy" onclick="copyRoomId()">
                    <img src="./anh/copy.png" alt="" title="Copy room ID to clip board">
                </button>
            </div>
            <div class="toolbar-center">
                <div class="btn-wrapper">
                    <button href="" class="toolbar-btn" id="btn-call" @click="createRoom">
                        <img src="./anh/phone-call.png" alt="" class="btn-icon">
                    </button>
                    <script>
                        const btnCall = document.getElementById('btn-call');
                        btnCall.click();
                    </script>
                </div>
                <div class="btn-wrapper">
                    <button href="" class="toolbar-btn">
                        <img src="./anh/microphone.png" alt="" class="btn-icon">
                    </button>
                </div>
                <div class="btn-wrapper">
                    <button href="" class="toolbar-btn">
                        <img style="display: none;" src="./anh/camera_on.png" alt="" class="btn-icon">
                        <img src="./anh/camera_off.png" alt="" class="btn-icon">
                    </button>
                </div>
                <div class="btn-wrapper">
                    <button href="" class="toolbar-btn">
                        <img src="./anh/present.png" alt="" class="btn-icon" @click="publish(true)">
                    </button>
                </div>
                <div class="btn-wrapper">
                    <button href="" class="toolbar-btn">
                        <img src="./anh/closed.png" alt="" class="btn-icon">
                    </button>
                </div>
            </div>
            <div class="toolbar-right">
                <div class="btn-wrapper">
                    <a href="" class="toolbar-btn">
                        <img src="./anh/speech-bubble.png" alt="" class="btn-icon">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

<script src="../api/api.js"></script>
<script src="../GiaoDienPhongHop/script.js"></script>

</html>