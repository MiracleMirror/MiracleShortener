<?php
//DEFINE

$mysqlserver = "127.0.0.1";
$mysqluser = "root";
$mysqlpass= "mysql";
$mysqldb = "short";

/*
$mysqlserver = "127.0.0.1";
$mysqluser = "shortshort";
$mysqlpass= "shortshort!";
$mysqldb = "short";

*/

$db = mysqli_connect($mysqlserver, $mysqluser, $mysqlpass, $mysqldb);

$site="http://l.n0m.ru";


//FUNCTIONS
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function addhttp($url) {
    if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
        $url = "http://" . $url;
    }
    return $url;
}

?>