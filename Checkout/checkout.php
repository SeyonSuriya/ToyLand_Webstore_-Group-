

<html>
    <head>
        <title></title>


        <style>
            body{
                background-color: rgb(242, 235, 235);
            }
            .checkoutheader{
                width: 100%;
                background-color: white;
                border: none;
                margin: 0ch;
                padding: 0%;
            }
            .checkoutmain{
                
                padding-left: 40px ;
                padding-right: 40px;
            
            }
            .shippingaddress{
                background-color: white;
                width: 60%;
                height: 20%;
            }
            .paymentType{
                background-color: white;
                width: 60%;
                height: 20%;
                
            }
            .productsview{
                background-color: white;
                width: 60%;
                height: 30%;
            }.checkoutprices{
                width: 38%;
                height: 14.3cm;
                background-color: white;
                float:right;
            }
            .itemdescription{
                float: right;
                width: 72%;
            }
            
           
            
        </style>
       
     

    </head>
    <body onload="changeShipping();changeitemscost();changetotal()">
        <?php
            $page = 'checkout';
            include '../mainpage/header.php';
        ?>

        <br><br><br><br><br>
    
        <div class="checkoutheader">
           
            
        </div>
        <br>
        <div class="checkoutmain">
        <div class="checkoutprices">
        <strong> <span style="font-size: 1cm;"> Summary</span></strong><br><br>
        <p>
            Total Item Cost     :    US &nbsp;$ <span id="itemprices"></span> <br>

            Total Shipping      : US &nbsp;$
            <span id="shippingCost">
            </span>
            <hr>
            
            Total               : US &nbsp;$ <span id="totalcost"></span>
            <br>
            <script>

                
</script>
<button onclick="checkpaymentmethod();" class="cartbutton" type="button" style="margin: 16px; padding: 16px; background-color: darkorange; color: aliceblue;border: none;border-radius: 4px;font-size: 16px">
Place Order 
</button>

        </p>

            </div>

            <div class="checkoutdetails">
                <div class="shippingaddress">
                    
                <strong><span style="font-size: 0.6cm;">Shipping Address </span> </strong><br><br>
              
                <span><a href="changeaddress.php">Change address</a></span>
                </div>
                <br><br>


                <div class="paymentType">
                <strong><span style="font-size: 0.6cm;">Payment Method</span> </strong><br><br>
                
                <input type="radio" name="paymenttype" value="1" onchange="paymentmethod=1;"> Card Payment &nbsp;&nbsp;&nbsp;
                <input type="radio" name="paymenttype" value="2" onchange="paymentmethod=2;"> Cash on dilivery 
                </div>
                <br>
                <script>
                    i=0;
                    </script>
                <?php 
                for ($i=0; $i < count($productsincart); $i++) {
                    $productID = $productsincart[$i];
                    

                ?>
                <div class="productsview">
                    <img src="../Product/<?php echo $productID ?>/1.webp" alt="image1" height="95%" width="180">
                    <div class="itemdescription">
                    <p>
                    <?php
                    $sql = "SELECT * from product WHERE productID='".$productID."'";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    echo $row['name']."<br>";
                    echo $row['description']."<br>";
                    echo "<br>";
                    ?>
                    US &nbsp;$ &nbsp;
                    <?php
                    echo $row['price'];
                    ?>
                    </p>
                   
                    
                    <p style="color: cadetblue;"> 
                    <img  onclick="changeUnits(1,<?php echo $i ;?>,productunits[i],productmax[i])" id="-" src="-.jpeg" alt="Minus mark"  border-radius=50% width="18px">
                    <span id="<?php echo $i ;?>">
                    <?php echo  $productsunits[$i];?>
                    
                    </span>
                    <img onclick="changeUnits(2,<?php echo $i ;?>,productunits[i],productmax[i])" id="+" src="+.jpeg" alt="Plus mark"  border-radius=50% width="30px">
      
                 
        </p>
                    </div>


                </div>
                <br>
                <script>
                    console.log(productunits[i]);
                    i++;
                    
                </script>


                <?php
                   
                }
                
                ?>





            </div>
            


        </div>

        <?php
            include '../mainpage/footer.php';
        ?>
        
    </body>

</html>