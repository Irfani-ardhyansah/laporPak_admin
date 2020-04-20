<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        //Mendapatkan Nilai Variable
        $judul = $_POST['judul'];
        $isi = $_POST['isi'];
        $tempat = $_POST['tempat'];
        $harga = $_POST['harga'];
        $foto = $_POST['foto'];

        require_once('api_connect.php');

        $sql = "INSERT INTO lapras (judul, isi, tempat, harga, foto) VALUES ('$judul', '$isi', '$tempat', '$harga', '$foto')";
        $upload_path = "uploads/$judul.jpg";

        if( mysqli_query($conn, $sql) ){
            $result["success"] = "1";
            $result["message"] = "success";
    
            file_put_contents($upload_path, base64_decode($foto));
            echo json_encode($result);
            mysqli_close($conn);
        } else {
            $result["success"] = "0";
            $result["message"] = "error";
    
            echo json_encode($result);
            mysqli_close($conn);
        }

        mysqli_close($con);
    }

?>