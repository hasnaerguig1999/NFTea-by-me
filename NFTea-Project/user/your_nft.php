<?php
include "../php/db__connection.php";
session_start();
$artist_id = $_SESSION['ID'];
$sql = "SELECT ID FROM nft__collection WHERE artist__ID = $artist_id";
$resault = mysqli_query($connection, $sql);
$collection_id = mysqli_fetch_column($resault);
$qry = "SELECT * FROM nft WHERE Collection__ID = $collection_id";
$res = mysqli_query($connection, $qry);


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
    <!-- NFT SECTION -->
    <section class="nft__section">
        <h2>Your NFT</h2>
        <div class="call__to__action">
            <button class="add_yours"><a href="./add-nft.php">Add yours</a></button>
        </div>
        <div class="nft__items">
            <?php while($row = mysqli_fetch_assoc($res)) { $img = $row['NFT__IMG'];?>
                
            <div class="nft__card" style="background-image: url('../<?php echo $img; ?>') ;">
                <div class="nft__info">
                    <h3 class="nft__name"><?php echo $row['NFT__name'] ?></h3>
                    <p class="artist__name"><?php echo $_SESSION['user_name'] ?></p>
                    <p class="nft__price"> <span><?php echo $row['price'] ?></span>ETH</p>
                    <button class="collection__explore__btn"><a
                                href="../crud/nft__edit.php?id=<?php echo $row['ID'] ?>">Edit</a></button>
                        <button class="collection__explore__btn"><a
                                href="../crud/nft__delete.php?id=<?php echo $row['ID'] ?>">Delete</a></button>
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