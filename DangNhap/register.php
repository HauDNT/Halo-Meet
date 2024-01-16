<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<style>
body {
    margin: 0px;
}
*{
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}
.container {
    width: 100%;
    height: 729px;
    background: yellowgreen;
    position: relative;
}

.register-form {
    width: 400px;
    height: 500px;
    background: white;
    position: absolute;
    top: 100px;
    left: 37%;
    border-radius: 10px;
}

.title {
    font-size: 30px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    text-align: center;
    padding-top: 20px;
    padding-bottom: 30px;
}

hr {
    background-color: lightgray;
}

input[type="text"] {
    width: 300px;
    height: 40px;
    margin-top: 10px;
    outline: none;
    border: none;
    border-bottom: 2px solid lightgray;
    margin-left: 40px;
    padding-left: 15px;
    font-size: 15px;
}

input[type="text"]:focus {
    border-bottom: 2px solid #FFB534;
}

input[type="password"] {
    width: 300px;
    height: 40px;
    margin-top: 10px;
    outline: none;
    border: none;
    border-bottom: 2px solid lightgray;
    margin-left: 40px;
    padding-left: 15px;
    font-size: 15px;
}

input[type="password"]:focus {
    border-bottom: 2px solid #FFB534;
}

.bt-create {
    width: 300px;
    height: 40px;
    margin-left: 40px;
    margin-top: 40px;
    border-radius: 25px;
    border: 2px solid #FFB534;
    background-color: white;
    color: black;
    font-size: 15px;
}
.bt-create:hover {
    background-color: #FFB534;
}
.error{
    color: red;
    font-weight: normal;
    position: absolute;
    left: 40px;
}
.back-to-login {
    text-align: center;
    margin-top: 20px;
}
.back-to-login a{
    text-decoration:none;
    color: #525CEB;
}
.back-to-login a:hover{
    color:#11009E;
}

</style>

<body>
    <div class="container">
        <div class="register-form">
            <div class="title">
                Register
            </div>
            <hr>
            <form action="create.php" method="POST">
                <table>
                    <tr>
                        <th>
                            <input type="text" name="ten_tk" placeholder=" Account name">
                        </th>
                    </tr>
                    <?php if(empty($_GET['error'])){?>
                    <?php }else {?>
                    <tr>
                        <th>
                            <div class="error">
                            <i><?php echo $_GET['error'];?></i>
                            </div>
                        </th>
                    </tr>
                    <?php }?>
                    <tr>
                        <th>
                            <input type="password" name="mat_khau" placeholder=" Password">
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <input type="text" name="ten_nd" placeholder=" Username">
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <input type="text" name="gmail" placeholder=" Gmail">
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <a href="">
                                <button class="bt-create">
                                    Create
                                </button>
                            </a>
                        </th>
                    </tr>
                </table>
            </form>
            <div class="back-to-login">
                <a href="index.php">
                    Back to login
                </a>
            </div>
        </div>
    </div>
</body>

</html>