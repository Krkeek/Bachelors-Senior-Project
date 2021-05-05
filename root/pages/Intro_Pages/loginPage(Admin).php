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
            <div id="loginContainerAdmin" class="container px-4 py-3 mt-5 border" style=" min-width: 350px;">
                <div class="row">
                    <div class="col">
                        <form action="loginPage(Admin).php" method="POST">
                            <div class="form-row" >
                                <div class="col">
                                    <p id="loginHere" style=" font-size: 35px;">Admin Login</p>
                                    <p class="defaultFont">USERNAME</p>
                                    <?php if (isset($_GET['user'])) {?>
                                    <input name="user" class="form-control textField" type="text" value="<?php echo $_GET['user']; ?>" required>
                                    <?php } else {?>
                                        <input name="user" class="form-control textField" type="text" required>
                                        <?php }?>
                                </div>
                            </div>
                            <div class="form-row" >
                                <div class="col">
                                    <p class="defaultFont">PASSWORD</p>
                                    <input name="pass" class="form-control textField" type="password" required>
                                </div>
                            </div>
                            <div class="form-row" >
                                <div class="col pt-lg-4">
                                    <button type="submit" class="btn btn-primary custom-btn blueB" name="login_admin">Login</button>
                                </div>
                            </div>
                            <div class="form-row" >
                                <div class="col">
                                  <?php if (isset($_GET['login'])) {$login = $_GET['login'];if ($login == "wrong") {echo "</br><p class='error'>Wrong username or password,try Again.</p>";}}?>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                <div class="col text-end    ">
                    <a class=" defaultFont" style="color: #3366ff;" href="loginPage.php">Customer login</a>
                </div>
            </div>
            </div>
        </section>
    </form>
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