<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if(isset($_POST['submit'])){

    require_once "db.php";

    $user = mysqli_real_escape_string($conn, $_POST['username']);
    $pwd  = mysqli_real_escape_string($conn, $_POST['pwd']);

    if(empty($user) || empty($pwd)){

        header("Location: ../../admin1");
        exit();

    }else{

        $sql = "SELECT * FROM users WHERE username='$user'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if($resultCheck < 1){

            header("Location: ../../admin2");
            exit();

        }else{

            if($row = mysqli_fetch_assoc($result)){

                $check = password_verify($pwd, $row['user_pwd']);

                if($check == false){

                    header("Location: ../../admin3");
                    exit();

                }elseif($check == true){

                    $_SESSION['u_id'] = $row['user_id'];
                    header("Location: ../../admin007");
                    exit();

                }else{

                    header("Location: ../../admin4");
                    exit();

                }

            }

        }

    }

}else{

    header("Location: ../../admin5");
    exit();

}
