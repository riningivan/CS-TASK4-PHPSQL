<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Your Review</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: #ffffff;
            color: #333;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            width: 100%;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        label {
            font-weight: bold;
            font-size: 16px;
        }

        input, textarea {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
            transition: all 0.3s ease;
        }

        input:focus, textarea:focus {
            border-color: #6a11cb;
            box-shadow: 0 0 5px rgba(106, 17, 203, 0.5);
        }

        input::placeholder, textarea::placeholder {
            color: #aaa;
        }

        button {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: #fff;
            font-size: 16px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        button:hover {
            background: linear-gradient(to right, #2575fc, #6a11cb);
            transform: translateY(-2px);
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #ccc;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Submit Your Review</h1>
        <form action="celebration.html" method="GET">
            <label for="username">Name:</label>
            <input type="text" id="username" name="username" placeholder="John Doe" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="example@example.com" required>

            <label for="review">Your Review:</label>
            <textarea id="review" name="review" rows="5" maxlength="500" placeholder="Share your experience here..." required></textarea>

            <button type="submit">Submit Review</button>
        </form>
        <div class="footer">
            &copy; 2024 Reviews 
        </div>
    </div>
</body>
</html>


<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "reviews_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is set
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $review = $conn->real_escape_string($_POST['review']);

    // Insert data into the database
    $sql = "INSERT INTO reviews (username, email, review) VALUES ('$username', '$email', '$review')";

    if ($conn->query($sql) === TRUE) {
        echo "Review submitted successfully! <a href='index.html'>Go back</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
