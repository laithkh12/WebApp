    <!DOCTYPE html>
    <html>

    <head>
        <title>Calendar with Time Slots</title>
        <style>
        body {
            min-height: 100%;
            background-image: url('mainfram.jpg');
            background-size: cover;
            overflow: hidden;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        input[type="date"],
        select,
        input[type="text"] {
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 5px;
            border-radius: 3px;
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
        </style>
    </head>

    <body>
        <h1>Calendar with Time Slots</h1>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="dateto">Select Date:</label>
            <input type="date" name="dateto" id="dateto" required>

            <label for="time">Select Time:</label>
            <select name="time" id="time" required>
                <option value="0">NONE</option>
                <option value="9:00">9:00</option>
                <option value="9:30">9:30</option>
                <option value="10:00">10:00</option>
                <option value="10:30">10:30</option>
                <option value="11:00">11:00</option>
                <option value="11:30">11:30</option>
                <option value="12:00">12:00</option>
                <option value="12:30">12:30</option>
                <option value="13:00">13:00</option>
                <option value="13:30">13:30</option>
                <option value="14:00">14:00</option>
                <option value="14:30">14:30</option>
                <option value="15:00">15:00</option>
                <option value="15:30">15:30</option>
                <option value="16:00">16:00</option>
            </select>

            <label for="forwhat">What To Do:</label>
            <input type="text" name="forwhat" id="forwwhat" required>

            <input type="submit" value="Book">
        </form>

        <!-- Display the calendar and time slots -->
        <!-- You can customize this part as per your requirements -->

    </body>

    </html>
    <?php
    // Database connection details
    $host = "localhost"; // Your host name
    $username = "root"; // Your database username
    $password = ""; // Your database password
    $dbname = "webproject"; // Your database name

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

    // Calendar functionality
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $date = $_POST['dateto'];
        $time = $_POST['time'];

        // Check if the time slot is available
        $query = "SELECT * FROM `date` WHERE `dateto` = :date AND `time` = :time";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':time', $time);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Time slot is not available, display error message or take appropriate action
            echo '<div class="error-container">X</div>';
        echo "Reservation not successful. Please try again.";
        } else {
            // Time slot is available, update the table
            $forWhat = $_POST['forwhat'];

            $insertQuery = "INSERT INTO `date` (`dateto`, `time`, `forwhat`) VALUES (:date, :time, :forwhat)";
            $insertStmt = $pdo->prepare($insertQuery);
            $insertStmt->bindParam(':date', $date);
            $insertStmt->bindParam(':time', $time);
            $insertStmt->bindParam(':forwhat', $forWhat);
            $insertStmt->execute();

            echo '<div class="success-message"><span class="success-icon">&#10004;</span> Reservation successful!</div>';
        }
    }

    // Close the database connection
    $pdo = null;
    ?>