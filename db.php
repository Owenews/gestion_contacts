<?php
$gcDbHost = 'localhost';
$gbDbUser = 'root';
$gcDbPpassword = '';
$gcDbName = 'contacts_db';

try {

    $gcBase = new PDO("mysql:host=$gcDbHost;dbname=$gcDbName", "$gbDbUser", "$gcDbPpassword");
    $gcBase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {

    die('Connection failed: ' . $e->getMessage());

}
?>