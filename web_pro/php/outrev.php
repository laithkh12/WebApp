<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body {
        background-image: url('cart_img.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        min-height: 100%;
    }

    * {
        margin: 0px;
        padding: 0px;
        font-family: poppins;
        box-sizing: border-box;
    }

    a {
        text-decoration: none;
    }

    #testimonials {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        width: 100%;
    }

    .testimonials-heading {
        letter-spacing: 1px;
        margin: 30px 0px;
        padding: 10px 20px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .testimonials-heading h1 {
        font-size: 2.2rem;
        font-weight: 500;
        background-color: #202020;
        color: #ffffff;
        padding: 10px 20px;
    }

    .testimonials-heading span {
        font-size: 1.3rem;
        color: #252525;
        margin-bottom: 10px;
        letter-spacing: 2px;
        text-transform: uppercase;
    }

    .testimonials-box-container {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        width: 100%;
    }

    .testimonials-box {
        width: 500px;
        box-shadow: 2px 2px 30px rgba(0, 0, 0, 0.1);
        background-color: #ffffff;
        padding: 20px;
        margin: 100px;
        cursor: pointer;
        display: inline-block;
    }

    .profile-img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        overflow: hidden;
        margin-right: 10px;
    }

    .profile-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }

    .profile {
        display: flex;
        align-items: center;
    }

    .name-user {
        display: flex;
        flex-direction: column;
    }

    .name-user strong {
        color: #3d3d3d;
        font-size: 1.1rem;
        letter-spacing: 0.5px;
    }

    .name-user span {
        color: #979797;
        font-size: 0.8rem;
    }

    .reviews {
        color: #f9d71c;
    }

    .box-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .client-comment p {
        font-size: 0.9rem;
        color: #4b4b4b;
    }

    .testimonials-box:hover {
        transform: translateY(-10px);
        transition: all ease 0.3s;
    }

    @media(max-width:1060px) {
        .testimonials-box {
            width: 45%;
            padding: 10px;
        }
    }

    @media(max-width:790px) {
        .testimonials-box {
            width: 100%;
        }

        .testimonials-heading h1 {
            font-size: 1.4rem;

        }
    }

    @media(max-width:340px) {
        .box-top {
            flex-wrap: wrap;
            margin-bottom: 10px;
        }

        .reviews {
            margin-top: 10px;
        }
    }

    ::selection {
        color: #ffffff;
        background-color: #252525;
    }
    </style>
</head>

<body>
    <div class="testimonials-heading">
        <span>Comments</span>
        <h1>Clients Says</h1>

    </div>
</body>

</html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "webproject";

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<?php
// Select the data from the table
$sql = "SELECT name, message FROM review";
$result = $conn->query($sql);

    
    // Loop through each row of data
    while ($row = $result->fetch_assoc()) {
        $name = $row["name"];
        $message = $row["message"];
        ?>



<div class="testimonials-box">
    <div class="box-top">
        <div class="profile">

            <div class="name-user">
                <strong><?php echo $name; ?></strong>
                <span>@<?php echo $name; ?></span>
            </div>
        </div>
        <div class="reviews">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="far fa-star"></i>

        </div>
    </div>
    <div class="client-comment">
        <p><?php echo $message; ?></p>
    </div>
</div>
<?php
    }


// Close the connection
$conn->close();
?>