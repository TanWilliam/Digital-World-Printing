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
	    <script src=".../navbar.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<title>Admin Area</title>
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
                                <a class="nav-link p-2 font-inter fw-bold" href="transaction.php">Transaction</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-2 font-inter fw-bold" href="product.php">Product</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-2 font-inter fw-bold" href="member.php">Member</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-2 font-inter fw-bold" href="logout.php">Signout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="ecommerce-widget">
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-muted">Total Product</h5>
                                    <div class="metric-value d-inline-block">
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

                                            $pdo = koneksiDb();
                                            $sql = "SELECT COUNT(idproduct) as totaltran from product;";
                                            $hasil = $pdo->query($sql);
                                            $row = $hasil->fetch();
                                        ?>
                                        <h1 class="mb-1"><?= $row['totaltran'] ?></h1>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-muted">Total Member</h5>
                                    <div class="metric-value d-inline-block">
                                        <?php
                                            $pdo = koneksiDb();
                                            $sql = "SELECT COUNT(userid) as totaluser from user where role IS NULL;";
                                            $hasil = $pdo->query($sql);
                                            $row = $hasil->fetch();
                                        ?>
                                        <h1 class="mb-1"><?= $row['totaluser'] ?></h1>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-muted">Total Transaction</h5>
                                    <div class="metric-value d-inline-block">
                                        <?php
                                            $pdo = koneksiDb();
                                            $sql = "SELECT COUNT(transactionid) as totaltran from Transaction;";
                                            $hasil = $pdo->query($sql);
                                            $row = $hasil->fetch();
                                        ?>
                                        <h1 class="mb-1"><?= $row['totaltran'] ?></h1>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-muted">Total Transaction Value</h5>
                                    <div class="metric-value d-inline-block">
                                        <?php
                                            $pdo = koneksiDb();
                                            $sql = "SELECT sum(OrderPrice) as totalpay from Transaction;";
                                            $hasil = $pdo->query($sql);
                                            $row = $hasil->fetch();
                                        ?>
                                        <h1 class="mb-1"><?= $row['totalpay'] ?></h1>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
 
            <div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Recent Orders</h5>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="bg-light">
                                        <tr class="border-0">
                                            <th class="border-0">Transaction ID</th>
                                            <th class="border-0">Product Name</th>
                                            <th class="border-0">Payment Method</th>
                                            <th class="border-0">Quantity</th>
                                            <th class="border-0">Price</th>
                                            <th class="border-0">Customer</th>
                                            <th class="border-0">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $pdo = koneksiDb();
                                            $sql = "SELECT TransactionID, productname, PaymentMethod, OrderAmount, OrderPrice, CustName, TransStatus from Transaction ts 
                                                        join payment ps on ts.PaymentID = ps.PaymentID
                                                        join product pdt on ts.idproduct = pdt.idproduct
                                                        join TransactionStatus tss on ts.StatusID = tss.StatusID;";
                                            $hasil = $pdo->query($sql);

                                            while($row = $hasil->fetch()):

                                        ?>
                                        <tr>
                                            <td><?= $row['TransactionID']; ?></td>
                                            <td><?= $row['productname']; ?></td>
                                            <td><?= $row['PaymentMethod']; ?></td>
                                            <td><?= $row['OrderAmount']; ?></td>
                                            <td><?= $row['OrderPrice']; ?></td>
                                            <td><?= $row['CustName']; ?></td>
                                            <td><?= $row['TransStatus']; ?></td>
                                        </tr>
                                        <?php
                                            endwhile;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
            </div>
            <br/>
            <br/>
            <br/>
            <br/>

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