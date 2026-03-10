<?php
$conn = new mysqli("localhost","root","","logins_db");

if($conn->connect_error){
    die("Connection failed");
}

if(isset($_POST['usn'])){

$usn = $_POST['usn'];
$today = date("Y-m-d");
$time = date("H:i:s");

$studentCheck = $conn->query("SELECT * FROM students WHERE usn='$usn'");

if($studentCheck->num_rows == 0){
    echo "Student Not Registered!";
} else {

$attendanceCheck = $conn->query("SELECT * FROM attendance 
                                 WHERE usn='$usn' 
                                 AND date='$today'");

if($attendanceCheck->num_rows == 0){

    $conn->query("INSERT INTO attendance (usn,date,time_in)
                  VALUES ('$usn','$today','$time')");
    echo "TIME IN RECORDED";

} else {

    $row = $attendanceCheck->fetch_assoc();

    if($row['time_out'] == NULL){

        $conn->query("UPDATE attendance 
                      SET time_out='$time'
                      WHERE usn='$usn' AND date='$today'");
        echo "TIME OUT RECORDED";

    } else {
        echo "Already Timed In and Out Today";
    }
}
}
}
if(isset($_GET['selected_date']) && $_GET['selected_date'] != ""){
    $filterDate = $_GET['selected_date'];
} else {
    $filterDate = date("Y-m-d");
}

$result = $conn->query("
SELECT attendance.*, students.name, students.grade_strand
FROM attendance
JOIN students ON attendance.usn = students.usn
WHERE attendance.date = '$filterDate'
ORDER BY attendance.id DESC
");
?>