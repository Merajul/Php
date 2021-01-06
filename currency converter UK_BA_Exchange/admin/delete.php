<?php
include 'db.php';

$id = $_GET['id'];


if (!empty($id)){
    $sqlT = "SELECT * FROM currency_convert WHERE id= $id";
    $rstT = mysqli_query($mysqli, $sqlT);
    $rowT = mysqli_num_rows($rstT);
    if (!is_null($rowT)) {
        while($row = mysqli_fetch_array($rstT)) {
            $filename = $row['rate'];
            header("location: manage-news.php");

        }
    }
}




// Close connection
mysqli_close($mysqli);


?>
