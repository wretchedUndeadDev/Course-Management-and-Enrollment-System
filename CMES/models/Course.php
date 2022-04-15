<?php
    class Course {
        //private DB attributes
        private $conn;
        private $crs_table = 'course';
        private $cls_table = 'class';

        // Basic Properties - native to 'course' relation
        public $course_id;
        public $course_name;
        public $course_level;
        public $course_description;
        public $course_credit;

        // Constructor
        public function __construct($db) {
            $this->conn = $db;
        }

        // Get course information
        //Input: course_id (as course object attribute)
        public function get_gen_info() {
            //Create query
            $query = 'SELECT * FROM '.$this->crs_table.' AS c
                        WHERE c.course_id = :cid
                        LIMIT 0, 1';
            
            //Preapare Statement
            $stmt = $this->conn->prepare($query);

            //Clean Data
            $this->course_id = htmlspecialchars(strip_tags($this->course_id));

            //Bind Data
            $stmt->bindParam(':cid', $this->course_id);

            //Execute
            $stmt->execute();

            //Retrieve result
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // Set basic Course object properties
            $this->course_id = $row['course_id'];
            $this->course_name = $row['course_name'];
            $this->course_level = $row['course_level'];
            $this->course_description = $row['course_description'];
            $this->course_credit = $row['course_credit'];
        }

        // Get course classes
        //Input: course_id (as course object attribute)
        public function get_classes() {
            //Create query
            $query = 'SELECT * FROM '.$this->cls_table.' AS c
                        WHERE c.parent_course_id = :cid'
            
            //Preapare Statement
            $stmt = $this->conn->prepare($query);

            //Clean Data
            $this->course_id = htmlspecialchars(strip_tags($this->course_id));

            //Bind Data
            $stmt->bindParam(':cid', $this->course_id);

            //Execute
            $stmt->execute();

            // Return statement (corresponding api call will handle the result)
            return $stmt;
        }

        //Get course class days?

    }