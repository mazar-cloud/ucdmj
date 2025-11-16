<?php include './layouts/header.php'; ?>
<?php echo generateBreadcrumbs(); ?>
<!-- Contact Start -->
<div class="container-fluid">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Contact Us</span></h2>
    <div class="row px-xl-5">
        <div class="col-lg-7 mb-5">
            <div class="contact-form bg-light p-30">
                <div id="success"></div>
                <form name="sentMessage" id="contactForm" novalidate="novalidate">
                    <div class="control-group">
                        <input type="text" class="form-control" id="name" placeholder="Your Name"
                            required="required" data-validation-required-message="Please enter your name" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <input type="email" class="form-control" id="email" placeholder="Your Email"
                            required="required" data-validation-required-message="Please enter your email" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <input type="text" class="form-control" id="subject" placeholder="Subject"
                            required="required" data-validation-required-message="Please enter a subject" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <textarea class="form-control" rows="8" id="message" placeholder="Message"
                            required="required"
                            data-validation-required-message="Please enter your message"></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div>
                        <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">Send
                            Message</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-5 mb-5">
            <div class="bg-light p-30 mb-30">
            <iframe style="width: 100%; height: 250px; border:0;"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3504.4774602967386!2d68.20982007529078!3d28.55542198757852!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39330b49ebd76265%3A0xc7db747d63c5b48b!2sLuawms%20University%20College%20of%20Dera%20Murad%20Jamali!5e0!3m2!1sen!2s!4v1696831320866!5m2!1sen!2s" 
            frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
            <div class="bg-light p-30 mb-3">
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Quetta Road Dera Murad Jamali, Balochistan, Pakistan</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@ucdmj.com</p>
                <p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i>+92 345 67890</p>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->



<?php include './layouts/footer.php'; ?>
<?php include './layouts/footerScript.php'; ?>
<?php include './layouts/footerEnd.php'; ?>