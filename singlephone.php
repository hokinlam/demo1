<?php
    header("content-type:text/html; charset=utf-8");
    session_start();

    		$actid = $_GET['act'];
            $mysql = mysqli_connect("localhost","root","6688020","mpol");
            mysqli_query($mysql,"set names utf8");
            $sql = "select * from product where `id`=$actid";
            $result = mysqli_query($mysql,$sql);
            $r = mysqli_fetch_assoc($result);

    //      message
    //      send
             if(!empty($_POST['content'])) {
                 if($_SESSION['userid']){
                     $userid = $_SESSION['userid'];
                     $content = $_POST['content'];

                     date_default_timezone_set("Asia/Shanghai");//修正时间为中国准确时间
                     $time=date("Y-m-d H:i:s");//将时间赋值给变量$time
                     $sql4 = "INSERT INTO message (userid,content,systime,class) VALUES ('$userid','$content','$time','$actid')";
                     mysqli_query($mysql,$sql4);
                 }else{
                     echo "<script>alert('请登录');window.location.href='login.php'</script>";

                 }
             }
     //      show
             $sql5 = "SELECT `user`.`username`,`message`.* FROM `message` INNER JOIN `user` ON `message`.`userid` = `user`.`id` AND `class` =$actid  ORDER BY `message`.`id` DESC";
             $result5 = mysqli_query($mysql,$sql5);
             $row5 = array();
             while($r5 = mysqli_fetch_assoc($result5)){
                    $row5[] = $r5;
             }


                 include("singlephone.html");




?>