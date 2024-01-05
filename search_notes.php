<?php
include "connect.php"; 

// Check if the search term is sent via GET request
if (isset($_GET['searchTerm'])) {
    $searchTerm = $_GET['searchTerm'];

    // Perform the search operation using SQL based on day or subject
    $sql = "SELECT * FROM lesson_notes WHERE (day LIKE '%$searchTerm%') OR (subject LIKE '%$searchTerm%')";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch the search results and store them in an array
        $searchResults = [];
        while ($row = $result->fetch_assoc()) {
            $searchResults[] = $row;
        }

        // Return the search results in JSON format
        header('Content-Type: application/json');
        echo json_encode($searchResults);
    } else {
        // No results found
        echo json_encode([]);
    }
} else {
    // No search term provided
    echo json_encode([]);
}

$conn->close();
?>
