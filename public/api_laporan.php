<?php


$conn = mysqli_connect("localhost", "root", "", "db_lapor_mobile");

if (!$conn) {
    die ("Error dalam koneksi: " . $mysqli_connect_error());
}

if($_SERVER['REQUEST_METHOD'] == 'GET') {

    $sql_query = "SELECT * FROM lapras";
    $result = mysqli_query($conn, $sql_query);

    if(mysqli_num_rows($result) > 0) {
        $lapor = array();
        while($row = mysqli_fetch_assoc($result)) {
            array_push($lapor, $row);
        }
        $response['lapor'] = $lapor;
    }
    else {
        $response['success'] = 0;
        $response['message'] = 'No data';
    }
    echo json_encode($response);
    mysqli_close($conn);
}


?>