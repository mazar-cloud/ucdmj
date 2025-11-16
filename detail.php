<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/includes/load.php");
    if (isset($_GET['product_id'])) {
        $productid = $db->escape($_GET['product_id']);
        $sql = "SELECT * FROM products WHERE ProductID = '{$productid}'";
        $result = $db->query($sql);
        if ($db->num_rows($result) > 0) {
            while($product = $db->fetch_assoc($result)):
?>

<?php include './layouts/header.php'; ?>
<?php echo generateBreadcrumbs(); ?>

<!-- Shop Detail Start -->
<div class="container-fluid pb-5">
    <div class="row px-xl-5">
        <div class="col-lg-5 mb-30">
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner bg-light">
                    <div class="carousel-item active">
                        <img class="w-100 h-100" src="/uploads/products/<?php echo $product['ProductImages']; ?>" alt="Image">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                    <i class="fa fa-2x fa-angle-left text-dark"></i>
                </a>
                <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                    <i class="fa fa-2x fa-angle-right text-dark"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-7 h-auto mb-30">
            <div class="h-100 bg-light p-30">
                <h3><?php echo $product['ProductName']; ?></h3>
                <h3 class="font-weight-semi-bold mb-4 mt-5">Rs. <?php echo ($product['SalePrice'] > 0) ? $product['SalePrice'] : $product['Price']; ?></h3>
                <p class="mb-4"><?php echo $product['ShortDescription']; ?></p>
                <div class="d-flex mb-3 mt-5">
                    <?php if ($product['StockQTY'] > 0): ?>
                    <strong class="text-dark mr-3 text-success">Available In Stock:</strong>
                    <span><?php echo $product['StockQTY'] ?> pcs</span>
                    <?php else: ?>
                        <strong class="text-dark mr-3 text-danger">Out Of Stock:</strong>
                    <?php endif; ?>
                </div>

                <div class="d-flex align-items-center mt-5 mb-4 pt-2">
                    <div class="input-group quantity mr-3" style="width: 130px;">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-minus">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input type="text" id="qty" class="form-control bg-secondary border-0 text-center" value="1">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-plus">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <button class="btn btn-primary px-3" data-id="<?php echo $product['ProductID']; ?>" onclick="addToCart(this)"><i class="fa fa-shopping-cart mr-1"></i> Add To
                        Cart</button>
                </div>
                <div class="d-flex pt-2">
                    <strong class="text-dark mr-2">Share on:</strong>
                    <div class="d-inline-flex">
                        <a class="text-dark px-2" href="#">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-dark px-2" href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-dark px-2" href="#">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-dark px-2" href="#">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row px-xl-5">
        <div class="col">
            <div class="bg-light p-30">
                <div class="nav nav-tabs mb-4">
                    <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">Description</a>
                    <!-- <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-2">Information</a> -->
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <h4 class="mb-3">Product Description</h4>
                        <p><?php echo $product['Description']; ?></p>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-2">
                        <h4 class="mb-3">Additional Information</h4>
                        <p>Eos no lorem eirmod diam diam, eos elitr et gubergren diam sea. Consetetur vero aliquyam invidunt duo dolores et duo sit. Vero diam ea vero et dolore rebum, dolor rebum eirmod consetetur invidunt sed sed et, lorem duo et eos elitr, sadipscing kasd ipsum rebum diam. Dolore diam stet rebum sed tempor kasd eirmod. Takimata kasd ipsum accusam sadipscing, eos dolores sit no ut diam consetetur duo justo est, sit sanctus diam tempor aliquyam eirmod nonumy rebum dolor accusam, ipsum kasd eos consetetur at sit rebum, diam kasd invidunt tempor lorem, ipsum lorem elitr sanctus eirmod takimata dolor ea invidunt.</p>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item px-0">
                                        Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Duo amet accusam eirmod nonumy stet et et stet eirmod.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                                    </li>
                                    </ul> 
                            </div>
                            <div class="col-md-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item px-0">
                                        Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Duo amet accusam eirmod nonumy stet et et stet eirmod.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                                    </li>
                                    </ul> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shop Detail End -->


<?php include './layouts/footer.php'; ?>
<?php include './layouts/footerScript.php'; ?>

<script>
    $(document).ready(() => {
        var counter = 1;
        $(".btn-plus").on("click", () => {
            counter += 1;
            $("#qty").val(counter);
        });

        $(".btn-minus").on("click", () => {
            counter -= 1;
            $("#qty").val(counter);
        })
    })
</script>
<?php include './layouts/footerEnd.php'; ?>


<?php
            endwhile;
        }
    } else {
        redirect("/", false);
    }
?>