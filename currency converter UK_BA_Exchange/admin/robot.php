<?php
include 'db.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $currency = $_POST['currency'];
    $rate = $_POST['rate'];


    if (empty($id)) {
        $sql = "INSERT INTO currency_convert (currency, rate) VALUES ('$currency', '$rate')";
        mysqli_query($mysqli, $sql);

    } else {

        $sql = "UPDATE currency_convert SET rate = '$rate'  where id = $id ";

        mysqli_query($mysqli, $sql);

    }
    echo "<script>window.location.href='manage-news.php';</script>";
}

?>