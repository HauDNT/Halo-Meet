<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="./script.js"></script>
    <style>
        body {
            margin: auto;
        }
        .div_father{
            width: 100%;
            height: 750px;
        }
        .header_father{
            width: 100%;
            height: 10%;
            background-color: darkorange;
            position: relative;
            top: 0;
        }
        .container{
            width: 100%;
            height: 90%;
            background-color: blue;
        }
        .container_left{
            width: 50%;
            height: 100%;
            float: left;
            background-color: white;
            position: relative;
        }
        .container_right{
            width: 50%;
            height: 100%;
            float: left;
            background-color: white;
            position: relative;
        }
        .header_left{
            width: 50%;
            height: 100%;
            float: left;
            background-color:darkorange;
            position: relative;
        }
        .header_right{
            width: 50%;
            height: 100%;
            float: left;
            background-color:darkorange;
            position: relative;
        }
        .logo{
            width: 20%;
            height: 100%;
            float: left;
            background-color:darkorange;
        }
        .header_left_name{
            width: 70%;
            height: 100%;
            float: left;
            background-color:darkorange;
        }
        .name{
            color: white;
            font-size:30px;
            font-weight:bold;
            position: absolute;
            left: 120px;
            top: 15px;
        }
        .table_header_right{
            width: 100%;
            height: 100%;
        }
        .table_name{
            width: 80%;
            text-align: right;
        }
        .table_icon{
            width: 20%;
            text-align: right;
        }
        .content{
            width: 100%;
            height: 50%;
            position: relative;
        }
        .content_anh{
            background-color: white;
            width: 70%;
            height:50%;
            position: absolute;
            bottom: 80px;
            left: 40px;
        }
        .contact{
            width: 100%;
            height: 20%;
            position: relative;
        }
        .create-room , .join-room {
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
        .table_contact{
            position: absolute;
            left: 80px;
            top: 0px;
        }
        .table_contact_create-room_left{
            text-align: right;
        }
        .table_contact_create-room_right{
            text-align: center;
        }
        .table_contact_create-room_input{
            text-align: left;
       }
        .input_join {
            background-color: #f2f2f2;
            border: none;
            border-radius: 5px;
            padding: 10px;
            border-bottom: 2px solid transparent;
            transition: border-bottom-color 0.3s ease;
        }
        .input_join:hover{
            border-bottom-color: #99c2ff;
        }
        .div_show_slide{
            width: 90%;
            height: 80%;
            margin: auto;
            background-color: white;
            position: absolute;
            border-radius: 10px;
            bottom: 100px;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
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

    </style>
</head>
<body>



<div class="div_father">
    <header class="header_father">
        <div class="header_left">
            <!-- Logo -->
            <div class="logo">
                <img src="anh/AnhLoGo.png" alt="" width="100px" height="75px">
            </div>
            <!-- Tên phần mềm -->
            <div class="header_left_name">
                <div class="name">
                    Halo Meet
                </div>
            </div>
        </div>
        <div class="header_right">
            <table class="table_header_right">
                <th class="table_name">
                    User
                </th>
                <th class="table_icon">
                    ICON
                    <a href="">
                        <img src="" alt="">
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
                    <h1>Video calls and meetings
                        for everyone.</h1>
                    <h3>Google Meet is one service for secure, high quality video meetings and calls, available for everyone, on any device.</h3>
                    <hr>
                </div>
            </div>
            <!-- Các nút tạo phòng & tham gia phòng qua link -->
            <div class="contact">
                <table class="table_contact">
                    <tr>
                    <th class="table_contact_create-room_left">
                        <button class="create-room">New Meeting</button>
                    </th>
                        <th>
                            or
                        </th>
                        <th class="table_contact_create-room_input">
                            <input class="input_join" type="text" name="" id="" value="" placeholder="Link">
                        </th>
                    <th class="table_contact_create-room_right">
                        <button class="join-room">Join</button>
                    </th>

                    </tr>
                </table>
            </div>
        </div>
        <div class="container_right">
            <!-- Slide chạy -->
            <div class="div_show_slide">
                <div class="slideshow">
                    <div class="slideshow">
                        <img src="anh/Anh1.png" alt="Image 1" class="slide">
                        <img src="anh/Anh2.png" alt="Image 2" class="slide">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script>
    var slides = document.getElementsByClassName("slide");
    var currentSlideIndex = 0;

    // Hiển thị slide đầu tiên
    slides[currentSlideIndex].classList.add("active");

    function showNextSlide() {
        // Ẩn slide hiện tại
        slides[currentSlideIndex].classList.remove("active");

        // Tăng chỉ số slide
        currentSlideIndex++;

        // Kiểm tra nếu vượt quá số lượng slide, quay lại slide đầu tiên
        if (currentSlideIndex >= slides.length) {
            currentSlideIndex = 0;
        }

        // Hiển thị slide tiếp theo
        slides[currentSlideIndex].classList.add("active");
    }

    // Hàm chuyển đổi slide sau một khoảng thời gian
    function startSlideShow() {
        // Hiển thị slide hiện tại
        slides[currentSlideIndex].classList.add("active");

        // Chuyển đổi slide sau mỗi 2 giây
        setInterval(function() {
            showNextSlide();
        }, 2000);
    }
    startSlideShow();
</script>
</html>