<?php
include "../php/db__connection.php";
session_start();


$query__max__nft = mysqli_query($connection, "SELECT * FROM nft order by price desc");
$query__min__nft = mysqli_query($connection,"SELECT * FROM nft order by price asc");
$max__nft__row = mysqli_fetch_assoc($query__max__nft);
$min__nft__row = mysqli_fetch_assoc($query__min__nft);


$result = mysqli_query($connection, "SELECT * FROM nft");



if (isset($_SESSION['user_name']) && isset($_SESSION['user__password'])) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>NFTea NFT</title>
</head>
<style>
    .nft_top .nft__card {
        background-image: url('../<?php echo $max__nft__row['NFT__IMG']; ?>');
    }
    .nft_down .nft__card {
        background-image: url('../<?php echo $min__nft__row['NFT__IMG']; ?>');
    }
</style>
<body>
    <!-- HEADER -->
    <header>
        <a id="logo" href="home.php">NFT<span style="color: #7C24D5;">ea</span></a>
        <nav class="nav__bar">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="collections.php">Collections</a></li>
                <li><a href="NFT.php" style="color: #7C24D4;">NFTs</a></li>
            </ul>
            <div class="sign_in__button">
                <button><a href="./log-out.php">Log out</a></button>
            </div>
        </nav>
        <div class="burger__menu">
            <span class="burger__bar"></span>
            <span class="burger__bar"></span>
            <span class="burger__bar"></span>
        </div>
    </header>
    <!-- HERO SECTION -->
    <section class="hero__section">
        <div class="hook__text__part">
            <h1>Enjoy the art of <span style="color: #7C24D5;">NFTs</span></h1>
            <p>We are happy to host your art</p>
            <div class="hook__btn__container">
                <button><a href="your_nft.php">View yours</a></button>
            </div>
        </div>
        <div class="nft_top_down">
            <div class="nft_top">
                <p>Top</p>
                <div class="nft__card" style=" background-image: url('../<?php echo $max_img; ?>');">
                    <div class="nft__info">
                        <h3 class="nft__name"><?php echo $max__nft__row['NFT__name']; ?></h3>
                        
                        <p class="nft__price"><?php echo $max__nft__row['price']; ?> ETH</p>
                    </div>
                </div>
            </div>
            <div class="nft_down">
                <p>down</p>
                <div class="nft__card" style=" background-image: url('../<?php echo $min_img; ?>');">
                    <div class="nft__info">
                        <h3 class="nft__name"><?php echo $min__nft__row['NFT__name']; ?></h3>
                        <p class="nft__price"><?php echo $min__nft__row['price']; ?> ETH</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- NFT SECTION -->
    <section class="nft__section">
        <h2>All NFT</h2>
        <div class="call__to__action">
            <button class="add_yours"><a href="./add-nft.php">Add yours</a></button>
        </div>
        <div class="nft__items">
            <?php while( $row = mysqli_fetch_assoc($result)) { 
                $c_id = $row['Collection__ID'];
                $user__sql = "SELECT artist__ID FROM nft__collection WHERE ID = $c_id";
                $re = mysqli_query($connection, $user__sql);
                $artist_id = mysqli_fetch_column($re);
                $user_name_sql = mysqli_query($connection, "SELECT user_name FROM user WHERE ID = $artist_id");
                $artist_name =  mysqli_fetch_column($user_name_sql); 
                $img = $row['NFT__IMG']; ?>
                <div class="nft__card" style="background-image: url('../<?php echo $img; ?>') ;">
                <div class="nft__info">
                    <h3 class="nft__name"><?php echo $row['NFT__name']; ?></h3>
                    <p class="artist__name"><?php echo $artist_name; ?></p>
                    <p class="nft__price"> <span><?php echo $row['price']; ?></span>ETH</p>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>
    <!-- FOOTER -->
    <footer>
        <div class="footer__container">
            <p>NFTea 2022. All rights reserved</p>
            <div class="social__media__icons">
                <p>facebook</p>
                <p>instagram</p>
                <p>tiktok</p>
            </div>
        </div>
    </footer>
    <script src="../Script/app.js"></script>
</body>

</html>
<?php } else {
    header("Location: ../sign-in.php?error=Something goes wrong!");
    exit();
}
?>