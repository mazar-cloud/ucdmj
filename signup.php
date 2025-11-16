<?php include './layouts/header.php'; ?>


<section class="bg-image">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Create an account</h2>

              <form id="buyerSignupForm">

                <div class="form-outline mb-4">
                  <label class="form-label" for="yourname">Your Name</label>
                  <input type="text" id="yourname" autocomplete="name" name="yourname" placeholder="John Doe" class="form-control form-control-lg" />
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" for="email">Your Email</label>
                  <input type="email" id="email" name="email" placeholder="example@example.com" class="form-control form-control-lg" />
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" for="password">Password</label>
                  <input type="password" id="password" name="password" placeholder="************" class="form-control form-control-lg" />
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" for="confirm_password">Repeat your password</label>
                  <input type="password" id="confirm_password" name="confirm_password" placeholder="************" class="form-control form-control-lg" />
                </div>

                <div class="form-check d-flex mb-5">
                  <label class="form-check-label" for="form2Example3g">
                    I agree all statements in <a href="#" class="text-body"><u>Terms of service</u></a>
                  </label>
                  <input class="form-check-input me-2" type="checkbox" value="" id="tocBuyerSignup" />
                </div>

                <div class="d-flex justify-content-center">
                  <button type="button" id="buyerSignupSubmit" class="btn btn-primary btn-block btn-lg text-body">Register</button>
                </div>
                <span class="hrow">
                  <span class="left"></span>
                  <span>Or</span>
                  <span class="right"></span>
                </span>
                <div class="d-flex justify-content-center">
                  <a href="/seller_signup" class="btn btn-primary-outline btn-block btn-lg text-body">Create a Seller Account</a>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="/login" class="fw-bold text-body"><u>Login here</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



<?php include './layouts/footer.php'; ?>
<?php include './layouts/footerScript.php'; ?>
<script>
  const lettersOnlyRegex = /^[a-zA-Z\s]+$/;
  const digitsOnlyRegex = /^\d+$/;
  const email_patternRegex = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
  const pwd_strengthRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
  $(document).ready(() => {
    // prevent enter button to submit the form
    $(window).keydown(function(event) {
      if (event.keyCode == 13) {
        event.preventDefault();
        return false;
      }
    });




    $("#buyerSignupForm").on("submit", (event) => {
      event.preventDefault();
    })

    $("#buyerSignupSubmit").on("click", () => {

      let buyerName = $("#yourname").val().trim();
      let buyerEmail = $("#email").val().trim();
      let pwd = $("#password").val().trim();
      let confPwd = $("#confirm_password").val().trim();
      let checkToc = $("#tocBuyerSignup");

      let input = {
        "YourName": buyerName,
        "EmailAddress": buyerEmail, 
        "Password": pwd,
        "Confirm Password": confPwd
      }

      if (check_empty(input)) {

        if (!email_patternRegex.test(buyerEmail)) {
          createToast("Please Enter a valid email address", "d");
        } else {

          validateEmail(buyerEmail)
            .then((result) => {
              if (result) {
                createToast("Email already exist", "d");
              } else {
                if (!pwd_strengthRegex.test(pwd)) {
                  createToast("Please enter a password that contains atleast one capital letter, small letter, digit, and a special character", "d");
                } else if (pwd != confPwd) {
                  createToast("Password doesn't match", "d");
                } else if (!checkToc.is(":checked")) {
                  createToast("You must agree to our terms and condition", "d");
                } else {
                  $.ajax({
                    url: "/scripts/buyer_signup.php",
                    type: "post",
                    data: input,
                    dataType: "json",
                    success: (response) => {
                      createToast(response.message, "s");
                      console.log("before if statement: " + response.message);
                      if (response.message.includes("Everything went smoothly")) {
                        window.location.assign("/scripts/redirects");
                        console.log("after if statement: " + response.message);
                      }
                    },
                    error: (xhr, status, error) => {
                      console.log(xhr.responseText);
                      // createToast(xhr.responseText, "d");
                    }
                  })
                }
              }
            });
        }
      } else {
        console.log("else statement");
      }

    })

  })
</script>
<?php include './layouts/footerEnd.php'; ?>