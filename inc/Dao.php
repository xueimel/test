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
        }

        public function class_exists($class_name){
            $conn = $this->get_connection();
            $sql = "select id from classes where class_name = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$class_name]);
            return $stmt->fetch();
        }

        public function insert_class($class_name){
            $conn = $this->get_connection();
            //write query
            $sql = "insert into classes (class_name, user_id) values (?, ?)";
            //input query
            $stmt = $conn->prepare($sql);
            $stmt->execute([$class_name, 1]);
        }

        public function insert_new_student($class_name, $student_name, $image){
            $conn = $this->get_connection();
            //write query
            $sql = "select id from classes where class_name = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$class_name]);
            $class_id = $stmt->fetch()[0];

            $sql = "insert into student (class_id, student_name, img) values (?, ?, ?)";
            //input query
            $stmt = $conn->prepare($sql);
            $stmt->execute([$class_id, $student_name, base64_encode($image)]);
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

        public function fetch_students($classid){
            $conn = $this->get_connection();
            $sql = "SELECT img FROM student WHERE class_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$classid]);
            $result = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
            return $result;
        }
    }
