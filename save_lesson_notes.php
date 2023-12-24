<?php
// Connect to MySQL
include "connect.php";

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $week = $_POST["week"];
    $week_ending = $_POST["week_ending"];
    $day = $_POST["day"];
    $subject = $_POST["subject"];
    $duration = $_POST["duration"];
    $class_name = $_POST["class_name"];
    $class_size = $_POST["class_size"];
    $sub_strand = $_POST["sub_strand"];
    $content_standard = $_POST["content_standard"];
    $indicator = $_POST["indicator"];
    $lesson = $_POST["lesson"];
    $phase_duration = $_POST["phase_duration"];
    $learners_activities = $_POST["learners_activities"];
    $resources = $_POST["resources"];

    // Insert data into the database
    $sql = "INSERT INTO lesson_notes (week, week_ending, day, subject, duration, class_name, class_size, sub_strand, content_standard, indicator, lesson, phase_duration, learners_activities, resources)
    VALUES ('$week', '$week_ending', '$day', '$subject', '$duration', '$class_name', '$class_size', '$sub_strand', '$content_standard', '$indicator', '$lesson',  '$phase_duration', '$learners_activities',  '$resources' )";

    if ($conn->query($sql) === TRUE) {
        echo "Note created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
