<?php

function emptyInputCreateStudent($student_id, $fname, $lname, $faculty, $program, $concentration, $admin)
{
    $result = false;
    if (empty($student_id) || empty($fname) || empty($lname) || empty($faculty) || empty($program) || empty($concentration) || empty($admin)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function studentIDExist($conn, $student_id)
{
    $sql = "SELECT * FROM student WHERE student_id = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../adminAddStudents.php?error=studentIDtaken");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "n", $student_id);
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

function createStudent($conn, $student_id, $fname, $lname, $faculty)
{
    $sql = "INSERT INTO student (student_id, Fname, Lname, primary_faculty_name) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../adminAddStudents.php?error=studentIDtaken");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssss", $student_id, $fname, $lname, $faculty);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../adminAddStudents.php?error=none");
    exit();
}
