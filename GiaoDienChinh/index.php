<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Trang chủ</title>
        <style>
            *{
                font-family: "Google Sans Display",Roboto,Arial,sans-serif;
            }
        body {
            margin: auto;
        }

        .div_father {
            width: 100%;
            height: 729px;
        }

        .header_father {
            width: 100%;
            height: 10%;
            background-color: white;
            position: relative;
            top: 0;
        }

        .container {
            width: 100%;
            height: 90%;
            background-image:url(anh/bg-home.jpg);
            background-size: 100% 100%;
        }

        .container_left {
            width: 50%;
            height: 100%;
            float: left;
            position: relative;
        }

        .container_right {
            width: 50%;
            height: 100%;
            float: left;
            position: relative;
        }

        .header_left {
            width: 50%;
            height: 100%;
            float: left;
            position: relative;
        }

        .header_right {
            width: 50%;
            height: 100%;
            float: left;
            position: relative;
        }

        .logo {
            width: 20%;
            height: 100%;
            float: left;
        }

        .header_left_name {
            width: 70%;
            height: 100%;
            float: left;
        }

        .name {
            color: white;
            font-size: 30px;
            font-weight: bold;
            position: absolute;
            left: 120px;
            top: 15px;
        }

        .table_header_right {
            width: 100%;
            height: 100%;
        }

        .table_name {
            width: 80%;
            text-align: right;
        }

        .table_icon {
            width: 20%;
            text-align: right;
        }

        .content {
            width: 100%;
            height: 50%;
            position: relative;
        }

        .content_anh {
            background-color: white;
            width: 70%;
            height: 50%;
            position: absolute;
            bottom: 100px;
            left: 70px;
        }

        .content_anh h1{
            text-align: center;
            font-weight: normal;
            font-size: 35px;
        }
        .contact {
            width: 100%;
            height: 20%;
            position: relative;
            top: 160px;
        }

        .create-room,
        .join-room {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 4px;
            text-decoration: none;
            text-align: center;
            background-color: #4CAF50;
            color: #FFFFFF;
            border: none;
            transition: background-color 0.3s ease;
            cursor: pointer;
        }

        .create-room:hover {
            background-color: #45a049;
        }

        .join-room {
            background-color: #008CBA;
        }

        .join-room:hover {
            background-color: #0077A3;
        }

        .table_contact {
            position: absolute;
            left: 80px;
            top: 0px;
        }

        .table_contact_create-room_left {
            text-align: right;
        }

        .table_contact_create-room_right {
            text-align: center;
            padding-left: 10px;
        }

        .table_contact_create-room_input {
            text-align: left;
            padding-left: 10px;
        }

        .input_join {
            background-color: #f2f2f2;
            border: none;
            height: 35px;
            width: 200px;
            border-radius: 5px;
            padding-left: 30px;
            border: 3px solid transparent;
            transition: border-bottom-color 0.3s ease;
            outline: none;
        }

        .input_join:focus{
            border: 3px solid #4CAF50;
        }

        .div_show_slide {
            width: 80%;
            height: 70%;
            margin: auto;
            margin-left:10% ;
            background-color: white;
            position: absolute;
            border-radius: 10px;
            bottom: 100px;
            box-shadow: 0 5px 15px 0px rgba(0, 0, 0, 0.3);
        }

        .slideshow {
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .slide {
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }

        .slide.active {
            opacity: 1;
        }

        .slideshow img{
            width: 90%;
            height: 400px;
            margin-top: 20px;
            margin-left: 5%;
        }
        .content_anh p{
            font-size: 20px;
        }

        .dot {
        cursor: pointer;
        height: 10px;
        width: 10px;
        margin: 0 3px;
        background-color: #fe9561;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
        }
        
        .active, .dot:hover {
        background-color: #ff5e00;
        }
        .prev, .next {
        cursor: pointer;
        position: absolute;
        top: 47%;
        width: auto;
        padding: 16px;
        margin-top: -22px;
        color: rgb(0, 0, 0);
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
        }

        .next {
        right: 0;
        border-radius: 3px 0 0 3px;
        }

        .prev:hover, .next:hover {
        color: white;
        background-color: rgba(0,0,0,0.8);
        }

        #keyboard{
            position: relative;
            top: 3.5px;
            left: 30px;
        }
    </style>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <!-- import the webpage's StringEE javascript file -->
        <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios@0.20.0/dist/axios.min.js"></script>
        <script src="https://cdn.stringee.com/sdk/web/2.2.1/stringee-web-sdk.min.js"></script>
        
    </head>

    <body>
        <div class="div_father" id="app">
            <header class="header_father">
                <div class="header_left">
                    <!-- Logo -->
                    <div class="logo">
                        <img src="anh/logo_halomeet1.png" alt width="300px" height="75px">
                    </div>
                    <!-- Tên phần mềm -->
                </div>
                <div class="header_right">
                    <table class="table_header_right">
                        <th class="table_name">
                            User
                        </th>
                        <th class="table_icon">
                            ICON
                            <a href>
                                <img src alt>
                            </a>
                        </th>
                    </table>
                </div>
            </header>
            <div class="container">
                <div class="container_left">
                    <!-- Nội dung giới thiệu chương trình -->
                    <div class="content">
                        <div class="content_anh">
                            <h1>Welcome Halo Meet.</h1>
                            <p>
                                &ensp;&ensp;&ensp;Discover Halo Meet - your go-to online meeting platform! We
                                provide a seamless experience for events, conferences, and personal
                                meetings, connecting you effortlessly. With high-quality video calls
                                and creative tools, Halo Meet makes idea-sharing and
                                relationship-building easy. Join us for a unique online space where
                                every meeting is meaningful and energetic!
                            </p>
                        </div>
                    </div>
                    <!-- Các nút tạo phòng & tham gia phòng qua link -->
                    <div class="contact">
                        <table class="table_contact">
                            <tr>
                                <th class="table_contact_create-room_left">
                                    <button class="create-room" @click="createRoom">New Meeting</button>
                                </th>
                                <th class="table_contact_create-room_input">
                                    <i id="keyboard"  class="fas fa-keyboard"></i>
                                    <input  class="input_join" type="text" name id value placeholder="Enter ID or LINK ">
                                    
                                </th>
                                <th class="table_contact_create-room_right">
                                    <button class="join-room" @click="joinRoom">Join</button>
                                </th>
                            </tr>
                        </table>
                    </div>

                    <!-- Đoạn code test để xem roomId và roomToken -->
                    <!-- <div class="">
                        style="width: 500px; margin-left: 10px; border: 1px solid black; overflow: scroll; padding: 10px">
                        Show info:
                        <p>Room ID: {{roomId}}</p>
                        <p>Room Token: {{roomToken}}</p>
                    </div> -->
                </div>
                <div class="container_right">
                    <!-- Slide chạy -->
                    <div class="div_show_slide">
                        <div class="slideshow">
                            <div class="mySlides fade">
                                <img src="anh/slide_1.jpg">
                            </div>
                            <div class="mySlides fade">
                                <img src="anh/slide_2.png">
                            </div>
                            <div class="mySlides fade">
                                <img src="anh/Anh2.png">
                            </div>
                            <a class="prev" onclick="plusSlides(-1)">❮</a>
                            <a class="next" onclick="plusSlides(1)">❯</a>
                            <div style="text-align:center">
                                <span class="dot" onclick="currentSlide(1)"></span>
                                <span class="dot" onclick="currentSlide(2)"></span>
                                <span class="dot" onclick="currentSlide(3)"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
    <script>
        let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
    showSlides(slideIndex += n);
    }

    function currentSlide(n) {
    showSlides(slideIndex = n);
    }

    function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    if (n > slides.length) {slideIndex = 1}    
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    }
</script>

    <script src="../api/api.js"></script>
    <script src="../GiaoDienChinh/script.js"></script>

</html>