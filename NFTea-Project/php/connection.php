<?php
session_start();
include "db__connection.php";
if (isset($_POST['user__name']) && isset($_POST['password'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $user_name = validate($_POST['user__name']);
    $user__password = validate($_POST['password']);
    if (empty($user_name)) {
        header("Location: ../sign-in.php?error=User name is required");
        exit();
    } else if (empty($user__password)) {
        header("Location: ../sign-in.php?error=Password is required");
        exit();
    } else {
        $sql = "SELECT * FROM user WHERE user_name='$user_name'";
        $result = mysqli_query($connection, $sql);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['user_name'] === $user_name && $row['user__password'] != $user__password) {
                header("Location: ../sign-in.php?error=Incorect password!");
                exit();
            } else if ($row['user_name'] === $user_name && $row['user__password'] == $user__password) {
                $_SESSION['ID'] = $row['ID'];
                $_SESSION['user_name'] = $row['user_name'];
                $_SESSION['user__password'] = $row['user__password'];
                header("Location: ../user/home.php");
                exit();
            }
        } else {
            $qry = "INSERT INTO `user`(`user_name`, `user__password`) 
                VALUES ('$user_name', '$user__password')";
            $insert = mysqli_query($connection, $qry);
            $sql = "SELECT * FROM user WHERE user_name='$user_name'";
            $result = mysqli_query($connection, $sql);
            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                if ($row['user_name'] === $user_name && $row['user__password'] != $user__password) {
                    header("Location: ../sign-in.php?error=Incorect password!");
                    exit();
                } else if ($row['user_name'] === $user_name && $row['user__password'] == $user__password) {
                    $_SESSION['ID'] = $row['ID'];
                    $_SESSION['user_name'] = $row['user_name'];
                    $_SESSION['user__password'] = $row['user__password'];
                    header("Location: ../user/home.php");
                    exit();
                }
            }
        }
    }
} else {
    header("Location: ../sign-in.php");
    exit();
}
?>