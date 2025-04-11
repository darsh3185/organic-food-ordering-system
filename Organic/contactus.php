<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Manual Css -->
     <link rel="stylesheet" href="Contactus.css">

    <title>Contact Us</title>
    <link rel="icon" href="Images/logo.png"
  </head>
  <body>
    <div class="contactUs">
    <div class="title">
       <h1>Get In Touch</h1>
    </div>
    <div class="boxc">
      <div class=".contact from">
        <h3 style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Send A Message</h3>
        <form action="#" method="post">
          <div class="formbox">
           <div class="rows50">
            <div class="inputbox">
              <span>First Name</span>
              <input type="text" placeholder="First Name" name="fname">
            </div>
            <div class="inputbox">
              <span>Last Name</span>
              <input type="text" placeholder="Last Name" name="lname">
            </div>
           </div> 

           <div class="rows50">
            <div class="inputbox">
              <span>Email</span>
              <input type="text" placeholder="abc@123gmail.com" name="email">
            </div>
            <div class="inputbox">
              <span>Mobile</span>
              <input type="text" placeholder="+91 000 000 0000" name="phone">
            </div>
           </div> 


           <div class="rows100">
            <div class="inputbox">
              <span>Message</span>
              <input type="text" name="message" placeholder="Enter Your Message">
            </div>
           </div> 

           <div class="rows100">
            <div class="inputbox">
              <input type="submit" value="send" name="submit-btn">
            </div>
           </div>

           <!--fname  lname   email  phone   msg -->

           <!-- database conntection started -->
           <?php
           $server = "localhost";
           $user = "root";
           $pass = "";
           $db ="organic";
           $con = mysqli_connect($server,$user,$pass,$db);
           if(isset($_POST['submit-btn'])){
             $fname  = $_POST['fname'];
             $lname  = $_POST['lname'];
             $email  = $_POST['email'];
             $phone  = $_POST['phone'];
             $message  = $_POST['message'];
             $sql = "INSERT INTO contact(FirstName,LastName,Email,Phone,Message)VALUES('$fname','$lname','$email','$phone','$message')";
             $result = mysqli_query($con,$sql);
           }
           ?>
            <!-- database conntection ended -->


          </div>
        </form>
      </div>
      <div class=".contact info">
        <h3 style="text-align: center; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; margin-top: 20px;">Contact Info</h3>
        <div class="infobox">
          <div>
            <span><ion-icon name="location"></ion-icon></span>
            <p>158, Balaji Apartment, Shirdi <br>INDIA</p>
          </div>
          <div>
            <span><ion-icon name="mail"></ion-icon></span>
            <a href="mailtoprakruti.org@gmail.com">prakruti.org@gmail.com</a>
          </div>
          <div>
            <span><ion-icon name="call"></ion-icon></span>
            <a href="tel:+919262489658 ">+91 926 248 9658</a>
          </div>
          <!-- social media -->
           <ul class="sci">
           <li><a href="#"><ion-icon name="logo-facebook"></ion-icon></a></li>
           <li><a href="#"><ion-icon name="logo-twitter"></ion-icon></a></li>
           <li><a href="#"><ion-icon name="logo-instagram"></ion-icon></a></li>
           <li><a href="#"><ion-icon name="logo-linkedin"></ion-icon></a></li>
          </ul>

        </div>
      </div>

      <div class=".contact map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d15018.683321091608!2d74.47282776167941!3d19.769135135844294!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x3bdc5b60e96cc0a9%3A0x837c44b56208eaa1!2sBalaji%2C%20Sai%20Nagar%2C%20Shirdi%2C%20Maharashtra!3m2!1d19.7645364!2d74.4762124!5e0!3m2!1sen!2sin!4v1739381820552!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  </body>
</html>