<!DOCTYPE html>
<html>
<head>
<title>Login Form</title>
<meta charset="utf-8">
<style type="text/css">
    .login {
        margin: 30px auto;
        width: 150px;
        height: 150px;
        padding: 15px;
        border: 1px solid #pink;
        background: lightblue;
        
    }
    img{
        width: 100px;
        height: 100px;
      

    }
    input[type=text], input[type=password] {
        margin: 5px auto;
        width: 80%;
        padding: 5px;
    }
    input[type=submit] {
        margin : 2px auto;
        float: right;
        padding: 10px;
        width: 80px;
        border: 0px solid #pink;
        color: #pink;
        background: pink;
        cursor: pointer;
    }

</style>
</head>
<body background="background.jpg">
    <img src="userr.jpg" align="center">
    <div style="color: black">  
    <h2 align="center">WEB PRIBADI SAYA</h2>
    </div>
    <div style="color: black">
    <h3 align="center">Silahkan login terlebih dahulu</h3>
    </div>
    <div class="login">
    <p> Inputkan disini !</p>
    <form method="post" action="cek_login.php">
    <input name="id_user"
    type="text" id="id_user" placeholder="Nama"><br>
    <input name="password" type="password"
        id="password" placeholder="Password"><br>
    <input type="submit" name="kirim" value="Kirim">
</form>
</div>
</body>
</html>
