<?php
include "../php/db__connection.php";
session_start();
if (isset($_GET['id'])) {
    $collection__id = $_GET['id'];
    $sql = "SELECT * FROM nft__collection WHERE ID = $collection__id";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);
    $collection__name = $row['collection__name'];
    $collection__description = $row['Collection__description'];
    $collection__IMG = $row['collection__img'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/forms.css">
    <title>Edit collection</title>
</head>

<body>
    <!-- HEADER -->
    <header>
        <a id="logo" href="home.php">NFT<span style="color: #7C24D5;">ea</span></a>
        <nav class="nav__bar">
            <ul>
                <li><a href="../user/home.php">Home</a></li>
                <li><a href="../user/collections.php" style="color: #7C24D5;" >Collections</a></li>
                <li><a href="../user/NFT.php">NFTs</a></li>
            </ul>
            <div class="sign_in__button">
                <button><a href="../user/log-out.php">Log out</a></button>
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
        <h1>Edit collection</h1>
        <form action="update.php?id=<?php echo $collection__id; ?>" id="collection_form" method="POST"
            enctype="multipart/form-data">
            <?php if (isset($_GET['error'])) { ?>
            <p style="color: red;">
                <?php echo $_GET['error']; ?>
            </p>
            <?php } ?>
            <input type="text" name="new__collection__name" placeholder="Enter collection name"
                value="<?php echo $collection__name; ?>">
            <textarea name="new__collection__description" id="description"
                placeholder="Enter the collection description"><?php echo $collection__description; ?></textarea>
            <div class="button" onclick="document.getElementById('collection__img').click()">Upload Image</div>
            <input type="file" id="collection__img" name="new__collection__img" style="display: none;"
                value="../db_img/<?php echo $collection__IMG; ?>">
            <input type="submit" value="Edit" id="submit" name="edit">
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
<?php
} else {
    header("Location: ../sign-in.php?error=Something goes wrong!");
    exit();
}
?>