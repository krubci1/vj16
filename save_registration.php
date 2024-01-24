<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['_action_'])) {
    # Database connection
    $servername = "your_database_server";
    $username = "your_database_username";
    $password = "your_database_password";
    $dbname = "your_database_name";

    $conn = new mysqli($servername, $username, $password, $dbname);

    # Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    # Get form data
    $firstname = $conn->real_escape_string($_POST["firstname"]);
    $lastname = $conn->real_escape_string($_POST["lastname"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $username = $conn->real_escape_string($_POST["username"]);
    $password = password_hash($conn->real_escape_string($_POST["password"]), PASSWORD_DEFAULT); // Hash the password
    $country = $conn->real_escape_string($_POST["country"]);

    # Prepare and execute SQL query
    $sql = "INSERT INTO users (firstname, lastname, email, username, password, country) 
            VALUES ('$firstname', '$lastname', '$email', '$username', '$password', '$country')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
