<?php
    include_once("./_inc/dbconfig.php");

    $db_conn = getConnect();

    $idString = $_POST['id'];

    $query = "DELETE FROM question_list WHERE id=".$idString;

    $result = mysqli_query(
        $db_conn, 
        $query
    );

    if (!$result)
    {
        die('Error: ' . mysqli_error($db_conn));
    }
    echo "1 record added";
?>