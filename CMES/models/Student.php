<?php
    class Student {
        //private DB attributes
        private $conn;
        private $stdnt_table = 'student';
        private $addr_table = 'student_address';
        private $phn_table = 'student_phone';
        private $eml_table = 'student_email';
        private $sccr_table = 'student_course_class_request';
        private $scce_table = 'student_course_class_enroll';
        private $sccw_table = 'student_course_class_wailist';
        private $sct_table = 'student_course_taken';


        // Basic Properties - native to 'student' relation
        public $student_id;
        public $assigned_enrollment_date;
        public $Fname;
        public $Lname;
        public $bio;
        public $primary_faculty_name;

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
        //Input: student_id (as student object attribute)
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
        //Input: student_id (as student object attribute)
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
        //Input: student_id (as student object attribute)
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
        //Input: student_id (as student object attribute)
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

        //Get Terms a student has enrolled courses in
        //Input: student_id (as student object attribute)
        public function get_enrld_term() {
            //Create query
            $query = 'SELECT DISTINCT t.year, t.season 
                        FROM term AS t, '.$this->scce_table.' AS scce
                        WHERE t.course_id = scce.enrolled_course_id AND scce.enrolling_student_id = :sid';

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



        //Get Student Enrolled Courses for a term
        //Input: student_id (as student object attribute), term_year, term_season
        public function get_enrld_term_crs($term_year, $term_season) {
            //Create query
            $query = 'SELECT DISTINCT t.course_id 
                        FROM term AS t, '.$this->scce_table.' AS scce
                        WHERE t.course_id = scce.enrolled_course_id AND scce.enrolling_student_id = :sid AND t.year = :y AND t.season = :s';

            //Preapare Statement
            $stmt = $this->conn->prepare($query);

            //Clean Data
            $this->student_id = htmlspecialchars(strip_tags($this->student_id));
            $term_year = htmlspecialchars(strip_tags($term_year));
            $term_season = htmlspecialchars(strip_tags($term_season));

            //Bind Data 
            $stmt->bindParam(':sid', $this->student_id);
            $stmt->bindParam(':y', $term_year);
            $stmt->bindParam(':s', $term_season);

            // Execute Statement
            $stmt->execute();

            // Return statement (corresponding api call will handle the result)
            return $stmt;
        }



        //Get enrolled classes for a course
        //Input: student_id (as student object attribute), course_id
        public function get_enrld_crs_cls($course_id) {
            //Create query
            $query = 'SELECT cls.parent_course_id, cls.class_num, 
                        cls.room_num, cls.seat_num, cls.waitlist_num, 
                        cls.start_time, cls.end_time, 
                        cls.class_type, cls.instructor, cls.ta, cls.supervisor
                        FROM class AS cls, '.$this->scce_table.' AS scce 
                        WHERE scce.enrolling_student_id = :sid AND scce.enrolled_course_id = :cid
                            AND scce.enrolled_course_id = cls.parent_course_id AND scce.enrolled_class_num = cls.class_num';
            
            //Preapare Statement
            $stmt = $this->conn->prepare($query);

            //Clean Data
            $this->student_id = htmlspecialchars(strip_tags($this->student_id));
            $course_id = htmlspecialchars(strip_tags($course_id));

            //Bind Data 
            $stmt->bindParam(':sid', $this->student_id);
            $stmt->bindParam(':cid', $course_id);

            // Execute Statement
            $stmt->execute();

            // Return statement (corresponding api call will handle the result)
            return $stmt;
        }



        //Get enrolled course class days
        //Input: student_id (as student object attribute), class_course_id, class_num
        public function get_enrld_crs_cls_days($class_course_id, $class_num) {
            //Create query
            $query = 'SELECT cd.day 
                        FROM class_days AS cd, '.$this->scce_table.' AS scce 
                        WHERE scce.enrolling_student_id = :sid AND scce.enrolled_course_id = :cid AND scce.enrolled_class_num = :cn
                            AND scce.enrolled_course_id = cd.parent_course_id AND scce.enrolled_class_num = cd.class_num';
            
            //Preapare Statement
            $stmt = $this->conn->prepare($query);

            //Clean Data
            $this->student_id = htmlspecialchars(strip_tags($this->student_id));
            $class_course_id = htmlspecialchars(strip_tags($class_course_id));
            $class_num = htmlspecialchars(strip_tags($class_num));

            //Bind Data 
            $stmt->bindParam(':sid', $this->student_id);
            $stmt->bindParam(':cid', $class_course_id);
            $stmt->bindParam(':cn', $class_num);

            // Execute Statement
            $stmt->execute();

            // Return statement (corresponding api call will handle the result)
            return $stmt;
        }



        //Get taken courses
        //Input student_id (as student object attribute)
        public function get_tkn_crs() {
            $query = 'SELECT sct.course_id
                        FROM '.$this->sct_table.' AS sct
                        WHERE sct.student_id = :sid';
            
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



        //Drop Enrolled class
        //Input: student_id (as student object attribute), class_course_id, class_num 
        public function drop_enrld_cls($class_course_id, $class_num) {
            //Create query
            $query = 'DELETE FROM '.$this->scce_table.' AS scce
                        WHERE scce.enrolling_student_id = :sid
                        AND scce.enrolled_course_id = :cid
                        AND scce.enrolled_class_num = :cn';

            // Prepare Statement
            $stmt = $this->conn->prepare($query);

            // Clean data 
            $this->student_id = htmlspecialchars(strip_tags($this->student_id));
            $class_course_id = htmlspecialchars(strip_tags($class_course_id));
            $class_num = htmlspecialchars(strip_tags($class_num));

            //Bind data
            $stmt->bindParam(':sid', $this->student_id);
            $stmt->bindParam(':cid', $class_course_id);
            $stmt->bindParam(':cn', $class_num);

            //Execute
            if($stmt->execute()) {
                return true;
            }

            // Print error data if statement fails to execute
            printf("Error: %s.\n", $stmt->error);
            return false;
        }



        //Drop Requested class
        //Input: student_id (as student object attribute), class_course_id, class_num 
        public function drop_rqstd_cls($class_course_id, $class_num) {
            //Create query
            $query = 'DELETE FROM '.$this->sccr_table.' AS sccr
                        WHERE sccr.enrolling_student_id = :sid
                        AND sccr.enrolled_course_id = :cid
                        AND sccr.enrolled_class_num = :cn';

            // Prepare Statement
            $stmt = $this->conn->prepare($query);

            // Clean data 
            $this->student_id = htmlspecialchars(strip_tags($this->student_id));
            $class_course_id = htmlspecialchars(strip_tags($class_course_id));
            $class_num = htmlspecialchars(strip_tags($class_num));

            //Bind data
            $stmt->bindParam(':sid', $this->student_id);
            $stmt->bindParam(':cid', $class_course_id);
            $stmt->bindParam(':cn', $class_num);

            //Execute
            if($stmt->execute()) {
                return true;
            }

            // Print error data if statement fails to execute
            printf("Error: %s.\n", $stmt->error);
            return false;
        }



        //Drop waitlisted class
        //Input: student_id (as student object attribute), class_course_id, class_num 
        public function drop_wtlstd_cls($class_course_id, $class_num) {
            //Create query
            $query = 'DELETE FROM '.$this->sccw_table.' AS sccw
                        WHERE sccw.enrolling_student_id = :sid
                        AND sccw.enrolled_course_id = :cid
                        AND sccw.enrolled_class_num = :cn';

            // Prepare Statement
            $stmt = $this->conn->prepare($query);

            // Clean data 
            $this->student_id = htmlspecialchars(strip_tags($this->student_id));
            $class_course_id = htmlspecialchars(strip_tags($class_course_id));
            $class_num = htmlspecialchars(strip_tags($class_num));

            //Bind data
            $stmt->bindParam(':sid', $this->student_id);
            $stmt->bindParam(':cid', $class_course_id);
            $stmt->bindParam(':cn', $class_num);

            //Execute
            if($stmt->execute()) {
                return true;
            }

            // Print error data if statement fails to execute
            printf("Error: %s.\n", $stmt->error);
            return false;
        }

        //Enroll student in class
        //Input: student_id (as student object attribute), class_course_id, class_num 
        public function enrl_cls($class_course_id, $class_num) {
            //Create Query
            $query = 'INSERT INTO '.$this->scce_table.'
                        SET
                            enrolling_student_id = :sid,
                            enrolled_course_id = :cid,
                            enrolled_class_num = :cn';
            
            // Prepare Statement
            $stmt = $this->conn->prepare($query);

            // Clean Data
            $this->student_id = htmlspecialchars(strip_tags($this->student_id));
            $class_course_id = htmlspecialchars(strip_tags($class_course_id));
            $class_num = htmlspecialchars(strip_tags($class_num));

            //Bind data
            $stmt->bindParam(':title', $this->student_id);
            $stmt->bindParam(':body', $class_course_id);
            $stmt->bindParam(':author', $class_num);

            //Execute
            if($stmt->execute()) {
                return true;
            }

            // Print error data if statement fails to execute
            printf("Error: %s.\n", $stmt->error);
            return false;               
        }


    }