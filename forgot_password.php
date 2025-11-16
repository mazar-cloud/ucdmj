<?php include './layouts/header.php'; ?>


<section class="bg-image">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Forgot Password</h2>
              <p class="text-center mb-5">Please enter your email to reset the password</p>
              <form id="forgotPassword">

                <div class="form-outline mb-4">
                    <label class="form-label" for="forgot_email">Your Email</label>
                    <input type="email" id="forgot_email" name="forgot_email" placeholder="example@example.com" class="form-control form-control-lg" />
                </div>

                <div class="d-flex justify-content-center">
                  <button type="button" id="forgotPasswordSubmit"
                    class="btn btn-primary btn-block btn-lg text-body">Send</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">are you accidentely here? <a href="/login"
                    class="fw-bold text-body"><u>Go to login page</u></a></p>

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
  $(document).ready(() => {
    $("#forgotPassword").on("submit", (e) => {
      e.preventDefault();
    })

    $("#forgotPasswordSubmit").on("click", () => {
      let email = $("#forgot_email").val().trim();
      validateEmail(email)
        .then((response) => {
          if (response) {
            let formData = {
              requestType: "request",
              email: email
            }
            $.ajax({
              url: "/scripts/forgot_password_request.php",
              type: "post",
              data: formData,
              dataType: "json",
              success: (response) => {
                if (response.message.includes("everything went smoothly")) {
                  window.location.assign("/forgotten_password?token="+response.token);
                }
              },
              error: (xhr, status, error) => {
                console.log(xhr.responseText);
                createToast("Error in submitting the request", "d");
              }
            })
          } else {
            createToast("The email you entered does not found in our database", "d")
          }
        })
    })
  })
</script>
<?php include './layouts/footerEnd.php'; ?>