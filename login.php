<?php 
    session_start();

    if(!isset($_POST["loginBut"])){
        header("Location:index.php");
    }
    else{
        include "koneksi.php";

        $username = $_POST["username"];
        $password = sha1($_POST["pass"]);


        $sql = "SELECT * FROM users WHERE username = ? AND pass = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $_SESSION["level"] = $row["level"];
            $_SESSION["npm"] = $row["npm"];
            header("Location: dashboard.php");
        }
        else{
            ?>
            <script> alert('Username Atau Password Salah');
                    window.location.href = "index.php";
            </script>
            <?php
        }
    }


?>