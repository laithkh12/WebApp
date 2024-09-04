<!DOCTYPE html>
<html>

<head>
    <title>User Reviews</title>
    <style>
    body {
        background-image: url('Course_img.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        min-height: 100%;
    }

    /* Styles for label, input, and textarea elements */
    label,
    input[type="text"],
    textarea {
        display: block;
        margin: 0 auto;
        text-align: center;
    }

    input[type="submit"],
    a {
        display: block;
        margin: 0 auto;
        text-align: center;
        margin-top: 10px;
    }

    .success-message {
        background-color: #DCF8C6;
        color: #333;
        padding: 10px;
        border-radius: 8px;
        display: inline-block;
    }

    .success-icon {
        font-size: 20px;
        margin-right: 5px;
    }

    .error-container {
        background-color: #FFD2D2;
        color: #FF0000;
        padding: 10px;
        border-radius: 8px;
        display: inline-block;
        font-weight: bold;
    }

    h1 {
        text-align: center;
    }

    h2 {
        text-align: center;
    }
    </style>
</head>

<body>
    <h1>User Reviews</h1>
    <!-- Form to submit a new review -->
    <h2>Add a Review</h2>
    <form method="POST" action="">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>

        <label for="message">Message:</label>
        <textarea name="message" id="message" required></textarea>

        <input type="submit" value="Submit">
        <a href="http://localhost/signup_webproject/outrev.php">view reviews</a>
    </form>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = ""; // Enter your MySQL password if you have set one
    $dbname = "webproject"; // Enter the name of your database
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // Process form submission
   //  $sql = "SELECT * FROM review ORDER BY timestamp DESC";
  //    $result = $conn->query($sql);
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $message = $_POST['message'];

        // Insert new review into the database
        $sql = "INSERT INTO review (name, message) VALUES ('$name', '$message')";
        if ($conn->query($sql) === TRUE) {
            echo '<div class="success-message"><span class="success-icon">&#10004;</span> Review added successfully</div>';
            
        } else {
            echo '<div class="error-container">X</div>';
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
    ?>
</body>

</html>