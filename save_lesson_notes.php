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
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind parameters to the statement
    $stmt->bind_param("ssssssssssssss", $week, $week_ending, $day, $subject, $duration, $class_name, $class_size, $sub_strand, $content_standard, $indicator, $lesson, $phase_duration, $learners_activities, $resources);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Note created successfully";
        // Redirect to another page after 2 seconds
        echo '<script>
                setTimeout(function() {
                    window.location.href = "redirect_page.php"; // Change "redirect_page.php" to your desired page
                }, 2000);
              </script>';
    } else {
        echo "Error: " . $stmt->error;
    }
    

    // Close the statement
    $stmt->close();
}

$conn->close();
?>
