<?php include './layouts/header.php'; ?>


<section class="bg-image">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Login</h2>

              <?php 
                if (isset($_GET['user']) && $_GET['user'] == "banned") {
                  echo "<p class='text-danger text-center my-5'>You are banned from the site! If you think it was a mistake please <a href='/contact' class='text-danger text-decoration-underline'>Contact Us</a></p>";
                }
              ?>

              <form id="loginForm">

                <div class="form-outline mb-4">
                    <label class="form-label" for="login_email">Your Email</label>
                    <input type="email" id="login_email" name="login_email" placeholder="example@example.com" class="form-control form-control-lg" />
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="login_password">Password</label>
                    <input type="password" id="login_password" name="login_password" placeholder="************" class="form-control form-control-lg" />
                </div>

                <div class="d-flex mb-5">
                    <a href="/forgot_password">Forgot password?</a>
                </div>

                <div class="d-flex justify-content-center">
                  <button type="button" id="loginButton"
                    class="btn btn-primary btn-block btn-lg text-body">Login</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Don't have an account? <a href="/signup"
                    class="fw-bold text-body"><u>Register Here</u></a></p>

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
    $("#loginForm").on("submit", (event) => {
      event.preventDefault();
    })

    $("#loginButton").on("click", () => {
        if ($("#login_password").val().trim() != "") {
          formData = {
            loginEmail: $("#login_email").val().trim(),
            loginPassword: $("#login_password").val().trim()
          }

          $.ajax({
            url: "/scripts/login.inc.php",
            type: "post",
            data: formData,
            dataType: "json",
            success: (response) => {
              console.log(response);
              if (response.message.includes("everything went smoothly")) {
                window.location.assign("/scripts/redirects");

              }
            },
            error: (xhr, status, error) => {
              if(xhr.responseText.includes("Email Or Password Wrong")) {
                createToast("The email or password entered is incorrect", "d");
              } 
              console.log(xhr.responseText);
            }
          })
        } else {
          createToast("Please Enter your password", "d");
        }
    })
  })
</script>
<?php include './layouts/footerEnd.php'; ?>