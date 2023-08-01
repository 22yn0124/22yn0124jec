<?php
    require_once './helpers/MenberDAO.php';

    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }

    if(!empty($_SESSION['member'])){
        $member = $_SESSION['member'];
    }
?>
<header>
    <link href="css/HeaderStyle.css" rel="stylesheet">

    <div id="logo">
        <a href="index.php">
            <img src="images/JecShoppingLogo.jpg" alt="JecShoppingロゴ">
        </a>
    </div>
    <div id="link">
        <form action="index.php" method="GET">
            <input type="text" name="keyword" value="<?= @$keyword?>">
            <input type="submit" value="検索">
        </form>
        <?php if(isset($member)) : ?>
            <?= $member->membername?>さん
            <a href="cart.php">カート</a>
            <a href="logout.php">ログアウト</a>
        <?php else: ?>
            <a href="login.php">ログイン</a>
        <?php endif; ?>
    </div>
    <div id="clear">
        <hr>
    </div>
</header>
