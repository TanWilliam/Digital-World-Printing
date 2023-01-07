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
		<title>Transaction Detail</title>
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
                                <a class="nav-link p-2 font-inter fw-bold" aria-current="page" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active p-2 font-inter fw-bold" href="transaction.php">Transaction</a>
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

            <!--TABLE DATA TRANSAKSI-->
            <div class="table-responsive mt-3">
                <table class="table">
                    <tr>
                        <th>Transaction ID</th>
                        <th>Product Name</th>
                        <th>Payment Method</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Customer</th>
                        <th>Status</th>
                    </tr>
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
                        $sql = "SELECT TransactionID, productname, PaymentMethod, OrderAmount, OrderPrice, CustName, TransStatus from Transaction ts 
                                join payment ps on ts.PaymentID = ps.PaymentID
                                join product pdt on ts.idproduct = pdt.idproduct
                                join TransactionStatus tss on ts.StatusID = tss.StatusID
                                ORDER BY TransactionID ASC;";
                        $hasil = $pdo->query($sql);

                        $i = 0;
                        while($row = $hasil->fetch()):
                        $i++;
                    ?>
                    <tr>
                        <td><a href="detailtrans.php?TransactionID=<?= $row['TransactionID']; ?>"><?= $row['TransactionID']; ?></a></td>
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
                </table>
            </div>
            <!--TABLE DATA TRANSAKSI-->

            <br/><br/><br/><br/><br/><br/><br/>

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