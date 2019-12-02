<?php
	class Dao
    {
        private $host = "us-cdbr-iron-east-05.cleardb.net";
        private $db = "heroku_ca7b88db37f5023";
        private $user = "b029e8db046f25";
        private $pass = "19bab7e9";

        public function get_Connection()
        {
            try {
                $connection = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->pass);
            } catch (Exception $e) {
                echo print_r($e, 1);
            }
            return $connection;
        }

        public function add_user($username, $password)
        {
            $conn = $this->get_connection();
            //write query
            $sql = "insert into users (username, password) values (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$username, $password]);
        }

        public function get_users()
        {
            $conn = $this->get_connection();
            //write query
            $sql = 'select * from users';
            //input query
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            while ($row = $stmt->fetch()) {
                echo $row['fname'] . "\n";
            }
        }

        public function check_username_exists($username)
        {
            $conn = $this->get_connection();
            //write query
            $sql = "select * from users where username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$username]);
            $result = $stmt->fetch();
            return $result;
        }

        public function check_user_credentials($username, $password)
        {
            $conn = $this->get_connection();
            //write query
            $sql = "select * from users where username = ? && password = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$username, $password]);
            $result = $stmt->fetch();
            return $result;
        }
    }
