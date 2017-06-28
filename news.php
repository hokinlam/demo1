<?php

    header("content-type:text/html; charset=utf-8");
    session_start();
    $actid = $_GET['act'];
    $mysql = mysqli_connect("localhost","root","6688020","mpol");
    mysqli_query($mysql,"set names utf8");
    $sql = "select * from news where `id`=$actid";
    $result = mysqli_query($mysql,$sql);
    $r = mysqli_fetch_assoc($result);
    include('news.html');


?>
