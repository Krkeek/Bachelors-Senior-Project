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
        <form  action="registrationPage.php" method="POST" >
            <section class="Form">
                <div class="row">
                    <div class="col-lg-6 ">
                        <div id="registerContainer1" class="container px-4 py-2 mt-5 border" style=" min-width: 350px;">
                            <p class="registerHeader">Personal Information</p>
                            <div class="form-row">
                                <div class="col">
                                <p class="defaultFont">First Name</p>
                                    <?php if (isset($_GET['firstname'])) {?>
                                    <input name="firstname" class="form-control textField" value="<?php echo $_GET['firstname']; ?>"  type="text" maxlength="10"  pattern=".{3,}" placeholder="Yasmin"  required>
                                    <?php } else {?>
                                        <input name="firstname" class="form-control textField"  type="text" maxlength="10"  pattern=".{3,}" placeholder="Yasmin" required>
                                        <?php }?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <p class="defaultFont">Last Name</p>
                                    <?php if (isset($_GET['lastname'])) {?>
                                    <input name="lastname" class="form-control textField" type="text" value="<?php echo $_GET['lastname']; ?>"  maxlength="10"  pattern=".{3,}" placeholder="Rizik" required>
                                    <?php } else {?>
                                        <input name="lastname" class="form-control textField" type="text"  maxlength="10"  pattern=".{3,}" placeholder="Rizik" required>

                                        <?php }?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <p class="defaultFont">Phone Number</p>
                                    <?php if (isset($_GET['phonenumber'])) {?>
                                    <input name="phonenumber" class="form-control textField" type="text" value="<?php echo $_GET['phonenumber']; ?>" maxlength="13"  pattern=".{3,}" placeholder="##-######"  required>
                                    <?php } else {?>
                                        <input name="phonenumber" class="form-control textField" type="text"  maxlength="13"  pattern=".{3,}" placeholder="##-######"  required>

                                        <?php }?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <p class="defaultFont">Email Address</p>
                                    <?php if (isset($_GET['email'])) {?>
                                    <input name="emailaddress" class="form-control textField"  type="text"value="<?php echo $_GET['email']; ?>"  maxlength="40"  pattern=".{3,}" placeholder="mailbox_account@hotmail.com"  required>
                                    <?php } else {?>
                                        <input name="emailaddress" class="form-control textField"  type="text" maxlength="40"  pattern=".{3,}" placeholder="mailbox_account@hotmail.com"  required>

                                        <?php }?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <p class="defaultFont">Address</p>
                                    <?php if (isset($_GET['address'])) {?>
                                    <?php } else {?>
                                        <?php }?>
                                        <select  name="address" class="form-control form-control-sm">
                                        <option value="tyre">Tyre</option>
                                        <option value="bntjbeal">Bint Jbeil</option>
                                        <option value="saida">Saida</option>
                                        <option value="beirut">Beirut</option>
                                        <option value="beirut">Nabatieh</option>
                                        <option value="joneah">Jounieh</option>
                                        <option value="jbeal">Byblos</option>
                                        <option value="tripoli">Tripoli</option>
                                        <option value="akkarr">Akkar</option>
                                        <option value="balbeak">Baalbeck</option>
                                        <option value="bekkaa">Bekaa</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <p class="defaultFont">Address (more info)</p>
                                    <div class="form-group purple-border">
                                    <?php if (isset($_GET['address2'])) {?>
                                        <textarea name="address2" placeholder="Town,Street,Building..."  class="form-control" id="exampleFormControlTextarea4" rows="3"><?php echo $_GET['address2']; ?></textarea>
                                        <?php } else {?>
                                            <textarea name="address2" placeholder="Town,Street,Building..." class="form-control" id="exampleFormControlTextarea4" rows="3"></textarea>
                                            <?php }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div id="registerContainer2" class="container px-4 py-3 mt-5 border" style=" min-width: 350px;">
                            <p class="registerHeader">Sign-in Information</p>
                            <div class="form-row">
                                <div class="col">
                                    <p class="defaultFont">Username</p>
                                    <?php if (isset($_GET['username'])) {?>
                                    <input name="username" value="<?php echo $_GET['username'] ?>" class="form-control textField" type="text" maxlength="10" pattern=".{3,}" required>
                                    <?php } else {?>
                                        <input name="username" class="form-control textField" type="text" maxlength="10" pattern=".{3,}" required>
                                            <?php }?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <p class="defaultFont">Password</p>
                                    <input name="password" class="form-control textField" id="password"  type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" maxlength="20" title="Your password must be at least 6 characters (at least 1 uppercase,1 lowercase,1 number)" required >
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <p class="defaultFont">Confirm Password</p>
                                    <input name="password2" class="form-control textField" type="password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" maxlength="20" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <p id="haveAccount">Already have an account? <br/><a id="registerPageHyper" href="loginPage.php">Login Here</a></p>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                        <?php
if (isset($_GET['passwordError'])) {

    echo "<p class='error'>";
    if ($_GET['passwordError'] == 1) {echo "Password do not much.</br>";}
    ;
    if ($_GET['usernameError'] == 1) {echo "Username already exist.</br>";}
    ;
    if ($_GET['emailError'] == 1) {echo "Email already exist.";}
    ;
    echo "</p>";

}

?>
                                </div>
                            </div>
                            <div class="form-row" >
                                <div class="col pt-lg-4 justify-content-end">
                                    <button type="submit" class="btn btn-primary custom-btn blueB" name="reg_user">Register</button>
                                </div>

                            </div>

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