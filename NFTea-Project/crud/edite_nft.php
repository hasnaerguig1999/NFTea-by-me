<?php
include "../php/db__connection.php";
if (isset($_POST['edit'])) {
    $nft__name = $_POST['nft__name'];
    $nft__price = $_POST['nft__price'];
    $nft__collection = $_POST['nft__collection__name'];
    $nft__img__file = $_FILES['nft__img'];
    $nft__img__location = $_FILES['nft__img']['tmp_name'];
    $nft__img__name = $_FILES['nft__img']['name'];
    $nft__img = 'db_img/' . $nft__img__name;
    $qry = mysqli_query($connection, "SELECT ID from nft__collection WHERE collection__name = '$nft__collection'");
    $collection__ID = mysqli_fetch_assoc($qry);
    $sql = "UPDATE nft SET NFT__name = ' $nft__img ', price = '$nft__price', NFT__IMG = '$nft__img', Collection__ID = $collection__ID";
    if (mysqli_query($connection, $sql)) {
        header("Location: ../user/your_nft.php");
        exit();
    } else {
        header("Location: ../user/your_nft.php");
        exit();
    }

}

?>