<!DOCTYPE html>
<html>
    <head>
        <title>Emoji Diary</title>

        <link rel="stylesheet" href="css/_reset.css">
        <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="css/emojiField.css">
        <link rel="stylesheet" href="css/questionField.css">
        <link rel="stylesheet" href="css/button.css">

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,0,200" />

        <script src="https://code.jquery.com/jquery-latest.js"></script>
        <script src="js/buttonEvent.js"></script>
    </head>
    <body>
        <?php 
            include_once("./_inc/dbconfig.php");

            $db_conn = getConnect();

            $logoCount = mysqli_num_rows(mysqli_query($db_conn, "SELECT * FROM emoji_list"));
            $randomLogo = mysqli_query($db_conn, "SELECT * FROM emoji_list where id=".rand(1, $logoCount));
            $randomLogoUnicode = str_replace("u", "\u", mysqli_fetch_assoc($randomLogo)["unicode"]);
            
            echo 
            "<header class='header'>
                <div class='headerItem logo'>
                    $randomLogoUnicode
                </div>
                <div class='headerItem title'>                
                    Emoji Diary
                </div>
            </header>";
            
            echo"<div class='emojiField'>"; /*open -  emojiField*/
                $dayMemoList = mysqli_query($db_conn, "SELECT * FROM date_memo");

                while ($row = mysqli_fetch_assoc($dayMemoList)) {
                    $dayMemoQuestion = mysqli_query($db_conn, "SELECT * FROM date_memo_question WHERE id=".$row["id"]);
                    $questionRow = mysqli_fetch_assoc($dayMemoQuestion);

                    $dayQuestionList = explode("\n", $questionRow["question"]);
                    $dayAnswerList = explode("\n", $questionRow["answer"]);
                    $dayLoreList = explode("\n", $questionRow["lore"]);

                    echo "<div class='emojiPad'>"; /*open - emojiPad*/
                        echo "<div class='headEmojiField'>"; /*open - headEmojiField*/
                            echo "<div class='mainEmoji'>".$row["mainEmoji"]."</div>";
                            echo "<div class='date'>".$row["date"]."</div>";
                        echo "</div>"; /*close - headEmojiField*/
                        echo "<div class='dividingLine'></div>";
                        echo "<div class='bodyEmojiField'>"; /*open - bodyEmojiField*/
                            for ($i=0; $i < count($dayAnswerList); $i++) {
                                echo "<div class='e'>".$dayAnswerList[$i]."</div>";
                            }
                        echo "</div>"; /*close - bodyEmojiField*/
                        echo "<div class='detailField'>"; /*open - detailField*/
                            for ($i=0; $i < count($dayQuestionList); $i++) {
                                /*패드 구분*/
                                echo "<div class='detailPad'>"; /*open - questionPad*/

                                /*질문 부분*/
                                echo "<div class='headDetailField'>"; /*open - headDetailField*/
                                echo "<div class='textField'>".$dayQuestionList[$i]."</div>";
                                echo "</div>"; /*close - headDetailField*/
                            
                                /*답변 부분*/
                                echo "<div class='bodyDetailField'>"; /*open - bodyDetailField*/
                                echo "<div class='detailResult'>"; /*open - detailResult*/
                                echo "<div class='emoji'>".$dayAnswerList[$i]."</div>";
                                echo "<div class='lore'>".$dayLoreList[$i]."</div>";
                                echo "</div>"; /*close - detailResult*/
                                echo "</div>"; /*close - bodyDetailField*/

                                echo "</div>"; /*close - questionPad*/
                            }
                        echo "</div>"; /*close - detailField*/
                    echo "</div>"; /*close - emojiPad*/
                }
            echo "</div>"; /*close - emojiField*/

            echo "<div class='questionField'>"; /*open - questionField*/

                /*질문 생성*/
                $questionList = mysqli_query($db_conn, "SELECT * FROM question_list");

                while($row = mysqli_fetch_assoc($questionList)) {
                    /*패드 구분*/
                    echo "<div class='questionPad'>"; /*open - questionPad*/

                    /*질문 부분*/
                    echo "<div class='headQuestionField'>"; /*open - headQuestionField*/
                    echo "<div class='textField'>".$row["question"]."</div>";
                    if ($row["id"] != 1) {
                        echo "<form class='zero' id='deleteQuestion' method='post' action='deleteQuestion.php' target='iframe'>";
                        echo "<input type='hidden' name='id' value=".$row["id"]."></input>";
                        echo "</form>";
                        echo "<button class='deleteQuestionButton' form='deleteQuestion'></button>";
                    }
                    echo "</div>"; /*close - headQuestionField*/
                
                    /*답변 부분*/
                    echo "<div class='bodyQuestionField'>"; /*open - bodyQuestionField*/
                    $answerArray = explode("\n", $row["answer"]);
                    $loreArray = explode("\n", $row["lore"]);

                    for ($i=0; $i<count($answerArray); $i++) {
                        echo "<button class='options nonSelectedEmoji'>"; /*open - button.options*/
                        echo "<div class='emoji'>".$answerArray[$i]."</div>";
                        echo "<div class='lore'>".$loreArray[$i]."</div>";
                        echo "</button>"; /*close - button.options*/
                    }
                    
                    echo "</div>"; /*close - bodyQuestionField*/
                    echo "</div>"; /*close - questionPad*/
                }

                /*질문 추가*/
                echo "
                <form class='questionPad' id='addQuestion' method='post' action='addQuestion.php' target='iframe'>
                    <div class='headQuestionField'>
                        <input class='addQuestionField' name='Q' maxlength='10' placeholder='기록 추가'></input>
                        <button class='addQuestionButton' form='addQuestion'></button>
                    </div>
                    <div class='bodyQuestionField'>
                        <div>
                            <input class='addEmoji' name='E1' maxlength='2' placeholder='😶'></input>
                            <input class='addLore' name='L1' maxlength='4' placeholder='설명'></input>
                        </div>
                        <div>
                            <input class='addEmoji' name='E2' maxlength='2' placeholder='😶'></input>
                            <input class='addLore' name='L2' maxlength='4' placeholder='설명'></input>
                        </div>
                        <div>
                            <input class='addEmoji' name='E3' maxlength='2' placeholder='😶'></input>
                            <input class='addLore' name='L3' maxlength='4' placeholder='설명'></input>
                        </div>
                        <div>
                            <input class='addEmoji' name='E4' maxlength='2' placeholder='😶'></input>
                            <input class='addLore' name='L4' maxlength='4' placeholder='설명'></input>
                        </div>
                        <div>
                            <input class='addEmoji' name='E5' maxlength='2' placeholder='😶'></input>
                            <input class='addLore' name='L5' maxlength='4' placeholder='설명'></input>
                        </div>
                    </div>
                </form>";
            
            echo "</div>"; /*close - questionField*/

            echo "
            <div class='buttonField'>
                <button class='plusButton'>
                </button>
            </div>
            <div class='buttonField'>
                <button class='closeButton'>
                </button>
            </div>
            <div class='buttonField'>
                <button class='doneButton'>
                </button>
            </div>";

            echo "<iframe class='zero' name='iframe'></iframe>";
        ?> 
    </body>
</html>