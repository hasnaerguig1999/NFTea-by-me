<?php
include "./php/db__connection.php";
$result = mysqli_query($connection, "SELECT * FROM nft__collection");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <link rel="stylesheet"
  href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="./style/style.css">
    <title>NFTea Collections</title>
</head>

<body>
    <!-- HEADER -->
    <header>
        <a id="logo" href="index.php">NFT<span style="color: #7C24D5;">ea</span></a>
        <nav class="nav__bar">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="collections.php" style="color: #7C24D4;">Collections</a></li>
                <li><a href="NFT.php">NFTs</a></li>
            </ul>
            <div class="sign_in__button">
                <button><a href="sign-in.php">Sign in</a></button>
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
            <h1>Enjoy the art of <span style="color: #7C24D5;">NFTs</span> collections</h1>
            <p>We are happy to host your art</p>
            <div class="hook__btn__container">
                <button><a href="./sign-in.php">View yours</a></button>
            </div>
        </div>
    </section>
    <!-- COLLECTIONS SECTION -->
    <section class="collections">
        <h2>All Collections</h2>
        <div class="call__to__action">
            <button class="add_yours"><a href="./sign-in.php">Add yours</a></button>
        </div>
        <div class="collections__items">
        <?php
            while ($row = mysqli_fetch_assoc($result)) {
                $img = $row['collection__img'];
                $artist_id = $row['artist__ID'];
                $user__sql = "SELECT user_name FROM user WHERE ID = $artist_id";
                $re = mysqli_query($connection, $user__sql);
                $artist_name = mysqli_fetch_column($re);
            ?>
            <div class="collection__card">
                <div class="collection__img" style="background-image: url('./<?php echo $img; ?>');">
                    <!-- collection image -->
                </div>
                <div class="collection__info">
                    <div class="informations">
                        <div class="collection__name__and__artist">
                            <h3 class="collection__name">
                                <?php echo $row['collection__name']; ?>
                            </h3>
                            <p class="artist__name">
                                <?php echo $artist_name; ?>
                            </p>
                        </div>
                        <div class="collection__description">
                            <p>
                                <?php echo $row['Collection__description']; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>
    <!-- FOOTER -->
    <footer>
            <div class="footer__container">
                <p>NFTea 2022. All rights reserved</p>
                <div class="list">
					
					<div class="social">
						<a href="#"><i class=' bx bxl-facebook' ></i></a>
						<a href="#"><i class=' bx bxl-instagram-alt' ></i></a>
						<a href="#"><i class=' bx bxl-twitter' ></i></a>
						<a href="#"><i class=' bx bxl-linkedin' ></i></a>
					</div>
            </div>
        </footer>
    <script src="./Script/app.js"></script>
</body>

</html>