<?php 
	$ip= $_POST['ip'];


$output = shell_exec("ping -c3 $ip");
			echo "<pre>$output</pre>";

$serverIP = $_SERVER["SERVER_ADDR"];
$hostname = exec('hostname');
echo "Server IP is: <b>{$serverIP}</b> <br>";
echo "hostname: $hostname";




 ?>