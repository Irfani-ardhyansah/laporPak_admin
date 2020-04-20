<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Mendapatkan Nilai Variable
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $tempat = $_POST['tempat'];

    require_once('api_connect.php');

    $sql = "INSERT INTO keluhans (judul, isi, tempat) VALUES ('$judul', '$isi', '$tempat')";

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