<?php 
    session_start();
    if($_SESSION["level"] == 2) {
        include "koneksi.php";

        $npm = $_GET['id'];
        $sql1 = "DELETE FROM identitas WHERE npm = '$npm'";
        $sql2 = "DELETE FROM users WHERE npm = '$npm'";

        if ($conn->query($sql2) === TRUE && $conn->query($sql1) === TRUE) {
            header("Location: dashboard.php");
            exit(); 
        } else {
            echo "Error: " . $conn->error;
        }
        $conn->close();
    }
?>
