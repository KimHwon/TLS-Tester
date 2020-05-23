<?php
    require_once(__DIR__.'/header.php');
    $is_login_success = true;

    if (isset($_POST['id']) && isset($_POST['pw'])) {

        $is_login_success = false;
        $uid = $_POST['id'];
        $upw = $_POST['pw'];

        $conn = mysqli_connect(DATABASE_URL, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME);
        if (!$conn) {
            die('Connection faild: '. mysqli_connect_error());
        }
        else if (LOCAL_CHARSET) {
            mysqli_query($conn, "set session character_set_connection=utf8;");
            mysqli_query($conn, "set session character_set_results=utf8;");
            mysqli_query($conn, "set session character_set_client=utf8;");
        }

        $rst = mysqli_query($conn, "SELECT * FROM `users`");
        while ($row = mysqli_fetch_assoc($rst)) {
            
            if (!strcmp($uid, $row['username']) && password_verify($upw, $row['password'])) {
                mysqli_close($conn);

                $_SESSION['usr'] = 'MANAGER';
                $_SESSION['uid'] = $uid;
                header('Location: index.php');
            }
        }
        mysqli_close($conn);
    }
?><!DOCTYPE HTML>
<html>
<head>
    <meta charset='utf-8' />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Administrator Page - Login</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <style>
        form { max-width: 700px; }
    </style>
</head>
<body>
    <?php
        if (!$is_login_success) {
            echo('<div class="alert alert-danger" role="alert"> 로그인 실패! </div>');
        }
    ?>
    <div class="container h-100">
        <form class="mx-auto text-center border border-light p-5" action="./login.php" method="POST">
            <p class="h4 mb-4">관리자 로그인</p>

            <input type="text"class="form-control mb-4" placeholder="Username" name="id">
            <input type="password" class="form-control mb-4" placeholder="Password" name="pw">

            <button class="btn btn-info btn-block my-4" type="submit">로그인</button>
        </form>
    </div>
</body>
</html>
