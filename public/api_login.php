<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $nama = $_POST['nama'];
        $password = $_POST['password'];
        $pass = password_hash($password, PASSWORD_DEFAULT);
        require_once 'api_connect.php';
        if (password_verify($password, $pass)){
            $sql = "SELECT * FROM akuns WHERE nama='$nama'";
        } else {
            $result['success'] = "0";
        }
        $response = mysqli_query($conn, $sql);

        $result = array();
        $result['login'] = array();

        if (mysqli_num_rows($response) === 1 ) {

            $row = mysqli_fetch_assoc($response);

            if( password_verify($password, $row['password']) ){

                $index['nama'] = $row['nama'];
                $index['no_hp'] = $row['no_hp'];

                array_push($result['login'], $index);

                $result['success'] = "1";
                $result['message'] = "success";
                echo json_encode($result);

                mysqli_close($conn);

            } else {

                $result['success'] = "0";
                $result['message'] = "error";
                echo json_encode($result);

            }

        }

    }

?>