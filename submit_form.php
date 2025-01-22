<?php
// Include the database connection
include('db_connect.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $education = $_POST['education'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $location = $_POST['location'];
    $course = $_POST['course'];
    $message = $_POST['message'];

    // Insert data into the database
    $sql = "INSERT INTO contact_form (name, education, phone, email, location, course, message)
            VALUES ('$name', '$education', '$phone', '$email', '$location', '$course', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        // Redirect to a thank you page
        header("Location: thank-you.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
