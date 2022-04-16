<?php

function emptyInputCreateCourse($course_id, $name, $level, $description, $credit, $faculty, $program, $concentration, $admin)
{
    $result = false;
    if (empty($course_id) || empty($name) || empty($level) || empty($description) || empty($credit) || empty($faculty) || empty($program) || empty($concentration) || empty($admin)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidAdminID($admin)
{
    $result = false;
    if (!preg_match("/^[0-9]*$/", $admin)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function courseIDExist($conn, $course_id)
{
    $sql = "SELECT * FROM course WHERE course_id = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../adminAddCourses.php?error=courseIDtaken");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "n", $course_id);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createCourse($conn, $course_id, $name, $level, $description, $credit)
{
    $sql = "INSERT INTO course (course_id, course_name, course_leve,course_description,course_credit) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../adminAddCourses.php?error=courseIDtaken");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssss", $course_id, $name, $level, $description, $credit);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../adminAddCourses.php?error=none");
    exit();
}
