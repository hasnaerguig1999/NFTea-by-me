<?php
session_start();
include "../php/db__connection.php";
if (isset($_POST['submit'])) {
    $artist__ID = $_SESSION['ID'];
    $nft__name = $_POST['nft__name'];
    $nft__price = $_POST['nft__price'];
    $nft__collection__name = $_POST['nft__collection__name'];
    $filename = $_FILES["nft__img"]["name"];
    $tempname = $_FILES["nft__img"]["tmp_name"];
    $img = "db_img/".$filename;
    $qry = "SELECT * FROM nft__collection";
    $result = mysqli_query($connection, $qry);
    if (empty($nft__name)) {
        header("Location: ./add-nft.php?error=NFT name is required");
        exit();
    } else if (empty($nft__price)) {
        header("Location: add-nft.php?error=NFT price is required");
        exit();
    } else if (empty($filename)) {
        header("Location: add-nft.php?error=NFT image is required");
        exit();
    } else {
        

        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['collection__name'] == $nft__collection__name && $row['artist__ID'] == $artist__ID) {
                $collection_ID = $row['ID'];
                $sql_I = "INSERT INTO nft(`NFT__name`, `price`, `NFT__IMG`, `collection__ID`) 
                        VALUES ('$nft__name', '$nft__price', '$img', '$collection_ID')";
                if (mysqli_query($connection, $sql_I)) {
                    header("Location: add-nft.php?message=NFT added");
                    exit();
                }
            }
        }
        header("Location: add-nft.php?error=This collection is not exist, or it is not yours");
        exit();
    }

}
?>