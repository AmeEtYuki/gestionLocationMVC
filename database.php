<?php
    $dbuser = "gestionLocation";
    $dbpassword = 'Zhvh56774TiB';
    $dbdatabase = 'ImmoMVC';
    $dbhost = '127.0.0.1';
    $dbport = 3306;
    $dsn = "mysql:host=".$dbhost.";dbname=".$dbdatabase;

    function getPDO() {
        global $dsn;
        global $dbuser;
        global $dbpassword;
        return new PDO($dsn, $dbuser, $dbpassword);
    }
?>