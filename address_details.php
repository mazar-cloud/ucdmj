<?php include './layouts/header.php'; ?>


<section class="bg-image">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Enter Your Address Details</h2>

              <form id="AddressDetailsForm">
                <div class="title">
                  <h3 class="fs-5 text-center">Permanent Address</h3>
                </div>
                <div class="form-group">
                  <div class="label_div">
                    <label for="permanentAddress">Address</label>
                  </div>
                  <div class="field_div">
                    <input type="text" placeholder="Address Line 1" require class="form-control" id="permanentAddress" name="permanentAddress">
                  </div>
                  <div class="field_div mt-3">
                    <input type="text" placeholder="address Line 2" class="form-control" id="permanentAddress2" name="permanentAddress2">
                  </div>
                </div>
                <div class="form-group">
                  <div class="label_div">
                    <label for="PermanentCity">City/Province</label>
                  </div>
                  <div class="field_div">
                    <div class="fields d-flex gap-3">
                      <select class="form-control" id="PermanentCity" name="PermanentCity">
                        <option value="select">Select City</option>
                        <?php
                        $sql = "SELECT * FROM cities";
                        $results = $db->query($sql);
                        if ($db->num_rows($results) > 0) {
                          while ($row = $db->fetch_assoc($results)) {
                            echo "<option value='" . $row['CityID'] . "'>" . $row['CityName'] . "</option>";
                          }
                        }
                        ?>
                      </select>
                      <select class="form-control" id="permanentProvince" name="permanentProvince">
                        <option value="select">Select Province</option>
                        <?php
                        $sql = "SELECT * FROM provinces";
                        $results = $db->query($sql);
                        if ($db->num_rows($results) > 0) {
                          while ($row = $db->fetch_assoc($results)) {
                            echo "<option value='" . $row['ProvinceID'] . "'>" . $row['ProvinceName'] . "</option>";
                          }
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="label_div">
                    <label for="permanentCountry">Country</label>
                  </div>
                  <div class="field_div">
                    <select name="permanentCountry" class="form-control" id="permanentCountry">
                      <option value="select">Select Country</option>
                      <?php
                      $sql = "SELECT * FROM countries";
                      $results = $db->query($sql);
                      if ($db->num_rows($results) > 0) {
                        while ($row = $db->fetch_assoc($results)) {
                          echo "<option value='" . $row['CountryID'] . "'>" . $row['CountryName'] . "</option>";
                        }
                      }
                      ?>
                    </select>
                  </div>
                </div>

                <!-- shipping address -->
                <div class="title mt-5">
                  <h3 class="fs-5 text-center">Shipping Address</h3>
                </div>
                <div class="isShippingSame form-group my-4">
                  <input type="checkbox" id="sameAddress" name="sameAddress" class="form-check-input ml-1 mt-1">
                  <label for="sameAddress" class=" ml-4 pl-2">Same as Permanent</label>
                </div>
                <div id="shippingAddress">
                  <div id="shippingAddressContainer">
  
                    <div class="form-group">
                      <div class="label_div">
                        <label for="shippingAddress">Address</label>
                      </div>
                      <div class="field_div">
                        <input type="text" placeholder="Address Line 1" require class="form-control" id="shippingAddress" name="shippingAddress">
                      </div>
                      <div class="field_div mt-3">
                        <input type="text" placeholder="address Line 2" class="form-control" id="shippingAddress2" name="shippingAddress2">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="label_div">
                        <label for="shippingCity">City/Province</label>
                      </div>
                      <div class="field_div">
                        <div class="fields d-flex gap-3">
                          <select class="form-control" id="shippingCity" name="shippingCity">
                            <option value="select">Select City</option>
                            <?php
                            $sql = "SELECT * FROM cities";
                            $results = $db->query($sql);
                            if ($db->num_rows($results) > 0) {
                              while ($row = $db->fetch_assoc($results)) {
                                echo "<option value='" . $row['CityID'] . "'>" . $row['CityName'] . "</option>";
                              }
                            }
                            ?>
                          </select>
                          <select class="form-control" id="shippingProvince" name="shippingProvince">
                            <option value="select">Select Province</option>
                            <?php
                            $sql = "SELECT * FROM provinces";
                            $results = $db->query($sql);
                            if ($db->num_rows($results) > 0) {
                              while ($row = $db->fetch_assoc($results)) {
                                echo "<option value='" . $row['ProvinceID'] . "'>" . $row['ProvinceName'] . "</option>";
                              }
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="label_div">
                        <label for="shippingCountry">Country</label>
                      </div>
                      <div class="field_div">
                        <select name="shippingCountry" class="form-control" id="shippingCountry">
                          <option value="select">Select Country</option>
                          <?php
                          $sql = "SELECT * FROM countries";
                          $results = $db->query($sql);
                          if ($db->num_rows($results) > 0) {
                            while ($row = $db->fetch_assoc($results)) {
                              echo "<option value='" . $row['CountryID'] . "'>" . $row['CountryName'] . "</option>";
                            }
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="d-flex justify-content-center mt-5">
                  <button type="button" id="AddressSubmitButton" class="btn btn-primary btn-block btn-lg text-body">Submit</button>
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
    // prevent enter button to submit the form
    $(window).keydown(function(event) {
      if (event.keyCode == 13) {
        event.preventDefault();
        return false;
      }
    });




    $("#AddressDetailsForm").on("submit", (event) => {
      event.preventDefault();
    })

    var isShippingAddressSame = false;
    var checkbox = $("#sameAddress");
    var shippingAddress = $("#shippingAddressContainer");
    checkbox.change(() => {
      if (checkbox.is(":checked")) {
        $("#shippingAddress").html(" ");
        isShippingAddressSame = true;
      } else {
        $("#shippingAddress").html(shippingAddress);
      }
    })

    $("#AddressSubmitButton").on("click", () => {
      let permanentAddress = $("#permanentAddress").val().trim();
      let permanentAddress2 = $("#permanentAddress2").val().trim();
      let permanentCity = $("#PermanentCity").val().trim();
      let permanentProvince = $("#permanentProvince").val().trim();
      let permanentCountry = $("#permanentCountry").val().trim();
      let shippingAddress;
      let shippingAddress2;
      let shippingCity;
      let shippingProvince;
      let shippingCountry;
      if (isShippingAddressSame) {
        shippingAddress = permanentAddress;
        shippingAddress2 = permanentAddress2;
        shippingCity = permanentCity;
        shippingProvince = permanentProvince;
        shippingCountry = permanentCountry;
      } else {
        shippingAddress = $("#shippingAddress").val().trim();
        shippingAddress2 = $("#shippingAddress2").val().trim();
        shippingCity = $("#shippingCity").val().trim();
        shippingProvince = $("#shippingProvince").val().trim();
        shippingCountry = $("#shippingCountry").val().trim();
      }

      if (permanentAddress == "" || shippingAddress == "") {
        createToast("Please enter Address Line 1 Field", "d");
      } else if (permanentCity == "select" || shippingCity == "select") {
        createToast("Please Select your city", "d");
      } else if (permanentProvince == "select" || shippingProvince == "select") {
        createToast("Please select your province", "d");
      } else if (permanentCountry == "select" || shippingCountry == "select") {
        createToast("Please select your country", "d");
      } else {
        let formData = {
          pAddress: permanentAddress,
          pAddress2: permanentAddress2,
          pCity: permanentCity,
          pProvince: permanentProvince,
          pCountry: permanentCountry,
          sAddress: shippingAddress,
          sAddress2: shippingAddress2,
          sCity: shippingCity,
          sProvince: shippingProvince,
          sCountry: shippingCountry
        }

        $.ajax({
          url: "/scripts/submit_address.php",
          type: "POST",
          data: formData,
          dataType: "json",
          success: (response) => {
            if (response.message.includes("Everything went smoothly")) {
              window.location.assign("/scripts/redirects");
            }
          },
          error: (xhr,status,error) => {
            if (xhr.responseText.includes("Required Fields Empty")) {
              createToast("Please fillout all the required fields", "d");
            } else if (xhr.responseText.includes("Not Allowed to visit the page")) {
              createToast("Something went wrong!", "d");
            } else {
              console.log(xhr.responseText);
            }
          }
        })
      }
    })

  })
</script>
<?php include './layouts/footerEnd.php'; ?>