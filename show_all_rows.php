<?php
$mysqli = new mysqli("localhost","root","password","crawler");
$mysqli -> query("set names 'UTF8'");
$sql = "select count(*) from (SELECT count(*) FROM crawler.edu GROUP BY user_url)e";
$result = $mysqli->query($sql);
$row = mysqli_fetch_array($result);
die($row['0']);
?>