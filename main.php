<?
require_once "funcs.php";
if(isset($_POST['add_post'])){
    add_post();
    header("location: main.php");
}

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
    <script src="js/jquery-3.4.1.min.js"></script>
    <title>Instagram</title>
</head>
<body>
<?require_once('header.php')?>
    <main>
        <div class="content">
        <div class="news">
            <div class="storis">
                <div class="storis-ul">
                    <div class="story">
                        <div class="video">
                        <div class="prof-s"></div>
                        <a href="#">ametisth</a>
                        </div>
                        <div class="video">
                        <div class="prof-s"></div>
                        <a href="#">ametisth</a>
                        </div>
                        <div class="video">
                        <div class="prof-s"></div>
                        <a href="#">ametisth</a>
                        </div>
                        <div class="video">
                        <div class="prof-s"></div>
                        <a href="#">ametisth</a>
                        </div>
                        <div class="video">
                        <div class="prof-s"></div>
                        <a href="#">ametisth</a>
                        </div>
                        <div class="video">
                        <div class="prof-s"></div>
                        <a href="#">ametisth</a>
                        </div>
                        <div class="video">
                        <div class="prof-s"></div>
                        <a href="#">ametisth</a>
                        </div>
                    </div>
                </div>
            </div>
            <form id="uploadForm"  action="" method="post" >
            <div class="add-post">
                <textarea name="tit" id="" cols="30" rows="3" placeholder="Whrite your thoughts..."></textarea>
                <div class="input-file-row">
                <label class="input-file">
                <input id="fileInput" type="file" name="img" multiple accept="img/*">		
                <span>Choose image</span>
                </label>
                <div class="input-file-list"></div>  
                </div>
                <input class="send-post" name="add_post" type="submit" value="Post it!">
            </div>
            <script src="js/multi-tool.js"></script>
            </form>
            <?foreach(post() as $post):?>
            <div class="post">
                <div onclick="location.href='profile.php?id=<?= $post['u_id']?>';" class="title">
                    <img src="img/<?if ($post['photo'] == null) echo "img/profile.png"; else echo $post['photo']?>" alt="">
                    <span><?= $post['login']?></span>
                    <?if($post['verification'] == 1):?>
                                <img style="height: 20px; width: 20px;" src="img/verification.png" alt="">
                                <?endif;?>
                </div>
                <? if ($post['p_image']): ?>
                <div class="picture">
                    <img src="img/<?= $post['p_image']?>" alt="">
                </div>
                <? else:?>                 
                <div class="description">
                    <span><?= $post['p_title']?></span>
                    <div class="panel">
                    <div id="<?= $post['id_p']?>" data-id="<?= $post['id_p']?>" class="like"><?= $post['likes']?></div>
                    <img src="img/comment.png" alt="">
                    <img src="img/message.png" alt="">
                </div>
                    <div class="comment">
                        <img src="img/profile.png" alt="">
                        <input class="comm" type="text" placeholder="Write your comment...">
                    </div>
                </div>
                    <?endif;?>                
                    <?if ($post['p_image']):?>
                <div class="panel">
                    <div id ="<?= $post['id_p']?>" data-id="<?= $post['id_p']?>" class="like"><?= $post['likes']?></div>
                    <img src="img/comment.png" alt="">
                    <img src="img/message.png" alt="">
                </div>
                <div class="description">
                    <span><?= $post['p_title']?></span>
                    <div class="comment">
                        <?foreach(user() as $user):?>
                        <img src="img/<?if ($user['photo'] == null) echo "img/profile.png"; else echo $user['photo']?>" alt="">
                        <?endforeach;?>
                        <input class="comm" type="text" placeholder="Write your comment...">
                    </div>
                </div>
                <?endif;?>
            </div>
            
            <?endforeach;?>
            
        </div>
        <div class="profile">
            <div class="profile-cont">
            <?foreach(user() as $user):?>
            <img style="border-radius: 50px;width: 70px;height: 70px;" src="img/<?if ($user['photo'] == null) echo "profile.png"; else echo $user['photo']?>" alt="">
            <div class="name">
                <span><?= $user['login']?></span>
                <span style="color: lightgray;"><?= $user['family']?></span>
            </div>
            <?endforeach;?>
            <a href="#">Switch</a>
            </div>
            <div class="suggestions">
                <div class="text">
                <span class="sug">Suggestions For You</span>
                <span class="all">See All</span>
                </div>
                <div class="profile-cont">
                <img src="img/profile.png" alt="">
                <div class="name">
                    <span>ametisth</span>
                    <span style="color: lightgray;">Followed by kenoere + 12 more</span>
                </div>
                <a href="#">Follow</a>
                </div>
                <div class="profile-cont">
                <img src="img/profile.png" alt="">
                <div class="name">
                    <span>ametisth</span>
                    <span style="color: lightgray;">Followed by kenoere + 12 more</span>
                </div>
                <a href="#">Follow</a>
                </div>
                <div class="profile-cont">
                <img src="img/profile.png" alt="">
                <div class="name">
                    <span>ametisth</span>
                    <span style="color: lightgray;">Followed by kenoere + 12 more</span>
                </div>
                <a href="#">Follow</a>
                </div>
                <div class="profile-cont">
                <img src="img/profile.png" alt="">
                <div class="name">
                    <span>ametisth</span>
                    <span style="color: lightgray;">Followed by kenoere + 12 more</span>
                </div>
                <a href="#">Follow</a>
                </div>
                <div class="profile-cont">
                <img src="img/profile.png" alt="">
                <div class="name">
                    <span>ametisth</span>
                    <span style="color: lightgray;">Followed by kenoere + 12 more</span>
                </div>
                <a href="#">Follow</a>
                </div>
            </div>
        </div>
        </div>
    </main>
    <script>
                var likeButtons = document.querySelectorAll('.post .like');
likeButtons.forEach(function(button) {
  button.addEventListener('click', function() {

    var id = this.getAttribute('data-id');
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'increase_likes.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        console.log(id);
      }
    };
    xhr.send('id=' + id);
  });
});
            </script>
            <script src="js/like.js"></script>

    <footer></footer>
</body>
</html>