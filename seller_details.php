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
                                                    <div class="tab-pane fade show active" id="pills-rest" role="tabpanel" aria-labelledby="pills-rest-tab">

                                                        <div class="form-signup-title mb-5">
                                                            <h3 class="text-uppercase text-center">Fill your business details</h3>
                                                            <p>Please fill out your business details down below to be able to use our platform as a seller. Please note that all the information will be verified by our support team so don't put any false information</p>
                                                        </div>
                                                        <div class="signup-form-container">

                                                            <ul class="nav nav-pills mb-3 d-flex " id="pills-tab" role="tablist">
                                                                <li class="nav-item w-25" role="presentation">
                                                                    <button class="nav-link active mx-auto" id="pills-personal-tab" data-bs-toggle="pill" data-bs-target="#pills-personal" type="button" role="tab" aria-controls="pills-personal" aria-selected="true"></button>
                                                                    <label class="text-center" for="pills-personal-tab">Business <br> Details</label>
                                                                </li>
                                                                <li class="nav-item w-25" role="presentation">
                                                                    <button class="nav-link mx-auto" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false"></button>
                                                                    <label class="text-center" for="pills-contact-tab">Contact <br> Details</label>
                                                                </li>
                                                                <li class="nav-item w-25" role="presentation">
                                                                    <button class="nav-link mx-auto" id="pills-further-tab" data-bs-toggle="pill" data-bs-target="#pills-further" type="button" role="tab" aria-controls="pills-further" aria-selected="false"></button>
                                                                    <label class="text-center" for="pills-further-tab">Further <br> Details</label>
                                                                </li>
                                                                <li class="nav-item w-25" role="presentation">
                                                                    <button class="nav-link mx-auto" id="pills-Identification-tab" data-bs-toggle="pill" data-bs-target="#pills-Identification" type="button" role="tab" aria-controls="pills-Identification" aria-selected="false"></button>
                                                                    <label class="text-center" for="pills-Identification-tab">Social Media Handles</label>
                                                                </li>
                                                            </ul>
                                                            <div class="tab-content" id="pills-tabContent">
                                                                <div class="tab-pane fade show active" id="pills-personal" role="tabpanel" aria-labelledby="pills-personal-tab">
                                                                    <div class="form-container">

                                                                        <div class="form-group">
                                                                            <div class="label_div">
                                                                                <label for="fname">Business Name</label>
                                                                            </div>
                                                                            <div class="field_div">
                                                                                <input type="text" class="form-control" placeholder="e.g UCDMJ Marketplace" id="business_name" name="business_name">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="label_div">
                                                                                <label for="lname">Business NTN Number (if applicable)</label>
                                                                            </div>
                                                                            <div class="field_div">
                                                                                <input type="text" class="form-control" id="ntn" placeholder="123456789" name="ntn">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="label_div">
                                                                                <label for="business_type">business Type</label>
                                                                            </div>
                                                                            <div class="field_div">
                                                                                <div class="dob-div d-flex gap-2">
                                                                                    <select name="business_type" class="form-control" id="business_type">
                                                                                        <option value="select">Select Business Type</option>
                                                                                        <option value="Sole Propriator">Sole Properiator</option>
                                                                                        <option value="Partnership">Partnership</option>
                                                                                        <option value="Corporation">Corporation</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="submit-container mt-5">
                                                                            <button type="button" id="f_cont" class="btn btn-primary w-100">Continue</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                                                    <div class="form-container">
                                                                        <div class="form-group">
                                                                            <div class="label_div">
                                                                                <label for="business_phone">Business Phone Number</label>
                                                                            </div>
                                                                            <div class="field_div">
                                                                                <input type="text" placeholder="03xxxxxxxxx" class="form-control" id="business_phone" name="business_phone">
                                                                            </div>
                                                                        </div>


                                                                        <div class="form-group">
                                                                            <div class="label_div">
                                                                                <label for="business_address">Business Address</label>
                                                                            </div>
                                                                            <div class="field_div">
                                                                                <input type="text" placeholder="Address Line 1" require class="form-control" id="business_address" name="business_address">
                                                                            </div>
                                                                            <div class="field_div mt-3">
                                                                                <input type="text" placeholder="address Line 2" class="form-control" id="business_address_2" name="business_address_2">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="label_div">
                                                                                <label for="city_province">City/Province</label>
                                                                            </div>
                                                                            <div class="field_div">
                                                                                <div class="fields d-flex gap-3">
                                                                                    <select class="form-control" id="city_province" name="city_province">
                                                                                        <option value="select">Select City</option>
                                                                                        <?php
                                                                                            $sql = "SELECT * FROM cities";
                                                                                            $results = $db->query($sql);
                                                                                            if ($db->num_rows($results) > 0) {
                                                                                                while($row = $db->fetch_assoc($results)) {
                                                                                                    echo "<option value='".$row['CityID']."'>".$row['CityName']."</option>";
                                                                                                }
                                                                                            }
                                                                                        ?>
                                                                                    </select>
                                                                                    <select class="form-control" id="province" name="province">
                                                                                        <option value="select">Select Province</option>
                                                                                        <?php
                                                                                            $sql = "SELECT * FROM provinces";
                                                                                            $results = $db->query($sql);
                                                                                            if ($db->num_rows($results) > 0) {
                                                                                                while($row = $db->fetch_assoc($results)) {
                                                                                                    echo "<option value='".$row['ProvinceID']."'>".$row['ProvinceName']."</option>";
                                                                                                }
                                                                                            }
                                                                                        ?>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="label_div">
                                                                                <label for="country">Country</label>
                                                                            </div>
                                                                            <div class="field_div">
                                                                                <select name="country" class="form-control" id="country">
                                                                                    <option value="select">Select Country</option>
                                                                                    <?php
                                                                                            $sql = "SELECT * FROM countries";
                                                                                            $results = $db->query($sql);
                                                                                            if ($db->num_rows($results) > 0) {
                                                                                                while($row = $db->fetch_assoc($results)) {
                                                                                                    echo "<option value='".$row['CountryID']."'>".$row['CountryName']."</option>";
                                                                                                }
                                                                                            }
                                                                                        ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="submit-container mt-5">
                                                                            <button type="button" id="s_cont" class="btn btn-primary w-100">Continue</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane fade" id="pills-further" role="tabpanel" aria-labelledby="pills-further-tab">
                                                                    <div class="form-container">
                                                                        <div class="form-group">
                                                                            <div class="label_div">
                                                                                <label for="business_description">Business Description</label>
                                                                            </div>
                                                                            <div class="field_div">
                                                                                <textarea class="form-control" placeholder="Write down something about your business" name="business_description" id="business_description" rows="5"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="label_div">
                                                                                <label for="refund_policy">Refund Policy</label>
                                                                            </div>
                                                                            <div class="field_div">
                                                                                <textarea class="form-control" placeholder="Explain your refund policy" name="refund_policy" id="refund_policy" rows="5"></textarea>
                                                                            </div>
                                                                        </div>

                                                                        <div class="submit-container mt-5">
                                                                            <button type="button" id="t_cont" class="btn btn-primary w-100">Continue</button>
                                                                        </div>


                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane fade" id="pills-Identification" role="tabpanel" aria-labelledby="pills-Identification-tab">
                                                                    <div class="form-container">

                                                                        <div class="form-group">
                                                                            <div class="label_div">
                                                                                <label for="facebook_link">Facebook</label>
                                                                            </div>
                                                                            <div class="field_div">
                                                                                <input type="text" class="form-control" id="facebook_link" name="facebook_link">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="label_div">
                                                                                <label for="linkedin_link">Linked In</label>
                                                                            </div>
                                                                            <div class="field_div">
                                                                                <input type="text" class="form-control" id="linkedin_link" name="linkedin_link">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="label_div">
                                                                                <label for="insta_link">Instagram</label>
                                                                            </div>
                                                                            <div class="field_div">
                                                                                <input type="text" class="form-control" id="insta_link" name="insta_link">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="label_div">
                                                                                <label for="twitter_link">Twitter</label>
                                                                            </div>
                                                                            <div class="field_div">
                                                                                <input type="text" class="form-control" id="twitter_link" name="twitter_link">
                                                                            </div>
                                                                        </div>

                                                                        <div class="submit-container mt-5">
                                                                            <button type="button" id="f_submit" class="btn btn-primary w-100">Submit Details</button>
                                                                        </div>

                                                                    </div>
                                                                </div>
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