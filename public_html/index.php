<?php
    require_once(__DIR__.'/header.php');

    if (!(isset($_SESSION['usr']) && $_SESSION['usr'] == 'MANAGER')) {
	    header('Location: login.php');
    }
?><!DOCTYPE HTML>
<html>
<head>
    <meta charset='utf-8' />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Administrator Page</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	
	<style>
        form { max-width: 700px; }
    </style>
</head>
<body>
    <div class="container h-100">
        <form class="mx-auto text-center border border-light p-5" action="./update.php" method="POST">
            <p class="h4 mb-4"><?php echo $_SESSION['uid']; ?>님 환영합니다!</p>

            <input type="text" class="form-control mb-4" placeholder="Username" name="id">
            <input type="password" class="form-control mb-4" placeholder="Password" name="pw">

            <button class="btn btn-info my-4" type="submit">계정 재설정</button>
            <a class="btn btn-danger my-4" role="button" href="/logout.php">로그아웃</a>
        </form>
    </div>
</body>
</html>
