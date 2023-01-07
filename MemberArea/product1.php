<?php
if(!isset($_SESSION)) {
    session_start();
}
if(!isset($_SESSION['email'])){
    header('location: ../signin.php');
}
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
                                <a class="nav-link p-2 font-inter fw-bold" aria-current="page" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-2 font-inter fw-bold" href="aboutus.php">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-2 active font-inter fw-bold" href="product.php">Product Catalog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-2 font-inter fw-bold" href="logout.php">Signout</a>
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
                <div class="card shadow" style="margin-left: -5%; width: 50%; margin-top: 2%;">
                    <img src="<?= $row['productphoto'] ?>" class="rounded float-right my-auto py-3 px-3">
                    
                </div>
                
              </div>
              <div class="col" style="margin-left: -30%;">
                <div class="container">
                  <div class="row" >
                    <div class="card shadow" style="margin-top: 2%;" >
                      <form action="prosestran.php" method="post">
                        <p class="h5 font-inter display-6 text-center fw-bold mb-5 mt-4">Order Details</p>
                        <div class="form-group mb-5">
                            <label for="productid">Product Name</label>
                            <input type="text"  name="productid" value="<?php echo $row['idproduct']; ?>" hidden> 
                            <input type="text" class="forma-control" name="productname" value="<?php echo $row['productname']; ?>" readonly> 
                        </div>
                        <div class="form-group mb-5">
                            <label for="productcategory">Product Stock</label>
                            <input type="text" class="forma-control" name="proquantity" value="<?php echo $row['proquantity']; ?>" readonly> 
                        </div>
                        <div class="form-group mb-5">
                            <label for="productname">Product Price</label>
                            <input type="text" class="forma-control" name="productprice" value="<?php echo $row['productprice']; ?>" readonly> 
                        </div>
                        <div class="form-group mb-5">
                            <label for="productdescription">Order Quantity</label>
                            <input type="text" class="forma-control" name="orderquantity" rows="3" placeholder="Fill with your order quantity" ></textarea>
                        </div>
                        <div class="form-group mb-5">
                            <label for="productprice">Customer Name</label>
                            <input type="text" class="forma-control" name="custname" placeholder="Fill with your name"> 
                        </div>
                        <div class="form-group mb-5">
                            <label for="productprice">Customer Phone</label>
                            <input type="text" class="forma-control" name="custphone" placeholder="Fill with your phone number"> 
                        </div>
                        <div class="form-group mb-5">
                            <label for="productprice">Customer Email</label>
                            <input type="text" class="forma-control" name="custemail" placeholder="Fill with your email"> 
                        </div>
                        <div class="form-group mb-5">
                            <label for="productprice">Delivery Address</label>
                            <input type="text" class="forma-control" name="delivery" placeholder="Fill with your delivery address"> 
                        </div>
                        <div class="custom-file mb-5">
                            <label class="form-label" for="productphoto">Payment Method</label>
                            <select class="forma-control position-static " name="payment" payment = "payment">
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
                        <button class="btn btnproducts1 px-3 fw-bold font-inter">Submit</button>
                      </form>  
                    </div>
                  </div>
                </div>
              </div>
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