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
            <!--Header-->
            <div class="navbar navbar-light">
                <a class="navbar-brand fs-5 font-inter fw-bold text-white" href="#">Digital World Company</a>
                <a class="navbar-brand nav-mail fs-5 font-inter fw-bold text-white" href="#">Dwprinting@order.com</a>
                <a class="navbar-brand nav-phone fs-5 font-inter fw-bold text-white" href="#">+5303534123</a>
            </div>
            <!--Navbar-->
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

            <!--Koneksi untuk ambil data-->
            <?php
                //Koneksi ke DB
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
                    $trans_id = $_GET['TransactionID'];

                //Query 
                $select = $pdo->query("SELECT TransactionID, OrderAddress,CustPhone, OrderAmount, productname, OrderAddress, PaymentMethod, OrderAmount, OrderPrice, CustName, TransStatus from Transaction ts 
                join payment ps on ts.PaymentID = ps.PaymentID
                join product pdt on ts.idproduct = pdt.idproduct
                join TransactionStatus tss on ts.StatusID = tss.StatusID
                WHERE TransactionID='".$trans_id."' LIMIT 1");
                $row = $select->fetch();

            ?>

            <br/>
            <br/>
            <p class="h2 font-inter fw-bold fs-1 text-center pt-auto">Detail Transaction</p>

            <!--Tampilkan Transaction ID-->
            <div class="container w-80">
                <br/>
                <div class="d-flex justify-content-between align-items-center py-3">
                    <h2 class="h5 mb-0"><a href="#" class="text-muted"></a>Transaction ID : <?= $row['TransactionID'] ?></h2>
                </div>
            </div>

            <!--Tampilkan Data Billing dan Delivery-->
            <div class="d-flex card mb-2 col-lg-11">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <h3 class="h6">Billing Address</h3>
                                <p><strong><?= $row['CustName'] ?></strong><br>
                                <?= $row['OrderAddress'] ?> 
                        </div>
                        <div class="col-lg-6">
                            <h3 class="h6">Delivery address</h3>
                            <address>
                                <strong><?= $row['CustName'] ?></strong><br>
                                <?= $row['OrderAddress'] ?> <br/>
                                <abbr title="Phone">Phone Number:</abbr> <?= $row['CustPhone'] ?>
                            </address>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-9">
                <!-- Details -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="mb-3 d-flex justify-content-between">
                            <div>
                                <span class="me-3">#<?= $row['TransactionID'] ?></span>
                                <span class="me-3"><?= $row['TransStatus'] ?></span>
                            </div>
                        </div>
                    </div>
                    <table class="table table-borderless">
                        <tbody>
                        <tr>
                            <td>
                            <div class="d-flex mb-2">
                                <div class="flex-shrink-0">
                                <img src="https://via.placeholder.com/280x280/87CEFA/000000" alt="" width="35" class="img-fluid">
                                </div>
                                <div class="flex-lg-grow-1 ms-3">
                                <h6 class="small mb-0"><a class="text-reset"><?= $row['productname'] ?></a></h6>
                                </div>
                            </div>
                            </td>
                            <td><?= $row['OrderAmount'] ?></td>
                            <td class="text-end">Rp. <?= $row['OrderPrice'] ?></td>
                        </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2">Subtotal</td>
                                <td class="text-end">Rp. <?= $row['OrderPrice'] ?></td>
                            </tr>
                            <tr>
                                <td colspan="2">Shipping</td>
                                <td class="text-end">Rp. 0</td>
                            </tr>
                            <tr class="fw-bold">
                                <td colspan="2">TOTAL</td>
                                <td class="text-end">Rp. <?= $row['OrderPrice'] ?></td>
                            </tr>
                        </tfoot>
                    </table>
                    </div>
                  
                        <a href="editform.php?TransactionID=<?= $row['TransactionID']; ?>" class="btn btn-sm btn-warning"> 
                        <span data-feather="edit"></span>Edit Transaction</a>
                        <a href="actioncancel.php?TransactionID=<?= $row['TransactionID']; ?>" class="btn btn-sm btn-danger remove"> 
                        <span data-feather="edit"></span> Cancel Order</a>
                    <!--Button Edit & Delete-->
                </div>

              

             
</html>