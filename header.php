<header>
        <div class="content">
            <div class="menu-btn">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="menu" style="overflow: hidden; z-index: 1;">
                <nav>
                <ul>
                    <img src="img/Instagram_logo.svg.png" alt="">
                    <input class="search" type="text" placeholder="Search...">
                    <li><img src="img/home.png" alt=""><a href="main.php">Home Page</a></li>
                    <li><img src="img/message.png" alt=""><a href="messenger.php">My Message</a></li>
                    <li><img src="img/compas.png" alt=""><a href="#">Recommend</a></li>
                    <li><img src="img/like.png" alt=""><a href="#">My Likes</a></li>
                    <li><img src="img/profile.png" alt=""><a href="profile.php?id=<?= $_SESSION['user']['id']?>">My Profile</a></li>
                    <li><a href="logout.php">Exit</a></li>
                </ul>
                </nav>
            </div>
            <script src="js/burger.js"></script>
            <div class="nav">
            <img src="img/Instagram_logo.svg.png" alt="">
            <div class="nav-r">
            <input class="find" type="text" placeholder="Search">
            <ul>
                <li><img src="img/home.png" alt="" onclick="location.href='main.php';"></li>
                <li><img src="img/message.png" alt="" onclick="location.href='messenger.php';"></li>
                <li><img src="img/compas.png" alt=""></li>
                <li><img src="img/like.png" alt=""></li>
                <?foreach(photo() as $prof):?>
                <li class="profile-menu"><img onclick="location.href='profile.php?id=<?= $_SESSION['user']['id']?>';" style="border-radius: 20px;" src="img/<?if ($prof['photo'] == null) echo "profile.png"; else echo $prof['photo']?>" alt=""><a class="exit" href="logout.php">Exit</a></li>
                <?endforeach;?>
            </ul>
        </div>
            </div>
        </div>
        
    </header>