<?php
include_once 'header.php';
include 'db.php';
//---password edit--
//echo password_hash("123456", PASSWORD_DEFAULT);
?>


<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Manage Currency</h1>

        </div>

    </div>


    <div class="col-md-12">
        <div class="tile">


            <div class="row">
                <div class="col-md-4">

                </div>
                <div class="col-md-6">

                </div>
                <div class="col-md-2">

                </div>

            </div>
            <br>






            <div class="tile-body">
                <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                    <tr>
                        <th>Sl</th>
                        <th>currency</th>
                        <th>rate</th>
                        <th>Update</th>
                    </tr>
                    </thead>
                    <tbody>




                    <?php
                    $sql = "SELECT * FROM currency_convert";
                    if ($result = mysqli_query($mysqli, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            $i = 1;
                            while ($row = mysqli_fetch_array($result)) {

                                ?>


                                <tr>
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $row['currency']?></td>
                                    <td><?php echo $row['rate']?></td>

                                    <td class="text-left">

                                        <a href="add-news.php?id=<?php echo $row['id']?>" style="color: green; font-size: 18px;"><i class="fa fa-edit"></i></a>
<!--                                        <a href="delete.php?id=--><?php //echo $row['id']?><!--" onclick="return confirm('Are you sure?');" style="margin-left: 15px; color: red; font-size: 18px;"><i-->
<!--                                                    class="fa fa-trash"></i></a>-->

                                    </td>


                                </tr>


                                <?php
                                $i++;
                            }
                            mysqli_free_result($result);
                        }
                        else{
                            echo "No records matching your query were found.";
                        }

                    }
                    else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
                    }

                    ?>


                    </tbody>


                </table>
            </div>





        </div>

    </div>


</main>


<?php include_once 'footer.php' ?>

