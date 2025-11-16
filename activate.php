<?php include './layouts/header.php'; ?>
<?php

if (!$session->isUserLoggedIn(true)) {redirect('login.php', false);}
$user = current_user();
?>


<section class="bg-image">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Activate Your Account</h2>
              <p>A code has been send to your email please paste the OTP down below to verify your email address</p>

              <form>

                <div class="form-outline my-4">
                    <label class="form-label" for="youremail">Your Email Address</label>
                    <input type="text" id="verify_email" disabled name="verify_email" value="<?php echo $user['Email']; ?>" class="form-control form-control-lg" />
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="otp">OTP Code</label>
                    <input type="text" id="otp" name="otp" placeholder="xxxxxx" class="form-control form-control-lg" />
                </div>

                <div class="d-flex justify-content-center">
                  <button type="button"
                    class="btn btn-primary btn-block btn-lg text-body" id="submit_otp">Submit</button>
                </div>

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
    

    $("#submit_otp").on("click", () => {
      formData = {
        email: $("#verify_email").val().trim(),
        otp: $("#otp").val().trim()
      }
      $.ajax({
        url: "/scripts/verify_otp.php",
        type: "POST",
        data: formData,
        dataType: "json",
        success: (response) => {

          console.log(response.message);
          if (response.message.includes("OTP verified")) {
            createToast(response.message, "s");
            $("#submit_otp").attr("disabled", 1);
            setTimeout(() => {
              window.location.assign("/scripts/redirects");
            }, 1000);
          }

        },
        error: (xhr, status, error) => {
          if (xhr.responseText.includes("couldn't verify OTP")) {
            createToast("The OTP you entered is not correct Please enter a valid OTP", "d")
          }
          console.log(xhr.responseText);
        }
      })
    })
  })
</script>
<?php include './layouts/footerEnd.php'; ?>