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
                                <a class="nav-link p-2 font-inter fw-bold" aria-current="page" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-2 font-inter fw-bold" href="transaction.php">Transaction</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-2 font-inter fw-bold" href="product.php">Product</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active p-2 font-inter fw-bold" href="member.php">Member</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-2 font-inter fw-bold" href="logout.php">Signout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

             <!--TABLE DATA CUSTOMER-->
             <div class="table-responsive mt-3">
                <table class="table">
                    <tr>
                        <th>Customer ID</th>
                        <th>Customer Name</th>
                        <th>Customer Email</th>
                        <th>Customer Address</th>
                        <th>Customer Phone Number</th>
                        <th>Action</th>
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
                        $sql = "SELECT * from user";
                        $hasil = $pdo->query($sql);

                        $i = 0;
                        while($row = $hasil->fetch()):
                        $i++;
                    ?>
                    <tr>
                        <td><?= $row['userid']; ?></td>
                        <td><?= $row['name']; ?></td>
                        <td><?= $row['email']; ?></td>
                        <td><?= $row['address']; ?></td>
                        <td><?= $row['phonenumber']; ?></td>
                        <td>
                            <a href="adminrole.php?userid=<?= $row['userid']; ?>" class="btn btn-sm btn-warning"> 
                                <span data-feather="trash-2"></span>Make as Admin</a>
                        </td>  
                    </tr>
                    <?php
                        endwhile; 
                    ?>
                </table>
            </div>
            <!--TABLE DATA TRANSAKSI-->
</html>