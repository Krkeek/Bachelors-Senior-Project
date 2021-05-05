<!DOCTYPE html>

<?php
include '..\..\dataManagment\connection.php';
include '..\..\dataManagment\server.php';
$user = $_SESSION['username'];
$query = "SELECT * FROM `admin` WHERE username='$user'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_row($result);
$fname = $row[0];
$lname = $row[1];
$phone = $row[2];
$email = $row[3];

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="../../css/StyleA.css?<?php echo time(); ?>" rel="stylesheet">
    <link rel="stylesheet" href="../../css/StyleT.css?<?php echo time(); ?>">
    <link rel="shortcut icon" type="image/png" href="../../images/cssPhotos/favicon.png">
    <title>U-Style</title>
</head>

<body onload="pendingOrders()">
    <nav class="navbar navbar-expand-sm navbar-dark sticky-top" style="background-color: black;">
        <a class="navbar-brand" href="#">
            <img width="40px" src="../../images/cssPhotos/Logo2.png" alt="Logo">
        </a>
        <a href="#pendingOrders" class="navbar-brand Font" style=" color: #3366ff;">Welcome <?php echo $fname; ?></a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav Font">
                <li class="nav-item"><a href="#tab1" class="nav-link">Tab1</a></li>
                <li class="nav-item"><a href="#accountSettings" class="nav-link">Account Settings</a></li>
                <li class="nav-item"><a href="#about" class="nav-link">About</a></li>

            </ul>
            <ul class="navbar-nav ml-auto">

                <li>


                    <a href="../Intro_Pages/loginPage(Admin).php" class="btn btn-primary custom-btn blueB">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"></path>
                            <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"></path>
                        </svg>
                        <span class="Font">Log-out</span>
                    </a>
                </li>
            </ul>

        </div>
    </nav>
    <section id="tab1" class="section">


    </section>



    <section id="accountSettings" class="section">


        <form action="subadminPage.php#accountSettings" method="POST">
            <section class="Form">
                <div class="row">
                    <div class="col-lg-4 ">
                        <div id="registerContainer1" class="container px-4 py-2 mt-5" style=" min-width: 350px;">
                            <p class="registerHeader">Personal Information</p>
                            <div class="form-row">
                                <div class="col">
                                    <p class="defaultFont">First Name</p>
                                    <input name="firstname" class="form-control textField" type="text" maxlength="10" pattern=".{3,}" value="<?php echo $fname; ?>" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <p class="defaultFont">Last Name</p>
                                    <input name="lastname" class="form-control textField" type="text" maxlength="10" pattern=".{3,}" value="<?php echo $lname; ?>" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <p class="defaultFont">Phone Number</p>
                                    <input name="phonenumber" class="form-control textField" type="text" maxlength="13" pattern=".{3,}" value="<?php echo $phone; ?>" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <p class="defaultFont">Email Address</p>
                                    <input name="emailaddress" class="form-control textField" type="text" maxlength="40" pattern=".{3,}" value="<?php echo $email; ?>" required>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div id="registerContainer2" class="container px-4 py-3 mt-5" style=" min-width: 350px;">

                            <div class="form-row">
                                <div class="col py-5">
                                    <p class="defaultFont">Username: <span style=" color: #3366ff; font-weight:  bolder;"><?php echo $user; ?> </span></p>

                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col pb-5">
                                    <a href="#" style=" text-decoration: none;" class="btn btn-primary custom-btn blueB" data-toggle="modal" data-target="#savechangesModal">Save Changes</a>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col pb-5">
                                    <a href="#" style=" text-decoration: none;" class="btn btn-primary custom-btn blueB" data-toggle="modal" data-target="#changepasswordModal">Change Password</a>
                                </div>
                            </div>
                            <div class="form-row">
                                <div id="errorBox2" onmouseover="clearError(this.id)" class="col pb-5">
                                    <?php if (isset($_GET['change'])) {
                                        if ($_GET['change'] == "wrong") {
                                            echo "<p  class='error'>Wrong Password,try Again.<p>";
                                        }
                                    } ?>
                                    <?php if (isset($_GET['change'])) {
                                        if ($_GET['change'] == "correct") {
                                            echo "<p  class='success'>Changes Saved.<p>";
                                        }
                                    } ?>
                                    <?php if (isset($_GET['change'])) {
                                        if ($_GET['change'] == "passnoMatch") {
                                            echo "<p  class='error'>Passwords don't match.<p>";
                                        }
                                    } ?>


                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 pt-5 logoBack">

                        <img width="500px" src="../../images/cssPhotos/Logo.png" alt="Logo">


                    </div>
                </div>
            </section>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="modal fade " id="savechangesModal">
                            <div class="modal-dialog  ">
                                <div class="modal-content border border-primary">
                                    <div class="modal-header">
                                        <h5>Please confirm your password to save your changes</h5>
                                    </div>
                                    <div class="modal-body">

                                        <span style=" font-weight: bolder; color: #3366ff;">Password: </span><input name="password" class="c1" type="password" maxlength="20" required>

                                    </div>
                                    <div class="modal-footer">
                                        <button name="saveAdmin" class="btn btn-primary custom-btn blueB" type="submit">Confirm</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </section>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="modal fade " id="savechangesModal">
                    <div class="modal-dialog  ">
                        <div class="modal-content border border-primary">
                            <div class="modal-header">
                                <h5>Please confirm your password to save your changes</h5>
                            </div>
                            <div class="modal-body">

                                <span style=" font-weight: bolder; color: #3366ff;">Password: </span><input name="password" class="c1" type="password" maxlength="20" required>

                            </div>
                            <div class="modal-footer">
                                <button name="saveAdmin" class="defaultButton0 defaultButton1" type="submit">Confirm</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    <div class="container">

        <div class="row">
            <div class="col">
                <form action="subadminPage.php" method="POST">


                    <div class="modal fade " id="changepasswordModal">
                        <div class="modal-dialog  ">
                            <div class="modal-content border border-primary">
                                <div class="modal-header">
                                    <h5>Please confirm your password to save your changes</h5>
                                </div>
                                <div class="modal-body">

                                    <div class="container px-4 py-2 mt-5" style=" min-width: 350px;">
                                        <div class="row">
                                            <div class="col">

                                                <div class="form-row">
                                                    <div class="col">

                                                        <span style=" font-weight: bolder; color: #3366ff;">Current password: <input name="currentPassword" class="form-control textField" type="password" required></span>
                                                    </div>

                                                </div>
                                                <div class="form-row">
                                                    <div class="col">

                                                        <span style=" font-weight: bolder; color: #3366ff;">New password: <input name="newPassword" class="form-control textField" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" maxlength="20" title="Your password must be at least 6 characters (at least 1 uppercase,1 lowercase,1 number)" required></span>
                                                    </div>

                                                </div>
                                                <div class="form-row">

                                                    <div class="col">

                                                        <span style=" font-weight: bolder; color: #3366ff;">Confirm password: <input name="cnewPassword" class="form-control textField" type="password" required></span>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button name="changePassAdmin" class="defaultButton0 defaultButton1" type="submit">Change Password</button>
                                </div>

                            </div>

                        </div>

                    </div>
                </form>
            </div>

        </div>

    </div>




    <footer class="bg text-center text-white" id="about" style=" background-color:black;">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
            <!-- Section: Social media -->
            <section class="mb-4">
                <!-- Facebook -->
                <a target="_blank" class="btn btn-primary btn-floating m-1" href="https://www.facebook.com" style=" background-color: black;border: none;" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                    </svg></a>

                <!-- Twitter -->
                <a target="_blank" class="btn btn-primary btn-floating m-1" style="background-color: black; border: none;" href="https://www.twitter.com" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                        <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                    </svg></a>
                <!-- Linkedin -->

                <a target="_blank" class="btn btn-primary btn-floating m-1" style="background-color: black; border: none;" href="https://www.linkedin.com" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                        <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z" />
                    </svg></a>

                <!-- Instagram -->
                <a target="_blank" class="btn btn-primary btn-floating m-1" style="background-color: black; border: none;" href="https://www.instagram.com" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                    </svg></a>

                <!-- Google -->
                <a target="_blank" class="btn btn-primary btn-floating m-1" style="background-color: black; border: none;" href="https://www.google.com" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                        <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z" />
                    </svg></a>
                <!-- Github -->
                <a target="_blank" class="btn btn-primary btn-floating m-1" style="background-color: black; border: none;" href="https://www.github.com" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                        <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z" />
                    </svg></a>
            </section>
            <!-- Section: Social media -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: #3366ff;">
            © 2021 Copyright:
            <a class="text-white" href="#">U-Style.com</a>
        </div>
        <!-- Copyright -->
    </footer>


    <!-- Local javaScript -->
    <script src="../../scripts/jScriptA.js?<?php echo time(); ?>"></script>
    <script src="../../scripts/jScriptT.js?<?php echo time(); ?>"></script>
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