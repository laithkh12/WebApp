<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="SignIn.css">
    <style>
    body {
        min-height: 100%;
        background-image: url('mainfram.jpg');
        background-size: cover;
        overflow: hidden;
    }

    h1 {
        text-align: center;
    }

    #my_input {
        display: block;
        margin: auto;
    }

    .signin-form {
        margin: auto;
        /* center horizontally */
        margin-top: 50px;
        /* center vertically */
        max-width: 500px;

        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .signin-form h2 {
        text-align: center;
    }

    .signin-form form {
        display: flex;
        flex-direction: column;
    }

    .signin-form label {
        margin-bottom: 10px;
    }

    .signin-form input {
        padding: 10px;
        border-radius: 5px;
        border: 1px solid black;
        margin-bottom: 20px;
    }

    .signin-form button {
        background-color: #4CAF50;
        color: black;
        padding: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 20px;
    }

    .signin-form button:hover {
        background-color: #3e8e41;
    }
    </style>
</head>

<body>
    <h1 style="color:black">Welcome Back !!</h1>
    <div class="signin-form">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="email" style="color: black;" id="my_input">Email:</label>
            <input type="email" name="email" id="email" id="my_input" required>
            <br />
            <br />
            <label for="password" style="color: black;" id="my_input">Passowrd:</label>
            <input type="password" name="password" id="password" id="my_input" required>
            <br />
            <br />
            <input type="submit" value="Submit">
        </form>
    </div>
</body>

</html>
<?php
// Database connection details
$host = "localhost"; // Your host name
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "webproject"; // Your database name


// Create a new PDO instance
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false,
];
try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Sign-in functionality
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM signup WHERE email = :email AND password = :password";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // User exists, redirect to the desired page
        header("Location: http://localhost/signup_webproject/recevation.php");
        exit();
    } else {
        // Invalid credentials, display error message or take appropriate action
        echo "Invalid email or password.";
    }
}

// Close the database connection
$pdo = null;
?>