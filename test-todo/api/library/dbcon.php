<?php
/*
* Created by PhpStorm.
* Author: Linga
* Date: 17/03/2022
* Time: 04:10 PM
* This class contains and controls database infomation, using msqli
* */

// echo extension_loaded('pgsql') ? 'yes':'no';

$host        = "127.0.0.1"; // host address
$port        = "5432"; // port number
$dbname      = "postgres";  //database name
$credentials = ['postgres','postgres']; //['username','password']

$conn = pg_connect("host ={$host} 
                    port ={$port} 
                    dbname ={$dbname} 
                    user={$credentials[0]} 
                    password={$credentials[1]}");
if(!$conn) {
    echo "Error : Unable to open database\n";
} else {
    //echo "Opened database successfully\n";
    $sqlList = ['DO $$
                    BEGIN
                        IF NOT EXISTS (SELECT 1 FROM pg_type WHERE typname = \'state\') THEN
                        CREATE TYPE state AS ENUM (\'NotStarted\',\'OnGoing\',\'Completed\');
                    END IF;
                END$$;',
        'CREATE TABLE IF NOT EXISTS to_do(
            line_id SERIAL Primary Key,
            name varchar(70) NOT NULL,
            description varchar(200) NOT NULL,
            user_id INT NOT NULL,
            created_timestamp TIMESTAMPTZ NOT NULL DEFAULT NOW(),
            updated_timestamp TIMESTAMPTZ NOT NULL DEFAULT NOW(),
            status state
            );',
        'CREATE TABLE IF NOT EXISTS USER_INFO(
            user_id SERIAL Primary Key,
            email varchar(40) NOT NULL,
            password varchar(100) NOT NULL,
            created_timestamp TIMESTAMPTZ NOT NULL DEFAULT NOW(),
            updated_timestamp TIMESTAMPTZ NOT NULL DEFAULT NOW(),
            reset_token varchar(60) DEFAULT \'NULL\'
        );'];

        // execute each sql statement to create new tables
        foreach ($sqlList as $sql) {
            $ret = pg_query($conn, $sql);
            if(!$ret) {
                echo pg_last_error($conn);
            } else {
                //echo $ret;
            }
        }

}
?>

