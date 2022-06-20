<!DOCTYPE html>
<html>
<head>
    <title>E-Wet Mart - Checkout</title>
    <link href='https://www.soengsouy.com/favicon.ico' rel='icon' type='image/x-icon'/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="payment-pg.css">
</head>
<body style="  background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)),
    url(login-page-photo.jpg);
  height: 160vh !important;
  background-size: cover;
  box-sizing: border-box;
  max-width: 1300px;
  margin: 20px; 
  font-size:16px;">
    
    <style>
        .error{
            color: crimson;
            font-size: 13px;
            font-weight: 900;
            } 
        .p{
            font-size: 14px;
            font-weight: 800;
        }
    </style>
    
<h2>Responsive Checkout Form</h2>
    <?php 
        $name = $mail = $address = $city = $state = $code = "";
        $nameErr = $mailErr = $addressErr = $cityErr = $codeErr = $stateErr = "";
    
    #CONDITIONS CHECK
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(empty($_POST['fname'])){
                $nameErr = "Name is required";
            } else{
                $name = test_input($_POST['fname']);
            }
            if(empty($_POST['email'])){
                $mailErr = "Mail ID is required";
            } else{
                $mail = test_input($_POST['email']);
            }
            if(empty($_POST['address'])){
                $addressErr = "Address is required";
            } else{
                $address = test_input($_POST['address']);
            }
             if(empty($_POST['city'])){
                $cityErr = "City is required";
            } else{
                $city = test_input($_POST['city']);
            }
             if(empty($_POST['state'])){
                $stateErr = "State is required";
            } else{
                $state = test_input($_POST['state']);
            }
             if(empty($_POST['code'])){
                $codeErr = "Pincode is required";
            } else{
                $code = test_input($_POST['code']);
            }
        }
        
        function test_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>
<div class="row">
    <div class="col-75">
        <div class="container">
            <form id="validate" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
                <div class="row">
                    <div class="col-50">
                        <h3>Billing Address</h3>
                        <label for="fname"><i class="fa fa-user"></i> Full Name</label><span class="error">* <?php echo $nameErr?></span>
                        <input type="text" id="fname" name="fname" placeholder="Enter your full name" autocomplete="off">
                        <label for="email"><i class="fa fa-envelope"></i> Email</label><span class="error">*<?php echo $mailErr?></span>
                        <input type="text" id="email" name="email" placeholder="xxxxxxx@gmail.com" autocomplete="off">
                        <label for="adr"><i class="fa fa-address-card-o"></i> Address</label><span class="error">*<?php echo $addressErr?></span>
                        <input type="text" id="adr" name="address" placeholder="Enter your current Address" autocomplete="off">
                        <label for="city"><i class="fa fa-institution"></i> City</label><span class="error">*<?php echo $cityErr?></span>
                        <input type="text" id="city" name="city" placeholder="City Name" autocomplete="off">

                        <div class="row">
                            <div class="col-50">
                                <label for="state">State</label><span class="error">*<?php echo $stateErr?></span>
                                <input type="text" id="state" name="state" placeholder="State Name">
                            </div>
                            <div class="col-50">
                                <label for="pin">Pin Code</label><span class="error">*<?php echo $codeErr?></span>
                                <input type="text" id="code" name="code" placeholder="Pin">
                            </div>
                        </div>
                    </div>

                    <div class="col-50">
                        <h3>Payment</h3>
                        <button class="tablinks-active" onclick="Credit/DebitCard">Credit/Debit Card </button>
                        <button class="tablinks" onclick="NetBanking">Net Banking</button>
                        <button class="tablinks" onclick="CashOnDelivery">Cash On Delivery</button>
                        <button class="tablinks" onclick="UPI">UPI</button>
                        <br><br>
                        <label for="fname" ><h4><u>Credit/Debit Card</u></h4></label>
                        <div class="icon-container">
                            <i class="fa fa-cc-visa" style="color:navy;"></i>
                            <i class="fa fa-cc-amex" style="color:blue;"></i>
                            <i class="fa fa-cc-mastercard" style="color:red;"></i>
                            <i class="fa fa-cc-discover" style="color:orange;"></i>
                        </div>

                        <label for="cname">Name on Card</label>
                        <input type="text" id="cname" name="cardname" placeholder="Enter card name" required>
                        <label for="ccnum" >Credit card number</label>
                        <input type="text" id="ccnum" name="cardnumber" placeholder="xxxx-xxxx-xxxx-xxxx" required>
                        <label for="expmonth">Exp Month</label>
                        <input type="text" id="expmonth" name="expmonth" placeholder="MM">
                        <div class="row">
                            <div class="col-50">
                                <label for="expyear">Exp Year</label>
                                <input type="text" id="expyear" name="expyear" placeholder="YYYY">
                            </div>
                            <div class="col-50">
                                <label for="cvv">CVV</label>
                                <input type="password" id="cvv" name="cvv" placeholder="XXX" required>
                            </div>
                        </div>
                    </div>
                </div>
                <label>
                <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
                </label>
                <input type="submit" value="Continue to Checkout" class="btn">
            </form>
            <span class="p"> <?php 
                if($name == '' and $mail == '' and $address == '' and $city == '' and $state == ''){
                    echo "";
                } else{
                    echo "Greetings ".$name.", the verification code has been emailed to ".$mail.". ";
                    echo "The products will be delivered to ".$address. ", ".$city.", ".$state.",".$code."."; 
                    echo "Thanks for buying from the small scale providers too!";
                }
                ?></span>
        </div>
    </div>
    <div class="col-25">
        <div class="container">
            <h4>Cart <span class="qty"><b>Qty</b></span> <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>4</b></span></h4>
            <p>Tomato<span class="qty-no-1">2</span> <span class="price">Rs 50</span></p>
            <p>Onion <span class="qty-no-2">0.5</span><span class="price">Rs 60</span></p>
            <p>Brinjal<span class="qty-no-3">1</span> <span class="price">Rs 20</span></p>
            <p>Carrot<span class="qty-no-4">2</span> <span class="price">Rs 30</span></p>
            <hr>
            <p>Total <span class="price" style="color:black"><b>Rs 160</b></span></p>
        </div>
        <div class="claimer">
            <h6><em>* Quantity in terms of Kg</em></h6>
        </div>           
    </div>
</div>
</body>
</html>