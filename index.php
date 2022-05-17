<html>
    <head>
        <title>Everyone's Emoji Pad</title>
        <link rel="stylesheet" href="css/_reset.css">
        <link rel="stylesheet" href="css/header.css">
    </head>
    <body>
        <?php 
            $db_conn = $db_conn = mysqli_connect(
                'localhost', 
                'emoji', 
                '1234', 
                'emoji'
            );

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
        ?> 
    </body>
</html>