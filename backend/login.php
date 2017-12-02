<?php

session_start();

if(isset($_POST['submit'])){

    require_once "db.php";

    $user = mysqli_real_escape_string($conn, $_POST['username']);
    $pwd  = mysqli_real_escape_string($conn, $_POST['pwd']);

    if(empty($user) || empty($pwd)){

        header("Location: ../../admin");
        exit();

    }else{

        $sql = "SELECT * FROM users WHERE username='$user'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if($resultCheck < 1){

            header("Location: ../../admin");
            exit();

        }else{

            if($row = mysqli_fetch_assoc($result)){

                $check = password_verify($pwd, $row['user_pwd']);

                if($check == false){

                    header("Location: ../../admin");
                    exit();

                }elseif($check == true){

                    $_SESSION['u_id'] = $row['user_id'];
                    header("Location: ../../admin");
                    exit();

                }else{

                    header("Location: ../../admin");
                    exit();

                }

            }

        }

    }

}else{

    header("Location: ../../admin");
    exit();

}
