<?php
	require_once(__DIR__.'/header.php');

        $conn = mysqli_connect(DATABASE_URL, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME);
        if (!$conn) {
            die('Connection faild: '. mysqli_connect_error());
        }
        else if (LOCAL_CHARSET) {
            mysqli_query($conn, "set session character_set_connection=utf8;");
            mysqli_query($conn, "set session character_set_results=utf8;");
            mysqli_query($conn, "set session character_set_client=utf8;");
        }
		

        $rst = mysqli_query($conn, "CREATE TABLE IF NOT EXISTS `users` ('id' NOT NULL AUTO_INCREMENT PRIMARY KEY, 'username' VARCHAR(32) NOT NULL, 'password' VARCHAR(128) NOT NULL)");
	
	
		$upw = password_hash("1234", PASSWORD_DEFAULT );
        $rst = mysqli_query($conn, "INSERT INTO `users` (username, password) VALUES ('admin', '".$upw."')");
		
        mysqli_close($conn);
    }
	
    header('Location: index.php');
?>