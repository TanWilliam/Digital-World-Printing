<?php
if(!isset($_SESSION)) {
    session_start();
}
if(!isset($_SESSION['email'])){
    header('location: ../signin.php');

}

$con = mysqli_connect("localhost","root","","dwpprint");

?>

<html>
    <head>
        <link href="style.css" rel="stylesheet" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	    <script src=".../navbar.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<title>Member Area</title>
    </head>
    <body>
		<header>
            <div class="navbar navbar-light">
                <a class="navbar-brand fs-5 font-inter fw-bold text-white" href="#">Digital World Company</a>
                <a class="navbar-brand nav-mail fs-5 font-inter fw-bold text-white" href="#">Dwprinting@order.com</a>
                <a class="navbar-brand nav-phone fs-5 font-inter fw-bold text-white" href="#">+5303534123</a>
            </div>
            <nav id="navbar_top" class="navbar navbar-expand-lg navbar-light bg-white shadow">
                <div class="container-fluid">
                    <img class="navbar-brand" src="images/DWP.png">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse " id="navbarNav">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active p-2 font-inter fw-bold" aria-current="page" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-2 font-inter fw-bold" href="aboutus.php">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-2 font-inter fw-bold" href="product.php">Product Catalog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-2 font-inter fw-bold" href="logout.php">Signout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="card shadow" style="width: 90%;">
            <img class="card-img-top position-static " src="Images/Gambar1.png" alt="Card image cap">
            <div class="card-body">
              <h5 id="type" class="card-title font-inter fw-bold fs-1">Digital World Company</h5>
              <p class="card-text fs-4">We are able to serve you for your digital printing. <br> Our product includes stickers, card name, posters, etc.</p>
              <a href="aboutus.php" class="btn btn-about position-static fw-bold font-inter">About Us</a>
              <input class="form-control position-static" type="text" placeholder="Search for products">
            </div>
          </div>
          <p class="h2 font-inter fw-bold fs-1 mx-auto px-5 pt-5">Our Products</p>
          <button class="btn btnproducts1 px-3 fw-bold font-inter" type="submit" onclick="window.location.href='ourproduct.php'">See All</button>

          <div class="container">
            <div class="row">
              <div class="col-sm">
                <div class="card cardsstyle mx-auto" style="max-width: auto;">
                    <img class="card-img-top1" src="Images/Sticker.png" alt="Card image cap">
                    <div class="card-body mx-auto">
                      <a href="product.php" class="btn btnproducts ">Stickers</a>
                    </div>
                  </div>
              </div>
              <div class="col-sm">
                <div class="card cardsstyle mx-auto" style="max-width: auto;">
                    <img class="card-img-top2" src="Images/A4.png" alt="Card image cap">
                    <div class="card-body mx-auto">
                        <a href="product.php" class="btn btnproducts">Posters</a>
                    </div>
                  </div>
              </div>
              <div class="col-sm">
                <div class="card cardsstyle mx-auto" style="max-width: auto;">
                    <img class="card-img-top3" src="Images/card.png" alt="Card image cap">
                    <div class="card-body mx-auto">
                      <a href="product.php" class="btn btnproducts">Cards</a>
                    </div>
                  </div>
              </div>
              <div class="col-sm">
                <div class="card cardsstyle mx-auto" style="max-width: auto;">
                    <img class="card-img-top4" src="Images/A4.png" alt="Card image cap">
                    <div class="card-body mx-auto">
                      <a href="product.php" class="btn btnproducts">Print A4</a>
                    </div>
                  </div>
              </div>
            </div>
          </div>


          <div class="card shadow pb-2" style="width: 90%;">
            <div class="card-body">
                <div class="container">
                  <p class="h2 font-inter fw-bold fs-1 text-center pt-auto">Our Experience</p>
                    <div class="row">
                      <div class="col-sm fw-bold fs-3 mt-5 text-center">
                        Company Project
                        <p class="h1 font-inter fw-bold display-1 text-center pt-auto">250+</p>
                        <p class="h2 font-inter fs-5 text-center pt-auto">Trusted and cooperated with big companies</p>
                      </div>
                      <div class="col-sm fw-bold fs-3 mt-5 text-center">
                        Printed
                        <p class="h1 font-inter fw-bold display-1 text-center pt-auto">8420+</p>
                        <p class="h2 font-inter fs-5 text-center pt-auto">We print thousands of products</p>
                      </div>
                      <div class="col-sm fw-bold fs-3 mt-5 text-center">
                        Years
                        <p class="h1 font-inter fw-bold display-1 text-center pt-auto">2</p>
                        <p class="h2 font-inter fs-5 text-center pt-auto">Over 2 years serve products for company</p>
                      </div>
                    </div>
                  </div>
            </div>
          </div>

          <p class="h1 font-inter fw-bold display-2 text-center pt-5">Why Us?</p>

          <div class="container">
            <div class="row">
              <div class="col">
                <img src="Images/Gambar2.png" class="rounded gambar2img float-left pt-5" >
              </div>
              <div class="col-6">
                <p class="h2 tulis1 font-inter fw-bold fs-1 ">Affordable prices</p>
                <p class="h3 tulis2 font-inter fs-5 text-left ">The price offered is the most affordable and <br> cheapest price among others.</p>
              </div>
            </div>
          </div>

          <div class="container pt-1">
            <div class="row">
              <div class="col">
                <p class="h2 tulis3 font-inter fw-bold fs-1 text-right">Best Quality</p>
                <p class="h3 tulis4 font-inter fs-5 text-right ">Undoubted print quality, with premium paper <br> materials and with a Computer To Plate <br> (CTP) machine.</p>
              </div>
              <div class="col-6">
                <img src="Images/Gambar3.png" class="rounded gambar3img float-left pt-5" >
              </div>
            </div>
          </div>
           
          <div class="container">
            <div class="row">
              <div class="col">
                <img src="Images/Gambar4.png" class="rounded gambar4img float-left pt-5" >
              </div>
              <div class="col-6">
                <p class="h2 tulis5 font-inter fw-bold fs-1 ">Fast Delivery</p>
                <p class="h3 tulis6 font-inter fs-5 text-right ">Does not require a long time in the process <br> of processing and shipping.</p>
              </div>
            </div>
          </div>

          

        <!-- FOOTER -->
          <footer class="footerdwp text-center text-lg-start">
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
</html>