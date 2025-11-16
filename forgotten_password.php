<?php



require_once("./includes/load.php");
if (isset($_GET['token']) && $_GET['token'] == $_SESSION['request_token']) {
    $is_token_verified = true;
    $request_token = $_SESSION['request_token'];
    $sql = "SELECT * FROM passwordrequest WHERE request_token = '{$db->escape($request_token)}'";
    $result = $db->query($sql);
    if ($db->num_rows($result) > 0) {
        $verificationInformation = $db->fetch_assoc($result);
    }
} else {
    redirect("/", false);
}

?>


<?php include './layouts/header.php'; ?>

<?php if ($is_token_verified && isset($verificationInformation)) : ?>
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
                                                                <h3 class="text-uppercase text-center">Verify Your Email</h3>
                                                                <p>An OTP has been sent to your email address Please paste the code below</p>
                                                            </div>
                                                            <div class="signup-form-container">

                                                                <ul class="nav nav-pills mb-3 d-none " id="pills-tab" role="tablist">
                                                                    <li class="nav-item w-25" role="presentation">
                                                                        <button class="nav-link active mx-auto" id="pills-personal-tab" data-bs-toggle="pill" data-bs-target="#pills-personal" type="button" role="tab" aria-controls="pills-personal" aria-selected="true"></button>
                                                                    </li>
                                                                    <li class="nav-item w-25" role="presentation">
                                                                        <button class="nav-link mx-auto" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false"></button>
                                                                    </li>
                                                                </ul>
                                                                <div class="tab-content" id="pills-tabContent">
                                                                    <div class="tab-pane fade show active" id="pills-personal" role="tabpanel" aria-labelledby="pills-personal-tab">
                                                                        <div class="form-container">

                                                                            <div class="form-group">
                                                                                <div class="label_div">
                                                                                    <label for="fname">Email Address</label>
                                                                                </div>
                                                                                <div class="field_div">
                                                                                    <input type="text" disabled class="form-control" value="<?php echo $verificationInformation["Email"] ?>" id="forgotten_email" name="forgotten_email">
                                                                                    <input type="hidden" id="request_token" value="<?php echo $verificationInformation["request_token"] ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <div class="label_div">
                                                                                    <label for="verificationCode">Verification Code</label>
                                                                                </div>
                                                                                <div class="field_div">
                                                                                    <input type="text" class="form-control" id="verificationCode" placeholder="xxxxxx" name="verificationCode">
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            <div class="submit-container my-5">
                                                                                <button type="button" id="resendCode" class="btn btn-outline-primary w-100">Resend Code</button>
                                                                            </div>

                                                                            <div class="submit-container mt-3">
                                                                                <button type="button" id="verifyOTP" class="btn btn-primary w-100">Verify</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                                                        <div class="form-container">
                                                                            <div class="form-group">
                                                                                <div class="label_div">
                                                                                    <label for="newPassword">New Password</label>
                                                                                </div>
                                                                                <div class="field_div">
                                                                                    <input type="password" class="form-control" id="newPassword" name="newPassword">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <div class="label_div">
                                                                                    <label for="confirmPassword">Repeat New Password</label>
                                                                                </div>
                                                                                <div class="field_div">
                                                                                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
                                                                                </div>
                                                                            </div>

                                                                            <div class="submit-container mt-5">
                                                                                <button type="button" id="createPassword" class="btn btn-primary w-100">Submit</button>
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
<?php else : ?>
    <section class="bg-image">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Invalid Token</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php endif; ?>

<?php include './layouts/footer.php'; ?>
<?php include './layouts/footerScript.php'; ?>
<script>
    $(document).ready(() => {
        $("#resendCode").on("click", () => {
            let formData = {
                requestType: "resendCode",
                email: $("#forgotten_email").val().trim()
            }
            $.ajax({
                url: "/scripts/forgot_password_request.php",
                type: "POST",
                data: formData,
                dataType: "json",
                success: (response) => {
                    if (response.message.includes("Code Resent")) {
                        createToast("New Code has been sent", "s");
                    }
                },
                error: (xhr, status, error) => {
                    console.log(xhr.responseText);
                    console.log(error);
                }
            })
        })

        $("#verifyOTP").on("click", () => {
            let formData = {
                requestType: "verify",
                email: $("#forgotten_email").val().trim(),
                otp: $("#verificationCode").val().trim(),
                verificationToken: $("#request_token").val()
            }
            $.ajax({
                url: "/scripts/forgot_password_request.php",
                type: "POST",
                data: formData,
                dataType: "json",
                success: (response) => {
                    console.log(response);
                    if (response.message.includes("Verified")) {
                        $("#pills-personal-tab").removeClass("active");
                        $("#pills-personal-tab").addClass("completed");
                        $("#pills-contact-tab").addClass("active");


                        $("#pills-personal").removeClass("active");
                        $("#pills-personal").removeClass("show");
                        $("#pills-contact").addClass("active");
                        $("#pills-contact").addClass("show");

                        createToast("OTP Verified", "s");
                    }
                },
                error: (xhr, status, error) => {
                    console.log(xhr.responseText)
                    if (xhr.responseText.includes("otp not verified")) {
                        createToast("OTP not verified", "d");
                    }
                }
            })
        })

        $("#createPassword").on("click", () => {
            let newPassword = $("#newPassword").val().trim();
            let conf_pass = $("#confirmPassword").val().trim();
            if (newPassword == "") {
                createToast("Please enter your password");
            } else if (!password_strengthRegex.test(newPassword)) {
                createToast("Please enter a password that contains atleast 1 digit, 1 lowercase, 1 uppercase, and atleast 8 characters long", "d")
            } else if (newPassword != conf_pass) {
                createToast("Repeat password doesn't match with new password", "d")
            } else {
                let formData = {
                    requestType: "createPassword",
                    email: $("#forgotten_email").val().trim(),
                    otp: $("#verificationCode").val().trim(),
                    verificationToken: $("#request_token").val(),
                    Password: newPassword
                }
                $.ajax({
                    url: "/scripts/forgot_password_request.php",
                    type: "post",
                    data: formData,
                    dataType: "json",
                    success: (response) => {
                        if (response.message.includes("everything went smoothly")) {
                            createToast("Password changed successfully please signin with new password", "s");
                            setTimeout(() => {
                                createToast("You are being redirected to the login page", "s");
                            }, 500);
                            setTimeout(() => {
                                window.location.assign("/login");
                            }, 200);
                        }
                    },
                    error: (xhr, status, error) => {
                        console.log(xhr.responseText);
                        if (xhr.responseText.includes("otp not verified")) {
                            createToast("OTP not verified", "d");
                        }
                    }
                })
            }
        })
    })
</script>
<?php include './layouts/footerEnd.php'; ?>