<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>



        <style>


            .form-inline {  
                /* align-items: center; */
                background: #224E8C;
                height: 80px;
                padding: 15px;
            }

            .form-inline label {
                margin: 5px 10px 5px 10px;
                color: white;
            }

            .form-inline input {
                vertical-align: middle;
                margin: 5px 10px 5px 0;
                width: 100px;
                padding: 8px;
                height: 42px;
                font-size: 18px;
                color: black;
                border-radius:0px;
                background-color: #fff;
               
            }
            .imgeb{
                max-width: 25px;
                height: auto;
                box-sizing: border-box;



            }

            .form-inline button {
                padding: 10px 18px;
                background-color: #203051;
                border: 1px solid #ddd;
                color: white;
                font-weight: bolder;
                cursor:default;
            }


            @media (max-width: 800px) {
                .form-inline input {
                    margin: 10px 0;
                }

                .form-inline {
                    flex-direction: column;
                    align-items: stretch;
                }
            }
        </style>



    </head>
    <body>


        <?php
        include './admin/db.php';

        $sql = "SELECT * FROM currency_convert;";
        if ($result = mysqli_query($mysqli, $sql)) {
            if (mysqli_num_rows($result) > 0) {

                $row = mysqli_fetch_array($result);
                $data = $row['rate'];


                mysqli_free_result($result);
            } else {
                echo "No records matching your query were found.";
            }
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
        }
        ?>



        <div class="col-md-3"></div>
        <form class="form-inline">

            <label for="number">You Send</label>
            <input type="number" oninput="Calculate()"  class="form-control" id="value1" value="1" max="8"/>
            <button disabled><img class="imgeb" src="euro.png">&nbsp;&nbsp; EURO</button>
            <label for="number"> &nbsp;Recipient Get</label>
            <input type="number" onkeydown="Calculate()" class="form-control" id="value2" />
            <button disabled><img class="imgeb" src="bdt.png"> &nbsp;&nbsp;BDT</button>

        </form>

    </body>



    <script>
        function Currency() {
            y = document.getElementById("converter").value;
            return y;
        }
        function Calculate() {
          
            var z = "<?php echo $data;?>";
            x = document.getElementById("value1").value;
            if (x == "") {
                document.getElementById("value2").value = "";
            } else {
                var c = x * z;
                document.getElementById("value2").value = c.toFixed(2);

            }
        }
        window.onload = Calculate();
    </script>
</html>