<?php

include 'connection.php';

for ($x = 1; $x <= 68; $x++) {
    $query = "INSERT INTO `stickers`(`img_path`, `type`) VALUES ('../../images/stickers/Qoutes/Q ($x).png','Qoutes');";
    mysqli_query($con, $query);
}
