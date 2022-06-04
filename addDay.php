<?php
    include_once("./_inc/dbconfig.php");

    $db_conn = getConnect();

    $dateMemoQuery = "INSERT INTO date_memo (date, mainEmoji) VALUES (DATE_FORMAT(now(), '%Y-%m-%d'), '". $_GET['me'] ."' )";
    $dateMemoQuestionQuery = "INSERT INTO date_memo_question (question, answer, lore) VALUES ('". $_GET['t'] ."', '". $_GET['e'] ."', '". $_GET['l'] ."')";

    echo $dateMemoQuery;
    echo "<br>";
    echo $dateMemoQuestionQuery;
    echo "<br>";
    
    $result = mysqli_query(
        $db_conn, 
        $dateMemoQuery
    );

    if (!$result)
    {
        die('Error 01: ' . mysqli_error($db_conn));
    }
    echo "1 record added";

    $result = mysqli_query(
        $db_conn, 
        $dateMemoQuestionQuery
    );

    if (!$result)
    {
        die('Error 02: ' . mysqli_error($db_conn));
    }
    echo "1 record added";
?>