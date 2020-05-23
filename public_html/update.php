<?php
	require_once(__DIR__.'/header.php');
	
    if (isset($_POST['id']) && isset($_POST['pw'])) {

		$old_uid = $_SESSION['uid'];
        $uid = $_POST['id'];
        $upw = password_hash($_POST['pw'], PASSWORD_DEFAULT );

        $conn = mysqli_connect(DATABASE_URL, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME);
        if (!$conn) {
            die('Connection faild: '. mysqli_connect_error());
        }
        else if (LOCAL_CHARSET) {
            mysqli_query($conn, "set session character_set_connection=utf8;");
            mysqli_query($conn, "set session character_set_results=utf8;");
            mysqli_query($conn, "set session character_set_client=utf8;");
        }

        $rst = mysqli_query($conn, "UPDATE `users` SET username='".$uid."', password='".$upw."' WHERE username='".$old_uid."'");
		
        mysqli_close($conn);
    }
	
    header('Location: logout.php');
?>