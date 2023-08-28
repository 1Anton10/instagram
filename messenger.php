<?
require_once "funcs.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/De-Dwpd5CHc.png" type="image/x-icon">
    <link rel="stylesheet" href="css/reset_style.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/message.css">
    <script src="js/jquery-3.4.1.min.js"></script>
    <title>Instagram</title>
</head>
<body onload="zoom()">
<?require_once('header.php')?>
    <main>
        <div class="content">
            <div class="messager">
                <!-- <div class="message">
                    <div class="img"><img src="img/face.jpg" alt="профиль"></div>
                    <div class="row">
                    <div class="info">              
                        <label for="">ametisth</label>
                        <span>сообщение...</span>
                    </div>
                    <div class="time">
                        <span>10:00</span>
                    </div>
                    </div>
                </div> -->
                <?foreach(sql() as $diag):?>
                <div class="message" onclick="location.href='message.php?id_diag=<?= $diag['id_d']?>';">
                    <div class="img"><img class="image-d" src="img/<?if ($diag['photo'] == null) echo "profile.png"; else echo $diag['photo']?>" alt="профиль"></div>
                    <div class="row">
                    <div class="info">              
                        <label for="">ametisth</label>
                        <span><?
                        (($diag['u1_id'] !== $_SESSION['user']['id']) or ($diag['u2_id'] !== $_SESSION['user']['id'])) ? print_r("Вы: ".lastMessage($diag['id_d'])['message']) : print_r(lastMessage($diag['id_d'])['message']);?></span>
                    </div>
                    <div class="time">
                        <span><? print_r(lastMessage($diag['id_d'])['created_at'])?></span>
                    </div>
                    </div>
                </div>
                <?endforeach;?>
            </div>
        </div>
    </main>
    <script>
    function zoom(){
                    $(document).ready(function() {
                    var image = $('.message .img .image-d');
                    if (image.height() <= 41){
                        var startBlock = document.querySelectorAll('.image-d');
                        for (var i = 0; i < startBlock.length; i++) {
                            startBlock[i].classList.add('zoom');
                            }
                        }
                    });
                }
            </script>
</body>
</html>