<?
require_once "funcs.php";
if(isset($_POST['reg'])){
    login();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/De-Dwpd5CHc.png" type="image/x-icon">.
    <link rel="stylesheet" href="css/reset_style.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Instagram</title>
</head>
<body>
    <main>
        <div class="content">
            <div class="main">
                <img src="img/home-phones.png" alt="">
                <div class="cart">
                <div class="reg">
                    <form action="" method="post">
                    <h1><em>Instagramm</em></h1>
                    <span style="text-align: center;">Sign up to se photos and videos from your friends</span>
                    <input class="facebook" type="submit" value="login with Facebook">
                    <div class="res"><hr><span>OR</span><hr></div>
                    
                    <input style="padding: 10px; background: #f6f6f6;" type="text" placeholder="Email">
                    <input style="padding: 10px; background: #f6f6f6;" type="text" placeholder="Full name">
                    <input style="padding: 10px; background: #f6f6f6;" name="imya" type="text" placeholder="Username">
                    <input style="padding: 10px; background: #f6f6f6;" name="pswd" type="text" placeholder="Password">
                    <input name="reg" class="facebook" type="submit" value="Sign up">
                    
                    <span style="text-align: center;" >Need to confirm our<br><u>Personal politic</u> & <u>User politic</u></span>
                    </form>
                </div>
                <div class="help">
                    <span>Have an account?</span>
                    <a href="#">login</a>
                </div>
            </div>
            </div>
        </div>
    </main>
</body>
</html>