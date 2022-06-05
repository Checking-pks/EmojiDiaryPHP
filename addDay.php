<?php
    include_once("./_inc/dbconfig.php");

    $db_conn = getConnect();

    $alreadyWriteQuery = "SELECT id FROM date_memo WHERE date=DATE_FORMAT(now(), '%Y-%m-%d')";
    
    $dateMemoQuery = "";
    $dateMemoQuestionQuery = "";
    
    if (mysqli_num_rows(mysqli_query($db_conn, $alreadyWriteQuery))) {
        $dateMemoQuery = "UPDATE date_memo SET mainEmoji = '". $_GET['me'] ."' WHERE date = DATE_FORMAT(now(), '%Y-%m-%d')";
        $dateMemoQuestionQuery = "UPDATE date_memo_question SET question='". $_GET['t'] ."', answer='". $_GET['e'] ."', lore='". $_GET['l'] ."' WHERE id in (".$alreadyWriteQuery.")";
    } else {
        $dateMemoQuery = "INSERT INTO date_memo (date, mainEmoji) VALUES (DATE_FORMAT(now(), '%Y-%m-%d'), '". $_GET['me'] ."' )";
        $dateMemoQuestionQuery = "INSERT INTO date_memo_question (question, answer, lore) VALUES ('". $_GET['t'] ."', '". $_GET['e'] ."', '". $_GET['l'] ."')";
    }

    echo $dateMemoQuery;
    echo "<br>";
    echo $dateMemoQuestionQuery;
    echo "<br>";
    
    $result = mysqli_query(
        $db_conn, 
        $dateMemoQuery
    );

    $result = mysqli_query(
        $db_conn, 
        $dateMemoQuestionQuery
    );
?>