<html>
    <head>
        <link href="style.css" rel="stylesheet" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="navbar.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <title>Digital World Printing</title>
    </head>
    <body>
        <nav class="navbar navbar-light">
            <a class="navbar-brand fs-5 font-inter fw-bold text-white" href="#">Digital World Company</a>
            <a class="navbar-brand nav-mail fs-5 font-inter fw-bold text-white" href="#">Dwprinting@order.com</a>
            <a class="navbar-brand nav-phone fs-5 font-inter fw-bold text-white" href="#">+5303534123</a>
        </nav>

        <nav id="navbar_top" class="navbar navbar-expand-lg navbar-light bg-white shadow">
            <div class="container-fluid">
              <img class="navbar-brand" src="images/DWP.png">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link p-2 font-inter fw-bold" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link p-2 font-inter fw-bold" aria-current="page" href="aboutus.html">About Us</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link p-2 font-inter fw-bold" href="ourproduct.html">Our Product</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link p-2 font-inter fw-bold" href="contactus.html">Contact</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active nav-profile p-2 " href="signin.php"><img src="Images/account.png" class="accountimage"></a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>

          <div class="card pt-5" style="width: 90%;">
            <div class="card-body">
                <div class="cardsign pt-5" style="width: 50%;">
                    
                    <div class="card-body">
                        <img src="Images/DWPWhite.png" style="width: 80%; margin-left: 10%;">
                        <p class="h3 welcometext font-inter display-4 text-left fw-bold text-center" style="margin-top: -5%;">Welcome</p>
                        <p class="h3 welcometext font-inter fs-4 text-center pt-5 pb-2" style="margin-left: 0%;">Already have an account?</p>
                        <button class="btn btnsignin px-3 fw-bold font-inter " type="submit" onclick="window.location.href='signin.php'">Login</button>
                        <p class="h3 font-inter fs-5 text-center pt-5" style="width: fit-content; margin-left: 51%; "></p>
                        <p class="h3 font-inter fs-5 text-center pt-5" style="width: fit-content; margin-left: 51%;"></p>
                        <p class="h3 font-inter fs-5 text-center pt-5" style="width: fit-content; margin-left: 51%; "></p>
                        <p class="h3 font-inter fs-5 text-center pt-5" style="width: fit-content; margin-left: 51%; "></p>
                    </div>
                  </div>
                  <p class="h3 font-inter display-5 text-left fw-bold text-center" style="margin-left: 60%; margin-top: -65%; width: fit-content;">Create Account</p>

                    <!--Message Error Start-->
                    <?php
                        if(isset($_GET['pesan'])){
                            $pesan = $_GET['pesan'];
                            if($pesan == "username"){
                                echo '<h5 class="p-3 w-100 my-2 ">Name Must Be Filled!</h3>';
                            } else if ($pesan == "email"){
                                echo '<h5 class="p-3 w-100 my-2 ">Email Must Be Filled!</h3>';
                            } else if ($pesan == "invalid"){
                                echo '<h5 class="p-3 w-100 my-2 ">Email Not Valid!</h3>';
                            } else if ($pesan == "password"){
                                echo '<h5 class="p-3 w-100 my-2 ">Password Must Be Filled!</h3>';
                            } else if ($pesan == "confirm"){
                                echo '<h5 class="p-3 w-100 my-2 ">Password Confirmation Must Be Filled!</h3>';
                            } else if ($pesan == "notmatch"){
                                echo '<h5 class="p-3 w-100 my-2 ">Password Not Matched!</h3>';
                            }
                        }
                    ?>
                    <!--Message Error End-->

                    <!--Register Form Start-->
                    <form action="registerproses.php" method="post">
                      <div class="row pt-5 " style="margin-left: 50%;">
                        <div class="col-6 col-sm-3">
                            <p class="h3 font-inter fs-4 text-center pt-4 " style="width: fit-content;">Name</p>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-6 col-sm-3 pt-2 pb-5" style="width: 100%;">
                            <input type="text" class="form-control-pwsign" name="uname" placeholder="Insert username...">
                        </div>
                      </div>
                      <div class="row pt-1 " style="margin-left: 50%;">
                        <div class="col-6 col-sm-3">
                            <p class="h3 font-inter fs-4 text-center pt-2" style="width: fit-content;">Email</p>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-6 col-sm-3 pt-2 pb-5" style="width: 100%;">
                            <input type="email" class="form-control-pwsign" name="umail" placeholder="Insert active email...">
                        </div>
                      </div>
                      <div class="row pt-1" style="margin-left: 50%;">
                        <div class="col-6 col-sm-3">
                            <p class="h3 font-inter fs-4 text-center pt-2" style="width: fit-content;">Password</p>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-6 col-sm-3 pt-2 pb-5" style="width: 100%;">
                            <input type="password" class="form-control-pwsign" name="upass" placeholder="Insert password...">
                        </div>
                      </div>
                      <div class="row pt-1" style="margin-left: 50%;">
                        <div class="col-6 ">
                            <p class="h3 font-inter fs-4 text-center pt-2" style="width: 100%;">Confirmation Password</p>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-6 col-sm-3 pt-2 pb-5" style="width: 100%;">
                            <input type="password" class="form-control-pwsign" name="uconfirm" placeholder="Insert confirmation password...">
                        </div>
                      </div>
                    <button class="btn btnproducts1 px-3 fw-bold font-inter " type="submit" style="margin-left: 70%; margin-top: 1%;">Register</button>
                  </form>
                  <!--Form Register End-->
            </div>
          </div>

           <!-- FOOTER -->
           <footer class="footerdwpabout text-center text-lg-start pt-1">
            <!-- Grid container -->
            <div class="container p-4">
              <!--Grid row-->
              <div class="row">
                <!--Grid column-->
                <div class="col">
                  <img src="Images/DWPWhite.png" class="rounded gambardwp float-left" >
                </div>

                <div class="col">
                  <h5 class="text-uppercase font-inter fw-bold">About Us</h5>
          
                  <p class="font-inter">
                    Digital World Printing is a printing <br>
                    company that has been established since <br>
                    2020 and has served more than dozens <br>
                    of clients to meet printing needs on a <br>
                    small or large scale.
                  </p>
                </div>
                <!--Grid column-->
          
                <!--Grid column-->
                <div class="col">
                  <h5 class="text-uppercase font-inter fw-bold">Contact Us</h5>
          
                  <p class="font-inter">
                    Dwprinting@order.com <br> +5303534123
                  </p>
                </div>
                <!--Grid column-->
              </div>
              <!--Grid row-->
            </div>
            <!-- Grid container -->
          </footer>
	<script src="script.js"></script>
    </body>
</html>