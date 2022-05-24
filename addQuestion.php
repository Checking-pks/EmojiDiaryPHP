<?php
    include_once("./_inc/dbconfig.php");

    $db_conn = getConnect();

    $questionString = $_POST['Q'];
    $emojiString = "";
    $loreString = "";

    for ($i=1; $i<=5; $i++) {
        if ($_POST['E'.$i]) {
            if ($emojiString != "")
                $emojiString .= "\n";

            $emojiString .= $_POST['E'.$i];
        }
            
        if ($_POST['L'.$i]) {
            if ($loreString != "")
                $loreString .= "\n";

            $loreString .= $_POST['L'.$i];
        }
    }

    $query = "INSERT INTO question_list (question, answer, lore) VALUES (\"".$questionString."\",\"".$emojiString."\",\"".$loreString."\")";

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