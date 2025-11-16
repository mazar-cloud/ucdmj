<?php include './layouts/header.php'; ?>


<section class="bg-image">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="reg-form">
                                        <div class="register">
                                            <form id="seller-signup-form">
                                                <div class="tab-content" id="pills-tabContent">
                                                    <div class="tab-pane show active " id="pills-email" role="tabpanel" aria-labelledby="pills-email-tab">
                                                        <div class="form-title">
                                                            <h3 class="text-center text-uppercase">Become A Seller</h3>
                                                            <p class="">Create a Seller Acoount and start selling your products here!</p>
                                                        </div>
                                                        <div class="seller-form-container mt-5">

                                                            <div class="form-group mb-2">
                                                                <label for="fullname" class="w-50">Full Name</label>
                                                                <div class="input-field w-100">
                                                                    <input type="text" id="fullname" name="fullname" placeholder="John Doe" class="form-control w-100">
                                                                    <span class="error-span error-name"></span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group mb-2">
                                                                <label for="phone" class="w-50">Mobile Number</label>
                                                                <div class="input-field w-100">
                                                                    <input type="text" id="phone" name="phone" placeholder="03xxxxxxxxxx" class="form-control w-100">
                                                                    <span class="error-span error-phone"></span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group mb-2">
                                                                <label for="email" class="w-50">Email address</label>
                                                                <div class="input-field w-100">
                                                                    <input type="email" id="email" name="email" placeholder="example@example.com" class="form-control w-100">
                                                                    <span class="error-span error-email"></span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group mb-2">
                                                                <label for="password" class="w-50">Password</label>
                                                                <div class="input-field w-100">
                                                                    <input type="password" id="password" name="password" placeholder="********" class="form-control w-100">
                                                                    <span class="error-span error-password"></span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group mb-2">
                                                                <label for="conf_password" class="w-50">Confirm Password</label>
                                                                <div class="input-field w-100">
                                                                    <input type="password" id="conf_password" name="conf_password" placeholder="********" class="form-control w-100">
                                                                    <span class="error-span error-conf_password"></span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group d-flex mt-5 gap-3 align-items-start">
                                                                <div class="checkbox">
                                                                    <input type="checkbox" name="offer" id="offer" style="width: 18px; height: 18px; margin-top: 7px;">
                                                                </div>
                                                                <p>by clicking on register now you agree to accept our Terms and Conditions</p>
                                                            </div>
                                                            <div class="submit-container">
                                                                <button type="button" id="seller-signup-submit" class="btn btn-primary w-100">Register now</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<?php include './layouts/footer.php'; ?>
<?php include './layouts/footerScript.php'; ?>
<script src="/assets/js/seller_details_validation.js"></script>
<?php include './layouts/footerEnd.php'; ?>