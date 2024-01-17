<style>
* {
    font-family: Arial, Helvetica, sans-serif;
}

body {
    margin: 0;
    background: linear-gradient(-25.7deg, white 50%, #FFB534 50%);
}

.login-form {
    margin: auto;
    margin-top: 7.5%;
    height: 500px;
    width: 900px;
    border-radius: 10px;
    box-shadow: 0px 5px 10px 5px rgba(0, 0, 0, 0.3);
}

.login-form>.left-form {
    float: left;
    height: 100%;
    width: 40%;
    border-bottom-left-radius: 10px;
    border-top-left-radius: 10px;
    background: white;
}

.login-form>.right-form {
    float: right;
    background: #FFB534;
    height: 100%;
    width: 60%;
    border-bottom-right-radius: 10px;
    border-top-right-radius: 10px;
}

.left-form table {
    width: 100%;
}

.login-form-title {
    font-size: 30px;
    font-family: Georgia, "Times New Roman", Times, serif;
    padding: 25px 0px;
}

.left-form input {
    height: 30px;
    width: 80%;
    padding-left: 10px;
    background: transparent;
    outline: none;
    border: none;
    border-bottom: 2px solid lightgray;
    margin-top: 25px;
    font-size: 20px;
}

.left-form input:focus {
    border-bottom: 2px solid #FFB534;
}

.empty {
    height: 80px
}

.login-button {
    height: 40px;
    width: 80%;
    border-radius: 25px;
    border: none;
    margin-top: 50px;
    font-size: 20px;
    background: white;
    color: black;
    border: 2px solid #FFB534;
}

.login-button:hover {
    background: #FFB534;
}

.create-button {
    height: 40px;
    width: 80%;
    border-radius: 25px;
    border: none;
    margin-top: 5px;
    font-size: 20px;
    background: white;
    color: black;
    border: 2px solid #FFB534;
}

.create-button:hover {
    background: #FFB534;
}

.login-with-google {
    height: 40px;
    width: 80%;
    border-radius: 25px;
    border: none;
    margin-top: 5px;
    font-size: 20px;
    background: white;
    color: black;
    border: 2px solid #FFB534;
    position: relative;
}

.login-with-google:hover {
    background: #FFB534;
}

.right-form>.logo img {
    height: 100%;
    width: 100%;
    border-bottom-right-radius: 10px;
    border-top-right-radius: 10px;
}

.fa-lock {
    font-size: 20px;
}

.fa-user {
    font-size: 20px;
}

.div_loi {
    width: 280px;
    height: 20px;
    color: red;
    margin-left: 40px;
    font-weight: bold;
}

#eye {
    position: relative;
    top: -25px;
    right: -86%;
    width: min-content;
    padding: 4px;
    font-size: 18px;
}

.link-forgot-password {
    margin-top: 40px;
    font-size: 18px;
}

.link-forgot-password a {
    color: #3300FF;
    text-decoration: none;
}

.link-forgot-password a:hover {
    color: #FFB534;
}

.lg-google img {
    position: absolute;
    height: 40px;
    width: 40px;
    top: -2px;
    right: 10px;
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<div class="login-form">
    <div class="left-form">
        <form action="login.php" method="post">
            <table>
                <tr>
                    <th>
                        <div class="login-form-title">
                            Halo Meet
                        </div>
                    </th>
                </tr>
                <tr>
                    <th>
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Enter your username" class="regex-username" name="Username">
                    </th>
                </tr>
                <tr>
                    <th>
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Enter your password" class="regex-password" name="Password">
                        <div id="eye">
                            <i class="far fa-eye"></i>
                        </div>
                    </th>
                </tr>
                <tr>
                    <th>
                        <a href="">
                            <button class="login-button">
                                Login
                            </button>
                        </a>

                    </th>
                </tr>
            </table>
        </form>
        <table>
            <tr>
                <th>
                    <a href="register.php">
                        <button class="create-button">
                            Register
                        </button>
                    </a>
                </th>
            </tr>
            <tr>
                <th>
                    <div class="link-forgot-password">
                        <a href="">
                            Forgot password
                        </a>
                    </div>
                </th>
            </tr>
        </table>
        <div class="div_loi">
            <?php if (isset($_SESSION['loi'])) {
                echo $_SESSION['loi'];
                unset($_SESSION['loi']);
            }?>
        </div>
    </div>
    <div class="right-form">
        <div class="logo">
            <img src="anh/lg-meeting.png">
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="../js/script.js"></script>
<script>
$(document).ready(function() {
    $('#eye').click(function() {
        $(this).toggleClass('open');
        $(this).children('i').toggleClass('fa-eye-slash fa-eye');
        if ($(this).hasClass('open')) {
            $(this).prev().attr('type', 'text');
        } else {
            $(this).prev().attr('type', 'password');
        }
    });
});
</script>