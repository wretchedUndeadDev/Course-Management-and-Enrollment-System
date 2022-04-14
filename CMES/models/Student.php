<?php
    class Student {
        //private DB attributes
        private $conn;
        private $stdnt_table = 'student';
        private $addr_table = 'student_address';
        private $phn_table = 'student_phone';
        private $eml_table = 'student_email';

        // Basic Properties - native to 'student' relation
        public $student_id;
        public $assigned_enrollment_date;
        public $Fname;
        public $Lname;
        public $bio;
        public $primary_faculty_name;

        //Complex properties - results of joins between 'student' and related relations
        public $student_addresses = array();
        public $student_phones = array();
        public $student_emails = array();


        // Constructor
        public function __construct($db) {
            $this->conn = $db;
        }

        // Login
        //Input: student_id
        public function login() {
            //Create Query
            $query = 'SELECT s.student_id FROM '.$this->stdnt_table.' AS s
                        WHERE s.student_id = :sid AND s.lname = :ln
                        LIMIT 0, 1';
            
            // Prepare Statement
            $stmt = $this->conn->prepare($query);

            // Clean Data
            $this->student_id = htmlspecialchars(strip_tags($this->student_id));
            $this->Lname = htmlspecialchars(strip_tags($this->Lname));

            // Bind Data
            $stmt->bindParam('sid', $this->student_id);
            $stmt->bindParam('ln', $this->Lname);

            // Execute statement
            $stmt->execute();

            // Evaluate result
            $student_exists = $stmt->rowCount();
            if ($student_exists == 1) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $this->student_id = $row['student_id'];
            } else {
                $this->student_id = 0;
            }
        }



        //Get Student Information
        //Input: student_id
        public function get_gen_info() {
            //Create query
            $query = 'SELECT * FROM '.$this->stdnt_table.' AS s
                        WHERE s.student_id = :sid
                        LIMIT 0, 1';

            //Preapare Statement
            $stmt = $this->conn->prepare($query);

            //Clean Data
            $this->student_id = htmlspecialchars(strip_tags($this->student_id));

            //Bind Data 
            $stmt->bindParam(':sid', $this->student_id);

            // Execute Statement
            $stmt->execute();

            // Retrieve result
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // Set basic Student object Properties
            $this->student_id = $row['student_id'];
            $this->assigned_enrollment_date = $row['assigned_enrollment_date'];
            $this->Fname = $row['Fname'];
            $this->Lname = $row['Lname'];
            $this->bio = $row['bio'];
            $this->primary_faculty_name = $row['primary_faculty_name'];
        }



        //Get Student Addresses
        public function get_addrs() {
            //Create query
            $query = 'SELECT sa.address FROM '.$this->addr_table.' AS sa
                        WHERE sa.student_id = :sid
                        LIMIT 0, 1';

            //Preapare Statement
            $stmt = $this->conn->prepare($query);

            //Clean Data
            $this->student_id = htmlspecialchars(strip_tags($this->student_id));

            //Bind Data 
            $stmt->bindParam(':sid', $this->student_id);

            // Execute Statement
            $stmt->execute();

            // Return statement (corresponding api call will handle the result)
            return $stmt;
        }



        //Get Student Phone Numbers
        public function get_phnNums() {
            //Create query
            $query = 'SELECT sp.phone_num FROM '.$this->phn_table.' AS sp
                        WHERE sp.student_id = :sid
                        LIMIT 0, 1';

            //Preapare Statement
            $stmt = $this->conn->prepare($query);

            //Clean Data
            $this->student_id = htmlspecialchars(strip_tags($this->student_id));

            //Bind Data 
            $stmt->bindParam(':sid', $this->student_id);

            // Execute Statement
            $stmt->execute();

            // Return statement (corresponding api call will handle the result)
            return $stmt;
        }



        //Get Student emails
        public function get_emails() {
            //Create query
            $query = 'SELECT se.email FROM '.$this->eml_table.' AS se
                        WHERE se.student_id = :sid
                        LIMIT 0, 1';

            //Preapare Statement
            $stmt = $this->conn->prepare($query);

            //Clean Data
            $this->student_id = htmlspecialchars(strip_tags($this->student_id));

            //Bind Data 
            $stmt->bindParam(':sid', $this->student_id);

            // Execute Statement
            $stmt->execute();

            // Return statement (corresponding api call will handle the result)
            return $stmt;
        }


    }