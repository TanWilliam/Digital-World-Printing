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
                                <a class="nav-link active p-2 font-inter fw-bold" href="product.php">Product</a>
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

            <!--Add Item Card-->
            <div class="card" style="width: 80%">
                <div class="card-body">
                    <form action="additem_proses.php" method="post" enctype="multipart/form-data">
                        <div class="form-group mb-5">
                            <label for="productid">Product ID</label>
                            <input type="text" class="form-control" name="productid" placeholder="Input Product ID"> 
                        </div>
                        <div class="form-group mb-5">
                            <label for="productcategory">Product Category</label>
                                <select class="form-control" name="productcategory">
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
                                        $sql = "SELECT * from ProductCategories;";
                                        $hasil = $pdo->query($sql);
                                        while($row = $hasil->fetch()):
                                    ?>
                                        <option value="<?= $row['CategoriesID'] ?>"><?= $row['CategoriesName'] ?></option>
                                    <?php
                                endwhile;
                                ?>
                                </select>
                        </div>
                        <div class="form-group mb-5">
                            <label for="productname">Product Name</label>
                            <input type="text" class="form-control" name="productname" placeholder="Input Product Name"> 
                        </div>
                        <div class="form-group mb-5">
                            <label for="productdescription">Product Description</label>
                            <textarea class="form-control" name="productdescription" rows="3"></textarea>
                        </div>
                        <div class="form-group mb-5">
                            <label for="productprice">Product Price</label>
                            <input type="text" class="form-control" name="productprice" placeholder="Input Product Price"> 
                        </div>
                        <div class="custom-file mb-5">
                            <label class="form-label" for="productphoto">Choose Product Photo</label>
                            <input type="file" class="form-control" name="productphoto"/>
                        </div>
                        <div class="form-group mb-5">
                            <label for="productquantity">Product Quantity</label>
                            <input type="text" class="form-control" name="productquantity" placeholder="Input Product Quantity"> 
                        </div>

                        <button class="btn px-3 fw-bold font-inter">Submit</button>
                    </form>
                </div>
            </div>
            <!--Add Item Card-->

 
</html>