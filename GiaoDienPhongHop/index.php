<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phòng họp của bạn</title>
    <style>
        *{
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
        }
        
        .toolbar {
            display: flex;
            width: 100%;
            height: 10%;
            position: relative;
            bottom: -10%;
        }
        
        .toolbar-left,
        .toolbar-right {
            background-color: #DDE6ED;
            width: 15%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .time-linkroom {
            font-size: 20px;
            font-style: bold;
        }
        
        .toolbar-center {
            background-color: #DDE6ED;
            width: 70%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
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
        }
        
        .btn-icon {
            width: 95%;
            height: 95%; 
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="screen">

        </div>
        <div class="toolbar">
            <div class="toolbar-left time-linkroom">
                16:00 | cdp-wpcb-hxm
            </div>
            <div class="toolbar-center">
                <div class="btn-wrapper">
                    <a href="" class="toolbar-btn">
                        <img src="./anh/microphone.png" alt="" class="btn-icon">
                    </a>
                </div>
                <div class="btn-wrapper">
                    <a href="" class="toolbar-btn">
                        <img src="./anh/video-camera.png" alt="" class="btn-icon">
                    </a>
                </div>
                <div class="btn-wrapper">
                    <a href="" class="toolbar-btn">
                        <img src="./anh/present.png" alt="" class="btn-icon">
                    </a>
                </div>
                <div class="btn-wrapper">
                    <a href="" class="toolbar-btn">
                        <img src="./anh/closed.png" alt="" class="btn-icon">
                    </a>
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
</body>
</html>