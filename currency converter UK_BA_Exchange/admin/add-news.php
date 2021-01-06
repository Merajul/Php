<?php
error_reporting(0);
include 'header.php';
include 'db.php';


$getid = $_GET["id"];
$currency = "";
$rate = "";

if (!empty($getid)){
    $sqlT = "SELECT * FROM currency_convert WHERE id= $getid";
    $rstT = mysqli_query($mysqli, $sqlT);
    $rowT = mysqli_num_rows($rstT);
    if (!is_null($rowT)) {
        while($row = mysqli_fetch_array($rstT)) {
            $id = $row['id'];
            $currency= $row['currency'];
            $rate= $row['rate'];
        }
    }
}

mysqli_close($mysqli);

?>


<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Edit Currency</h1>

        </div>

    </div>


    <div class="col-md-12">
        <div class="tile">


            <!--                    <div class="col-md-1">sadasd</div>-->

            <div class=" col-md-8">


                <form method="post" action="robot.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleSelect1">currency</label>
                        <select class="form-control" name="currency">

                            <option value="euro" <?php if($currency=="EURO") echo 'selected="selected"'; ?>>euro</option>
<!--                            <option value="usd"  --><?php //if($currency=="USD") echo 'selected="selected"'; ?><!-->USD</option>-->

                        </select>
                    </div>
                    <label for="exampleSelect1">Rate</label>
                    <div class="form-group">
                        <input class="form-control" name="rate" value="<?php echo $rate; ?>" type="text"
                               placeholder="Rate">
                    </div>



                    <input type="hidden" name="id" value="<?php echo $id; ?>" >
                    <input class="btn btn-primary"  name="submit" type="submit" value="Submit">
                </form>
            </div>
        </div>

    </div>


</main>


<?php include_once 'footer.php' ?>

