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
                    <a class="nav-link p-2 font-inter fw-bold" href="ourproduct.php">Our Product</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link p-2 font-inter fw-bold" href="contactus.php">Contact</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active nav-profile p-2 " href="signin.php"><img src="Images/account.png" class="accountimage"></a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>

          <?php
             function koneksiDb(){
              try{
                  $dsn = "mysql:host=localhost;dbname=dwpprint";
                  $pdo = new PDO($dsn, 'root','');
                  return $pdo;
              } catch(PDOException $e){
                  return $e;
              }
          }

              //Ambil data ID
              $pdo = koneksiDb();
              $idproduct = $_GET['idproduct'];

              $select = $pdo->query("SELECT idproduct, CategoriesName, productname, productdescription, productprice, 
              proquantity, productphoto from Product pt JOIN ProductCategories pct ON pt.CategoriesID = pct.CategoriesID
              WHERE idproduct='".$idproduct."' LIMIT 1;");
              $row = $select->fetch();

          ?>

          <div class="container pt-5">
            <div class="row px-5" >
              <div class="col">
                <div class="card shadow" style="margin-left: -10%; width: 50%; margin-top: 2%;">
                    <img src="<?= $row['productphoto'] ?>" class="rounded float-right my-auto py-3 px-3">
                </div>
              </div>
              <div class="col" style="margin-left: -30%;">
                <div class="container">
                  <div class="row" >
                    <div class="col-6 col-sm-3">
                      <p class="h3 font-inter display-4 text-left fw-bold"><?= $row['CategoriesName'] ?></p>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-6 col-sm-3">
                      <p class="h3 font-inter fs-1 text-left" style="width: 400%;"><?= $row['productname'] ?></p>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-6 col-sm-3">
						<span id="currency" class="tulisjd" style="width: 400%;"> Rp. </span>
						<span id="price" class="tulisjd" style="width: 400%; margin-top: -20%;"><?= $row['productprice'] ?></span>
               
                    </div>
                    <div class="w-100"></div>
                    <div class="col-6 col-sm-3 ">
                      <button class="buttonadda">+</button>
                      <span class="num" >1</span>
                      <button class="buttonminus">-</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <p class="card-text fs-4" style="margin-left: 4.2%;"><?= $row['productdescription'] ?></p>
   
          <div class="card" style="margin-left: 5%; width: 90%;">
            <div class="card-body">
            </div>
          </div>

          <div class="container pt-5">
            <div class="row">
              <div class="col-6 col-sm-3">
                <p class="h3 font-inter display-2 text-left fw-bold pb-3" style="width: 400%;">Shipping Delivery</p>
              </div>
              <div class="w-100 pt-3"></div>
              <div class="col-6 col-sm-3">
                <input class="form-control-product position-static " type="text" id="address" address = "adress" placeholder="Insert your address...">
              </div>
              <div class="w-100"></div>
              <div class="col-6 col-sm-3">
                <p class="h3 font-inter fs-2 text-left pt-5" style="width: 400%;">Estimated production time</p>
              </div>
              <div class="w-100"></div>
              <div class="col-6 col-sm-3">
                <p class="h3 font-inter fs-1 text-left fw-bold" style="width: 400%;">3 Days</p>
              </div>
            </div>
          </div>


          <div class="container pt-5 pb-5">
            <div class="row">
              <div class="col-6 col-sm-3">
                <p class="h3 font-inter display-2 text-left fw-bold pb-3" style="width: 400%;">Payment Method</p>
              </div>
              <div class="w-100 pt-3"></div>
              <div class="col-6 col-sm-3">
                <select class="form-control-product position-static " id="payment" payment = "payment">
                <?php
                                     

                                        $pdo = koneksiDb();
                                        $sql = "SELECT * from Payment;";
                                        $hasil = $pdo->query($sql);
                                        while($row = $hasil->fetch()):
                                    ?>
                                        <option value="<?= $row['PaymentID'] ?>"><?= $row['PaymentMethod'] ?></option>
                                    <?php
                                endwhile;
                                ?>
                </select>
              </div>
              <div class="w-100"></div>
              <div class="col-6 col-sm-3 pt-4">
                <span id="text" class="tulisjd" >Product Name</span>
				<span class="tulisjd" id="kurung1">( </span>
				<span class="jumlah font-inter fw-bold fs-4">1</span>
				<span class="tulisjd" id="kurung2"> )</span>
              </div>
              <div class="w-100"></div>
              <div class="col-6 col-sm-3">
                <span class="tulisjd" id="currency"> Rp. </span>
				<span class="tulisjd" id="totalHarga">5000</span>
              </div>
            </div>
          </div>

          <button class="btn btnproducts1 px-3 fw-bold font-inter " type="submit" onclick="window.location.href='ceksession.php'" style="margin-left: 45%; margin-top: 1%;">Pay Now</button>

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