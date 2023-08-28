<?
require_once('funcs.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/De-Dwpd5CHc.png" type="image/x-icon">
    <link rel="stylesheet" href="css/reset_style.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/profile.css">
    <script src="js/jquery-3.4.1.min.js"></script>
    <title>Instagram</title>
</head>
<body>
    <?require_once('header.php')?>
    <main>
        <div class="content">
            <div class="user-profile">
                <div class="body">
                    <?foreach(profile($_GET['id']) as $prof):?>
                    <div class="profile-info">
                        <img class="profile-image" style="border-radius:100px;" src="img/<?if ($prof['photo'] == null) echo "profile.png"; else echo $prof['photo']?>" alt="">
                        <div class="profile-info-text">
                            <div class="profile-text">
                                <span <?if($prof['verification'] != 1)echo"style='margin-right:40px'"?>> <?=$prof['login']." ".$prof['family']?></span>
                                <?if($prof['verification'] == 1):?>
                                <img style="width: 20px; margin-right: 20px;" src="img/verification.png" alt="">
                                <?endif;?>
                                <form action="" style="display: inline;">
                                <?if($_SESSION['user']['id'] == $prof['id']):?>
                                    <input type="submit" value="Edit profile">
                                <?endif;?>
                                <?if($_SESSION['user']['id'] != $prof['id']):?>
                                    <input style="width:30px; background: url(img/message.png) no-repeat center;background-size: contain;" type="submit" value=" ">
                                <?endif;?>
                                </form>
                            </div>
                            <div class="profile-subs">
                                <?foreach(profile_count($_GET['id']) as $post_c):?>
                                <span><b><?=$post_c['c_id_p']?></b> publications</span>
                                <span><b><?=$post_c['c_sub']?></b> subscribers</span>
                                <span>subscriptions <b><?=$post_c['c_subs']?></b></span>
                                <?break;endforeach;?>
                            </div>
                            <div class="about-you">
                                <span></span>
                            </div>
                        </div>
                    </div>
                    <?break;endforeach;?>
                    <div class="profile-menu">
                        <ul>
                            <li style="text-transform:uppercase;">publications</li>
                            <li style="text-transform:uppercase;">igtv</li>
                            <li style="text-transform:uppercase;">saved</li>
                            <li style="text-transform:uppercase;">marks</li>
                        </ul>
                    </div>
                    <div class="galery">
                        <?foreach(profile($_GET['id']) as $prof):?>   
                        <div class="black">     
                            <img class="galery-images" src="img/<?= $prof['p_image']?>" alt="">
                        </div> 
                        <?endforeach;?>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>