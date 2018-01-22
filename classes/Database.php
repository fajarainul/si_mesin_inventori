<?php

    class Database{

        var $host = "localhost";
        var $uname = "root";
        var $pass = "";
        var $db = "si_mesin_inventori";
        var $connection;

        function __construct(){
            $mysqli = new mysqli($this->host, $this->uname, $this->pass, $this->db);

            if ($mysqli->connect_errno) {
                printf("Connect failed: %s\n", $mysqli->connect_error);
                exit();
            }

            $mysqli->connect($this->host, $this->uname, $this->pass, $this->db);

            $this->connection = $mysqli;

        }

    }
