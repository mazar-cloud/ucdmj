<?php include './layouts/header.php'; ?>
<?php echo generateBreadcrumbs(); ?>
<!-- Cart Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5" id="cart_items">
            <div id="cart_items_container">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                <?php 
                    $totalPrice = 0;
                    if (findCartItems() != false):
                        $products = findCartItems();
                        foreach ($products as $product):
                            $regPrice = ($product['SalePrice'] > 0) ? $product['SalePrice'] : $product['Price'];
                            $totalPrice = $totalPrice + ($product['Quantity'] * $regPrice);
                            
                ?>
    
                        <tr>
                            <td class="align-middle"><img src="/uploads/products/<?php echo $product['ProductImages']; ?>" alt="" style="width: 50px;"> <?php echo $product['ProductName']; ?></td>
                            <td class="align-middle">Rs. <span class="basic_price"><?php echo ($product['SalePrice'] == 0) ? $product['Price'] : $product['SalePrice']; ?></span></td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus" data-id="<?php echo $product['ProductID']; ?>" data-userid="<?php echo $product['UserID']; ?>" onclick="decreaseQty(this)">
                                        <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <div style="width: 40%;">
                                        <input type="text"  class="form-control cartQuantityValue form-control-sm bg-secondary border-0 text-center" value="<?php echo $product['Quantity']; ?>">
                                    </div>
                                    <div class="input-group-btn">
                                        <button data-id="<?php echo $product['ProductID']; ?>" data-userid="<?php echo $product['UserID']; ?>" onclick="increaseQty(this)" class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle cart-item-total">Rs. <span class="total-price"> <?php 
                                $total = ($product['SalePrice'] > 0) ? $product['SalePrice'] : $product['Price'];
                                $total *= $product['Quantity'];
                                echo $total; 
                            ?></span></td>
                            <td class="align-middle"><button class="btn btn-sm btn-danger" data-id="<?php echo $product['ProductID']; ?>" data-user-id="<?php echo $product['UserID']; ?>" onclick="removeCartItem(this)"><i class="fa fa-times"></i></button></td>
                        </tr>
                <?php
                        endforeach;
                    endif;
                ?>
                    </tbody>
                </table>

            </div>
        </div>
        <div class="col-lg-4">
            <form class="mb-30" action="">
                <div class="input-group">
                    <input type="text" class="form-control border-0 p-4" placeholder="Coupon Code">
                    <div class="input-group-append">
                        <button class="btn btn-primary">Apply Coupon</button>
                    </div>
                </div>
            </form>
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="border-bottom pb-2">
                    <div class="w-100 mb-3">
                        <div id="cart_sub_total" class="d-flex justify-content-between">
                            <h6>Subtotal</h6>
                            <div id="cartSubTotal">
                                <h6>Rs. <span><?php echo $totalPrice; ?></span></h6>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Shipping</h6>
                        <h6 class="font-weight-medium">To be Determined</h6>
                    </div>
                </div>
                <div class="pt-2">
                    <div class="w-100 mt-2">
                        <div id="cart_total" class="d-flex justify-content-between">
                            <h5>Total</h5>
                            <div id="cartTotal">
                                <h5>Rs. <span><?php echo $totalPrice; ?></span></h5>
                            </div>
                        </div>
                    </div>
                    <a href="/checkout" class="btn btn-block btn-primary font-weight-bold my-3 py-3">Proceed To Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->




<?php include './layouts/footer.php'; ?>
<?php include './layouts/footerScript.php'; ?>
<?php include './layouts/footerEnd.php'; ?>