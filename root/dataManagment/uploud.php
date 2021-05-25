<?php

include 'connection.php';

for ($x = 1; $x <= 100; $x++) {
    $query1 = "INSERT INTO `stickers`(`img_path`, `type`) VALUES ('../../images/stickers/Cars/Ca ($x).png','Cars');";
    mysqli_query($con, $query1);
}
for ($x = 1; $x <= 100; $x++) {
    $query2 = "INSERT INTO `stickers`(`img_path`, `type`) VALUES ('../../images/stickers/Internet/In ($x).png','Internet');";
    mysqli_query($con, $query2);
}
