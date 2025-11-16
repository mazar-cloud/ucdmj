<?php
require_once($_SERVER['DOCUMENT_ROOT']."/includes/load.php");
?>
<?php include './layouts/header.php'; ?>
<?php echo generateBreadcrumbs(); ?>
<!-- Shop Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        
        <!-- Shop Product Start -->
        <div class="col-lg-9 col-md-8">
            <div class="row pb-3">
                    <?php 
                        $sql = "SELECT * FROM products";
                        $result = $db->query($sql);
                        if ($db->num_rows($result) > 0) {
                            while($product = $db->fetch_assoc($result)) {
                                $productName = $product['ProductName'];
                                $productID = $product['ProductID'];
                                $productURL = makeProductURL($productName, $productID);
                    ?>
                                <div class="col-lg-4 col-md-6 col-sm-6 pb-1"> 
                                    <div class="product-item bg-light mb-4">
                
                                        <div class="product-img position-relative overflow-hidden">
                                            <img class="img-fluid w-100" src="/uploads/products/<?php echo $product['ProductImages']; ?>" alt="">
                                            <div class="product-action">
                                                <button class="btn btn-outline-dark btn-square" data-id="<?php echo $product['ProductID']; ?>" onclick="addToCart(this)"><i class="fa fa-shopping-cart"></i></button>
                                                <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                                <a class="btn btn-outline-dark btn-square" href="<?php echo $productURL; ?>"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <div class="text-center py-4">
                                            <a class="h6 text-decoration-none text-truncate px-2 text-wrap" href="<?php echo $productURL; ?>"><?php echo $product['ProductName']; ?></a>
                                            <div class="d-flex align-items-center justify-content-center mt-2">
                                                <?php if ($product['SalePrice'] > 0): ?>
                                                    <h5>Rs. <?php echo $product['SalePrice'] ?></h5><h6 class="text-muted ml-2"><del>Rs. <?php echo $product['Price']; ?></del></h6>
                                                <?php else: ?>
                                                    <h5>Rs. <?php echo $product['Price']; ?></h5>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    <?php
                            }
                        } else {
                            echo "<h2>No Products Found</h2>";
                        }
                    ?>
                <div class="col-12">
                    <nav>
                        <ul class="pagination justify-content-center">
                        <li class="page-item disabled"><a class="page-link" href="#">Previous</span></a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Shop Product End -->
    </div>
</div>
<!-- Shop End -->

<?php include './layouts/footer.php'; ?>
<?php include './layouts/footerScript.php'; ?>
<?php include './layouts/footerEnd.php'; ?>