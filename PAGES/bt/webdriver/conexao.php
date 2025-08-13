<?php
error_reporting(0);
session_start();


$ConnectDB = mysqli_connect(
    $host = 'localhost',
    $usuario = 'root',
    $senha = '',
    $database_ConnectDB = 'bb'
);


mysqli_select_db($ConnectDB, $database_ConnectDB);

if (!$ConnectDB) {
    print 'Falha ao conectar-se com o banco de dados MySQL.';
    exit;
}

if (!function_exists("getIp")) {
    function getIp()
    {
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
            if (array_key_exists($key, $_SERVER) === true) {
                foreach (explode(',', $_SERVER[$key]) as $IPaddress) {
                    $IPaddress = trim($IPaddress);
                    if (filter_var($IPaddress, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {
                        return $IPaddress;
                    }
                }
            }
        }
    }
}

$ip = getIp();
//$ip = '168.138.0.0';
$_SESSION['ip'] = $ip;
