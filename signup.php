<?php
    session_start();
    header("content-type:text/html; charset=utf-8");
	if(!empty($_POST)) {
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$mysql = mysqli_connect("localhost","root","6688020","mpol");
		mysqli_query($mysql,"set names utf8");
		$sql = "SELECT * FROM user WHERE username = '$username'";
		$result = mysqli_query($mysql,$sql);
		$r = mysqli_fetch_assoc($result);
		if(!empty($r)){
                    echo "<script>alert('该用户名已被注册')</script>";
                    echo "<script>window.location.href='signup.php'</script>;";
                    exit;
        }
		$sql2 = "INSERT INTO user(username,password) VALUES ('$username','$password' )";
        mysqli_query($mysql,$sql2);

        if(mysqli_affected_rows($mysql)){
                $_SESSION['username'] = $username;
                $_SESSION['userid'] = mysqli_insert_id($mysql);
                echo "<script>alert('注册成功，主界面');window.location.href='index.php'</script>;";
        }

	}

    include("signup.html");
?>
