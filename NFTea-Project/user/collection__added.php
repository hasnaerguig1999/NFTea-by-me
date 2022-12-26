<?php
session_start();
include "../php/db__connection.php";
if (isset($_POST['submit'])) {
    $collection__name = $_POST['collection__name'];
    $collection__description = $_POST['collection__description'];
    $collection__artist = $_SESSION["ID"];
    $filename = $_FILES['collection__img']['name'];
    $tempname = $_FILES['collection__img']['tmp_name'];
    $img = "db_img/" . $filename;
    if (empty($collection__name)) {
        header("Location: add-collection.php?error=collection name is required");
        exit();
    }
    else {
        $sql = "INSERT INTO nft__collection(collection__name, collection__description, collection__IMG, artist__ID) 
                VALUES ('$collection__name', '$collection__description', '$img', '$collection__artist')";
        $insert = mysqli_query($connection, $sql);
        header("Location: add-collection.php?message=Collection added");
        exit();
    }

}
?>