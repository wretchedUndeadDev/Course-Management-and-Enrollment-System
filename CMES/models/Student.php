<?php
    class Student {
        //private DB attributes
        private $conn;
        private $table = 'student';

        // Atomic Properties
        public $id;
        public $enroll_date;
        public $fname;
        public $lname;
        public $primary_faculty;

        // Constructor
        public function __construct($db) {
            $this->conn = $db;
        }

        // Login
        public function login() {
            //Create Query
            $query = 'SELECT * FROM '.$this->table.' AS s
                        WHERE s.student_id = :sid AND s.lname = :ln
                        LIMIT 0, 1';
            
            // Prepare Statement
            $stmt = $this->conn->prepare($query);

            // Clean Data
            $this->id = htmlspecialchars(strip_tags($this->id));
            $this->lname = htmlspecialchars(strip_tags($this->lname));

            // Bind Data
            $stmt->bindParam('sid', $this->id);
            $stmt->bindParam('ln', $this->lname);

            //Execute
            if ($stmt->execute()) {
                //Check result
                if (($stmt->rowCount()) > 0) {
                    return true;
                }
                return false;
            }

            // Print error data if statement fails to execute
            printf("Error: %s.\n", $stmt->error);
            return false;
        }

    }