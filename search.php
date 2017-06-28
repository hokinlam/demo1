<?php
    header("content-type:text/html; charset=utf-8");
    session_start();
    $mysql = mysqli_connect("localhost","root","6688020","mpol");
    mysqli_query($mysql,"set names utf8");
    $pro = $_POST['pro'];
    $sql = "select * from product  where (proName like'%$pro%') or (proClass like'%$pro%')";
    $result = mysqli_query($mysql,$sql);
    $row = array();
    while($r = mysqli_fetch_assoc($result)){
        $row[] = $r;
    }

    $sql2 = "select * from news  where (newsClass like'%$pro%') ";
    $result2 = mysqli_query($mysql,$sql2);
    $row2 = array();
    while($r2 = mysqli_fetch_assoc($result2)){
        $row2[] = $r2;
    }

    include("search.html");

?>