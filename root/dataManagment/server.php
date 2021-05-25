
<?php
include 'connection.php';
session_start();

$encrypt = "secured";

// REGISTER USER
if (isset($_POST['reg_user'])) {

    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $phonenumber = mysqli_real_escape_string($con, $_POST['phonenumber']);
    $email = mysqli_real_escape_string($con, $_POST['emailaddress']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $address2 = mysqli_real_escape_string($con, $_POST['address2']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $password2 = mysqli_real_escape_string($con, $_POST['password2']);
    $passwordError = 0;
    $usernameError = 0;
    $emailError = 0;

    if ($password != $password2) {
        $passwordError = 1;
    }

    $user_check_query = "SELECT * FROM customer WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($con, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        if ($user['username'] === $username) {
            $usernameError = 1;
        }

        if ($user['email'] === $email) {
            $emailError = 1;
        }
    }

    if ($passwordError == 0 && $usernameError == 0 && $emailError == 0) {

        $password = md5($password . $encrypt);

        $query = "INSERT INTO `customer`(`firstname`, `lastname`, `phone`, `email`, `city`, `address`, `username`, `password`, `active`) VALUES('$firstname','$lastname','$phonenumber','$email','$address','$address2','$username','$password','Yes')";
        mysqli_query($con, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "Your account is registered successfully";
        header('location: loginPage.php');
    } else {
        header("location: registrationPage.php?passwordError=$passwordError&usernameError=$usernameError&emailError=$emailError&firstname=$firstname&lastname=$lastname&phonenumber=$phonenumber&email=$email&address=$address&address2=$address2&username=$username");
    }
}
//LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $password = md5($password . $encrypt);
    $query = "SELECT * FROM customer WHERE username='$username' AND password='$password' AND active='No'";
    $results = mysqli_query($con, $query);
    if (mysqli_num_rows($results) == 1) {
    } else {
        $query = "SELECT * FROM customer WHERE username='$username' AND password='$password'";
        $results = mysqli_query($con, $query);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['p'] = $password;
            $_SESSION['loggedin'] = "You are logged in successfully ";
            header('location: ../C_Pages/mainWebpage.php#design');
        } else {
            header("location: loginPage.php?login=wrong&user=$username");
        }
    }
}
//LOGIN ADMIN
if (isset($_POST['login_admin'])) {
    $username = mysqli_real_escape_string($con, $_POST['user']);
    $password = mysqli_real_escape_string($con, $_POST['pass']);

    $password = md5($password . $encrypt);
    $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $results = mysqli_query($con, $query);
    if (mysqli_num_rows($results) == 1) {

        $_SESSION['loggedin'] = "You are logged in successfully ";
        $_SESSION['username'] = $username;
        $getAttribute = mysqli_fetch_assoc($results);
        $position = $getAttribute["position"];
        $_SESSION['position'] = $position;
        switch ($position) {
            case "main_admin":
                header('location: ../A_Pages/mainAdminPage.php#accountsManagment');
                break;
            case "Subadmin":
                header('location: ../A_Pages/subadminPage.php#pendingOrders');
                break;
            case "Supervisor":
                header('location: ../A_Pages/supervisorPage.php#logs');
                break;
            case "Delivery":
                header('location: ../A_Pages/deliveryPage.php');
                break;
            case "Manufacture":
                header('location: ../A_Pages/manufacturePage.php');
                break;
        }
    } else {
        header("location: loginPage(Admin).php?login=wrong&user=$username");
    }
}
//SAVE CHANGES
if (isset($_POST['save'])) {
    $user = $_SESSION['username'];
    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $phonenumber = mysqli_real_escape_string($con, $_POST['phonenumber']);
    $email = mysqli_real_escape_string($con, $_POST['emailaddress']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $address2 = mysqli_real_escape_string($con, $_POST['address2']);

    $password = mysqli_real_escape_string($con, $_POST['password']);
    $passwordEncrypt = md5($password . $encrypt);

    $query = "SELECT * FROM customer WHERE username='$user' AND password='$passwordEncrypt'";
    $results = mysqli_query($con, $query);
    if (mysqli_num_rows($results) == 1) {
        $query2 = "UPDATE `customer` SET `firstname`='$firstname',`lastname`='$lastname',`phone`='$phonenumber',`email`='$email',`city`='$address',`address`='$address2' WHERE `username`='$user'";
        mysqli_query($con, $query2);
        $_SESSION['loggedin'] = "Changes saved";
        header("location: ../C_Pages/mainWebPage.php?change=correct");
    } else {
        header("location: ../C_Pages/mainWebPage.php?change=wrong");
    }
}

//CHANGE PASSWORD
if (isset($_POST['changePass'])) {
    $user = $_SESSION['username'];

    $newPassword = mysqli_real_escape_string($con, $_POST['newPassword']);
    $cnewPassword = mysqli_real_escape_string($con, $_POST['cnewPassword']);
    $currentPassword = mysqli_real_escape_string($con, $_POST['currentPassword']);
    $passwordEncrypt = md5($currentPassword . $encrypt);
    $newpasswordEncrypt = md5($newPassword . $encrypt);

    $query = "SELECT * FROM customer WHERE username='$user' AND password='$passwordEncrypt'";
    $results = mysqli_query($con, $query);
    if (mysqli_num_rows($results) == 1 && $newPassword == $cnewPassword) {
        $query2 = "UPDATE `customer` SET `password`='$newpasswordEncrypt' WHERE `username`='$user'";
        mysqli_query($con, $query2);
        $_SESSION['loggedin'] = "Changes saved";
        header("location: ../C_Pages/mainWebpage.php?change=correct");
    } else {
        if (mysqli_num_rows($results) != 1) {
            header("location: ../C_Pages/mainWebpage.php?change=wrong");
            exit();
        }
        if ($newPassword != $cnewPassword) {
            header("location: ../C_Pages/mainWebpage.php?change=passnoMatch");
        }
    }
}
//DEACTIVATE ACCOUNT
if (isset($_POST['deactivate'])) {
    $user = $_SESSION['username'];

    $Password = mysqli_real_escape_string($con, $_POST['password']);
    $passwordEncrypt = md5($Password . $encrypt);

    $query = "SELECT * FROM customer WHERE username='$user' AND password='$passwordEncrypt'";
    $results = mysqli_query($con, $query);
    if (mysqli_num_rows($results) == 1) {
        $query2 = "UPDATE `customer` SET `active`='No' WHERE `username`='$user'";
        mysqli_query($con, $query2);
        header('location: ../C_Pages/deactivatePage.php');
    } else {

        header("location: ../C_Pages/mainWebpage.php?change=wrong");
    }
}

//SAVE CHANGES (ADMIN)
if (isset($_POST['saveAdmin'])) {
    $user = $_SESSION['username'];
    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $phonenumber = mysqli_real_escape_string($con, $_POST['phonenumber']);
    $email = mysqli_real_escape_string($con, $_POST['emailaddress']);

    $password = mysqli_real_escape_string($con, $_POST['password']);
    $passwordEncrypt = md5($password . $encrypt);

    $query = "SELECT * FROM `admin` WHERE username='$user' AND password='$passwordEncrypt'";
    $results = mysqli_query($con, $query);
    if (mysqli_num_rows($results) == 1) {
        $query2 = "UPDATE `admin` SET `firstname`='$firstname',`lastname`='$lastname',`phone`='$phonenumber',`email`='$email' WHERE `username`='$user'";
        mysqli_query($con, $query2);
        $_SESSION['loggedin'] = "Changes saved";
        $position = $_SESSION['position'];

        switch ($position) {
            case "main_admin":
                header("location: ../A_Pages/mainAdminPage.php?change=correct");
                break;
            case "Subadmin":
                header('location: ../A_Pages/subadminPage.php?change=correct');
                break;
            case "Supervisor":
                header('location: ../A_Pages/supervisorPage.php?change=correct');
                break;
            case "Delivery":
                header('location: ../A_Pages/deliveryPage.php?change=correct');
                break;
            case "Manufacture":
                header('location: ../A_Pages/manufacturePage.php?change=correct');
                break;
        }
    } else {
        $position = $_SESSION['position'];

        switch ($position) {
            case "main_admin":
                header("location: ../A_Pages/mainAdminPage.php?change=wrong");
                break;
            case "Subadmin":
                header('location: ../A_Pages/subadminPage.php?change=wrong');
                break;
            case "Supervisor":
                header('location: ../A_Pages/supervisorPage.php?change=wrong');
                break;
            case "Delivery":
                header('location: ../A_Pages/deliveryPage.php?change=wrong');
                break;
            case "Manufacture":
                header('location: ../A_Pages/manufacturePage.php?change=wrong');
                break;
        }
    }
}

//CHANGE PASSWORD (ADMIN)
if (isset($_POST['changePassAdmin'])) {
    $user = $_SESSION['username'];

    $newPassword = mysqli_real_escape_string($con, $_POST['newPassword']);
    $cnewPassword = mysqli_real_escape_string($con, $_POST['cnewPassword']);
    $currentPassword = mysqli_real_escape_string($con, $_POST['currentPassword']);
    $passwordEncrypt = md5($currentPassword . $encrypt);
    $newpasswordEncrypt = md5($newPassword . $encrypt);
    $position = $_SESSION['position'];
    $query = "SELECT * FROM `admin` WHERE username='$user' AND password='$passwordEncrypt'";
    $results = mysqli_query($con, $query);
    if (mysqli_num_rows($results) == 1 && $newPassword == $cnewPassword) {
        $query2 = "UPDATE `admin` SET `password`='$newpasswordEncrypt' WHERE `username`='$user'";
        mysqli_query($con, $query2);
        $_SESSION['loggedin'] = "Changes saved";
        switch ($position) {
            case "main_admin":
                header("location: ../A_Pages/mainAdminPage.php?change=correct#accountSettings");
                break;
            case "Subadmin":
                header('location: ../A_Pages/subadminPage.php?change=correct#accountSettings');
                break;
            case "Supervisor":
                header('location: ../A_Pages/supervisorPage.php?change=correct#accountSettings');
                break;
            case "Delivery":
                header('location: ../A_Pages/deliveryPage.php?change=correct#accountSettings');
                break;
            case "Manufacture":
                header('location: ../A_Pages/manufacturePage.php?change=correct#accountSettings');
                break;
        }
    } else {
        if (mysqli_num_rows($results) != 1) {

            switch ($position) {
                case "main_admin":
                    header("location: ../A_Pages/mainAdminPage.php?change=wrong#accountSettings");
                    break;
                case "Subadmin":
                    header('location: ../A_Pages/subadminPage.php?change=wrong#accountSettings');
                    break;
                case "Supervisor":
                    header('location: ../A_Pages/supervisorPage.php?change=wrong#accountSettings');
                    break;
                case "Delivery":
                    header('location: ../A_Pages/deliveryPage.php?change=wrong#accountSettings');
                    break;
                case "Manufacture":
                    header('location: ../A_Pages/manufacturePage.php?change=wrong#accountSettings');
                    break;
            }
            exit();
        }
        if ($newPassword != $cnewPassword) {

            switch ($position) {
                case "main_admin":
                    header("location: ../A_Pages/mainAdminPage.php?change=passnoMatch#accountSettings");
                    break;
                case "Subadmin":
                    header('location: ../A_Pages/subadminPage.php?change=passnoMatch#accountSettings');
                    break;
                case "Supervisor":
                    header('location: ../A_Pages/supervisorPage.php?change=passnoMatch#accountSettings');
                    break;
                case "Delivery":
                    header('location: ../A_Pages/deliveryPage.php?change=passnoMatch#accountSettings');
                    break;
                case "Manufacture":
                    header('location: ../A_Pages/manufacturePage.php?change=passnoMatch#accountSettings');
                    break;
            }
        }
    }
}

// REGISTER ADMIN
if (isset($_POST['reg_admin'])) {

    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $phonenumber = mysqli_real_escape_string($con, $_POST['phonenumber']);
    $email = mysqli_real_escape_string($con, $_POST['emailaddress']);
    $position = mysqli_real_escape_string($con, $_POST['position']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $password2 = mysqli_real_escape_string($con, $_POST['password2']);
    $passwordError = 0;
    $usernameError = 0;
    $emailError = 0;

    if ($password != $password2) {
        $passwordError = 1;
    }

    $user_check_query = "SELECT * FROM `admin` WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($con, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        if ($user['username'] === $username) {
            $usernameError = 1;
        }

        if ($user['email'] === $email) {
            $emailError = 1;
        }
    }

    if ($passwordError == 0 && $usernameError == 0 && $emailError == 0) {

        $password = md5($password . $encrypt);

        $query = "INSERT INTO `admin`(`firstname`, `lastname`, `phone`, `email`, `username`, `password`,`position`, `active`) VALUES('$firstname','$lastname','$phonenumber','$email','$username','$password','$position','Yes')";
        mysqli_query($con, $query);
        $_SESSION['username'] = $username;
        header('location: ../A_Pages/mainAdminPage.php?change=accountAdded');
    } else {
        header("location: ../A_Pages/mainAdminPage.php?passwordError=$passwordError&usernameError=$usernameError&emailError=$emailError&firstname=$firstname&lastname=$lastname&phonenumber=$phonenumber&email=$email&username=$username");
    }
}

//APPROVE ORDER
if (isset($_POST['approveOrder']) == "approveOrder") {
    $u = $_POST['u'];
    $username =  $_SESSION['username'];
    $query = "UPDATE `ordertable` SET `manufacture_status`='Approved' WHERE `order_id`='$u';";
    mysqli_query($con, $query);

    $query2 = "INSERT INTO `logs`(`username`, `date_of_edit`, `order_id`, `action`) VALUES ('$username',CURRENT_TIMESTAMP,'$u','Approved an Order');";
    mysqli_query($con, $query2);
}

//REJECT ORDER
if (isset($_POST['rejectOrder']) == "rejectOrder") {
    $u = $_POST['u'];
    $username =  $_SESSION['username'];
    $query = "UPDATE `ordertable` SET `manufacture_status`='Rejected' WHERE `order_id`='$u';";
    mysqli_query($con, $query);
    $query2 = "INSERT INTO `logs`(`username`, `date_of_edit`, `order_id`, `action`) VALUES ('$username',CURRENT_TIMESTAMP,'$u','Rejected an Order');";
    mysqli_query($con, $query2);
}

//ADD TO CART
if (isset($_POST['cartItemInsertion']) == "cartItemInsertion") {

    $obj = json_decode($_POST['Shirt'], true);
    $type = $obj[0]['type'];
    $color = $obj[0]['color'];
    $size = $obj[0]['size'];
    $pocketSticker = $obj[0]['pocketSticker'];
    $frontSticker = $obj[0]['frontSticker'];
    $backSticker = $obj[0]['backSticker'];
    $price = $obj[0]['price'];

    $user = $_SESSION['username'];
    $query = "INSERT INTO `product`(`username`, `type`, `size`, `color`, `pocket_sticker`, `front_sticker`, `back_sticker`, `price`, `ordered` ,`returns`) VALUES ('$user','$type','$size','$color','$pocketSticker','$frontSticker','$backSticker','$price','No','New');";
    mysqli_query($con, $query);
}

//DELETE PRODUCT FROM CART
if (isset($_POST['deletedProduct']) == "deletedProduct") {
    $ids = $_POST['id'];
    $query = "DELETE FROM `product` WHERE `product_id` = '$ids'";
    mysqli_query($con, $query);
}

//GET STICKERS FROM DATABASE
if (isset($_GET['dataRetrieve']) == "dataRetrieve") {

    $result1 = mysqli_query($con, "SELECT `img_path` FROM `stickers` WHERE `type`='Logos';");
    $data1 = array();
    while ($row1 = mysqli_fetch_assoc($result1)) {
        $data1[] = $row1;
    }

    $result2 = mysqli_query($con, "SELECT `img_path` FROM `stickers` WHERE `type`='Sports';");
    $data2 = array();
    while ($row2 = mysqli_fetch_assoc($result2)) {
        $data2[] = $row2;
    }

    $result3 = mysqli_query($con, "SELECT `img_path` FROM `stickers` WHERE `type`='Symbols';");
    $data3 = array();
    while ($row3 = mysqli_fetch_assoc($result3)) {
        $data3[] = $row3;
    }

    $result4 = mysqli_query($con, "SELECT `img_path` FROM `stickers` WHERE `type`='Birthdays';");
    $data4 = array();
    while ($row4 = mysqli_fetch_assoc($result4)) {
        $data4[] = $row4;
    }

    $result5 = mysqli_query($con, "SELECT `img_path` FROM `stickers` WHERE `type`='Qoutes';");
    $data5 = array();
    while ($row5 = mysqli_fetch_assoc($result5)) {
        $data5[] = $row5;
    }

    $result6 = mysqli_query($con, "SELECT `img_path` FROM `stickers` WHERE `type`='Lebanese';");
    $data6 = array();
    while ($row6 = mysqli_fetch_assoc($result6)) {
        $data6[] = $row6;
    }

    $result7 = mysqli_query($con, "SELECT `img_path` FROM `stickers` WHERE `type`='Emojis';");
    $data7 = array();
    while ($row7 = mysqli_fetch_assoc($result7)) {
        $data7[] = $row7;
    }

    $result8 = mysqli_query($con, "SELECT `img_path` FROM `stickers` WHERE `type`='Graduation';");
    $data8 = array();
    while ($row8 = mysqli_fetch_assoc($result8)) {
        $data8[] = $row8;
    }

    $result9 = mysqli_query($con, "SELECT `img_path` FROM `stickers` WHERE `type`='Corona';");
    $data9 = array();
    while ($row9 = mysqli_fetch_assoc($result9)) {
        $data9[] = $row9;
    }

    $result10 = mysqli_query($con, "SELECT `img_path` FROM `stickers` WHERE `type`='Food';");
    $data10 = array();
    while ($row10 = mysqli_fetch_assoc($result10)) {
        $data10[] = $row10;
    }

    $result11 = mysqli_query($con, "SELECT `img_path` FROM `stickers` WHERE `type`='Cars';");
    $data11 = array();
    while ($row11 = mysqli_fetch_assoc($result11)) {
        $data11[] = $row11;
    }
    $result12 = mysqli_query($con, "SELECT `img_path` FROM `stickers` WHERE `type`='Internet';");
    $data12 = array();
    while ($row12 = mysqli_fetch_assoc($result12)) {
        $data12[] = $row12;
    }

    $Stickers = new stdClass();
    $Stickers->Logos = $data1;
    $Stickers->Sports = $data2;
    $Stickers->Symbols = $data3;
    $Stickers->Birthdays = $data4;
    $Stickers->Qoutes = $data5;
    $Stickers->Lebanese = $data6;
    $Stickers->Emojis = $data7;
    $Stickers->Graduation = $data8;
    $Stickers->Corona = $data9;
    $Stickers->Food = $data10;
    $Stickers->Cars = $data11;
    $Stickers->Internet = $data12;

    echo json_encode($Stickers);
}

//FILL THE CART
if (isset($_GET['cartRetrieve']) == "cartRetrieve") {
    $user = $_SESSION['username'];
    $result1 = mysqli_query($con, "SELECT `product_id`, `type`, `size`, `color`, `pocket_sticker`, `front_sticker`, `back_sticker`, `price` FROM `product` WHERE `username`='$user' && ordered = 'No'");
    $data1 = array();
    while ($row1 = mysqli_fetch_assoc($result1)) {
        $data1[] = $row1;
    }

    $cartOrders = new stdClass();
    $cartOrders->cartOrder = $data1;
    echo json_encode($cartOrders);
}

//Show the items of the product
if (isset($_POST['orderTheProducts']) == "orderTheProducts") {

    $user = $_SESSION['username'];
    $price = $_POST['price'];

    $query = "UPDATE `product` SET `ordered`= 'Pending' WHERE `username`='$user' &&`ordered`='No'";
    mysqli_query($con, $query);

    $query2 = "INSERT INTO `ordertable`(`username`, `date_of_order`, `total_cost`, `delivery_status`, `manufacture_status`, `deleted`) VALUES ('$user',CURRENT_TIMESTAMP,'$price','Waiting...','Waiting Approval...','No')";
    mysqli_query($con, $query2);
    $id = mysqli_insert_id($con);

    $query3 = "SELECT `product_id` FROM `product` WHERE `username` = '$user' &&`ordered`='Pending'";
    $result3 = mysqli_query($con, $query3);

    while ($row3 = mysqli_fetch_assoc($result3)) {

        $x = $row3['product_id'];

        $query4 = "INSERT INTO `orderproducts`(`order_id`, `product_id`) VALUES ('$id','$x');";
        mysqli_query($con, $query4);

        $query5 = "UPDATE `product` SET `ordered`= 'Ordered' WHERE `username`='$user' &&`product_id`='$x'";
        mysqli_query($con, $query5);
    }
}

//Show all orders in the orderTab
if (isset($_GET['orderRetrieve']) == "orderRetrieve") {

    $user = $_SESSION['username'];
    $result1 = mysqli_query($con, "SELECT `order_id`,`date_of_order`, `total_cost`, `delivery_status`, `manufacture_status` FROM `ordertable` WHERE `username` = '$user' && `deleted` = 'No'");
    $data1 = array();
    while ($row1 = mysqli_fetch_assoc($result1)) {
        $data1[] = $row1;
    }

    $Orders = new stdClass();
    $Orders->Order = $data1;
    echo json_encode($Orders);
}

//Show the ordered Items
if (isset($_GET['showOrderItems']) == "showOrderItems") {
    $items = new stdClass();
    require_once 'connection.php';
    $user = $_SESSION['username'];
    $id = $_GET['id'];

    $result1 = mysqli_query($con, "SELECT * FROM `product` INNER JOIN orderproducts ON product.product_id = orderproducts.product_id WHERE order_id = '$id';");
    $data1 = array();
    while ($row1 = mysqli_fetch_assoc($result1)) {
        $data1[] = $row1;
    }
    $items->item = $data1;
    echo json_encode($items);
}

//Get all admins
if (isset($_GET['adminRetrieve']) == "adminRetrieve") {

    $user = $_SESSION['username'];
    $result1 = mysqli_query($con, "SELECT `firstname`, `lastname`, `phone`, `email`,`username`, `position`, `active` FROM `admin` WHERE `active` = 'Yes';");
    $data1 = array();
    while ($row1 = mysqli_fetch_assoc($result1)) {
        $data1[] = $row1;
    }

    $Admins = new stdClass();
    $Admins->Admin = $data1;
    echo json_encode($Admins);
}

//Delete Admin
if (isset($_POST['deletedAdmin']) == "deletedAdmin") {
    $username = $_POST['username'];

    $query = "UPDATE `admin` SET `active`='No' WHERE `username`='$username'";
    mysqli_query($con, $query);
}

//Change Position
if (isset($_POST['changePosition']) == "changePosition") {
    $u = $_POST['u'];
    $position = $_POST['position'];
    $query = "UPDATE `admin` SET `position`='$position' WHERE `username`='$u' && `active` = 'Yes';";
    mysqli_query($con, $query);
}

//Get the pending orders
if (isset($_GET['pendingOrdersRetrieve']) == "pendingOrdersRetrieve") {
    $result1 = mysqli_query($con, "SELECT `order_id`,`date_of_order`, `total_cost`,`username` FROM `ordertable` WHERE `manufacture_status` = 'Waiting Approval...' && `deleted` = 'No'");
    $data1 = array();
    while ($row1 = mysqli_fetch_assoc($result1)) {
        $data1[] = $row1;
    }

    $result2 = mysqli_query($con, "SELECT COUNT(*) FROM ordertable WHERE `delivery_status` <> 'Delivered' && `manufacture_status` <> 'Waiting Approval...' AND  `manufacture_status` <> 'Rejected' ");
    $data2 = array();
    while ($row2 = mysqli_fetch_assoc($result2)) {
        $data2[] = $row2;
    }

    $result3 = mysqli_query($con, "SELECT COUNT(*) FROM ordertable INNER JOIN orderproducts ON ordertable.order_id = orderproducts.order_id WHERE ordertable.delivery_status <> 'Delivered'  && `manufacture_status` <> 'Waiting Approval...' AND  `manufacture_status` <> 'Rejected' ");
    $data3 = array();
    while ($row3 = mysqli_fetch_assoc($result3)) {
        $data3[] = $row3;
    }

    $Orders = new stdClass();
    $Orders->Order = $data1;
    $Orders->CountO = $data2;
    $Orders->CountP = $data3;

    echo json_encode($Orders);
}

//Get the approved orders
if (isset($_GET['pendingOrdersRequests']) == "pendingOrdersRequests") {
    $result1 = mysqli_query($con, "SELECT `order_id`,`date_of_order`, `total_cost`,`username`,`manufacture_status` FROM `ordertable` WHERE (`manufacture_status` = 'Approved' && `deleted` = 'No') OR (`manufacture_status` = 'Manufacturing...' && `deleted` = 'No')");
    $data1 = array();
    while ($row1 = mysqli_fetch_assoc($result1)) {
        $data1[] = $row1;
    }

    $OrdersRequests = new stdClass();
    $OrdersRequests->OrderRequest = $data1;

    echo json_encode($OrdersRequests);
}

//Show the ordered Items
if (isset($_GET['showOrderItemsRequests']) == "showOrderItemsRequests") {
    $items = new stdClass();
    require_once 'connection.php';
    $user = $_SESSION['username'];
    $id = $_GET['id'];

    $result1 = mysqli_query($con, "SELECT * FROM `product` INNER JOIN orderproducts ON product.product_id = orderproducts.product_id WHERE order_id = '$id';");
    $data1 = array();
    while ($row1 = mysqli_fetch_assoc($result1)) {
        $data1[] = $row1;
    }
    $items->item = $data1;
    echo json_encode($items);
}

//Start factory
if (isset($_POST['startFactory']) == "startFactory") {
    $u = $_POST['u'];
    $query = "UPDATE `ordertable` SET `manufacture_status`='Manufacturing...' WHERE `order_id`='$u';";
    mysqli_query($con, $query);
    $username =  $_SESSION['username'];
    $query2 = "INSERT INTO `logs`(`username`, `date_of_edit`, `order_id`, `action`) VALUES ('$username',CURRENT_TIMESTAMP,'$u','Started Manufacturing');";
    mysqli_query($con, $query2);
}

//Finish factory
if (isset($_POST['finishFactory']) == "finishFactory") {
    $u = $_POST['u'];
    $query = "UPDATE `ordertable` SET `manufacture_status`='Ready' WHERE `order_id`='$u';";
    mysqli_query($con, $query);
    $username =  $_SESSION['username'];
    $query2 = "INSERT INTO `logs`(`username`, `date_of_edit`, `order_id`, `action`) VALUES ('$username',CURRENT_TIMESTAMP,'$u','Finished Manufacturing');";
    mysqli_query($con, $query2);
}

//Show All Orders
if (isset($_GET['showAllOrders']) == "showAllOrders") {
    $items = new stdClass();
    require_once 'connection.php';

    $result1 = mysqli_query($con, "SELECT * FROM `product` INNER JOIN orderproducts ON product.product_id = orderproducts.product_id JOIN ordertable ON ordertable.order_id = orderproducts.order_id WHERE `manufacture_status` = 'manufacturing...'");
    $data1 = array();
    while ($row1 = mysqli_fetch_assoc($result1)) {
        $data1[] = $row1;
    }
    $items->item = $data1;
    echo json_encode($items);
}

//Show all completed orders in the manufacture account
if (isset($_GET['completedOrdersForDelivery']) == "completedOrdersForDelivery") {
    $ordersReady = new stdClass();
    require_once 'connection.php';


    $result1 = mysqli_query($con, "SELECT `city` FROM `ordertable` INNER JOIN customer ON customer.username = ordertable.username WHERE `manufacture_status`= 'Ready';");
    $num = mysqli_num_rows($result);
    if ($num != 0) {
        while ($row1 = mysqli_fetch_assoc($result1)) {
            $data1[] = $row1;
        }
        $ordersReady->orderReady = $data1;
    } else {

        $ordersReady->orderReady = "Empty";
    }



    echo json_encode($ordersReady);
}



if (isset($_GET['startDelivery']) == "startDelivery") {
    $choosenLocation = $_GET['chosenLocation'];
    require_once 'connection.php';

    $username =  $_SESSION['username'];
    $query2 = "SELECT `order_id` FROM `ordertable` INNER JOIN customer ON customer.username = ordertable.username WHERE `manufacture_status`= 'Ready' && `delivery_status`='Waiting...' && `city`='Tyre';";
    $result2 = mysqli_query($con, $query2);
    while ($row1 = mysqli_fetch_array($result2)) {
        $x = $row1[0];
        $query0 = "INSERT INTO `logs`(`username`, `date_of_edit`, `order_id`, `action`) VALUES ('$username',CURRENT_TIMESTAMP,'$x','Started Delivering');";
        mysqli_query($con, $query0);
    }


    $result1 = mysqli_query($con, "UPDATE `ordertable` INNER JOIN customer ON customer.username = ordertable.username SET `delivery_status`='Delivering...',`manufacture_status`='Finished' WHERE city = '$choosenLocation' && `delivery_status` = 'Waiting...' && `manufacture_status` = 'Ready' ;");
}


if (isset($_GET['showOrdersDelivery']) == "showOrdersDelivery") {
    $choosenLocation = $_GET['chosenLocation'];
    $ordersForSpecificLocation = new stdClass();
    require_once 'connection.php';

    $result1 = mysqli_query($con, "SELECT `order_id`,`firstname`,`lastname`,`phone`,`city`,`address`,`total_cost`,`date_of_order` FROM `ordertable` INNER JOIN customer ON customer.username = ordertable.username WHERE `manufacture_status`= 'Ready';");
    $num = mysqli_num_rows($result1);
    if ($num != 0) {

        while ($row1 = mysqli_fetch_assoc($result1)) {
            $data1[] = $row1;
        }
        $ordersForSpecificLocation->orderForSpecificLocation = $data1;
    } else {

        $ordersForSpecificLocation->orderForSpecificLocation = "Empty";
    }

    echo json_encode($ordersForSpecificLocation);
}



if (isset($_GET['onloadDelivery']) == "onloadDelivery") {
    $choosenLocation = $_GET['chosenLocation'];
    $onloadDelivery = new stdClass();
    require_once 'connection.php';

    $result = mysqli_query($con, "SELECT `order_id`,`city` FROM `ordertable` INNER JOIN customer ON customer.username = ordertable.username WHERE `manufacture_status`= 'Ready';");
    $num = mysqli_num_rows($result);
    if ($num != 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        $onloadDelivery->deliveryOrderReady = $data;
    } else {

        $onloadDelivery->deliveryOrderReady = "Empty";
    }

    $result1 = mysqli_query($con, "SELECT `order_id`,`city` FROM `ordertable` INNER JOIN customer ON customer.username = ordertable.username WHERE `manufacture_status`= 'Finished' && `delivery_status`='Delivering...';");
    $num1 = mysqli_num_rows($result1);
    if ($num1 != 0) {
        while ($row1 = mysqli_fetch_assoc($result1)) {
            $data1[] = $row1;
        }
        $onloadDelivery->deliveryingOrder = $data1;
    } else {

        $onloadDelivery->deliveryingOrder = "Empty";
    }







    echo json_encode($onloadDelivery);
}

if (isset($_GET['orderInformation']) == "orderInformation") {

    $order_id = $_GET['orderId'];
    $orderInformation = new stdClass();
    require_once 'connection.php';


    $result1 = mysqli_query($con, "SELECT `order_id`,`firstname`,`lastname`,`phone`,`city`,`address`,`total_cost`,`date_of_order` FROM `ordertable` INNER JOIN customer ON customer.username = ordertable.username WHERE `order_id`= '$order_id';");
    $num = mysqli_num_rows($result1);
    if ($num != 0) {

        while ($row1 = mysqli_fetch_assoc($result1)) {
            $data1[] = $row1;
        }
        $orderInformation->orderInformationn = $data1;
    } else {

        $orderInformation->orderInformationn = "Empty";
    }

    echo json_encode($orderInformation);
}



if (isset($_GET['orderDelivered']) == "orderDelivered") {
    require_once 'connection.php';

    $order_id = $_GET['orderId'];
    $result1 = mysqli_query($con, "UPDATE `ordertable` INNER JOIN customer ON customer.username = ordertable.username SET `delivery_status`='Delivered' WHERE order_id = '$order_id';");

    $username =  $_SESSION['username'];
    $query2 = "INSERT INTO `logs`(`username`, `date_of_edit`, `order_id`, `action`) VALUES ('$username',CURRENT_TIMESTAMP,'$order_id','Delivered the Order');";
    mysqli_query($con, $query2);
}

if (isset($_GET['orderReturned']) == "orderReturned") {
    require_once 'connection.php';

    $order_id = $_GET['orderId'];
    $result1 = mysqli_query($con, "UPDATE `ordertable` INNER JOIN customer ON customer.username = ordertable.username SET `delivery_status`='Returned' WHERE order_id = '$order_id';");
    $username =  $_SESSION['username'];
    $query2 = "INSERT INTO `logs`(`username`, `date_of_edit`, `order_id`, `action`) VALUES ('$username',CURRENT_TIMESTAMP,'$order_id','Returned the Order');";
    mysqli_query($con, $query2);
}


if (isset($_GET['shop']) == "shop") {

    $items = new stdClass();
    require_once 'connection.php';
    $result1 = mysqli_query($con, "SELECT * FROM `product` INNER JOIN orderproducts ON product.product_id = orderproducts.product_id JOIN ordertable ON orderproducts.order_id = ordertable.order_id WHERE`delivery_status` = 'returned';");
    $data1 = array();
    while ($row1 = mysqli_fetch_assoc($result1)) {
        $data1[] = $row1;
    }
    $items->item = $data1;
    echo json_encode($items);
}

if (isset($_GET['addToCartFromShop']) == "addToCartFromShop") {
    require_once 'connection.php';
    $product_id = $_GET['product_id'];
    $result1 = mysqli_query($con, "SELECT * FROM `product` WHERE `product_id` = '$product_id';");
    $row1 = mysqli_fetch_assoc($result1);

    $type = $row1['type'];
    $size = $row1['size'];
    $color = $row1['color'];
    $pocketSticker = $row1['pocket_sticker'];
    $frontSticker = $row1['front_sticker'];
    $backSticker = $row1['back_sticker'];
    $price = $row1['price'];
    $user = $_SESSION['username'];
    $result2 = "INSERT INTO `product`(`username`, `type`, `size`, `color`, `pocket_sticker`, `front_sticker`, `back_sticker`, `price`, `ordered`,`returns`) VALUES ('$user','$type','$size','$color','$pocketSticker','$frontSticker','$backSticker','$price','No','Returns');";
    mysqli_query($con, $result2);
}

if (isset($_GET['pushLogs']) == "pushLogs") {
    $logs = new stdClass();
    $data = array();
    require_once 'connection.php';
    $query = mysqli_query($con, "SELECT * FROM `logs`;");

    while ($row = mysqli_fetch_assoc($query)) {

        $data[] = $row;
    }
    $logs->log = $data;
    echo json_encode($logs);
}

if (isset($_GET['pushLogsWithSearch']) == "pushLogsWithSearch") {

    $logs = new stdClass();
    $data = array();
    require_once 'connection.php';

    $stmt = $_GET['query'];
    $query = mysqli_query($con, "$stmt");
    while ($row = mysqli_fetch_assoc($query)) {
        $data[] = $row;
    }
    $logs->log = $data;
    echo json_encode($logs);
}
