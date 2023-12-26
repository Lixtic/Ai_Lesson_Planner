
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lesson Notes</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
<section id="hero">
       <nav>
          <div class="logo">Ai Lesson Planner </div>

          <div class="searchContainer">         
            <input type="text" name="search" id="searchInput" placeholder="Search...">
            <span class="icon">
                <i class="las la-search"></i>
            </span>

        </div>
          <div class="linksContainer">
            <ul class="nav-links">
                <li><a href="#" id="noteCreatorLink">Note Creator</a></li>               
                <li><a href="#" id="notesLink">My Notes</a></li>
                <li><a href="#" id="curriculumLink">Curriculum</a></li>
                    <ul class="user">
                        <li><a href="#" id="signInLink">Sign In</a></li>
                        <li><a href="#" id="signInLink">Sign Up</a></li>
                    </ul>
                
              </ul>
              
          </div>
         
          
          <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
          </div>
        </nav>
    </section>
<form method="GET">
        <label for="weekSelect">Choose a Week:</label>
        <select name="week" id="weekSelect">
            <option value="1">Week 1</option>
            <option value="2">Week 2</option>
            <!-- Add other week options here -->
        </select>
        <button type="submit">Show Notes</button>
    </form>


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
        echo "No results found for this week.";
    }
} else {
    echo "No week selected.";
}


$conn->close();
?>
    
</body>
</html>