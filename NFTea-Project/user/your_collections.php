<?php
include "../php/db__connection.php";
session_start();
$artist__ID = $_SESSION['ID'];
$sql = "SELECT * FROM nft__collection WHERE artist__ID = $artist__ID";
$resault = mysqli_query($connection, $sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>Your collections</title>
</head>

<body>
    <header>
        <a id="logo" href="index.php">NFT<span style="color: #7C24D5;">ea</span></a>
        <nav class="nav__bar">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="collections.php" style="color: #7C24D4;">Collections</a></li>
                <li><a href="NFT.php">NFTs</a></li>
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
    <section class="collections">
        <h2>All Collections</h2>
        <div class="call__to__action">
            <button class="add_yours"><a href="./add-collection.php">Add new</a></button>
        </div>
        <div class="collections__items">
            <?php
            while ($row = mysqli_fetch_assoc($resault)) {
                $img = $row['collection__img'];
            ?>
            <div class="collection__card">
                <div class="collection__img" style="background-image: url('../<?php echo $img; ?>');">
                    <!-- collection image -->
                </div>
                <div class="collection__info">
                    <div class="informations">
                        <div class="collection__name__and__artist">
                            <h3 class="collection__name">
                                <?php echo $row['collection__name']; ?>
                            </h3>
                            <p class="artist__name">
                                <?php echo $_SESSION['user_name']; ?>
                            </p>
                        </div>
                        <div class="collection__description">
                            <p>
                                <?php echo $row['Collection__description']; ?>
                            </p>
                        </div>
                    </div>
                    <div class="collection__explore">
                        <button class="collection__explore__btn"><a
                                href="../crud/collection__edit.php?id=<?php echo $row['ID'] ?>">Edit</a></button>
                        <button class="collection__explore__btn"><a
                                href="../crud/collection__delete.php?id=<?php echo $row['ID'] ?>">Delete</a></button>
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