<?php 
    require_once($_SERVER['DOCUMENT_ROOT']."/includes/load.php");
    if (!isset($_GET['OrderID'])) {
       redirect("/", false);
    }
?>
<?php include './layouts/header.php'; ?>



<section class="bg-image">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Order Confirmation</h2>

              <div class="w-50 mx-auto text-center">
                <i class="fas fa-check-circle" style="color: #039b31; font-size: 150px;"></i>
                <h2 class="fs-4 mt-3">Order Confirmed</h2>
              </div>

              <div class="w-75 mt-5 pt-3 mx-auto text-center">
                <p>Your order has been confirmed. Your Order ID is <?php $_GET['OrderID'] ? $_GET['OrderID'] : "Error"; ?> Please login to see the details. If you are new to this site your login details has been sent to your email.</p>
                <a href="/admin/dashboard">Go to Dashboard <i class="fas fa-arrow-right"></i></a>
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