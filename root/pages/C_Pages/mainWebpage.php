<!DOCTYPE html>

<?php
include '..\..\dataManagment\connection.php';
include '..\..\dataManagment\server.php';
$user = $_SESSION['username'];
$query = "SELECT * FROM `customer` WHERE username='$user'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_row($result);
$fname = $row[0];
$lname = $row[1];
$phone = $row[2];
$email = $row[3];
$city = $row[4];
$address = $row[5];
$userr = $row[6];

?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="../../css/StyleC.css?<?php echo time(); ?>" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="../../images/cssPhotos/favicon.png">
    <link rel="stylesheet" href="../../css/StyleT.css?<?php echo time(); ?>">
    <title>U-Style</title>


</head>

<body onload="shop()">


    <nav class="navbar navbar-expand-sm navbar-dark sticky-top" style="background-color: black;">
        <a class="navbar-brand" href="#">
            <img width="40px" src="../../images/cssPhotos/Logo2.png" alt="Logo">
        </a>
        <a href="#design" class="navbar-brand Font" style=" color: #3366ff;">Welcome <?php echo $fname; ?></a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav Font">
                <li class="nav-item"><a href="#design" class="nav-link">Design</a></li>
                <li class="nav-item"><a href="#orders" class="nav-link">Order</a></li>
                <li class="nav-item"><a href="#returns" class="nav-link">Shop</a></li>
                <li class="nav-item"><a href="#accountSettings" class="nav-link">Account Settings</a></li>
                <li class="nav-item"><a href="#about" class="nav-link">About</a></li>

            </ul>
            <ul class="navbar-nav ml-auto">

                <li>
                    <a data-toggle="modal" data-target="#myCart" href="#" class="btn btn-success custom-btn greenB" onclick="cart()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                        </svg>
                        <span class="Font">My Cart</span>
                    </a>

                    <a href="../Intro_Pages/loginPage.php" class="btn btn-primary custom-btn blueB">
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

    <section id="design" class="section">

        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-4 ">
                    <div class="tab ">
                        <button class="tablinks" onclick="openTab(event, 'c1')" id="defaultOpen">Logos</button>
                        <button class="tablinks" onclick="openTab(event, 'c2')">Sports</button>
                        <button class="tablinks" onclick="openTab(event, 'c3')">Symbols</button>
                        <button class="tablinks" onclick="openTab(event, 'c4')">Birthdays</button>
                        <button class="tablinks" onclick="openTab(event, 'c5')">Qoutes</button>
                        <button class="tablinks" onclick="openTab(event, 'c6')">Lebanese</button>
                        <button class="tablinks" onclick="openTab(event, 'c7')">Graduation</button>
                        <button class="tablinks" onclick="openTab(event, 'c8')">Emojis</button>
                        <button class="tablinks" onclick="openTab(event, 'c9')">Corona</button>
                        <button class="tablinks" onclick="openTab(event, 'c10')">Food</button>
                        <button class="tablinks" onclick="openTab(event, 'c11')">Cars</button>
                        <button class="tablinks" onclick="openTab(event, 'c12')">Internet</button>
                    </div>

                    <div id="c1" class="tabcontent">
                        <div class=" container-fluid">
                            <div class="row stickerRow">
                                <div id="Logos" class="col flex-box-container"></div>
                            </div>
                        </div>
                    </div>

                    <div id="c2" class="tabcontent">
                        <div class=" container-fluid">
                            <div class="row stickerRow">
                                <div id="Sports" class="col flex-box-container"></div>
                            </div>
                        </div>

                    </div>

                    <div id="c3" class="tabcontent">
                        <div class=" container-fluid">
                            <div class="row stickerRow">
                                <div id="Symbols" class="col flex-box-container"></div>
                            </div>
                        </div>

                    </div>
                    <div id="c4" class="tabcontent">
                        <div class=" container-fluid">
                            <div class="row stickerRow">
                                <div id="Birthdays" class="col flex-box-container"></div>
                            </div>
                        </div>

                    </div>
                    <div id="c5" class="tabcontent">
                        <div class=" container-fluid">
                            <div class="row stickerRow">
                                <div id="Qoutes" class="col flex-box-container"></div>
                            </div>
                        </div>

                    </div>
                    <div id="c6" class="tabcontent">
                        <div class=" container-fluid">
                            <div class="row stickerRow">
                                <div id="Lebanese" class="col flex-box-container"></div>
                            </div>
                        </div>

                    </div>
                    <div id="c7" class="tabcontent">
                        <div class=" container-fluid">
                            <div class="row stickerRow">
                                <div id="Graduation" class="col flex-box-container"></div>
                            </div>
                        </div>

                    </div>
                    <div id="c8" class="tabcontent">
                        <div class=" container-fluid">
                            <div class="row stickerRow">
                                <div id="Emojis" class="col flex-box-container"></div>
                            </div>
                        </div>

                    </div>
                    <div id="c9" class="tabcontent">
                        <div class=" container-fluid">
                            <div class="row stickerRow">
                                <div id="Corona" class="col flex-box-container"></div>
                            </div>
                        </div>

                    </div>
                    <div id="c10" class="tabcontent">
                        <div class=" container-fluid">
                            <div class="row stickerRow">
                                <div id="Food" class="col flex-box-container"></div>
                            </div>
                        </div>

                    </div>
                    <div id="c11" class="tabcontent">
                        <div class=" container-fluid">
                            <div class="row stickerRow">
                                <div id="Cars" class="col flex-box-container"></div>
                            </div>
                        </div>

                    </div>
                    <div id="c12" class="tabcontent">
                        <div class=" container-fluid">
                            <div class="row stickerRow">
                                <div id="Internet" class="col flex-box-container"></div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-4">





                    <div id="shirtChosen" class="shirts">

                        <div id="topSticker" class="empty"></div>
                        <div id="pocketSticker" class="empty"></div>
                        <div id="frontSticker" class="empty"></div>
                        <div id="backSticker" class="empty"></div>

                    </div>

                </div>
                <div class="col-xl-4">
                    <div class="container designOptionContainer">
                        <div class="row pb-2">
                            <h1 id="designOptionHeader">Design Options:</h1>
                            <div class="col">
                                <h2 class="defaultFont" style="text-align: start;">Type:</h2>
                                <select id="shirtType" class="form-control form-control-sm" onchange="selectType()">

                                    <option value="Tshirt" selected>T-Shirt</option>
                                    <option value="Pullover">Pullover</option>
                                    <option value="Hoodie">Hoodie</option>
                                </select>
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col">
                                <h2 class="defaultFont" style="text-align: start;">Rotate:</h2>
                                <select id="shirtView" class="form-control form-control-sm" onchange="selectView()">

                                    <option value="Front" selected>Front-View</option>
                                    <option value="Back">Back-View</option>
                                </select>
                            </div>
                        </div>


                        <div class="row pb-2">
                            <div class="col">
                                <h2 class="defaultFont" style="text-align: start;">Size:</h2>
                                <div class="d-flex justify-content-around flex-wrap">
                                    <div class="btn-group radioGroup" role="group" aria-label="Basic radio toggle button group">
                                        <input onclick="sizeChoose(this)" type="radio" class="btn-check" name="btnradio" id="X-Small" autocomplete="off" checked>
                                        <label class="btn btn-primary" for="X-Small">X-Small</label>

                                        <input onclick="sizeChoose(this)" type="radio" class="btn-check" name="btnradio" id="Small" autocomplete="off">
                                        <label class="btn btn-primary" for="Small">Small</label>

                                        <input onclick="sizeChoose(this)" type="radio" class="btn-check" name="btnradio" id="Medium" autocomplete="off">
                                        <label class="btn btn-primary" for="Medium">Medium</label>

                                        <input onclick="sizeChoose(this)" type="radio" class="btn-check" name="btnradio" id="Large" autocomplete="off">
                                        <label class="btn btn-primary" for="Large">Large</label>

                                        <input onclick="sizeChoose(this)" type="radio" class="btn-check" name="btnradio" id="X-Large" autocomplete="off">
                                        <label class="btn btn-primary" for="X-Large">X-Large</label>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col">

                                <div id="TshirtColors" style="display: none;">
                                    <h2 class="defaultFont" style="text-align: start;">Color:</h2>
                                    <img alt="Black" src="../../images/colors/Tshirts/Black.png" class="shirtColors" onclick="colorChoose(this)">
                                    <img alt="Pink" src="../../images/colors/Tshirts/Pink.png" class="shirtColors" onclick="colorChoose(this)">
                                    <img alt="Teal" src="../../images/colors/Tshirts/Teal.png" class="shirtColors" onclick="colorChoose(this)">
                                    <img alt="Purple" src="../../images/colors/Tshirts/Purple.png" class="shirtColors" onclick="colorChoose(this)">
                                    <img alt="Heather-burgundy" src="../../images/colors/Tshirts/Heather-burgundy.png" class="shirtColors" onclick="colorChoose(this)">
                                    <img alt="Heather-blue" src="../../images/colors/Tshirts/Heather-blue.png" class="shirtColors" onclick="colorChoose(this)">
                                    <img alt="White" src="../../images/colors/Tshirts/Charcoal-gray.png" class="shirtColors" onclick="colorChoose(this)">
                                    <img alt="Steel-green" src="../../images/colors/Tshirts/Steel-green.png" class="shirtColors" onclick="colorChoose(this)">
                                    <img alt="Heather-iceblue" src="../../images/colors/Tshirts/Heather-iceblue.png" class="shirtColors" onclick="colorChoose(this)">
                                    <img alt="Olive-green" src="../../images/colors/Tshirts/Olive-green.png" class="shirtColors" onclick="colorChoose(this)">
                                    <img alt="Deep-navy" src="../../images/colors/Tshirts/Deep-navy.png" class="shirtColors" onclick="colorChoose(this)">
                                    <img alt="Kelly-green" src="../../images/colors/Tshirts/Kelly-green.png" class="shirtColors" onclick="colorChoose(this)">
                                    <img alt="Heather-gray" src="../../images/colors/Tshirts/Heather-gray.png" class="shirtColors" onclick="colorChoose(this)">
                                    <img alt="Royal-blue" src="../../images/colors/Tshirts/Royal-blue.png" class="shirtColors" onclick="colorChoose(this)">
                                    <img alt="Steel-blue" src="../../images/colors/Tshirts/Steel-blue.png" class="shirtColors" onclick="colorChoose(this)">
                                    <img alt="Asphalt-gray" src="../../images/colors/Tshirts/Asphalt-gray.png" class="shirtColors" onclick="colorChoose(this)">
                                    <img alt="red" src="../../images/colors/Tshirts/Red.png" class="shirtColors" onclick="colorChoose(this)">
                                    <img alt="Yellow" src="../../images/colors/Tshirts/Yellow.png" class="shirtColors" onclick="colorChoose(this)">
                                </div>
                                <div id="HoodieColors" style="display: none;">
                                    <h2 class="defaultFont" style="text-align: start;">Color:</h2>
                                    <img alt="Black" src="../../images/colors/Hoodies/Black.png" class="shirtColors" onclick="colorChoose(this)">
                                    <img alt="Demin" src="../../images/colors/Hoodies/Denim.png" class="shirtColors" onclick="colorChoose(this)">
                                    <img alt="Charcoal-gray" src="../../images/colors/Hoodies/Charcoal-gray.png" class="shirtColors" onclick="colorChoose(this)">
                                    <img alt="Olive-green" src="../../images/colors/Hoodies/Olive-green.png" class="shirtColors" onclick="colorChoose(this)">
                                    <img alt="Gray" src="../../images/colors/Hoodies/Gray.png" class="shirtColors" onclick="colorChoose(this)">
                                    <img alt="Royal-blue" src="../../images/colors/Hoodies/Royal-blue.png" class="shirtColors" onclick="colorChoose(this)">
                                    <img alt="White" src="../../images/colors/Hoodies/White.png" class="shirtColors" onclick="colorChoose(this)">
                                    <img alt="Burgundy" src="../../images/colors/Hoodies/Burgundy.png" class="shirtColors" onclick="colorChoose(this)">
                                    <img alt="Red" src="../../images/colors/Hoodies/Red.png" class="shirtColors" onclick="colorChoose(this)">
                                    <img alt="Navy" src="../../images/colors/Hoodies/navy.png" class="shirtColors" onclick="colorChoose(this)">
                                </div>

                                <div id="PulloverColors" style="display: none;">
                                    <h2 class="defaultFont" style="text-align: start;">Color:</h2>
                                    <img alt="Black" src="../../images/colors/Pullovers/Black.png" class="shirtColors" onclick="colorChoose(this)">
                                    <img alt="Burgundy" src="../../images/colors/Pullovers/Burgundy.png" class="shirtColors" onclick="colorChoose(this)">
                                    <img alt="White" src="../../images/colors/Pullovers/Charcoal-gray.png" class="shirtColors" onclick="colorChoose(this)">
                                    <img alt="navy" src="../../images/colors/Pullovers/Navy.png" class="shirtColors" onclick="colorChoose(this)">
                                    <img alt="Gray" src="../../images/colors/Pullovers/Heather-gray.png" class="shirtColors" onclick="colorChoose(this)">
                                    <img alt="Red" src="../../images/colors/Pullovers/Red.png" class="shirtColors" onclick="colorChoose(this)">
                                </div>

                            </div>
                        </div>
                        <div class="row pb-2">
                            <hr />
                            <div class="col-6 pb-4">
                                <h2 id="cost" style="text-align: start;">Price: <span id="price" style="color: #3366ff;"></span></h2>

                            </div>
                            <div class="col-6 pb-4">


                            </div>
                        </div>




                        <div class="row pb-2">
                            <div class="col">
                                <div class="d-flex justify-content-around flex-wrap ">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button onclick="guildLines()" class="btn btn-primary designButton "><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-dotted" viewBox="0 0 16 16">
                                                <path d="M2.5 0c-.166 0-.33.016-.487.048l.194.98A1.51 1.51 0 0 1 2.5 1h.458V0H2.5zm2.292 0h-.917v1h.917V0zm1.833 0h-.917v1h.917V0zm1.833 0h-.916v1h.916V0zm1.834 0h-.917v1h.917V0zm1.833 0h-.917v1h.917V0zM13.5 0h-.458v1h.458c.1 0 .199.01.293.029l.194-.981A2.51 2.51 0 0 0 13.5 0zm2.079 1.11a2.511 2.511 0 0 0-.69-.689l-.556.831c.164.11.305.251.415.415l.83-.556zM1.11.421a2.511 2.511 0 0 0-.689.69l.831.556c.11-.164.251-.305.415-.415L1.11.422zM16 2.5c0-.166-.016-.33-.048-.487l-.98.194c.018.094.028.192.028.293v.458h1V2.5zM.048 2.013A2.51 2.51 0 0 0 0 2.5v.458h1V2.5c0-.1.01-.199.029-.293l-.981-.194zM0 3.875v.917h1v-.917H0zm16 .917v-.917h-1v.917h1zM0 5.708v.917h1v-.917H0zm16 .917v-.917h-1v.917h1zM0 7.542v.916h1v-.916H0zm15 .916h1v-.916h-1v.916zM0 9.375v.917h1v-.917H0zm16 .917v-.917h-1v.917h1zm-16 .916v.917h1v-.917H0zm16 .917v-.917h-1v.917h1zm-16 .917v.458c0 .166.016.33.048.487l.98-.194A1.51 1.51 0 0 1 1 13.5v-.458H0zm16 .458v-.458h-1v.458c0 .1-.01.199-.029.293l.981.194c.032-.158.048-.32.048-.487zM.421 14.89c.183.272.417.506.69.689l.556-.831a1.51 1.51 0 0 1-.415-.415l-.83.556zm14.469.689c.272-.183.506-.417.689-.69l-.831-.556c-.11.164-.251.305-.415.415l.556.83zm-12.877.373c.158.032.32.048.487.048h.458v-1H2.5c-.1 0-.199-.01-.293-.029l-.194.981zM13.5 16c.166 0 .33-.016.487-.048l-.194-.98A1.51 1.51 0 0 1 13.5 15h-.458v1h.458zm-9.625 0h.917v-1h-.917v1zm1.833 0h.917v-1h-.917v1zm1.834-1v1h.916v-1h-.916zm1.833 1h.917v-1h-.917v1zm1.833 0h.917v-1h-.917v1zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                                            </svg> Guildlines <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-square-dotted" viewBox="0 0 16 16">
                                                <path d="M2.5 0c-.166 0-.33.016-.487.048l.194.98A1.51 1.51 0 0 1 2.5 1h.458V0H2.5zm2.292 0h-.917v1h.917V0zm1.833 0h-.917v1h.917V0zm1.833 0h-.916v1h.916V0zm1.834 0h-.917v1h.917V0zm1.833 0h-.917v1h.917V0zM13.5 0h-.458v1h.458c.1 0 .199.01.293.029l.194-.981A2.51 2.51 0 0 0 13.5 0zm2.079 1.11a2.511 2.511 0 0 0-.69-.689l-.556.831c.164.11.305.251.415.415l.83-.556zM1.11.421a2.511 2.511 0 0 0-.689.69l.831.556c.11-.164.251-.305.415-.415L1.11.422zM16 2.5c0-.166-.016-.33-.048-.487l-.98.194c.018.094.028.192.028.293v.458h1V2.5zM.048 2.013A2.51 2.51 0 0 0 0 2.5v.458h1V2.5c0-.1.01-.199.029-.293l-.981-.194zM0 3.875v.917h1v-.917H0zm16 .917v-.917h-1v.917h1zM0 5.708v.917h1v-.917H0zm16 .917v-.917h-1v.917h1zM0 7.542v.916h1v-.916H0zm15 .916h1v-.916h-1v.916zM0 9.375v.917h1v-.917H0zm16 .917v-.917h-1v.917h1zm-16 .916v.917h1v-.917H0zm16 .917v-.917h-1v.917h1zm-16 .917v.458c0 .166.016.33.048.487l.98-.194A1.51 1.51 0 0 1 1 13.5v-.458H0zm16 .458v-.458h-1v.458c0 .1-.01.199-.029.293l.981.194c.032-.158.048-.32.048-.487zM.421 14.89c.183.272.417.506.69.689l.556-.831a1.51 1.51 0 0 1-.415-.415l-.83.556zm14.469.689c.272-.183.506-.417.689-.69l-.831-.556c-.11.164-.251.305-.415.415l.556.83zm-12.877.373c.158.032.32.048.487.048h.458v-1H2.5c-.1 0-.199-.01-.293-.029l-.194.981zM13.5 16c.166 0 .33-.016.487-.048l-.194-.98A1.51 1.51 0 0 1 13.5 15h-.458v1h.458zm-9.625 0h.917v-1h-.917v1zm1.833 0h.917v-1h-.917v1zm1.834 0h.916v-1h-.916v1zm1.833 0h.917v-1h-.917v1zm1.833 0h.917v-1h-.917v1zM4.5 7.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7z" />
                                            </svg></button>
                                        <button onclick="clearStickers()" class="btn btn-danger designButton">Clear Stickers <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
                                                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                            </svg></button>

                                        <button data-toggle="modal" data-target="#addedSuccessfully" onclick="objectToJson()" class="btn btn-success designButton">Add to Cart <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                                                <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z" />
                                                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                            </svg></button>


                                    </div>
                                </div>

                            </div>
                        </div>







                    </div>

                </div>



            </div>

        </div>

    </section>
    <section id="orders" class="section">





        <div id="orderExcited" class="container">
            <div class="row row-md">

                <h1 class="orderH pt-3">Track your orders:</h1>
            </div>

            <div class="row row-md">
                <div class="col orderHeader">
                    Date of order
                </div>
                <div class="col orderHeader">
                    Total Cost($)
                </div>
                <div class="col orderHeader">
                    manufacture Status
                </div>
                <div class="col orderHeader">
                    Delivery Status
                </div>
                <div class="col orderHeader">
                    Items
                </div>

            </div>

            <div id="orderInfoR" class="pb-3">


            </div>




        </div>
        <div id="noorderExcited" class="container">



            <label>
                No Orders Yet <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-x" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M6.146 8.146a.5.5 0 0 1 .708 0L8 9.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 10l1.147 1.146a.5.5 0 0 1-.708.708L8 10.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 10 6.146 8.854a.5.5 0 0 1 0-.708z"></path>
                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"></path>
                </svg>
            </label>




        </div>


    </section>
    <section id="returns" class="section">

        <div id="shop">


        </div>




    </section>

    <section id="accountSettings" class="section">

        <form action="mainWebpage.php#accountSettings" method="POST">


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
                            <div class="form-row">
                                <div class="col">
                                    <p class="defaultFont">Address</p>
                                    <select name="address" class="form-control form-control-sm">
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

                                        <textarea name="address2" placeholder="Town,Street,Building..." class="form-control" id="exampleFormControlTextarea4" rows="3"><?php echo $address; ?></textarea>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div id="registerContainer2" class="container px-4 py-3 mt-5" style=" min-width: 350px;">




                            <div class="form-row">
                                <div class="col py-5">
                                    <p class="defaultFont">Username: <span style=" color: #3366ff; font-weight:  bolder;"><?php echo $userr; ?> </span></p>

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
                                <div class="col pb-5">
                                    <a href="#" style=" text-decoration: none;" class="btn btn-danger custom-btn redB" data-toggle="modal" data-target="#deactivateModal">Deactivate my account</a>
                                </div>

                            </div>
                            <div class="form-row">
                                <div id="errorBox" onmouseover="clearError(this.id)" class="col pb-5">
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
                        <div class="modal fade" id="myCart">
                            <div id="myCart" class="modal-dialog modal-lg " style="border-color: black;">
                                <div id="myCart2" class="modal-content border border-primary">
                                    <div id="cartHeader" class="modal-header">
                                        <h3 id="myCartHeader">Shopping Cart</h3>
                                    </div>

                                    <div id="cartDrop" class="modal-body cartContent">


                                    </div>

                                    <div id="cartFooter" class="modal-footer">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-4">
                                                    <h3 id="totalPrice">Total Price: <span id="Tprice" style="color: #3366ff;"></span><span style="color:#3366ff;">$</span></h3>
                                                </div>
                                                <div class="col-8">
                                                    <div id="orderdivbutton">

                                                        <button type="button" data-toggle="modal" data-target="#orderedSuccessfully" onclick="orderTheProducts()" id="orderButton" class="btn btn-primary custom-btn blueB">Order Items</button>

                                                    </div>
                                                    <div id="noorderdivbutton">
                                                        <h3>Cart is Empty</h3>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="modal fade" id="showMyOrder">
                            <div id="myCart" class="modal-dialog modal-lg " style="border-color: black;">
                                <div id="myCart2" class="modal-content border border-primary">
                                    <div id="cartHeader" class="modal-header">
                                        <h3 id="myCartHeader">Ordered Items</h3>
                                    </div>
                                    <div id="showDrop" class="modal-body cartContent">

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="modal fade " id="orderedSuccessfully">
                            <div id="cartAlert" class="modal-dialog modal-lg  " style="border-color: black;">
                                <div class="modal-content border border-primary">
                                    <div class="modal-header">
                                        <h3 class="Font">Order Submitted </h3><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart-check-fill" viewBox="0 0 16 16">
                                            <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm-1.646-7.646-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708.708z" />
                                        </svg>
                                        <h3>Track your order in the Orders Tab</h3>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="modal fade " id="addedSuccessfully">
                            <div id="cartAlert" class="modal-dialog modal-lg  " style="border-color: black;">
                                <div class="modal-content border border-primary">
                                    <div class="modal-header">
                                        <h3 class="Font">Added to Your Cart Successfully </h3><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart-check-fill" viewBox="0 0 16 16">
                                            <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm-1.646-7.646-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708.708z" />
                                        </svg>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


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
                                        <button name="save" class="btn btn-primary custom-btn blueB" type="submit">Confirm</button>
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
                <form action="mainWebpage.php#accountSettings" method="POST">


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
                                    <button name="changePass" class="btn btn-primary custom-btn blueB" type="submit">Change Password</button>
                                </div>

                            </div>

                        </div>

                    </div>
                </form>
            </div>

        </div>

    </div>
    <div class="container">
        <form action="mainWebPage.php#accountSettings" method="POST">


            <div class="row">
                <div class="col">
                    <div class="modal fade " id="deactivateModal">
                        <div class="modal-dialog  ">
                            <div class="modal-content border border-primary">
                                <div class="modal-header">
                                    <h5>Please confirm your password to deactivate your account</h5>
                                </div>
                                <div class="modal-body">

                                    <span style=" font-weight: bolder; color: #3366ff;">Password: </span><input name="password" class="c1" type="password" maxlength="20" required>

                                </div>
                                <div class="modal-footer">
                                    <button name="deactivate" class="btn btn-primary custom-btn blueB" type="submit">Confirm & Deactivate</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
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
    <script src="../../scripts/jScriptC.js?<?php echo time(); ?>"></script>
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