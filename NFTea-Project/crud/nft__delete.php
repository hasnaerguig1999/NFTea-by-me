<?php
include "../php/db__connection.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($connection, "DELETE FROM nft WHERE ID = $id");
    header("Location: ../user/your_nft.php");
    exit();
}

?>