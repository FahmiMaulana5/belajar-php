<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        body{
            background-color: #0e76a8;
        }

        a{
            text-decoration: none;
            color: white;
        }

        a:hover{
            text-decoration: none;
            color: red;
        }
    </style>
</head>
<body>
    <?php echo "
    <marquee> 
    <h1>Welcome " . $_SESSION['username'] . " Kamu memasuki Web tugas Login!!!</h1> 
    </marquee>"
    ; ?>
    <a href="logout.php">Logout</a>
</body>
</html>