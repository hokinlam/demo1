<?php
     header("content-type:text/html; charset=utf-8");
     session_start();
     $mysql = mysqli_connect("localhost","root","6688020","mpol");
         mysqli_query($mysql,"set names utf8");

         date_default_timezone_set("Asia/Shanghai");//修正时间为中国准确时间
         $time=date("Y-m-d ");//将时间赋值给变量$time
         $sql1 = "select * from news where time like '{$time}%'  order by id desc ";
         $result1 = mysqli_query($mysql,$sql1);
         $row1 = array();
         while($r1 = mysqli_fetch_assoc($result1)){
             $row1[] = $r1;
         }
         $sql2 = "select * from news where time not like '{$time}%'  order by id desc ";
            $result2 = mysqli_query($mysql,$sql2);
            $row2 = array();
            while($r2 = mysqli_fetch_assoc($result2)){
                $row2[] = $r2;
            }

    include("allnews.html");
?>