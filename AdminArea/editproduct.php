<?php
if(!isset($_SESSION)) {
    session_start();
}
if(!isset($_SESSION['email'])){
    header('location: ../signin.php');
}
?>

<?php
    include_once('koneksi.php');
    $idproduct = $_GET['idproduct'];

    $query = "SELECT * from product where idproduct = '$idproduct'";
    $result = mysqli_query($con, $query);
?>

<html>
    <head>
        <!--JS and Bootstrap Link-->
        <link href="style.css" rel="stylesheet" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	    <script src=".../navbar.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<title>Admin Area</title>
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
        </header>

     

            <div class="card" style="width: 80%">
                <div class="card-body">
                    <form action="edittran_proses.php" method="post" enctype="multipart/form-data">
                        <?php
                            while($rows=mysqli_fetch_array($result)){
                        ?>
                        <div class="form-group mb-5">
                            <label for="productid">Product ID</label>
                            <input type="text" class="form-control" name="productid" value="<?php echo $rows['idproduct']; ?>" readonly> 
                        </div>
                        <div class="form-group mb-5">
                            <label for="productcategory">Product Category</label>
                            <input type="text" class="form-control" name="productcategory" value="<?php echo $rows['CategoriesID']; ?>" readonly> 
                        </div>
                        <div class="form-group mb-5">
                            <label for="productname">Product Name</label>
                            <input type="text" class="form-control" name="productname" value="<?php echo $rows['productname']; ?>" readonly> 
                        </div>
                        <div class="form-group mb-5">
                            <label for="productdescription">Product Description</label>
                            <input type="text" class="form-control" name="productdescription" rows="3" value="<?php echo $rows['productdescription']; ?>" readonly></textarea>
                        </div>
                        <div class="form-group mb-5">
                            <label for="productprice">Product Price</label>
                            <input type="text" class="form-control" name="productprice" value="<?php echo $rows['productprice']; ?>"> 
                        </div>
                        <div class="custom-file mb-5">
                            <label class="form-label" for="productphoto">Choose Product Photo</label>
                            <input type="file" class="form-control" name="productphoto" value="<?php echo $rows['productphoto']; ?>"/>
                        </div>
                        <div class="form-group mb-5">
                            <label for="productquantity">Product Quantity</label>
                            <input type="text" class="form-control" name="productquantity" value="<?php echo $rows['proquantity']; ?>"> 
                        </div>

                        <button class="btn px-3 fw-bold font-inter">Submit</button>
                        <?php
                            }
                        ?>
                    </form>
                </div>
            </div>

    </body>
</html>

