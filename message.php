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
            <div class="messager" style="overflow: auto;">
                <?foreach(mes() as $mess):?>
                <div data-id="<?= $mess['id']?>" class="message-list <? if($_SESSION['user']['id'] == $mess['us_id']) echo "my"; else echo "other";?>">
                    <div   class="img"><img onclick="location.href='profile.php?id=<?= $mess['us_id']?>';" class="img-mess" src="img/<?if ($mess['photo'] == null) echo "profile.png"; else echo $mess['photo']?>" alt="профиль"></div>
                    <div class="row">
                    <div class="info">              
                        <label for=""><?= $mess['login']?></label>
                        <span class="mess" ><?= $mess['message']?></span>
                    </div>
                    <div class="time">
                        <span><?= $mess['created_at']?></span>
                    </div>
                    <?if ($_SESSION['user']['id'] == $mess['us_id']):?>
                    <input class="delete-btn" type="submit" value="X">
                    <?endif;?>
                    </div>
                </div>
                <?endforeach;?>
            </div>
            <script>
                const messages = document.querySelectorAll('.my');
                messages.forEach(message => {
                    message.querySelector('.delete-btn').addEventListener('click', () =>{
                        const messageId = message.dataset.id
                        console.log(messageId)
                        const xhr = new XMLHttpRequest();
                    xhr.open('POST', 'delete_message.php');
                    console.log(xhr)
                    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                    xhr.onload = () => {
                    if (xhr.status === 200) {
                        // Если сообщение успешно удалено, удаляем его из DOM-дерева
                        message.remove();
                    } else {
                        // Если произошла ошибка при удалении сообщения, выводим сообщение об ошибке
                        console.error('Ошибка при удалении сообщения');
                    }
                    };
                    xhr.send(`id=${messageId}`);
                    });
                    
                })
            </script>
            <script>
                function zoom(){
                    $(document).ready(function() {
                    var image = $('.other .img .img-mess');
                    if (image.height() <= 22.5){
                        var startBlock = document.querySelectorAll('.img-mess');
                        for (var i = 0; i < startBlock.length; i++) {
                            startBlock[i].classList.add('zoom');
                            }
                        }
                    });
                }
            </script>
            <form action="add-message.php" method="post">
            <div class="send">
                <input class="text" name="mess" type="text" placeholder="Message...">
                <input class="btn" name="send" type="submit" value="Send">
            </div>
        </form>
        </div>
    </main>
    <!-- <script>
        setTimeout(function(){
	location.reload();
}, 3000);
    </script> -->
</body>
</html>