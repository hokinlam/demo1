<?php

    header("content-type:text/html; charset=utf-8");
    session_start();
//  今日资讯
    $mysql = mysqli_connect("localhost","root","6688020","mpol");
    mysqli_query($mysql,"set names utf8");
    $sql1 = "select * from news order by id desc limit 0,7";
    $result1 = mysqli_query($mysql,$sql1);
    $row1 = array();
    while($r1 = mysqli_fetch_assoc($result1)){
        $row1[] = $r1;
    }

//  品牌
        $sql2_apple = "select * from product where proClass = 'apple' ";
        $result2_apple = mysqli_query($mysql,$sql2_apple);
        $row2_apple = array();
        while($r2_apple = mysqli_fetch_assoc($result2_apple)){
            $row2_apple[] = $r2_apple;
        }

        $sql2_samsung = "select * from product where proClass = 'samsung' ";
                $result2_samsung = mysqli_query($mysql,$sql2_samsung);
                $row2_samsung = array();
                while($r2_samsung = mysqli_fetch_assoc($result2_samsung)){
                    $row2_samsung[] = $r2_samsung;
                }

        $sql2_xiaomi = "select * from product where proClass = 'xiaomi' ";
                $result2_xiaomi = mysqli_query($mysql,$sql2_xiaomi);
                $row2_xiaomi = array();
                while($r2_xiaomi = mysqli_fetch_assoc($result2_xiaomi)){
                    $row2_xiaomi[] = $r2_xiaomi;
                }

        $sql2_huawei = "select * from product where proClass = 'huawei' ";
                $result2_huawei = mysqli_query($mysql,$sql2_huawei);
                $row2_huawei = array();
                while($r2_huawei = mysqli_fetch_assoc($result2_huawei)){
                    $row2_huawei[] = $r2_huawei;
                }

//      slide
            $sql3 = "select * from news order by id desc limit 0,5";
            $result3 = mysqli_query($mysql,$sql3);
            $row3 = array();
            while($r3 = mysqli_fetch_assoc($result3)){
                $row3[] = $r3;
            }

//      message
//      send
        if(!empty($_POST['content'])) {
            if($_SESSION['userid']){
                $userid = $_SESSION['userid'];
                $content = $_POST['content'];
                date_default_timezone_set("Asia/Shanghai");//修正时间为中国准确时间
                $time=date("Y-m-d H:i:s");//将时间赋值给变量$time
                $sql4 = "INSERT INTO message (userid,content,systime,class) VALUES ('$userid','$content','$time',0)";
                mysqli_query($mysql,$sql4);
            }
            
        }
//      show
        $sql5 = "SELECT `user`.`username`,`message`.* FROM `message` INNER JOIN `user` ON `message`.`userid` = `user`.`id` AND `class` = 0 ORDER BY `message`.`id` DESC";
        $result5 = mysqli_query($mysql,$sql5);
        $row5 = array();
        while($r5 = mysqli_fetch_assoc($result5)){
               $row5[] = $r5;
        }

//      ajax
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])){
            echo json_encode($row5);
        }else {
            include("index.html");
        }




?>