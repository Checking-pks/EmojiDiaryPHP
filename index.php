<html>
    <head>
        <title>Emoji Diary</title>
        
        <link rel="stylesheet" href="css/_reset.css">
        <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="css/emojiField.css">
        <link rel="stylesheet" href="css/button.css">

        <script src="javascript/scrollEvent.js"> </script>
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
                    Everyone's Emoji Pad
                </div>
            </header>";

            echo
            "
            <div class='emojiField'>    
                <div class='emojiPad'>
                    <div class='headEmojiField'>
                    
                    </div>
                    <div class='dividingLine'></div>
                    <div class='bodyEmojiField'>
                    
                    </div>
                </div>
                <div class='emojiPad'>
                    <div class='headEmojiField'>
                    
                    </div>
                    <div class='dividingLine'></div>
                    <div class='bodyEmojiField'>
                    
                    </div>
                </div>
                <div class='emojiPad'>
                    <div class='headEmojiField'>
                    
                    </div>
                    <div class='dividingLine'></div>
                    <div class='bodyEmojiField'>
                    
                    </div>
                </div>
                <div class='emojiPad'>
                    <div class='headEmojiField'>
                    
                    </div>
                    <div class='dividingLine'></div>
                    <div class='bodyEmojiField'>
                    
                    </div>
                </div>
                <div class='emojiPad'>
                    <div class='headEmojiField'>
                    
                    </div>
                    <div class='dividingLine'></div>
                    <div class='bodyEmojiField'>
                    
                    </div>
                </div>
                <div class='emojiPad'>
                    <div class='headEmojiField'>
                    
                    </div>
                    <div class='dividingLine'></div>
                    <div class='bodyEmojiField'>
                    
                    </div>
                </div>
                <div class='emojiPad'>
                    <div class='headEmojiField'>
                    
                    </div>
                    <div class='dividingLine'></div>
                    <div class='bodyEmojiField'>
                    
                    </div>
                </div>
                <div class='emojiPad'>
                    <div class='headEmojiField'>
                    
                    </div>
                    <div class='dividingLine'></div>
                    <div class='bodyEmojiField'>
                    
                    </div>
                </div>
                <div class='emojiPad'>
                    <div class='headEmojiField'>
                    
                    </div>
                    <div class='dividingLine'></div>
                    <div class='bodyEmojiField'>
                    
                    </div>
                </div>
            </div>";

            echo "
            <div class='plusButton'>
                <button>➕</button>
            </div>";
        ?> 
    </body>
</html>