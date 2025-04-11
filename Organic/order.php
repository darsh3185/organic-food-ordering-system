<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Manual CSS -->
     <!-- <link rel="stylesheet" href="order.css"> -->

    <title>order products</title>
    <link rel="icon" href="Images/logo.png"
  </head>
  <body>
    <div class="row" style="padding-left: 400px;">
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-weight: Bold; text-align: center;padding-top: 30px;">Place Your Order</h4>
          <form action="#" method="POST">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" class="form-control" name="firstName" placeholder="" value="" required="">
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" name="lastName" placeholder="" value="" required="">
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>
    
            <div class="mb-3">
              <label for="email">Email <span class="text-muted">(Optional)</span></label>
              <input type="email" class="form-control" name="email" placeholder="you@example.com">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>
    
            <div class="mb-3">
              <label for="address">Address</label>
              <input type="text" class="form-control" name="address1" placeholder="1234 Main St" required="">
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>
    
            <div class="mb-3">
              <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" name="address2" placeholder="Apartment or suite">
            </div>
    
            <div class="row">
              <div class="col-md-5 mb-3">
                <label for="country">Country</label>
                <select class="custom-select d-block w-100" name="country" required="">
                  <option value="">Choose...</option>
                  <option value="India">India</option>
                </select>
              </div>
              <div class="col-md-4 mb-3">
                <label for="state">State</label>
                <select class="custom-select d-block w-100" name="state" required="">
                  <option value="">Choose...</option>
                  <option value="Andhra Pradesh">Andhra Pradesh</option>
                  <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                  <option value="Assam">Assam</option>
                  <option value="Bihar">Bihar</option>
                  <option value="Chhattisgarh">Chhattisgarh</option>
                  <option value="Goa">Goa</option>
                  <option value="Gujarat">Gujarat</option>
                  <option value="Haryana">Haryana</option>
                  <option value="Himachal Pradesh">Himachal Pradesh</option>
                  <option value="Jharkhand">Jharkhand</option>
                  <option value="Karnataka">Karnataka</option>
                  <option value="Kerala">Kerala</option>
                  <option value="Madhya Pradesh">Madhya Pradesh</option>
                  <option value="Maharashtra">Maharashtra</option>
                  <option value="Manipur">Manipur</option>
                  <option value="Meghalaya">Meghalaya</option>
                  <option value="Nagaland">Nagaland</option>
                  <option value="Odisha">Odisha</option>
                  <option value="Punjab">Punjab</option>
                  <option value="Rajasthan">Rajasthan</option>
                  <option value="Sikkim">Sikkim</option>
                  <option value="Tamil Nadu">Tamil Nadu</option>
                  <option value="Telangana">Telangana</option>
                  <option value="Tripura">Tripura</option>
                  <option value="Uttarakhand">Uttarakhand</option>
                  <option value="Uttar Pradesh">Uttar Pradesh</option>
                  <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                  <option value="Chandigarh">Chandigarh</option>
                  <option value="Dadra and Nagar Haveli and Daman and Diu">Dadra and Nagar Haveli and Daman and Diu</option>
                  <option value="Delhi (National Capital Territory of Delhi)">Delhi (National Capital Territory of Delhi)
                </option>
                  <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                  <option value="Ladakh">Ladakh</option>
                  <option value="Lakshadweep">Lakshadweep</option>
                  <option value="Puducherry">Puducherry</option>

                </select>
                <div class="invalid-feedback">
                  Please provide a valid state.
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="zip">Zip</label>
                <input type="text" class="form-control" name="zip" placeholder="" required="">
                <div class="invalid-feedback">
                  Zip code required.
                </div>
              </div>
            </div>
            <hr class="mb-4">
            <label for="rating">Select Product :</label>
            <select class="custom-select d-block w-100" name="Products" required="">
                <option value="">Choose...</option>
                <option value="Organic Papaya">Organic Papaya</option>
                <option value="Organic Kiwi ">Organic Kiwi </option>
                <option value="Organic Apple">Organic Apple</option>
                <option value="Organic Almond ">Organic Almond </option>
                <option value="Organic Cashew">Organic Cashew</option>
                <option value="Organic Pista With Shail">Organic Pista With Shail</option>
                <option value="Organic Tomato">Organic Tomato</option>
                <option value="Organic Brocoli">Organic Brocoli</option>
                <option value="Organic Combo Of Mixed Vegitables">Organic Combo Of Mixed Vegitables</option>
            </select>

    
            <h4 class="mb-3" style=Padding-top= 20px;>Payment Method</h4>
    
            <div class="d-block my-3">
              
              <div class="custom-control custom-radio">
                <input id="cash" name="paymentMethod" type="radio" class="custom-control-input" value="Cash On Delivery" required="">
                <label class="custom-control-label" for="cash">Cash On Delivery</label>
              </div>
            </div>
            <div class="row">
            <hr class="mb-4">
            <button class="btn btn-success btn-lg btn-block" type="submit-btn" style="width: 700px; margin-top: 40px;" name="submit-btn">place Your Order</button>
            </div>
          </form>
          <!-- firstName  lastName  email   address1  address2  country  state   zip   paymentMethod-->

          <!-- Database Connection Started  -->
<?php
 $server = "localhost";
 $user = "root";
 $pass = "";
 $db ="organic";
 $consss = mysqli_connect($server,$user,$pass,$db);
 if(isset($_POST['submit-btn'])){
   $firstName  = $_POST['firstName'];
   $lastName  = $_POST['lastName'];
   $email  = $_POST['email'];
   $add1 = $_POST['address1'];
   $add2 = $_POST['address2'];
   $country = $_POST['country'];
   $state = $_POST['state'];
   $zip = $_POST['zip'];
   $Products = $_POST['Products'];
   $payment = $_POST['paymentMethod'];
   $sqlss = "INSERT INTO order(FirstName,LastName,Email,Address1,Address2,Country,State,Zip,Products,Payment_Method)VALUES('$firstName','$lastName','$email','$add1','$add2','$country','$state','$zip','$Products','$payment')";
   $result = mysqli_query($consss,$sqlss);
 }
 ?>
           <!-- Database Connection ended  -->
      </div>
      </div>
      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">© 2019-2025 Prakruti Organic Food .Ltd </p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Privacy</a></li>
          <li class="list-inline-item"><a href="#">Terms</a></li>
          <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
      </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>