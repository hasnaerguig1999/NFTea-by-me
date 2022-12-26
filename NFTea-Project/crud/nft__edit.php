<?php
include "../php/db__connection.php";
session_start();
$nft_id = $_GET['id'];
$sql = "SELECT * FROM nft WHERE ID = $nft_id";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);
$artist__id = $_SESSION['ID'];
$qry = "SELECT * FROM nft__collection WHERE artist__ID = $artist__id";
$result_col = mysqli_query($connection, $qry);
if (isset($_SESSION['user_name']) && isset($_SESSION['user__password'])) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/forms.css">
    <title>NFTea Home</title>
</head>

<body>
    <!-- HEADER -->
    <header>
        <a id="logo" href="home.php">NFT<span style="color: #7C24D5;">ea</span></a>
        <nav class="nav__bar">
            <ul>
                <li><a href="../user/home.php">Home</a></li>
                <li><a href="../user/collections.php">Collections</a></li>
                <li><a href="../user/NFT.php">NFTs</a></li>
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
    <!-- form -->
    <section class="form_">
        <h1>Edit NFT</h1>
        <form action="nft__update.php?id=<?php echo $row['ID']; ?>" class="nft_form" method="POST" enctype="multipart/form-data">
            <?php if (isset($_GET['error'])) { ?>
            <p style="color: red;">
                <?php echo $_GET['error']; ?>
            </p>
            <?php } ?>
            <input type="text" placeholder="Enter the NFT name *" name="nft__name" value="<?php echo $row['NFT__name']; ?>">
            <input type="text" placeholder="Enter NFT price (ETH) *" name="nft__price" value="<?php echo $row['price']; ?>">
            <select name="nft__collection__name" id="collection__select" >
                <option value="Select the NFT collection" hidden>Select the NFT collection *</option>
                <?php
                    while($row_1 = mysqli_fetch_assoc($result_col)) { ?>
                <option value="<?php echo $row_1['collection__name']; ?>"><?php echo $row_1['collection__name']; ?></option>
                <?php } ?>
            </select>
            <div class="button" onclick="document.getElementById('nft__img').click()">Upload Image</div>
            <input type="File" id="nft__img" name="nft__img" style="display: none;">
            <input type="submit" value="Create" id="submit" name="edit">
        </form>
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
    <script src="../script/app.js"></script>
    <?php
    if (isset($_GET['message'])) { ?>
    <script>
        alert("<?php echo $_GET['message']; ?>");
    </script>

    <?php
    }
    ?>
</body>

</html>
<?php } else {
    header("Location: ../sign-in.php?error=Something goes wrong!");
    exit();
}
?>