<?php
require ('handle.php');
require('includes/connection_database.php');
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset=utf-8">
    <title>Heartbeat and chain</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
<div class="header">
    <img class="head_logo" src="images/logo/small_logo.png">
    <div class="away_and_register">
        <div class="away">
            <a href=""><img class="away_logo" src="images/away/facebook_logo.png"></a>
            <a href=""><img class="away_logo" src="images/away/inst_logo.png"></a>
            <a href="https://vk.com/id100791549" target="_blank"><img class="away_logo" src="images/away/vkcom_logo.png"></a>
            <a href=""><img class="away_logo" src="images/away/twitter_logo.png"></a>
            <a href=""><img class="away_logo" src="images/away/telegram_logo.png"></a>
        </div>
        <?if(isset($_SESSION['logged_user'])){
            $upper_user = 'includes/patterns/upper_is_registered.php';}
        else {
            $upper_user = 'includes/patterns/upper_anonimous.php';}
        include $upper_user;?>
    </div>
    <div class="head_name">
        <h1><span>heartbeat</span> and chain <br> bikeshop</h1>
    </div>
</div>



<div class="content">
    <div class="upper_menu">
        <nav>
            <a href="/"> <span>M</span>AIN </a>
            <a href="basis.php?pattern=includes/patterns/news.php&page=1"> <span>N</span>EWS </a>
            <a href="basis.php?pattern=includes/patterns/shop.php&page=1"> <span>S</span>HOP </a>
            <a href="basis.php?pattern=includes/patterns/articles.php&page=1"> <span>A</span>RTICLES </a>
            <a href="basis.php?pattern=includes/patterns/reviews.php&page=1"> <span>R</span>EVIEWS </a>
            <a href="basis.php?pattern=includes/patterns/delivery.php"> <span>D</span>ELIVERY </a>
            <a href="basis.php?pattern=includes/patterns/about.php" target="_blanc"> <span>A</span>BOUT US</a>
        </nav>
    </div>
    <div class="container">
        <div class="side_menu">
            <div class="side_menu_brands"><span>b</span>rands:</div>
            <?php
            $result = mysqli_query($connection, "SELECT * FROM bycicle_shop.brands");
            $bicycles = mysqli_fetch_all($result, MYSQLI_ASSOC);
            foreach ($bicycles as $bicycle){?>
            <a href="basis.php?
                pattern=includes/patterns/brand.php&
                id=<? echo $bicycle['brand_id']?>"><?php echo $bicycle['brand_name'].'</br>'.'</a>';
                };
                ?>
        </div>
        <div class="inner_container">

            <?
            include ('includes/patterns/main.php');
            ?>

        </div>
    </div>
</div>

<div class="footer">
    Copyright © "Heartbeat and chain" 2018
</div>
<script>
    function openSignIn() {
        sign_in_form.style.display = 'flex'}
    function closeSignIn() {
        sign_in_form.style.display = 'none'}
    sign_in_button.addEventListener('click', openSignIn);
    close_button.addEventListener('click', closeSignIn);
</script>
</body>
</html>