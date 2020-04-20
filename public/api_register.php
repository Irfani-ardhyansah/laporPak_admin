<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $nama = $_POST['nama'];
    $gender = $_POST['gender'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $password = $_POST['password'];

    $password = password_hash($password, PASSWORD_DEFAULT);

    require_once'api_connect.php';

    $sql = "INSERT INTO akuns(nama, gender, alamat, no_hp,  password) VAlUES ('$nama', '$gender', '$alamat', '$no_hp', '$password')";

    if( mysqli_query($conn, $sql) ){
        $result["success"] = "1";
        $result["message"] = "success";

        echo json_encode($result);
        mysqli_close($conn);
    } else {
        $result["success"] = "0";
        $result["message"] = "error";

        echo json_encode($result);
        mysqli_close($conn);
    }
}

?>