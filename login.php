<?php
    header("content-type:text/html; charset=utf-8");
    session_start();
    if(!empty($_POST)) {
    		$username = $_POST['username'];
    		$password = md5($_POST['password']);
    		$mysql = mysqli_connect("localhost","root","6688020","mpol");
    		mysqli_query($mysql,"set names utf8");
    		$sql = "SELECT * FROM user WHERE username = '$username' AND password='$password'";
    		$result = mysqli_query($mysql,$sql);
    		$r = mysqli_fetch_assoc($result);
    		if(!empty($r)){
    		    $_SESSION['username'] = $r['username'];
    		    $_SESSION['userid'] = $r['id'];
    		    echo"<script>alert('登录成功');window.location.href='index.php'</script>";
    		}else {
    		    echo"<script>alert('用户名或密码错误');window.location.href='login.php'</script>";
    		}
    	}
    include("login.html");



?>