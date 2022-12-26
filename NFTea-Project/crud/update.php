<?php
include "../php/db__connection.php";
if (isset($_POST['edit'])) {
    $collection__id = $_GET['id'];
    $collection__name = $_POST['new__collection__name'];
    $collection__description = $_POST['new__collection__description'];
    $collection__img__file = $_FILES['new__collection__img'];
    $collection__img__location = $_FILES['new__collection__img']['tmp_name'];
    $collection__img__name = $_FILES['new__collection__img']['name'];
    $collection__img = 'db_img/' . $collection__img__name;
    if($collection__img__location != "") {
        $sql_1 = "UPDATE nft__collection SET collection__name = '$collection__name', Collection__description = '$collection__description', 
            collection__img = '$collection__img' WHERE ID = '$collection__id'";
        mysqli_query($connection, $sql_1);
        if (mysqli_query($connection, $sql_1)) {
            header("Location: ../user/your_collections.php");
            exit();
        } 
    } else {
        $sql_2 = "UPDATE nft__collection SET collection__name = '$collection__name', Collection__description = '$collection__description' 
             WHERE ID = '$collection__id'";
        mysqli_query($connection, $sql_2);
        if (mysqli_query($connection, $sql_2)) {
            header("Location: ../user/your_collections.php");
            exit();
        } 
    }

    if (mysqli_query($connection, $sql_2) || mysqli_query($connection, $sql_1)) {
        header("Location: ../user/your_collections.php");
        exit();
    } else {
        header("Location: ../user/your_collections.php");
        exit();
    }

} else {
    header("Location: ../user/your_collections.php");
    exit();

}
?>