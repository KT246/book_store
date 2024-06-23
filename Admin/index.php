<?php
session_start();
if (!isset($_SESSION['loginAdmin'])) {
    header("Location: ../login.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashbord</title>
</head>

<body>

    <div>
        <?php include_once 'component/navbar.php'; ?>
        <?php include_once 'component/content.php'; ?>
    </div>

</body>

</html>