<?php 
include "../php/db__connection.php";
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($connection, "DELETE FROM nft__collection WHERE ID = $id");
    header("Location: ../user/your_collections.php");
    exit();
}

?>