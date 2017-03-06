<?php
set_time_limit(0); //保证php程序运行不超时退出
$start = $_GET['start'];
$end = $_GET['end'];
$mysqli = new mysqli("localhost","root","password","crawler");
if(!$mysqli)
{
    die('Could not connect: ' . mysql_error());
}
$url_array = "SELECT user_url,img_url FROM crawler.edu group by user_url limit $start,$end";
$result = $mysqli->query($url_array);
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
{
    $file_name = explode("/",$row['user_url']);
    $file_url = $row['img_url'];
    if(!strstr($file_url,'https://'))
    {
        $file_url = 'https:'.$file_url;
    }
    $file_path = "/Users/username/Sites/crawlerEdu/crawler-img/".$file_name[2].".jpg";
    $content = file_get_contents($file_url);
    if(file_put_contents($file_path,$content))
    {
        echo("save picture $file_path successfully");
    }
    else
    {
        echo("save picture $file_path failed");
    }
}
die('download_picture finished');
?>