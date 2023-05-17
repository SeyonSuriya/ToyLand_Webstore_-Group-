<?php
    include "../connection/connection.php";
    session_start();

    // Catch from a session variable

    $customerID = $_SESSION['customerID'];




    // Check number of item types in the cart

    $sql2="SELECT count('productID') from cart WHERE customerID=$customerID" ;
    $result2=mysqli_query($conn,$sql2);
    $row2=mysqli_fetch_array($result2);
    $itemsincart= $row2[0];

    if ($row2[0]) {

        // Get items from the cart table
        $productsincart=[];
        $productsunits = [];
        $x=1;

        for ($i = 0; $i < $itemsincart; $i++) {

            $y=1;
            while ($y) { 
        
                $sql1="SELECT count('units') from cart WHERE customerID=$customerID AND productID=$x" ;
                $result1=mysqli_query($conn,$sql1);
                $row1=mysqli_fetch_array($result1);
   
                if ($row1[0]) {
                    $productsincart[$i]=(int)$x;
                    $sql3 = "SELECT units from cart WHERE customerID=$customerID AND productID=$x";
                    $result3 = mysqli_query($conn, $sql3);
                    $row3 = mysqli_fetch_array($result3);
                    $productsunits[$i] = (int)$row3[0];
                    $y = 0;
                }
                $x++;
            }

        }

        $i = 0;

        $_SESSION['selectedproducts'] = $productsincart;

        // Catch from the cart


        $availableunits = [];
        $productweights = [];
        $productprices = [];

        for ($i=0; $i < $itemsincart; $i++) {
            $productID = $productsincart[$i];

            $sql4 = "SELECT * from product WHERE productID='".$productID."'";
            $result4 = $conn->query($sql4);
            $row4 = $result4->fetch_assoc();
            $availableunits[$i]=$row4['availableUnits'];
            $productweights[$i] =$row4['weight'];
            $productprices[$i] = $row4['price'];      
        }
        $i = 0;

?>

<html>
    <head>
        <title>Cart</title>
      

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
                width: 70%;
            }input.itemcheckbox{
                width: 22px;
        height: 22px;
            }.checkboxdiv{
                
                
                width: 8%;
                height: 100%;
                
                float: left;

            }.productinfo{
                width: 92%;
                height: 100%;
                float: right;
                
            }.productimagee{
                width: 30%;
                height: 100%;
                float: left;
            }
            
        </style>
       

        <!-- *************** Checkbox Selecting  *******************--> 

       



    </head>
    <body >
    <?php                     
          $page = 'cart'; 
          include '../mainpage/header.php';                 
    ?>
    
      
        <br>
        <div class="checkoutmain">
            <div class="checkoutprices">
                <strong> <span style="font-size: 1cm;">Summary</span> </strong><br><br>
                <p>
                Total Item Cost &nbsp;    :&nbsp;&nbsp;US&nbsp; $ <span id="itemprices"></span> <br>

                Total Shipping   &nbsp;&nbsp;  &nbsp;: US &nbsp;$ 
                <span id="shippingCost">
                </span>
                <hr>
            
                Total               : US &nbsp;$ <span id="totalcost"></span>
                <br>
            
                <button onclick="checkselected();" class="cartbutton" type="button" style="margin: 16px; padding: 16px; background-color: darkorange; color: aliceblue;border: none;border-radius: 4px;font-size: 16px">
                    Go to Checkout 
                </button>

                </p>

            </div>

            <div class="checkoutdetails">
                <div class="shippingaddress">
                    <strong>Shopping Cart(<?php echo $itemsincart ;?>)</strong><br><br>
                    <input  type="checkbox" onclick="selectall();" id="allselected" class="itemcheckbox" value="1">Select all items
                
                </div>
                <br><br>


               
                <script>
                    i=0;
                </script>

                <?php 
                    for ($i=0,$n=-1; $i < count($productsincart); $i++,$n--) {
                        $productID = $productsincart[$i];
                ?>
                <div class="productsview">
                  
                    <div class="productinfo">

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
                            <img  onclick="changeUnits(1,<?php echo $i ;?>,productunits[i],productmax[i],<?php echo $n?>)" id="-" src="-.jpeg" alt="Minus mark"  border-radius=50% width="18px">
                            <span id="<?php echo $i ;?>">
                            <?php echo  $productsunits[$i];?>
                            </span>
                            <img onclick="changeUnits(2,<?php echo $i ;?>,productunits[i],productmax[i],<?php echo $n?>)" id="+" src="+.jpeg" alt="Plus mark"  border-radius=50% width="30px">

                            <a href="cart.php?delete=<?php echo $productID;?>" onclick=" return confirmAction()">
                            <img src="delete.jpeg" alt="deletebutton" width="20cm" height="20cm">
                            </a>
      
                 
                            </p>
                        </div>
                        
                        <div class="productimagee">
                            <img src="../Product/<?php echo $productID ?>/1.webp" alt="image1" height="95%" width="180cm">

                        </div>
                    </div>
                <div class="checkboxdiv">
                    <br><br><br><br><br>
                    <input type="checkbox" id="<?php echo $n?>" class="itemcheckbox" value="1" onclick="deselectall();">
                </div>
            </div>
            <br>
            <script>  
                i++; 
            </script>


            <?php  
                }
                }else{
    header('Location:empty.html');
                }
                
            ?>
        </div>
            


    
        
    </body>

</html>