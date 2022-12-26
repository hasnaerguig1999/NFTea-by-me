<?php
include "../php/db__connection.php";
if(isset($_POST['edit'])) {
    $nft_id = $_GET['id'];
    $nft__name = $_POST['nft__name'];
    $nft__price = $_POST['nft__price'];
    $nft__collection__name = $_POST['nft__collection__name'];
    $nft__img__name = $_FILES['nft__img'];
    $nft__img__file = $_FILES['nft__img'];
    $nft__img__location = $_FILES['nft__img']['tmp_name'];
    $nft__img__name = $_FILES['nft__img']['name'];
    $nft__img = 'db_img/' . $nft__img__name;
    $re = mysqli_query($connection, "SELECT ID from nft__collection WHERE collection__name = '$nft__collection__name'");
    $collection_id = mysqli_fetch_column($re);
    
    if($nft__img__name != "") {
        $sql_1 = "UPDATE nft SET NFT__name = '$nft__name', price = '$nft__price', NFT__IMG = '$nft__img' WHERE ID = '$nft_id' ";
        mysqli_query($connection, $sql_1);
    }
    else {
        $sql_2 = "UPDATE nft SET NFT__name = '$nft__name', price = '$nft__price' WHERE ID = '$nft_id'";
        mysqli_query($connection, $sql_2);
    }
    header("Location: ../user/your_nft.php");
        exit();
    }
?>
