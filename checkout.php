<?php 
    require_once($_SERVER['DOCUMENT_ROOT']."/includes/load.php");
    $products = findCartItems();
    if (!$products) {
        redirect("/cart", false);
    }
?>
<?php include './layouts/header.php'; ?>
<?php echo generateBreadcrumbs(); ?> 
<!-- Checkout Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <?php if ($session->isUserLoggedIn()): 
            $user = current_user(); 
            $username = explode(" ", $user['Name']);
            $sql = "SELECT *
                    FROM useraddresses 
                    WHERE UserID = '{$user['UserID']}'";
            $result = find_by_sql($sql);
            if ($result) {
                $address = $result[1];
            }
        ?>
        <div class="col-lg-8">
            <form id="checkout-form">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Billing Address</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>First Name</label>
                            <input class="form-control" id="billing_fname" name="billing_fname" type="text" value="<?php echo $username[0]; ?>">
                            <input id="userType" name="userType" type="hidden" value="existingUser">
                            <input id="userID" name="userID" type="hidden" value="<?php $user['UserID']; ?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Last Name</label>
                            <input class="form-control" id="billing_lname" name="billing_lname" type="text" value="<?php echo $username[1]; ?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text" id="billing_email" name="billing_email"  value="<?php echo $user['Email']; ?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input class="form-control" type="text" id="billing_phone" name="billing_phone" value="<?php echo $user['MobileNumber']; ?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 1</label>
                            <input class="form-control" type="text" id="billing_address" name="billing_address" value="<?php echo (isset($address['Address'])) ? $address['Address'] : ""; ?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 2</label>
                            <input class="form-control" type="text" id="billing_address2" name="billing_address2" value="<?php echo (isset($address['Address2'])) ? $address['Address2'] : ""; ?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Country</label>
                            <select class="custom-select" id="billing_country" name="billing_country">
                                <?php
                                    $sql = "SELECT * from countries";
                                    $res = $db->query($sql);
                                    if ($db->num_rows($res) > 0) {
                                        while ($countries = $db->fetch_assoc($res)) {
                                            if ($countries["CountryID"] == $address['CountryID']) {
                                                echo "<option selected value='".$countries['CountryID']."'>".$countries['CountryName']."</option>";
                                            } else {
                                                echo "<option value='".$countries['CountryID']."'>".$countries['CountryName']."</option>";
                                            }
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>City</label>
                            <select class="custom-select" id="billing_city" name="billing_city">
                                <?php
                                    $sql = "SELECT * from cities";
                                    $res = $db->query($sql);
                                    if ($db->num_rows($res) > 0) {
                                        while ($row = $db->fetch_assoc($res)) {
                                            if ($row["CityID"] == $address['CityID']) {
                                                echo "<option selected value='".$row['CityID']."'>".$row['CityName']."</option>";
                                            } else {
                                                echo "<option value='".$row['CityID']."'>".$row['CityName']."</option>";
                                            }
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>State / Province</label>
                            <select class="custom-select" id="billing_state" name="billing_state">
                                <?php
                                    $sql = "SELECT * from provinces";
                                    $res = $db->query($sql);
                                    if ($db->num_rows($res) > 0) {
                                        while ($row = $db->fetch_assoc($res)) {
                                            if ($row["ProvinceID"] == $address['ProvinceID']) {
                                                echo "<option selected value='".$row['ProvinceID']."'>".$row['ProvinceName']."</option>";
                                            } else {
                                                echo "<option value='".$row['ProvinceID']."'>".$row['ProvinceName']."</option>";
                                            }
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>ZIP Code</label>
                            <input class="form-control" id="billing_zip" name="billing_zip" type="text" placeholder="123">
                        </div>
                        <div class="col-md-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="billing_shipto" name="billing_shipto">
                                <label class="custom-control-label" for="billing_shipto"   data-toggle="collapse" data-target="#shipping-address">Ship to different address</label>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="collapse mb-5" id="shipping-address">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Shipping Address</span></h5>
                    <div class="bg-light p-30">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>First Name</label>
                                <input class="form-control" id="shipping_fname" name="shipping_fname" type="text" placeholder="John">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Last Name</label>
                                <input class="form-control" type="text" id="shipping_lname" name="shipping_lname" placeholder="Doe">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>E-mail</label>
                                <input class="form-control" id="shipping_email" name="shipping_email" type="text" placeholder="example@email.com">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Mobile No</label>
                                <input class="form-control" id="shipping_phone" name="shipping_phone" type="text" placeholder="03001234567">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Address Line 1</label>
                                <input class="form-control" id="shipping_address" name="shipping_address" type="text" placeholder="123 Street">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Address Line 2</label>
                                <input class="form-control" id="shipping_address2" name="shipping_address2" type="text" placeholder="123 Street">
                            </div>
                            <div class="col-md-6 form-group">
                            <label>Country</label>
                            <select class="custom-select" id="shipping_country" name="shipping_country">
                                <option value="">Select Country</option>
                                <?php
                                    $sql = "SELECT * from countries";
                                    $res = $db->query($sql);
                                    if ($db->num_rows($res) > 0) {
                                        while ($countries = $db->fetch_assoc($res)) {
                                            if ($countries["CountryID"] == $address['CountryID']) {
                                                echo "<option selected value='".$countries['CountryID']."'>".$countries['CountryName']."</option>";
                                            } else {
                                                echo "<option value='".$countries['CountryID']."'>".$countries['CountryName']."</option>";
                                            }
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>City</label>
                            <select class="custom-select" id="shipping_city" name="shipping_city">
                                <option value="">Select City</option>
                                <?php
                                    $sql = "SELECT * from cities";
                                    $res = $db->query($sql);
                                    if ($db->num_rows($res) > 0) {
                                        while ($row = $db->fetch_assoc($res)) {
                                            if ($row["CityID"] == $address['CityID']) {
                                                echo "<option selected value='".$row['CityID']."'>".$row['CityName']."</option>";
                                            } else {
                                                echo "<option value='".$row['CityID']."'>".$row['CityName']."</option>";
                                            }
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>State / Province</label>
                            <select class="custom-select" id="shipping_state" name="shipping_state">
                                <option value="">Select Province</option>
                                <?php
                                    $sql = "SELECT * from provinces";
                                    $res = $db->query($sql);
                                    if ($db->num_rows($res) > 0) {
                                        while ($row = $db->fetch_assoc($res)) {
                                            if ($row["ProvinceID"] == $address['ProvinceID']) {
                                                echo "<option selected value='".$row['ProvinceID']."'>".$row['ProvinceName']."</option>";
                                            } else {
                                                echo "<option value='".$row['ProvinceID']."'>".$row['ProvinceName']."</option>";
                                            }
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                            <div class="col-md-6 form-group">
                                <label>ZIP Code</label>
                                <input class="form-control" id="shipping_zip" name="shipping_zip" type="text" placeholder="123">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>


        <?php else: ?>


        <div class="col-lg-8">
        <form action="place_an_order.php" method="post" id="annonymous_checkout-form">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Billing Address</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>First Name</label>
                            <input class="form-control" id="billing_fname" name="billing_fname" type="text" placeholder="John">
                            <input id="userType" name="userType" type="hidden" value="newUser">
                            <input id="userID" name="userID" type="hidden" value="<?php $_SESSION['uniqueID']; ?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Last Name</label>
                            <input class="form-control" id="billing_lname" name="billing_lname" type="text" placeholder="Doe">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" id="billing_email" name="billing_email" type="text" placeholder="example@example.com">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input class="form-control" id="billing_phone" name="billing_phone" type="text" placeholder="03xx1234567">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 1</label>
                            <input class="form-control" id="billing_address" name="billing_address" type="text" placeholder="123 Street">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 2</label>
                            <input class="form-control" id="billing_address2" name="billing_address2" type="text" placeholder="123 Street">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Country</label>
                            <select class="custom-select" id="billing_country" name="billing_country">
                                <option value="">Select Country</option>
                                <?php
                                    $sql = "SELECT * from countries";
                                    $res = $db->query($sql);
                                    if ($db->num_rows($res) > 0) {
                                        while ($countries = $db->fetch_assoc($res)) {
                                            echo "<option value='".$countries['CountryID']."'>".$countries['CountryName']."</option>";
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>City</label>
                            <select class="custom-select" id="billing_city" name="billing_city">
                                <option value="">Select City</option>
                                <?php
                                    $sql = "SELECT * from cities";
                                    $res = $db->query($sql);
                                    if ($db->num_rows($res) > 0) {
                                        while ($row = $db->fetch_assoc($res)) {
                                            echo "<option value='".$row['CityID']."'>".$row['CityName']."</option>";
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>State / Province</label>
                            <select class="custom-select" id="billing_state" name="billing_state">
                                <option value="">Select Province</option>
                                <?php
                                    $sql = "SELECT * from provinces";
                                    $res = $db->query($sql);
                                    if ($db->num_rows($res) > 0) {
                                        while ($row = $db->fetch_assoc($res)) {
                                            echo "<option value='".$row['ProvinceID']."'>".$row['ProvinceName']."</option>";
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>ZIP Code</label>
                            <input class="form-control" id="billing_zip" name="billing_zip" type="text" placeholder="123">
                        </div>
                        <div class="col-md-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="billing_shipto" name="billing_shipto">
                                <label class="custom-control-label" for="shipto"   data-toggle="collapse" data-target="#shipping-address">Ship to different address</label>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="collapse mb-5" id="shipping-address">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Shipping Address</span></h5>
                    <div class="bg-light p-30">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>First Name</label>
                                <input class="form-control" id="shipping_fname" name="shipping_fname" type="text" placeholder="John">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Last Name</label>
                                <input class="form-control" id="shipping_lname" name="shipping_lname" type="text" placeholder="Doe">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>E-mail</label>
                                <input class="form-control" id="shipping_email" name="shipping_email" type="text" placeholder="example@email.com">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Mobile No</label>
                                <input class="form-control" id="shipping_phone" name="shipping_phone" type="text" placeholder="03001234567">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Address Line 1</label>
                                <input class="form-control" id="shipping_address" name="shipping_address" type="text" placeholder="123 Street">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Address Line 2</label>
                                <input class="form-control" id="shipping_address2" name="shipping_address2" type="text" placeholder="123 Street">
                            </div>
                            <div class="col-md-6 form-group">
                            <label>Country</label>
                            <select class="custom-select" id="shipping_country" name="shipping_country">
                                <option value="">Select Country</option>
                                <?php
                                    $sql = "SELECT * from countries";
                                    $res = $db->query($sql);
                                    if ($db->num_rows($res) > 0) {
                                        while ($countries = $db->fetch_assoc($res)) {
                                            if ($countries["CountryID"] == $address['CountryID']) {
                                                echo "<option selected value='".$countries['CountryID']."'>".$countries['CountryName']."</option>";
                                            } else {
                                                echo "<option value='".$countries['CountryID']."'>".$countries['CountryName']."</option>";
                                            }
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>City</label>
                            <select class="custom-select" id="shipping_city" name="shipping_city">
                                <option value="">Select City</option>
                                <?php
                                    $sql = "SELECT * from cities";
                                    $res = $db->query($sql);
                                    if ($db->num_rows($res) > 0) {
                                        while ($row = $db->fetch_assoc($res)) {
                                            if ($row["CityID"] == $address['CityID']) {
                                                echo "<option selected value='".$row['CityID']."'>".$row['CityName']."</option>";
                                            } else {
                                                echo "<option value='".$row['CityID']."'>".$row['CityName']."</option>";
                                            }
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>State / Province</label>
                            <select class="custom-select" id="shipping_state" name="shipping_state">
                                <option value="">Select Province</option>
                                <?php
                                    $sql = "SELECT * from provinces";
                                    $res = $db->query($sql);
                                    if ($db->num_rows($res) > 0) {
                                        while ($row = $db->fetch_assoc($res)) {
                                            if ($row["ProvinceID"] == $address['ProvinceID']) {
                                                echo "<option selected value='".$row['ProvinceID']."'>".$row['ProvinceName']."</option>";
                                            } else {
                                                echo "<option value='".$row['ProvinceID']."'>".$row['ProvinceName']."</option>";
                                            }
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                            <div class="col-md-6 form-group">
                                <label>ZIP Code</label>
                                <input class="form-control" id="shipping_zip" name="shipping_zip" type="text" placeholder="123">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>


        <?php endif; ?>


        <div class="col-lg-4">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order Total</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="border-bottom">
                    <h6 class="mb-3">Products</h6>
                    <?php 
                        $total = 0;
                        $shipping = 200;
                        foreach ($products as $product) :
                            $productPrice = ($product['SalePrice'] != 0) ? $product['SalePrice'] : $product['Price'];
                            $productTotal = $product['Quantity'] * $productPrice;
                            $total += $productTotal;
                    ?>
                    <div class="d-flex justify-content-between">
                        <p class="w-75"><?php echo $product['ProductName']; ?></p>
                        <p>Rs. <?php echo $productTotal; ?></p>
                    </div>
                    <?php 
                        endforeach;
                    ?>
                </div>
                <div class="border-bottom pt-3 pb-2">
                    <div class="d-flex justify-content-between mb-3">
                        <h6>Subtotal</h6>
                        <h6>Rs. <?php echo $total; ?></h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Shipping</h6>
                        <h6 class="font-weight-medium">Rs. <?php echo $shipping; ?></h6>
                    </div>
                </div>
                <div class="pt-2">
                    <div class="d-flex justify-content-between mt-2">
                        <h5>Total</h5>
                        <h5>Rs. <span id="totalPrice"><?php echo $total + $shipping; ?></span> </h5>
                    </div>
                </div>
            </div>
            <div class="mb-5">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Payment</span></h5>
                <div class="bg-light p-30">
                    <div class="form-group mb-5">
                        <div class="custom-control custom-radio">
                            <input type="radio" checked class="custom-control-input" name="cod" id="cod">
                            <label class="custom-control-label" for="cod">Cash On Delivery</label>
                        </div>
                    </div>

                    <button class="btn btn-block btn-primary font-weight-bold py-3" id="placeOrder">Place Order</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Checkout End -->



<?php include './layouts/footer.php'; ?>
<?php include './layouts/footerScript.php'; ?>
<script>
    $(document).ready(() => {
        $("#annonymous_checkout-form").on("submit", (e) => {e.preventDefault();})

        $("#placeOrder").on("click", () => {
            let userType = $("#userType").val().trim();
            let userID = $("#userID").val().trim();
            let billing_fname = $("#billing_fname").val().trim();
            let billing_lname = $("#billing_lname").val().trim();
            let billing_email = $("#billing_email").val().trim();
            let billing_phone = $("#billing_phone").val().trim();
            let billing_address = $("#billing_address").val().trim();
            let billing_address2 = $("#billing_address2").val().trim();
            let billing_country = $("#billing_country").val().trim();
            let billing_city = $("#billing_city").val().trim();
            let billing_state = $("#billing_state").val().trim();
            let billing_zip = $("#billing_zip").val().trim();
            let billing_shipto = $("#billing_shipto");
            let shipping_fname = $("#shipping_fname").val().trim();
            let shipping_lname = $("#shipping_lname").val().trim();
            let shipping_email = $("#shipping_email").val().trim();
            let shipping_phone = $("#shipping_phone").val().trim();
            let shipping_address = $("#shipping_address").val().trim();
            let shipping_address2 = $("#shipping_address2").val().trim();
            let shipping_country = $("#shipping_country").val().trim();
            let shipping_city = $("#shipping_city").val().trim();
            let shipping_state = $("#shipping_state").val().trim();
            let shipping_zip = $("#shipping_zip").val().trim();
            let totalPrice = $("#totalPrice").val().trim();


            // Check if billing information is filled
            if (
                billing_fname === "" ||
                billing_lname === "" ||
                billing_email === "" ||
                billing_phone === "" ||
                billing_address === "" ||
                billing_country === "" ||
                billing_city === "" ||
                billing_state === "" ||
                billing_zip === ""
            ) {
                // Billing information is not filled, show an error message or take appropriate action
                createToast("Billing information is incomplete. Please fill in all required fields.", "d");
            } else {
                // Billing information is filled

                // Check if "shipto" checkbox is checked
                if (billing_shipto.is(":checked")) {
                    // Shipping information should be checked

                    if (
                        shipping_fname === "" ||
                        shipping_lname === "" ||
                        shipping_email === "" ||
                        shipping_phone === "" ||
                        shipping_address === "" ||
                        shipping_country === "" ||
                        shipping_city === "" ||
                        shipping_state === "" ||
                        shipping_zip === ""
                    ) {
                        // Shipping information is not filled, show an error message or take appropriate action
                        createToast("Shipping information is incomplete. Please fill in all required fields.", "d");
                    } else {
                        // Shipping information is filled, you can proceed with your logic here
                        // ...
                        formData = {
                            userType: userType,
                            userID: userID,
                            billing_fname: billing_fname,
                            billing_lname: billing_lname,
                            billing_email: billing_email,
                            billing_phone: billing_phone,
                            billing_address: billing_address,
                            billing_address2: billing_address2,
                            billing_country: billing_country,
                            billing_city: billing_city,
                            billing_state: billing_state,
                            billing_zip: billing_zip,
                            billing_shipto: "yes",
                            shipping_fname: shipping_fname,
                            shipping_lname: shipping_lname,
                            shipping_email: shipping_email,
                            shipping_phone: shipping_phone,
                            shipping_address: shipping_address,
                            shipping_address2: shipping_address2,
                            shipping_country: shipping_country,
                            shipping_city: shipping_city,
                            shipping_state: shipping_state,
                            shipping_zip: shipping_zip,
                            totalPrice: totalPrice
                        };
                    }
                } else {
                    // "Shipto" checkbox is not checked, you can proceed with your logic here for billing-only orders
                    // ...
                    formData = {
                        userType: userType,
                        userID: userID,
                        billing_fname: billing_fname,
                        billing_lname: billing_lname,
                        billing_email: billing_email,
                        billing_phone: billing_phone,
                        billing_address: billing_address,
                        billing_address2: billing_address2,
                        billing_country: billing_country,
                        billing_city: billing_city,
                        billing_state: billing_state,
                        billing_zip: billing_zip,
                        billing_shipto: "no",
                        totalPrice: totalPrice
                    };
                }

                // ajax request goes here
                $.ajax({
                    url: "/scripts/process_checkout.php",
                    type: "post",
                    data: formData,
                    dataType: "json",
                    success: (response) => {
                        window.location.assign("/order-placed?OrderID=" + response.OrderID);
                        
                    },
                    error: (xhr,status,error) => {
                        console.log(xhr);
                    }
                })
            }
        })
    })
</script>
<?php include './layouts/footerEnd.php'; ?>