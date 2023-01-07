<?php
  $con = mysqli_connect("localhost", "root", "", "dwpprint");
  $query = "SELECT idproduct, CategoriesName, productname, productdescription, productprice, proquantity, productphoto from Product pt JOIN ProductCategories pct ON pt.CategoriesID = pct.CategoriesID;";
  $result = mysqli_query($con, $query);
?>

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
                    <a class="nav-link p-2 font-inter fw-bold" aria-current="page" href="aboutus.php">About Us</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active p-2 font-inter fw-bold" href="ourproduct.php">Our Product</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link p-2 font-inter fw-bold" href="contactus.php">Contact</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link nav-profile p-2 " href="signin.php"><img src="Images/account.png" class="accountimage"></a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>

          <input class="form-ourprducts position-static mx-5 my-5 font-inter" type="text" placeholder="Search for products">

          <div class="cardourproduct shadow" style="width: 90%;">
            <div class="card-body ">
                <div class="row">
                    <div class="col-3">
                        <img src="Images/Gambar5.png" class="rounded gambar5img float-left pt-5" >
                    </div>
                    <div class="col-6">
                        <p class="h3 tulisbastsale font-inter display-2 text-left fw-bold text-left "> Best Sale</p>
                        <p class="h3 tulisvinylcard font-inter display-5 text-left text-right pt-1 "> Sticker Vinyl</p>
                    </div>
                    <div class="col-3">
                        <img src="Images/Gambar6.png" class="rounded gambar6img float-right pt-5" >
                    </div>
                  </div>
            </div>
          </div>

            
          <div class = "cardourproduct shadow mt-5" style="width: 90%;">
          <table>
          <?php
            while($rows=mysqli_fetch_assoc($result))
            {
          ?>
             <section style="background-color: #eee;">
              <div class="container py-1">
                <div class="row justify-content-center mb-3">
                  <div class="col-md-12 col-xl-10">
                    <div class="card shadow-0 border rounded-3">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                            <div class="bg-image hover-zoom ripple rounded ripple-surface">
                              <img src="<?php echo $rows['productphoto'] ?>"
                                class="w-100" />
                              <a href="#!">
                                <div class="hover-overlay">
                                  <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                                </div>
                              </a>
                            </div>
                          </div>
                          <div class="col-md-6 col-lg-6 col-xl-6">
                            <h5><?php echo $rows['productname'] ?></h5>
                            <div class="d-flex flex-row">
                              <div class="text-danger mb-1 me-2">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                              </div>
                            </div>
                            <div class="mt-0 mb-0 text-muted small">
                              <span><?php echo $rows['CategoriesName'] ?></span>
                            </div>
                            <p class="text-truncate mb-4 mb-md-0">
                              <?php echo $rows['productdescription'] ?>
                            </p>
                          </div>
                          <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                            <div class="d-flex flex-row align-items-center mb-1">
                              <h4 class="mb-1 me-1">Rp. <?php echo $rows['productprice'] ?></h4>
                            </div>
                            <div class="d-flex flex-column mt-4">
                            <a href="product1.php?idproduct=<?php echo $rows['idproduct']; ?>" class="btn btn-sm btn-success"> 
                                <span data-feather="edit"></span>Details</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php
		}
		?>
          </table>
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

    </body>
</html>