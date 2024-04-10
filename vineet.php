<?php

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Records</title>
</head>
<body>

<?php
// Initialize an empty multidimensional array to store student records
$students = [];

// Function to display the student records
function displayRecords($students) {
    echo "<h2>Student Records</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Name</th><th>Roll Number</th><th>Grade</th></tr>";

    foreach ($students as $student) {
        echo "<tr>";
        echo "<td>" . $student['name'] . "</td>";
        echo "<td>" . $student['roll_number'] . "</td>";
        echo "<td>" . $student['grade'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
}
?>

<!-- Display the button for showing records -->
<form method="post" action="">
    <input type="submit" name="show_records" value="Show Records">
</form>

<?php
// Check if the "Show Records" button is clicked
if (isset($_POST['show_records'])) {
    // Display records
    displayRecords($students);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['show_records'])) {
    // Get input from the user
    $name = $_POST['name'];
    $rollNumber = $_POST['roll_number'];
    $grade = $_POST['grade'];

    // Validate input (you can add more validation as needed)
    if (empty($name) || empty($rollNumber) || empty($grade)) {
        echo "<p style='color: red;'>Please fill in all fields.</p>";
    } else {
        // Add the student record to the array
        $students[] = ['name' => $name, 'roll_number' => $rollNumber, 'grade' => $grade];
    }
}
?>

<!-- Display the form for user input -->
<h2>Add a New Student</h2>
<form method="post" action="">
    <label for="name">Name:</label>
    <input type="text" name="name" required><br>

    <label for="roll_number">Roll Number:</label>
    <input type="text" name="roll_number" required><br>

    <label for="grade">Grade:</label>
    <input type="text" name="grade" required><br>

    <input type="submit" value="Add Student">
</form>

</body>
</html>

?>