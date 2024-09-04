<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="SignUp.css">
    <script>
    var dateInput = document.getElementById('Date Of Birth');
    dateInput.addEventListener('click', function() {
        var datePicker = new Pikaday({
            field: dateInput,
            format: 'DD/MM/YYYY'
        });
    });
    </script>
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

    .signup-form {
        margin: auto;
        /* center horizontally */
        margin-top: 10px;
        /* center vertically */
        max-width: 500px;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .signup-form h2 {
        text-align: center;
    }

    .signup-form form {
        display: flex;
        flex-direction: column;
    }

    .signup-form label {
        margin-bottom: 10px;
    }

    .signup-form input {
        padding: 10px;
        border-radius: 5px;
        border: 1px solid black;
        margin-bottom: 2px;
    }

    .signup-form button {
        background-color: #4CAF50;
        color: black;
        padding: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 10px;
    }

    .signup-form button:hover {
        background-color: #3e8e41;
    }
    </style>
</head>

<body>
    <h1 style="color:black">Welcome To Our Shop</h1>
    <div class="signup-form">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="firstname" style="color: black;" id="my_input">First Name:</label>
            <input type="text" name="firstname" id="firstname" id="my_input" required>
            <br />
            <br />
            <label for="lastname" style="color: black;" id="my_input">Last Name:</label>
            <input type="text" name="lastname" id="lastname" id="my_input" required>
            <br />
            <br />
            <label for="email" style="color: black;" id="my_input">Email:</label>
            <input type="email" name="email" id="email" id="my_input" required>
            <br />
            <br />
            <label for="dob" style="color: black;" id="my_input">Date Of Birth:</label>
            <input type="date" name="dob" id="dob" id="my_input" required>
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
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webproject";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
function CheckIfLegalPassword($pwd) {
    $criteriaCount = 0;
    $criteriaCount += preg_match("/[!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?]/", $pwd);
    $criteriaCount += preg_match("/\d/", $pwd);
    $criteriaCount += preg_match("/[A-Z]/", $pwd);
    $criteriaCount += preg_match("/[a-z]/", $pwd);
    return strlen($pwd) >= 8 && $criteriaCount >= 3;
}
function EncryptPassword($passwd, $pwd) {
    return $passwd; 
}
function DecryptPassword($passwd, $pwd) {
    return $passwd; 
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["firstname"];
    $lastName = $_POST["lastname"];
    $Email = $_POST["email"];
    $dob = $_POST["dob"];
    $password = $_POST["password"];
    $validPassword = CheckIfLegalPassword($password);
    if (!$validPassword) {
        echo "Invalid password. Please use at least 8 Latin letters, numbers, and special characters. The password must contain at least 3 of the following 4 criteria: a special character, a numeric value, an uppercase Latin letter, and a lowercase Latin letter.";
    } else {
        $encryptedPassword = EncryptPassword($password,$password);
        $sql = "INSERT INTO signup (firstname, lastname, email, dob, password) VALUES ('$firstName', '$lastName', '$Email', '$dob', '$encryptedPassword')";
 
        if ($conn->query($sql) === TRUE) {
            echo "Registration successful";
            header("Location: http://localhost/signup_webproject/recevation.php");
        exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>