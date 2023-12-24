<?php
include "connect.php";

if (isset($_GET['week'])) {
    $week = $_GET['week'];
    $sql = "SELECT * FROM lesson_notes WHERE week = '$week'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
        echo "<table>";
        echo "<tr>
        <th>Week Ending</th>
        <th>Day</th><th>Subject</th><th>Duration</th>
        <th>Strand</th><th>Class</th><th>Class Size</th>
        <th>Sub Strand</th><th>Content Standard</th><th>Indicator</th>
        <th>Lesson</th><th>Phase Duration</th><th>Learners Activities</th>
        <th>Resources</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["week_ending"] . "</td>";
            echo "<td>" . $row["day"] . "</td>";
            echo "<td>" . $row["subject"] . "</td>";
            echo "<td>" . $row["duration"] . "</td>";
            echo "<td>" . $row["strand"] . "</td>";
            echo "<td>" . $row["class_name"] . "</td>";
            echo "<td>" . $row["class_size"] . "</td>";
            echo "<td>" . $row["sub_strand"] . "</td>";
            echo "<td>" . $row["content_standard"] . "</td>";
            echo "<td>" . $row["indicator"] . "</td>";
            echo "<td>" . $row["lesson"] . "</td>";
            echo "<td>" . $row["phase_duration"] . "</td>";
            echo "<td>" . $row["learners_activities"] . "</td>";
            echo "<td>" . $row["resources"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
} else {
    echo "No week selected";
}

echo" <style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }
</style>";


$conn->close();
?>
