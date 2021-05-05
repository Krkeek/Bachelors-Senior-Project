<?php
include '..\..\dataManagment\connection.php';
include '..\..\dataManagment\server.php';
session_destroy();
?>




<html>

<head>
    <meta charset="UTF-8">
    <title>U-Style</title>
    <link rel="stylesheet" href="../../css/StyleC.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="../../css/StyleT.css?<?php echo time(); ?>">
    <link rel="shortcut icon" type="image/png" href="../../images/cssPhotos/favicon.png">
    <style>
        body {
            background-image: url("../../images/cssPhotos/deleteAccount.jpg");
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;


        }
    </style>
</head>

<body>

    <div id="deleteAccount">
        <img src="../../resources/cssPhotos/thankyou.png">
        <a href="../Intro_Pages/loginPage.php"><input class="btn btn-secondary custom-btn" id="deactivateButton" type="submit" value="Main Page" /></a>
    </div>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</body>

</html>