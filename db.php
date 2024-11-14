<?php
// db.php

function connectDB() {

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $name = 'contacts_db';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$name", "$user", "$password");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $pdo;

    } catch (PDOException $e) {

    die('Connection failed: ' . $e->getMessage());

    }
}
?>