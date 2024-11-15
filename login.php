<?php
include "./config.php";
$username = $_POST['username'];
$password = md5($_POST['password']);

if (!empty($username)&& !empty($password)){
    $query = mysqli_query($sambung,"select * from mydata where username = '$username' and password = '$password'");

    $result = mysqli_num_rows($query);

        if($result>0){
            // header("location:.//index.php");
            // 
            // // echo 'berhasil';
            session_start();

            $_SESSION["akses"] = true;
            header("location:./dosen.php");
            echo 'berhasil';

        }else{
            header("location:./index.php?app=gagal");
            // echo "raiso cok";
        }
}else {
    header(header: "location:./index.php?app=error");
}
?>