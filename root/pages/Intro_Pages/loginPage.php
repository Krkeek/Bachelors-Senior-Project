<!doctype html>
<?php
include '..\..\dataManagment\connection.php';
include '..\..\dataManagment\server.php';
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link href="../../css/StyleC.css?<?php echo time(); ?>" rel="stylesheet">
        <link rel="stylesheet" href="../../css/StyleT.css?<?php echo time(); ?>">
        <link rel="shortcut icon" type="image/png" href="../../images/cssPhotos/favicon.png">
        <title>U-Style</title>
        <style>
            body{
                background-image:url("../../images/cssPhotos/background1.jpg");
                background-size:cover;
                background-position: center;
                background-attachment: fixed;
                background-repeat: no-repeat;
      }
        </style>
    </head>
    <body>
        <section class="Form">
            <div id="loginContainer" class="container px-4 py-2 mt-5 border" style=" min-width: 350px;">
                <div class="row">
                    <div class="col">
                        <form action="loginPage.php" method="POST">
                            <div class="form-row" >
                                <div class="col">
                                    <p id="loginHere">Login here</p>
                                    <p class="defaultFont">USERNAME</p>
                                   <?php if (isset($_GET['user'])) {?>
                                    <input name="username" class="form-control textField" value="<?php echo $_GET['user']; ?>" type="text" required>
                                    <?php } else {?>
                                        <input name="username" class="form-control textField" type="text" required>
                                        <?php }?>
                                </div>
                            </div>
                            <div class="form-row" >
                                <div class="col">
                                    <p class="defaultFont">PASSWORD</p>
                                    <input name="password" class="form-control textField" type="password" required>
                                </div>
                            </div>
                            <div class="form-row" >
                                <div class="col pt-lg-4 justify-content-end">
                                    <button id="loginButton" type="submit" class="btn btn-primary custom-btn blueB" name="login_user">Login</button>
                                </div>
                            </div>
                            <div class="form-row" >
                                <div class="col">
                                    <P id="notRegisterdYet">Not registered yet? <br/><a href="registrationPage.php" id="loginPageHyper">Register Here</a> </P>
                                </div>
                            </div>
                            <div class="form-row" >
                                <div class="col">
                                 <?php if (isset($_GET['login'])) {$login = $_GET['login'];if ($login == "wrong") {echo "<p class='error'>Wrong username or password,try Again.</p>";}}?>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                <div class="col text-end    ">
                    <a class=" defaultFont" style="color: #3366ff;" href="loginPage(Admin).php">Administrator login</a>
                </div>
            </div>
            </div>
        </section>
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