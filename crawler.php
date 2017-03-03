<?php
date_default_timezone_set('Asia/Shanghai');
require_once 'simple_html_dom.php';
$mysqli = new mysqli("localhost","root","Luchen23","crawler");
$mysqli -> query("set names 'UTF8'");
$url ="http://cnodejs.org";
$pageUrl ="/?tab=all&page=";
for($pageCount =1;$pageCount<=500;$pageCount++)
{
    $html =file_get_html($url.$pageUrl.$pageCount);
    $listData =$html->find("#topic_list .cell");
    $sql =  "INSERT INTO crawler.edu (user_url,topic_title,topic_url,img_url) VALUES ";
    foreach($listData as $key=>$eachRowData){
        $user_url=$eachRowData->find(".user_avatar",0)->href; //信息
        $topic_title=$eachRowData->find(".topic_title",0)->plaintext; //内容
        $topic_url=$eachRowData->find(".topic_title",0)->href; //链接
        $img_url=$eachRowData->find(".user_avatar img",0)->src;//图片链接
        $sql .= "('$user_url','$topic_title','$topic_url','$img_url'),";
    }
    $sql = substr($sql,0,strlen($sql)-1);
    $sql .= ";";
    if(!($mysqli->query($sql)))
    {
        for($i=0;$i<10;$i++)
        {
            if($mysqli->query($sql))
            {
                $i=10;
            }
            else
            {
                $i++;
                if($i=10)
                {
                    $local_time = date('Y-m-d H:i:s',time());
                    $failure_sql = "INSERT INTO crawler.log (page_num,time) VALUES ('$pageCount','$local_time');";
                    $mysqli->query($failure_sql);
                }
            }
        }
    }
}
die('crawler finished');
?>