
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Notes |Ai Lesson Planner</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
<section id="hero">
       <nav>
       <div class="logo">
    <h3>
        <a href="index.html">Ai Lesson Planner</a>
    </h3>
</div>
          <div class="searchContainer">         
            <input type="text" name="search" id="searchInput" placeholder="Search...">
            <span class="icon">
                <i class="las la-search"></i>
            </span>

        </div>
          <div class="linksContainer">
            <ul class="nav-links">
                <li><a href="lessonplan.html" id="noteCreatorLink">Note Creator</a></li>               
                <li><a href="retrieve_notes.php" id="notesLink">My Notes</a></li>
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
    <div class="weeks-container">
    <form method="GET">
        <label for="weekSelect">Choose a Week:</label>
        <select name="week" id="weekSelect">
            <option value="1">Week 1</option>
            <option value="2">Week 2</option>
            <option value="3">Week 3</option>
            <option value="4">Week 4</option>
            <option value="5">Week 5</option>
            <option value="6">Week 6</option>
            <option value="7">Week 7</option>
            <option value="8">Week 8</option>
            <option value="9">Week 9</option>
            <option value="10">Week 10</option>
            <option value="11">Week 11</option>
            <option value="12">Week 12</option>
            
        </select>
        <button type="submit">Show Notes</button>
    </form>
    
<div class="weeks-grid">
    <div class="week-box">Week 1</div>
    <div class="week-box">Week 2</div>
    <div class="week-box">Week 3</div>
    <div class="week-box">Week 4</div>
    <div class="week-box">Week 5</div>
    <div class="week-box">Week 6</div>
    <div class="week-box">Week 7</div>
    <div class="week-box">Week 8</div>
    <div class="week-box">Week 9</div>
    <div class="week-box">Week 10</div>
    
</div>
    </div>




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