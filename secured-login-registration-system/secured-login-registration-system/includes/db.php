<?php
/**
 * File Name : db.php
 * Database connection related operation
 *
 * @author : Sani Kamal
 * @version : 1.0
 * @since : 18 May 2019
 */

    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASS", "");
    define("DB_NAME", "secured_login_registration");

    //Database connection
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if(!$connection) {
        die("Database connection failed" . mysqli_error());
    }