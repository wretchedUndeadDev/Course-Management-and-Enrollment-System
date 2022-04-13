<?php
    //Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    $host = 'localhost';
    $db_name = 'cpsc471_project_db_cmes';
    $username = 'root';
    $password = '';
    $db = null;

    try {
        $db = new PDO('mysql:host='.$host.';port=3308;dbname='.$db_name,
            $username,
            $password);

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Connection Error: '.$e->getMessage();
    }
    echo 'Successfully Connected to Database!';



    //GET QUEURIES=======================================================================================================
    //===================================================================================================================

    //Retrieve Major program keys in Random Order
    function getAll_major_program_keys_random() {
        GLOBAL $db;
        $query = 'SELECT m.parent_faculty, m.name FROM major_program AS m ORDER BY RAND()';
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    //Retrieve Minor program keys in Random Order
    function getAll_minor_programs_keys_random() {
        GLOBAL $db;
        $query = 'SELECT  m.parent_faculty, m.name FROM minor_program AS m ORDER BY RAND()';
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    //Retrieve Concentration keys in Random Order
    function getAll_concentration_keys_random() {
        GLOBAL $db;
        $query = 'SELECT  c. FROM minor_program AS m ORDER BY RAND()';
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    //Retrieve Course keys in Random Order 
    function getAll_course_keys_random() {
        GLOBAL $db;
        $query = 'SELECT  c.course_id FROM course AS c ORDER BY RAND()';
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    //Retrieve Student keys in Random Order 
    function getAll_student_keys_random() {
        GLOBAL $db;
        $query = 'SELECT  s.student_id FROM student AS s ORDER BY RAND()';
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    //Retrieve Class keys in Random Order
    function getAll_class_keys_random() {
        GLOBAL $db;
        $query = 'SELECT  c.parent_course_id, c.class_num FROM class AS c ORDER BY RAND()';
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    //Retrieve Course Review keys in Random Order
    function getAll_courseReview_keys_random() {
        GLOBAL $db;
        $query = 'SELECT  c.parent_course_id, c.class_num FROM class AS c ORDER BY RAND()';
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    //Retrieve Major Program key X Course key in Random Order
    function get_majorKeys_cross_courseKeys_random() {
        GLOBAL $db;
        $query = 'SELECT m.name, m.parent_faculty, c.course_id
                    FROM major_program AS m, course AS c
                    ORDER BY RAND()';
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    //Retrieve Minor Program key X Course key in Random Order
    function get_minorKeys_cross_courseKeys_random() {
        GLOBAL $db;
        $query = 'SELECT m.name, m.parent_faculty, c.course_id
                    FROM minor_program AS m, course AS c
                    ORDER BY RAND()';
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    //Retrieve Concentration Key x Course key in Random Order
    function get_concentrationKeys_cross_courseKeys_random() {
        GLOBAL $db;
        $query = 'SELECT c1.major_name, c1.major_faculty_name, c1.name , c2.course_id
                    FROM concentration AS c1, course AS c2
                    ORDER BY RAND()';
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    //Retrieve Major Key X Student key in Random Order
    function get_studentKeys_cross_majorKeys_random() {
        GLOBAL $db;
        $query = 'SELECT s.student_id, m.parent_faculty, m.name
                    FROM student AS s, major_program AS m
                    ORDER BY RAND()';
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    //Retrieve Minor Key X Student key in Random Order
    function get_studentKeys_cross_minorKeys_random() {
        GLOBAL $db;
        $query = 'SELECT s.student_id, m.parent_faculty, m.name
                    FROM student AS s, minor_program AS m
                    ORDER BY RAND()';
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    //Retrieve Concentration Key x Student key in Random Order
    function get_studentKeys_cross_concentrationKeys_random() {
        GLOBAL $db;
        $query = 'SELECT s.student_id, c.major_faculty_name, c.major_name, c.name
                    FROM student AS s, concentration AS c
                    ORDER BY RAND()';
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    //Retrieve Admin key x Course Review key in Random Order
    function get_adminKeys_cross_courseReviewKeys_random() {
        GLOBAL $db;
        $query = 'SELECT c.student_id, a.admin_id, c.course_id, c.review_id
                    FROM course_review AS c, `admin` AS a
                    ORDER BY RAND()';
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    //Retrieve Admin key x Class key in Random Order
    function get_adminKeys_cross_classKeys_random() {
        GLOBAL $db;
        $query = 'SELECT a.admin_id, c.parent_course_id, c.class_num
                    FROM `admin` AS a, class AS c
                    ORDER BY RAND()';
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt;        
    }

    //Retrieve Student key X Class key in Random Order
    function get_studentKeys_cross_classKeys_random() {
        GLOBAL $db;
        $query = 'SELECT s.student_id, c.parent_course_id, c.class_num
                    FROM class AS c, student AS s
                    ORDER BY RAND()';
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    //Retrieve Class Keys in Random Order
    function get_classKeys_random() {
        GLOBAL $db;
        $query = 'SELECT c.parent_course_id, c.class_num
                    FROM class AS c
                    ORDER BY RAND()';
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    //Retrieve a random Sample Concentration name
    function get_concentration_sample_name_random() {
        GLOBAL $db;
        $name_result = null;
        $query = 'SELECT c.name
                    FROM concentration_sample_name_pool AS c
                    ORDER BY RAND()
                    LIMIT 0, 1';
        $stmt = $db->prepare($query);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $name_result = $name;
        }
        return $name_result;
    }

    //Retrieve a random Sample Concentration description
    function get_concentration_sample_desc_random() {
        GLOBAL $db;
        $desc_result = null;
        $query = 'SELECT c.description
                    FROM concentration_sample_desc_pool AS c
                    ORDER BY RAND()
                    LIMIT 0, 1';
        $stmt = $db->prepare($query);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $desc_result = $description;
        }
        return $desc_result;
    }
    //===================================================================================================================




















    //CREATE QUEURIES====================================================================================================
    //===================================================================================================================

    //Create Concentration tuple
    function create_concentration($major_faculty_name, $major_name, $name, $description) {
        GLOBAL $db;

        //Create query
        $query = 'INSERT INTO concentration
                    SET 
                        major_faculty_name = :mfn,
                        major_name = :mn,
                        name = :n,
                        description = :d';

        //Prepare Statement
        $stmt = $db->prepare($query);

        //Clean Data
        $major_faculty_name = htmlspecialchars(strip_tags($major_faculty_name));
        $major_name = htmlspecialchars(strip_tags($major_name));
        $name = htmlspecialchars(strip_tags($name));
        $description = htmlspecialchars(strip_tags($description));

        //Bind Data
        $stmt->bindParam(':mfn', $major_faculty_name);
        $stmt->bindParam(':mn', $major_name);
        $stmt->bindParam(':n', $name);
        $stmt->bindParam(':d', $description);

        //Execute
        if ($stmt->execute()) {
            return true;
        }

        // Print error data if statement fails to execute
        printf("Error: %s.\n", $stmt->error);
        return false;
    }



    //Create course_restricted_to_major_program tuple
    function create_course_program_restriction($major_program_name, $major_program_faculty, $restricted_course_id) {
        GLOBAL $db;
        
        //Create query
        $query = 'INSERT INTO course_restricted_to_major_program
                    SET
                        major_program_name = :mpn,
                        major_program_faculty = :mpf,
                        restricted_course_id = :rcid';

        //Prepare Statement
        $stmt = $db->prepare($query);

        //Clean Data
        $major_program_name = htmlspecialchars(strip_tags($major_program_name));
        $major_program_faculty = htmlspecialchars(strip_tags($major_program_faculty));
        $restricted_course_id = htmlspecialchars(strip_tags($restricted_course_id));

        //Bind Data
        $stmt->bindParam(':mpn', $major_program_name);
        $stmt->bindParam(':mpf', $major_program_faculty);
        $stmt->bindParam(':rcid', $restricted_course_id);

        //Execute
        if ($stmt->execute()) {
            return true;
        }

        // Print error data if statement fails to execute
        printf("Error: %s.\n", $stmt->error);
        return false;
    }



    //Create course_required_by_major_program tuple
    function create_course_major_requirement($major_program_name, $major_program_faculty, $required_course_id) {
        GLOBAL $db;
        
        //Create query
        $query = 'INSERT INTO course_required_by_major_program
                    SET
                        major_program_name = :mpn,
                        major_program_faculty = :mpf,
                        required_course_id = :rcid';

        //Prepare Statement
        $stmt = $db->prepare($query);

        //Clean Data
        $major_program_name = htmlspecialchars(strip_tags($major_program_name));
        $major_program_faculty = htmlspecialchars(strip_tags($major_program_faculty));
        $required_course_id = htmlspecialchars(strip_tags($required_course_id));

        //Bind Data
        $stmt->bindParam(':mpn', $major_program_name);
        $stmt->bindParam(':mpf', $major_program_faculty);
        $stmt->bindParam(':rcid', $required_course_id);

        //Execute
        if ($stmt->execute()) {
            return true;
        }

        // Print error data if statement fails to execute
        printf("Error: %s.\n", $stmt->error);
        return false;
    }



    //Create course_required_by_minor_program tuple
    function create_course_minor_requirement($minor_program_name, $minor_program_faculty, $required_course_id) {
        GLOBAL $db;
        
        //Create query
        $query = 'INSERT INTO course_required_by_minor_program
                    SET
                        minor_program_name = :mpn,
                        minor_program_faculty = :mpf,
                        required_course_id = :rcid';

        //Prepare Statement
        $stmt = $db->prepare($query);

        //Clean Data
        $minor_program_name = htmlspecialchars(strip_tags($minor_program_name));
        $minor_program_faculty = htmlspecialchars(strip_tags($minor_program_faculty));
        $required_course_id = htmlspecialchars(strip_tags($required_course_id));

        //Bind Data
        $stmt->bindParam(':mpn', $minor_program_name);
        $stmt->bindParam(':mpf', $minor_program_faculty);
        $stmt->bindParam(':rcid', $required_course_id);

        //Execute
        if ($stmt->execute()) {
            return true;
        }

        // Print error data if statement fails to execute
        printf("Error: %s.\n", $stmt->error);
        return false;
    }



    //Create course_required_by_concentration tuple
    function create_course_concentration_requirement($major_program_name, $major_program_faculty, $concentration_name, $required_course_id) {
        GLOBAL $db;
        
        //Create query
        $query = 'INSERT INTO course_required_by_concentration
                    SET
                        major_program_name = :mpn,
                        major_program_faculty = :mpf,
                        concentration_name = :cn,
                        required_course_id = :rcid';

        //Prepare Statement
        $stmt = $db->prepare($query);

        //Clean Data
        $major_program_name = htmlspecialchars(strip_tags($major_program_name));
        $major_program_faculty = htmlspecialchars(strip_tags($major_program_faculty));
        $concentration_name = htmlspecialchars(strip_tags($concentration_name));
        $required_course_id = htmlspecialchars(strip_tags($required_course_id));

        //Bind Data
        $stmt->bindParam(':mpn', $major_program_name);
        $stmt->bindParam(':mpf', $major_program_faculty);
        $stmt->bindParam(':cn', $concentration_name);
        $stmt->bindParam(':rcid', $required_course_id);

        //Execute
        if ($stmt->execute()) {
            return true;
        }

        // Print error data if statement fails to execute
        printf("Error: %s.\n", $stmt->error);
        return false;
    }



    //Create student_takes_major_program tuple
    function create_student_takes_major_program($student_id, $major_program_faculty, $major_program_name) {
        GLOBAL $db;

        //Create Query
        $query = 'INSERT INTO student_takes_major_program
                    SET
                        student_id = :s,
                        major_program_faculty = :mpf,
                        major_program_name = :mpn;';
        
        //Prepare Statement
        $stmt = $db->prepare($query);

        //Clean Data
        $student_id = htmlspecialchars(strip_tags($student_id));
        $major_program_faculty = htmlspecialchars(strip_tags($major_program_faculty));
        $major_program_name = htmlspecialchars(strip_tags($major_program_name));

        //Bind Data
        $stmt->bindParam(':s', $student_id);
        $stmt->bindParam(':mpf', $major_program_faculty);
        $stmt->bindParam(':mpn', $major_program_name);

        //Execute
        if ($stmt->execute()) {
            return true;
        }

        // Print error data if statement fails to execute
        printf("Error: %s.\n", $stmt->error);
        return false;
    }



    //Create student_takes_minor_program tuple
    function create_student_takes_minor_program($student_id, $minor_program_faculty, $minor_program_name) {
        GLOBAL $db;
        
        //Create Query
        $query = 'INSERT INTO student_takes_minor_program
                    SET
                        student_id = :s,
                        minor_program_faculty = :mpf,
                        minor_program_name = :mpn;';
        
        //Prepare Statement
        $stmt = $db->prepare($query);

        //Clean Data
        $student_id = htmlspecialchars(strip_tags($student_id));
        $minor_program_faculty = htmlspecialchars(strip_tags($minor_program_faculty));
        $minor_program_name = htmlspecialchars(strip_tags($minor_program_name));

        //Bind Data
        $stmt->bindParam(':s', $student_id);
        $stmt->bindParam(':mpf', $minor_program_faculty);
        $stmt->bindParam(':mpn', $minor_program_name);

        //Execute
        if ($stmt->execute()) {
            return true;
        }

        // Print error data if statement fails to execute
        printf("Error: %s.\n", $stmt->error);
        return false;
    }



    //Create student_focuses_concentration tuple
    function create_student_focuses_concentration($student_id, $program_faculty, $program_name, $concentration_name) {
        GLOBAL $db;
        
        //Create query
        $query = 'INSERT INTO student_focuses_concentration
                    SET
                        student_id = :s,
                        program_faculty = :pf,
                        program_name = :pn,
                        concentration_name = :cn';

        //Prepare Statement
        $stmt = $db->prepare($query);

        //Clean Data
        $student_id = htmlspecialchars(strip_tags($student_id));
        $program_faculty = htmlspecialchars(strip_tags($program_faculty));
        $program_name = htmlspecialchars(strip_tags($program_name));
        $concentration_name = htmlspecialchars(strip_tags($concentration_name));

        //Bind Data
        $stmt->bindParam(':s', $student_id);
        $stmt->bindParam(':pf', $program_faculty);
        $stmt->bindParam(':pn', $program_name);
        $stmt->bindParam(':cn', $concentration_name);

        //Execute
        if ($stmt->execute()) {
            return true;
        }

        // Print error data if statement fails to execute
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    

    //Create admin_edits_course_review tuple
    function create_admin_edits_course_review($student_id, $admin_id, $course_id, $review_id) {
        GLOBAL $db;
        
        //Create query
        $query = 'INSERT INTO admin_edits_course_review
                    SET
                        student_id = :s,
                        admin_id = :aid,
                        course_id = :cid,
                        review_id = :rid,
                        timestamp = current_timestamp()';

        //Prepare Statement
        $stmt = $db->prepare($query);

        //Clean Data
        $student_id = htmlspecialchars(strip_tags($student_id));
        $admin_id = htmlspecialchars(strip_tags($admin_id));
        $course_id = htmlspecialchars(strip_tags($course_id));
        $review_id = htmlspecialchars(strip_tags($review_id));

        //Bind Data
        $stmt->bindParam(':s', $student_id);
        $stmt->bindParam(':aid', $admin_id);
        $stmt->bindParam(':cid', $course_id);
        $stmt->bindParam(':rid', $review_id);

        //Execute
        if ($stmt->execute()) {
            return true;
        }

        // Print error data if statement fails to execute
        printf("Error: %s.\n", $stmt->error);
        return false;
    }



    //Create admin_removes_course_review tuple
    function create_admin_removes_course_review($student_id, $admin_id, $course_id, $review_id) {
        GLOBAL $db;
        
        //Create query
        $query = 'INSERT INTO admin_removes_course_review
                    SET
                        student_id = :s,
                        admin_id = :aid,
                        course_id = :cid,
                        review_id = :rid,
                        timestamp = current_timestamp()';

        //Prepare Statement
        $stmt = $db->prepare($query);

        //Clean Data
        $student_id = htmlspecialchars(strip_tags($student_id));
        $admin_id = htmlspecialchars(strip_tags($admin_id));
        $course_id = htmlspecialchars(strip_tags($course_id));
        $review_id = htmlspecialchars(strip_tags($review_id));

        //Bind Data
        $stmt->bindParam(':s', $student_id);
        $stmt->bindParam(':aid', $admin);
        $stmt->bindParam(':cid', $course_id);
        $stmt->bindParam(':rid', $review_id);

        //Execute
        if ($stmt->execute()) {
            return true;
        }

        // Print error data if statement fails to execute
        printf("Error: %s.\n", $stmt->error);
        return false;
    }



    function create_admin_adds_class($parent_course_id, $class_num, $admin_id) {
        GLOBAL $db;
        
        //Create query
        $query = 'INSERT INTO admin_adds_class
                    SET
                        parent_course_id = :pcid,
                        class_num = :cn,
                        admin_id = :aid,
                        timestamp = current_timestamp()';
        
        //Prepare Statement
        $stmt = $db->prepare($query);

        //Clean Data
        $parent_course_id = htmlspecialchars(strip_tags($parent_course_id));
        $class_num = htmlspecialchars(strip_tags($class_num));
        $admin_id = htmlspecialchars(strip_tags($admin_id));

        //Bind Data
        $stmt->bindParam(':pcid', $parent_course_id);
        $stmt->bindParam(':cn', $class_num);
        $stmt->bindParam(':aid', $admin_id);
        

        //Execute
        if ($stmt->execute()) {
            return true;
        }

        // Print error data if statement fails to execute
        printf("Error: %s.\n", $stmt->error);
        return false;
    }



    function create_admin_edits_class($parent_course_id, $class_num, $admin_id) {
        GLOBAL $db;
        
        //Create query
        $query = 'INSERT INTO admin_edits_class
                    SET
                        parent_course_id = :pcid,
                        class_num = :cn,
                        admin_id = :aid,
                        timestamp = current_timestamp()';
        
        //Prepare Statement
        $stmt = $db->prepare($query);

        //Clean Data
        $parent_course_id = htmlspecialchars(strip_tags($parent_course_id));
        $class_num = htmlspecialchars(strip_tags($class_num));
        $admin_id = htmlspecialchars(strip_tags($admin_id));

        //Bind Data
        $stmt->bindParam(':pcid', $parent_course_id);
        $stmt->bindParam(':cn', $class_num);
        $stmt->bindParam(':aid', $admin_id);
        

        //Execute
        if ($stmt->execute()) {
            return true;
        }

        // Print error data if statement fails to execute
        printf("Error: %s.\n", $stmt->error);
        return false;
    }



    //Create student_course_class_request tuple
    function create_student_course_class_request($requesting_student_id, $requested_course_id, $requested_class_num) {
        GLOBAL $db;

        //Create query
        $query = 'INSERT INTO student_course_class_request
                    SET
                        requesting_student_id = :rsid,
                        requested_course_id = :rcid,
                        requested_class_num = :rcn';
        
        //Prepare Statement
        $stmt = $db->prepare($query);

        //Clean Data
        $requesting_student_id = htmlspecialchars(strip_tags($requesting_student_id));
        $requested_course_id = htmlspecialchars(strip_tags($requested_course_id));
        $requested_class_num = htmlspecialchars(strip_tags($requested_class_num));

        //Bind Data
        $stmt->bindParam(':rsid', $requesting_student_id);
        $stmt->bindParam(':rcid', $requested_course_id);
        $stmt->bindParam(':rcn', $requested_class_num);
 
        //Execute
        if ($stmt->execute()) {
             return true;
        }
 
        // Print error data if statement fails to execute
        printf("Error: %s.\n", $stmt->error);
        return false;
    }



    //Create student_course_class_request tuple
    function create_student_course_class_enroll($enrolling_student_id, $enrolled_course_id, $enrolled_class_num) {
        GLOBAL $db;
        
        //Create query
        $query = 'INSERT INTO student_course_class_enroll
                    SET
                        enrolling_student_id = :esid,
                        enrolled_course_id = :ecid,
                        enrolled_class_num = :ecn';
        
        //Prepare Statement
        $stmt = $db->prepare($query);

        //Clean Data
        $enrolling_student_id = htmlspecialchars(strip_tags($enrolling_student_id));
        $enrolled_course_id = htmlspecialchars(strip_tags($enrolled_course_id));
        $enrolled_class_num = htmlspecialchars(strip_tags($enrolled_class_num));

        //Bind Data
        $stmt->bindParam(':esid', $enrolling_student_id);
        $stmt->bindParam(':ecid', $enrolled_course_id);
        $stmt->bindParam(':ecn', $enrolled_class_num);
 
        //Execute
        if ($stmt->execute()) {
             return true;
        }
 
        // Print error data if statement fails to execute
        printf("Error: %s.\n", $stmt->error);
        return false;
    }



    //Create student_course_class_request tuple
    function create_student_course_class_waitlist($waitlisting_student_id, $waitlisted_course_id, $waitlisted_class_num, $waitlist_position) {
        GLOBAL $db;
        
        //Create query
        $query = 'INSERT INTO student_course_class_waitlist
                    SET
                        waitlisting_student_id = :wsid,
                        waitlisted_course_id = :wcid,
                        waitlisted_class_num = :wcn,
                        waitlist_position = :wp';
        
        //Prepare Statement
        $stmt = $db->prepare($query);

        //Clean Data
        $waitlisting_student_id = htmlspecialchars(strip_tags($waitlisting_student_id));
        $waitlisted_course_id = htmlspecialchars(strip_tags($waitlisted_course_id));
        $waitlisted_class_num = htmlspecialchars(strip_tags($waitlisted_class_num));
        $waitlist_position = htmlspecialchars(strip_tags($waitlist_position));

        //Bind Data
        $stmt->bindParam(':wsid', $waitlisting_student_id);
        $stmt->bindParam(':wcid', $waitlisted_course_id);
        $stmt->bindParam(':wcn', $waitlisted_class_num);
        $stmt->bindParam(':wp', $waitlist_position);
 
        //Execute
        if ($stmt->execute()) {
             return true;
        }
 
        // Print error data if statement fails to execute
        printf("Error: %s.\n", $stmt->error);
        return false;
    }



    //Create class_days tuple
    function create_class_day($parent_course_id, $class_num, $day) {
        GLOBAL $db;
        
        //Create query
        $query = 'INSERT INTO class_days
                    SET
                        parent_course_id = :pcid,
                        class_num = :cn,
                        day = :d';
        
        //Prepare Statement
        $stmt = $db->prepare($query);

        //Clean Data
        $parent_course_id = htmlspecialchars(strip_tags($parent_course_id));
        $class_num = htmlspecialchars(strip_tags($class_num));
        $day = htmlspecialchars(strip_tags($day));


        //Bind Data
        $stmt->bindParam(':pcid', $parent_course_id);
        $stmt->bindParam(':cn', $class_num);
        $stmt->bindParam(':d', $day);
 
        //Execute
        if ($stmt->execute()) {
             return true;
        }
 
        // Print error data if statement fails to execute
        printf("Error: %s.\n", $stmt->error);
        return false;
    }
    //===================================================================================================================
    //===================================================================================================================













    //EXISTS QUEURIES====================================================================================================
    //===================================================================================================================

    function concentration_exists($major_faculty_name, $major_name, $name) {
        GLOBAL $db;

        //Create query
        $query = 'SELECT * FROM concentration AS c
                WHERE c.major_faculty_name = :mfn AND c.major_name = :mn AND c.name = :n
                LIMIT 0, 1';

        //Prepare Statement
        $stmt = $db->prepare($query);

        //Bind Data
        $stmt->bindParam(':mfn', $major_faculty_name);
        $stmt->bindParam(':mn', $major_name);
        $stmt->bindParam(':n', $name);

        //Execute
        $stmt->execute();

        //check result
        if (($stmt->rowCount()) > 0 ) {
            //Concentartion already exists
            return true;
        }
        
        //Concentration does not exist
        return false;
    }



    function course_program_restriction_exists($major_program_name, $major_program_faculty, $restricted_course_id) {
        GLOBAL $db;
        
        //Create query
        $query = 'SELECT * FROM course_restricted_to_major_program AS c
                   WHERE c.major_program_name = :mpn AND c.major_program_faculty = :mpf AND c.restricted_course_id = :rcid
                   LIMIT 0, 1';

       //Prepare Statement
       $stmt = $db->prepare($query);

       //Bind Data
       $stmt->bindParam(':mpn', $major_program_name);
       $stmt->bindParam(':mpf', $major_program_faculty);
       $stmt->bindParam(':rcid', $restricted_course_id);

       //Execute
       $stmt->execute();

       //check result
       if (($stmt->rowCount()) > 0 ) {
           //course program restriction already exists
           return true;
       }
       
       //course program restriction does not exist
       return false;
    }




    function course_major_requirement_exists($major_program_name, $major_program_faculty, $required_course_id) {
        GLOBAL $db;

        //Create query
        $query = 'SELECT * FROM course_required_by_major_program AS c
                    WHERE c.major_program_name = :mpn AND c.major_program_faculty = :mpf AND c.required_course_id = :rcid
                    LIMIT 0, 1';

        //Prepare Statement
        $stmt = $db->prepare($query);

        //Bind Data
        $stmt->bindParam(':mpn', $major_program_name);
        $stmt->bindParam(':mpf', $major_program_faculty);
        $stmt->bindParam(':rcid', $required_course_id);

        //Execute
        $stmt->execute();

        //check result
        if (($stmt->rowCount()) > 0 ) {
        //course program restriction already exists
        return true;
        }
    
        //course program restriction does not exist
        return false;
    }




    function course_minor_requirement_exists($minor_program_name, $minor_program_faculty, $required_course_id) {
        GLOBAL $db;
        
        //Create query
        $query = 'SELECT * FROM course_required_by_minor_program AS c
                    WHERE c.minor_program_name = :mpn AND c.minor_program_faculty = :mpf AND c.required_course_id = :rcid
                    LIMIT 0, 1';

        //Prepare Statement
        $stmt = $db->prepare($query);

        //Bind Data
        $stmt->bindParam(':mpn', $minor_program_name);
        $stmt->bindParam(':mpf', $minor_program_faculty);
        $stmt->bindParam(':rcid', $required_course_id);

        //Execute
        $stmt->execute();

        //check result
        if (($stmt->rowCount()) > 0 ) {
            //course program restriction already exists
            return true;
        }
        
        //course program restriction does not exist
        return false;
    }



    function course_concentration_requirement_exists($major_program_name, $major_program_faculty, $concentration_name, $required_course_id) {
        GLOBAL $db;
        
        //Create query
        $query = 'SELECT * FROM course_required_by_concentration AS c
                    WHERE c.major_program_name = :mpn AND c.major_program_faculty = :mpf AND c.concentration_name = :cn AND c.required_course_id = :rcid
                    LIMIT 0, 1';
    
        //Prepare Statement
        $stmt = $db->prepare($query);
    
        //Bind Data
        $stmt->bindParam(':mpn', $major_program_name);
        $stmt->bindParam(':mpf', $major_program_faculty);
        $stmt->bindParam(':cn', $concentration_name);
        $stmt->bindParam(':rcid', $required_course_id);
    
        //Execute
        $stmt->execute();
    
        //check result
        if (($stmt->rowCount()) > 0 ) {
           //course program restriction already exists
           return true;
        }
       
        //course program restriction does not exist
        return false;
    }



    function student_takes_major_program_exists($student_id, $major_program_faculty, $major_program_name) {
        GLOBAL $db;
        
        //Create query
        $query = 'SELECT * FROM student_takes_major_program AS stmp
                    WHERE stmp.student_id = :st AND stmp.major_program_faculty = :mpf AND stmp.major_program_name = :mpn
                    LIMIT 0, 1';
    
        //Prepare Statement
        $stmt = $db->prepare($query);
    
        //Bind Data
        $stmt->bindParam(':st', $student_id);
        $stmt->bindParam(':mpf', $major_program_faculty);
        $stmt->bindParam(':mpn', $major_program_name);
    
        //Execute
        $stmt->execute();

        //Check result
        if (($stmt->rowCount()) > 0 ) {
            //course program restriction already exists
            return true;
        }
        
        //course program restriction does not exist
        return false;
    }



    function student_takes_minor_program_exists($student_id, $minor_program_faculty, $minor_program_name) {
        GLOBAL $db;
        
        //Create query
        $query = 'SELECT * FROM student_takes_minor_program AS stmp
                    WHERE stmp.student_id = :st AND stmp.minor_program_faculty = :mpf AND stmp.minor_program_name = :mpn
                    LIMIT 0, 1';
    
        //Prepare Statement
        $stmt = $db->prepare($query);
    
        //Bind Data
        $stmt->bindParam(':st', $student_id);
        $stmt->bindParam(':mpf', $minor_program_faculty);
        $stmt->bindParam(':mpn', $minor_program_name);
    
        //Execute
        $stmt->execute();

        //Check result
        if (($stmt->rowCount()) > 0 ) {
            //course program restriction already exists
            return true;
        }
        
        //course program restriction does not exist
        return false;
    }



    function student_focuses_concentration_exists($student_id, $program_faculty, $program_name, $concentration_name) {
        GLOBAL $db;
        
        //Create query
        $query = 'SELECT * FROM student_focuses_concentration AS sfc
                    WHERE sfc.student_id = :st AND sfc.program_faculty = :pf AND sfc.program_name = :pn AND sfc.concentration_name = :cn
                    LIMIT 0, 1';
    
        //Prepare Statement
        $stmt = $db->prepare($query);
    
        //Bind Data
        $stmt->bindParam(':st', $student_id);
        $stmt->bindParam(':pf', $program_faculty);
        $stmt->bindParam(':pn', $program_name);
        $stmt->bindParam(':cn', $concentration_name);
    
        //Execute
        $stmt->execute();

        //Check result
        if (($stmt->rowCount()) > 0 ) {
            //course program restriction already exists
            return true;
        }
        
        //course program restriction does not exist
        return false;
    }



    function admin_edits_course_review_exists($student_id, $admin_id, $course_id, $review_id) {
        GLOBAL $db;
        
        //Create query
        $query = 'SELECT * FROM admin_edits_course_review AS aecr
                    WHERE aecr.student_id = :s AND aecr.admin_id = :aid AND aecr.course_id = :cid AND aecr.review_id = :rid
                    LIMIT 0, 1';
    
        //Prepare Statement
        $stmt = $db->prepare($query);
    
        //Bind Data
        $stmt->bindParam(':s', $student_id);
        $stmt->bindParam(':aid', $admin_id);
        $stmt->bindParam(':cid', $course_id);
        $stmt->bindParam(':rid', $review_id);
    
        //Execute
        $stmt->execute();

        //Check result
        if (($stmt->rowCount()) > 0 ) {
            //course program restriction already exists
            return true;
        }
        
        //course program restriction does not exist
        return false;

    }



    function admin_removes_course_review_exists($student_id, $admin_id, $course_id, $review_id) {
        GLOBAL $db;
        
        //Create query
        $query = 'SELECT * FROM admin_removes_course_review AS arcr
                    WHERE arcr.student_id = :s AND arcr.admin_id = :aid AND arcr.course_id = :cid AND arcr.review_id = :rid
                    LIMIT 0, 1';
    
        //Prepare Statement
        $stmt = $db->prepare($query);
    
        //Bind Data
        $stmt->bindParam(':s', $student_id);
        $stmt->bindParam(':aid', $admin_id);
        $stmt->bindParam(':cid', $course_id);
        $stmt->bindParam(':rid', $review_id);
    
        //Execute
        $stmt->execute();

        //Check result
        if (($stmt->rowCount()) > 0 ) {
            //course program restriction already exists
            return true;
        }
        
        //course program restriction does not exist
        return false;

    }



    function admin_adds_class_exists($parent_course_id, $class_num, $admin_id) {
        GLOBAL $db;
        
        //Create query
        $query = 'SELECT * FROM admin_adds_class AS aac
                    WHERE aac.parent_course_id = :pcid AND aac.class_num = :cn AND aac.admin_id = :aid
                    LIMIT 0, 1';
    
        //Prepare Statement
        $stmt = $db->prepare($query);
    
        //Bind Data
        $stmt->bindParam(':pcid', $parent_course_id);
        $stmt->bindParam(':cn', $class_num);
        $stmt->bindParam(':aid', $admin_id);
    
        //Execute
        $stmt->execute();

        //Check result
        if (($stmt->rowCount()) > 0 ) {
            //course program restriction already exists
            return true;
        }
        
        //course program restriction does not exist
        return false;
    }



    function admin_edits_class_exists($parent_course_id, $class_num, $admin_id) {
        GLOBAL $db;
        
        //Create query
        $query = 'SELECT * FROM admin_edits_class AS aec
                    WHERE aec.parent_course_id = :pcid AND aec.class_num = :cn AND aec.admin_id = :aid
                    LIMIT 0, 1';
    
        //Prepare Statement
        $stmt = $db->prepare($query);
    
        //Bind Data
        $stmt->bindParam(':pcid', $parent_course_id);
        $stmt->bindParam(':cn', $class_num);
        $stmt->bindParam(':aid', $admin_id);
    
        //Execute
        $stmt->execute();

        //Check result
        if (($stmt->rowCount()) > 0 ) {
            //course program restriction already exists
            return true;
        }
        
        //course program restriction does not exist
        return false;
    }



    function course_review_exists($course_id, $student_id, $review_id) {
        GLOBAL $db;
        
        //Create query
        $query = 'SELECT * FROM course_review AS cr
                    WHERE cr.course_id = :cid AND cr.student_id = :s AND cr.review_id = :rid
                    LIMIT 0, 1';
    
        //Prepare Statement
        $stmt = $db->prepare($query);
    
        //Bind Data
        $stmt->bindParam(':s', $student_id);
        $stmt->bindParam(':aid', $admin_id);
        $stmt->bindParam(':cid', $course_id);
        $stmt->bindParam(':rid', $review_id);
    
        //Execute
        $stmt->execute();

        //Check result
        if (($stmt->rowCount()) > 0 ) {
            //course program restriction already exists
            return true;
        }
        
        //course program restriction does not exist
        return false;
    }



    function student_course_class_request_exists($requesting_student_id, $requested_course_id, $requested_class_num) {
        GLOBAL $db;
        
        //Create query
        $query = 'SELECT * FROM student_course_class_request AS sccr
                    WHERE sccr.requesting_student_id = :rsid AND sccr.requested_course_id = :rcid AND sccr.requested_class_num = :rcn
                    LIMIT 0, 1';
        
        //Prepare Statement
        $stmt = $db->prepare($query);

        //Bind Data
        $stmt->bindParam(':rsid', $requesting_student_id);
        $stmt->bindParam(':rcid', $requested_course_id);
        $stmt->bindParam(':rcn', $requested_class_num);
    
        //Execute
        $stmt->execute();

        //Check result
        if (($stmt->rowCount()) > 0 ) {
            //course program restriction already exists
            return true;
        }
        
        //course program restriction does not exist
        return false;
    }



    function student_course_class_enroll_exists($enrolling_student_id, $enrolled_course_id, $enrolled_class_num) {
        GLOBAL $db;

        //Create query
        $query = 'SELECT * FROM student_course_class_enroll AS scce
                    WHERE scce.enrolling_student_id = :esid AND scce.enrolled_course_id = :ecid AND scce.enrolled_class_num = :ecn
                    LIMIT 0, 1';
        
        //Prepare Statement
        $stmt = $db->prepare($query);

        //Bind Data
        $stmt->bindParam(':esid', $enrolling_student_id);
        $stmt->bindParam(':ecid', $enrolled_course_id);
        $stmt->bindParam(':ecn', $enrolled_class_num);
    
        //Execute
        $stmt->execute();

        //Check result
        if (($stmt->rowCount()) > 0 ) {
            //course program restriction already exists
            return true;
        }
        
        //course program restriction does not exist
        return false;
    }



    function student_course_class_waitlist_exists($waitlisting_student_id, $waitlisted_course_id, $waitlisted_class_num) {
        GLOBAL $db;
        
        //Create query
        $query = 'SELECT * FROM student_course_class_waitlist AS sccw
                    WHERE sccw.waitlisting_student_id = :wsid AND sccw.waitlisted_course_id = :wcid AND sccw.waitlisted_class_num = :wcn
                    LIMIT 0, 1';
        
        //Prepare Statement
        $stmt = $db->prepare($query);

        //Bind Data
        $stmt->bindParam(':wsid', $waitlisting_student_id);
        $stmt->bindParam(':wcid', $waitlisted_course_id);
        $stmt->bindParam(':wcn', $waitlisted_class_num);
    
        //Execute
        $stmt->execute();

        //Check result
        if (($stmt->rowCount()) > 0 ) {
            //course program restriction already exists
            return true;
        }
        
        //course program restriction does not exist
        return false;
    }



    function class_day_exists($parent_course_id, $class_num, $day) {
        GLOBAL $db;

        //Create query
        $query = 'SELECT * FROM class_days AS cd
                    WHERE cd.parent_course_id = :pcid AND cd.class_num = :cn AND cd.day = :d
                    LIMIT 0, 1';
        
        //Prepare Statement
        $stmt = $db->prepare($query);

        //Bind Data
        $stmt->bindParam(':pcid', $parent_course_id);
        $stmt->bindParam(':cn', $class_num);
        $stmt->bindParam(':d', $day);
    
        //Execute
        $stmt->execute();

        //Check result
        if (($stmt->rowCount()) > 0 ) {
            //course program restriction already exists
            return true;
        }
        
        //course program restriction does not exist
        return false;
    }
    //===================================================================================================================
    //===================================================================================================================
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    //GENERATE QUEURIES==================================================================================================
    //===================================================================================================================

    // Generate Concentrations
    function generate_concentrations($inum) {
        // get major programs in random order
        $majors = getAll_major_program_keys_random();

        $insert_count = 0;
        while ($row = $majors->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            //row content extracted to variable $parent_faculty and $name (PHP declares these variables behind-the-scene)
            
            //Create new Concentration
            $major_faculty_name = $parent_faculty;
            $major_name = $name;
            $concentration_name = get_concentration_sample_name_random();
            $concentration_description = get_concentration_sample_desc_random();
            
            if (!(concentration_exists($major_faculty_name, $major_name, $concentration_name))) {
                if (create_concentration($major_faculty_name, $major_name, $concentration_name, $concentration_description)) {
                    $insert_count++; 
                } else {
                    return;
                }
            }

            if ($insert_count == $inum) {
                break;
            }
        }

        echo "Successfully generated ".$insert_count." concentrations!\n";
    }



    //Generate Course Restrictions
    function generate_course_restrictions($inum) {
        $majors_x_courses = get_majorKeys_cross_courseKeys_random();

        $insert_count = 0;
        while ($row = $majors_x_courses->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            //row content extracted to variables $name, $parent_faculty, $course_id

            //Create new course restriction
            $major_program_name = $name;
            $major_program_faculty = $parent_faculty;
            $restricted_course_id = $course_id;

            if (!(course_program_restriction_exists($major_program_name, $major_program_faculty, $restricted_course_id))) {
                if (create_course_program_restriction($major_program_name, $major_program_faculty, $restricted_course_id)) {
                    $insert_count++;
                } else {
                    return;
                }
            }

            if ($insert_count == $inum) {
                break;
            }
        }

        echo "Successfully generated ".$insert_count." course restrictions!\n";
    }



    //Generate Major Course Requirements
    function generate_major_course_requirements($inum) {
        $majors_x_courses = get_majorKeys_cross_courseKeys_random();

        $insert_count = 0;
        while ($row = $majors_x_courses->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            //row content extracted to variables $name, $parent_faculty, $course_id

            //Create new course restriction
            $major_program_name = $name;
            $major_program_faculty = $parent_faculty;
            $required_course_id = $course_id;

            if (!(course_major_requirement_exists($major_program_name, $major_program_faculty, $required_course_id))) {
                if (create_course_major_requirement($major_program_name, $major_program_faculty, $required_course_id)) {
                    $insert_count++;
                } else {
                    return;
                }
            }

            if ($insert_count == $inum) {
                break;
            }
        }

        echo "Successfully generated ".$insert_count." course-major requirements!\n";
    }



    //Generate Minor Course Requirements
    function generate_minor_course_requirements($inum) {
        $minors_x_courses = get_minorKeys_cross_courseKeys_random();

        $insert_count = 0;
        while ($row = $minors_x_courses->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            //row content extracted to variables $name, $parent_faculty, $course_id

            //Create new course restriction
            $minor_program_name = $name;
            $minor_program_faculty = $parent_faculty;
            $required_course_id = $course_id;

            if (!(course_minor_requirement_exists($minor_program_name, $minor_program_faculty, $required_course_id))) {
                if (create_course_minor_requirement($minor_program_name, $minor_program_faculty, $required_course_id)) {
                    $insert_count++;
                } else {
                    return;
                }
            }

            if ($insert_count == $inum) {
                break;
            }
        }

        echo "Successfully generated ".$insert_count." course-minor requirements!\n";
    }



    //Generate Concentration Course Requirements
    function generate_concentration_course_requirements($inum) {
        $concentration_x_courses = get_concentrationKeys_cross_courseKeys_random();

        $insert_count = 0;
        while ($row = $concentration_x_courses->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            //row content extracted to variables $major_name, $major_faculty_name, $name, $course_id

            //Create new course restriction
            $major_program_name = $major_name;
            $major_program_faculty = $major_faculty_name;
            $concentration_name = $name;
            $required_course_id = $course_id;

            if (!(course_concentration_requirement_exists($major_program_name, $major_program_faculty, $concentration_name, $required_course_id))) {
                if (create_course_concentration_requirement($major_program_name, $major_program_faculty, $concentration_name, $required_course_id)) {
                    $insert_count++;
                } else {
                    return;
                }
            }

            if ($insert_count == $inum) {
                break;
            }
        }

        echo "Successfully generated ".$insert_count." course-concentration requirements!\n";
    }



    //Generate student_takes_major_program tuples
    function generate_student_takes_major_program($inum) {
        $students_x_majors = get_studentKeys_cross_majorKeys_random();

        $insert_count = 0;
        while ($row = $students_x_majors->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            //row content extracted to variables $student_id, $parent_faculty, $name

            //Create new course restriction
            //$student_id = student_id
            $major_program_faculty = $parent_faculty;
            $major_program_name = $name;

            if (!(student_takes_major_program_exists($student_id, $major_program_faculty, $major_program_name))) {
                if (create_student_takes_major_program($student_id, $major_program_faculty, $major_program_name)) {
                    $insert_count++;
                } else {
                    return;
                }
            }

            if ($insert_count == $inum) {
                break;
            }
        }

        echo "Successfully generated ".$insert_count." student-major relationships!\n";
    }



    //Generate student_takes_minor_program tuples
    function generate_student_takes_minor_program($inum) {
        $students_x_majors = get_studentKeys_cross_minorKeys_random();

        $insert_count = 0;
        while ($row = $students_x_majors->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            //row content extracted to variables $student_id, $parent_faculty, $name

            //Create new student_takes_minor
            //$student_id = student_id
            $minor_program_faculty = $parent_faculty;
            $minor_program_name = $name;

            if (!(student_takes_minor_program_exists($student_id, $minor_program_faculty, $minor_program_name))) {
                if (create_student_takes_minor_program($student_id, $minor_program_faculty, $minor_program_name)) {
                    $insert_count++;
                } else {
                    return;
                }
            }

            if ($insert_count == $inum) {
                break;
            }
        }

        echo "Successfully generated ".$insert_count." student-minor relationships!\n";
    }



    //Generate student_focuses_concentration tuple
    function generate_student_focuses_concentration($inum) {
        $students_x_concentrations = get_studentKeys_cross_concentrationKeys_random();

        $insert_count = 0;
        while ($row = $students_x_concentrations->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            //row content extracted to variables $student_id, $major_faculty_name, $major_name, $name

            //Create new course restriction
            //$student_id = $student_id
            $program_faculty = $major_faculty_name;
            $program_name = $major_name;
            $concentration_name = $name;

            if (!(student_focuses_concentration_exists($student_id, $program_faculty, $program_name, $concentration_name))) {
                if (create_student_focuses_concentration($student_id, $program_faculty, $program_name, $concentration_name)) {
                    $insert_count++;
                } else {
                    return;
                }
            }

            if ($insert_count == $inum) {
                break;
            }
        }

        echo "Successfully generated ".$insert_count." student-concentration relationships!\n";
    }



    //Generate admin_edits_course_review tuples
    function generate_admin_edits_course_review($inum) {
        $admin_x_courseReviews = get_adminKeys_cross_courseReviewKeys_random();

        $insert_count = 0;
        while ($row = $admin_x_courseReviews->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            //row content extracted to variables $student_id, $admin_id, $course_id, $review_id

            //Create new course restriction
            //$student_id = student_id
            //$admin_id = admin_id
            //$course_id = course_id
            //$review_id = $review_id

            if (!(admin_edits_course_review_exists($student_id, $admin_id, $course_id, $review_id))) {
                if (create_admin_edits_course_review($student_id, $admin_id, $course_id, $review_id)) {
                    $insert_count++;
                } else {
                    return;
                }
            }

            if ($insert_count == $inum) {
                break;
            }
        }

        echo "Successfully generated ".$insert_count." admin-courseReview edits!\n";
    }



    //Generate admin_adds_class tuples
    function generate_admin_adds_class($inum) {
        $admin_x_classes = get_adminKeys_cross_classKeys_random();

        $insert_count = 0;
        while ($row = $admin_x_classes->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            //row content extracted to variables $admin_id, $parent_course_id, $class_num

            //Create new admin_adds_class tuple
            //$parent_course_id = $parent_course_id
            //$class_num = $class_num
            //$admin_id = $admin_id

            if (!(admin_adds_class_exists($parent_course_id, $class_num, $admin_id))) {
                if (create_admin_adds_class($parent_course_id, $class_num, $admin_id)) {
                    $insert_count++;
                } else {
                    return;
                }
            }

            if ($insert_count == $inum) {
                break;
            }
        }

        echo "Successfully generated ".$insert_count." admin-Class additions!\n";
    }



    //Generate admin_edits_class tuples
    function generate_admin_edits_class($inum) {
        $admin_x_classes = get_adminKeys_cross_classKeys_random();

        $insert_count = 0;
        while ($row = $admin_x_classes->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            //row content extracted to variables $admin_id, $parent_course_id, $class_num

            //Create new admin_adds_class tuple
            //$parent_course_id = $parent_course_id
            //$class_num = $class_num
            //$admin_id = $admin_id

            if (!(admin_edits_class_exists($parent_course_id, $class_num, $admin_id))) {
                if (create_admin_edits_class($parent_course_id, $class_num, $admin_id)) {
                    $insert_count++;
                } else {
                    return;
                }
            }

            if ($insert_count == $inum) {
                break;
            }
        }

        echo "Successfully generated ".$insert_count." admin-Class edits!\n";
    }

    

    //Generate student_course_class_request tuples
    function generate_student_course_class_request($inum) {
        $student_x_classes = get_studentKeys_cross_classKeys_random();

        $insert_count = 0;
        while ($row = $student_x_classes->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            //row content extracted to variables $student_id, $parent_course_id, $class_num
            
            //Create new student_course_class_request
            $requesting_student_id = $student_id;
            $requested_course_id = $parent_course_id;
            $requested_class_num = $class_num;

            if (!(student_course_class_request_exists($requesting_student_id, $requested_course_id, $requested_class_num))) {
                if (create_student_course_class_request($requesting_student_id, $requested_course_id, $requested_class_num)) {
                    $insert_count++;
                } else {
                    return;
                }
            }

            if ($insert_count == $inum) {
                break;
            }
        }

        echo "Successfully generated ".$insert_count." student-class requests!\n";
    }



    //Generate student_course_class_enroll tuples
    function generate_student_course_class_enroll($inum) {
        $student_x_classes = get_studentKeys_cross_classKeys_random();

        $insert_count = 0;
        while ($row = $student_x_classes->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            //row content extracted to variables $student_id, $parent_course_id, $class_num
            
            //Create new student_course_class_request
            $enrolling_student_id = $student_id;
            $enrolled_course_id = $parent_course_id;
            $enrolled_class_num = $class_num;

            if (!(student_course_class_enroll_exists($enrolling_student_id, $enrolled_course_id, $enrolled_class_num))) {
                if (create_student_course_class_enroll($enrolling_student_id, $enrolled_course_id, $enrolled_class_num)) {
                    $insert_count++;
                } else {
                    return;
                }
            }

            if ($insert_count == $inum) {
                break;
            }
        }

        echo "Successfully generated ".$insert_count." student-class enrollments!\n";
    }



    //Generate student_course_class_waitlist tuples
    function generate_student_course_class_waitlist($inum) {
        $student_x_classes = get_studentKeys_cross_classKeys_random();

        $insert_count = 0;
        while ($row = $student_x_classes->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            //row content extracted to variables $student_id, $parent_course_id, $class_num
            
            //Create new student_course_class_request
            $waitlisting_student_id = $student_id;
            $waitlisted_course_id = $parent_course_id;
            $waitlisted_class_num = $class_num;
            $num_array = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20);
            shuffle($num_array);
            $waitlist_position = $num_array[0];

            if (!(student_course_class_waitlist_exists($waitlisting_student_id, $waitlisted_course_id, $waitlisted_class_num))) {
                if (create_student_course_class_waitlist($waitlisting_student_id, $waitlisted_course_id, $waitlisted_class_num, $waitlist_position)) {
                    $insert_count++;
                } else {
                    return;
                }
            }

            if ($insert_count == $inum) {
                break;
            }
        }

        echo "Successfully generated ".$insert_count." student-class waitlistings!\n";
    }



    //Generate class_days tuples
    function generate_class_days($inum) {
        $classes = get_classKeys_random();

        $insert_count = 0;
        while ($row = $classes->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            //row content extracted to variables $parent_course_id, $class_num
            
            //Create new class_days tuple
            //$parent_course_id = $parent_course_id
            //$class_num = $class_num
            $day_array = array("M", "T", "W", "R", "F");
            shuffle($day_array);
            $day = $day_array[0];

            if (!(class_day_exists($parent_course_id, $class_num, $day))) {
                if (create_class_day($parent_course_id, $class_num, $day)) {
                    $insert_count++;
                } else {
                    return;
                }
            }

            if ($insert_count == $inum) {
                break;
            }
        }

        echo "Successfully generated ".$insert_count." class days!\n";
    }


    //===================================================================================================================
    //===================================================================================================================


    //DEVELOP DATABASE===================================================================================================
    //===================================================================================================================
    generate_concentrations(3);
    generate_course_restrictions(10);
    generate_major_course_requirements(10);
    generate_minor_course_requirements(10);
    generate_concentration_course_requirements(10);
    generate_student_takes_major_program(10);
    generate_student_takes_minor_program(10);
    generate_student_focuses_concentration(10);
    generate_admin_edits_course_review(5);
    generate_admin_adds_class(30);
    generate_admin_edits_class(15);
    generate_student_course_class_request(20);
    generate_student_course_class_enroll(20);
    generate_student_course_class_waitlist(20);
    generate_class_days(30);
    //===================================================================================================================