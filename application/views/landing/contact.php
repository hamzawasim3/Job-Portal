<section>
    <div class="page-header min-vh-100">
      <div class="container">
      <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
          <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
        </svg>
        <div class="alert alert-success d-flex align-items-center" role="alert" id="contact_success" style="margin-top:-20px;display:none!important">
          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
          <div>
            Your message has been sent to the support team!
          </div>
        </div>
        <div class="alert alert-danger d-flex align-items-center" role="alert" id="contact_failed" style="margin-top:-20px;display:none!important">
          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
          <div>
            One or more fields are empty or incorrect. Please try again.
          </div>
        </div>
      <script>setInterval(function(){document.getElementById("contact_success").style="margin-top:-20px;display:none!important";},5000);
              setInterval(function(){document.getElementById("contact_failed").style="margin-top:-20px;display:none!important";},5000);</script> 
          <div class="col-xl-10 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto">
            <div class="card d-flex blur justify-content-center shadow-lg my-sm-0 my-sm-6 mt-8 mb-5">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <div class="shadow-primary border-radius-lg p-3" style="background-color: rgb(109, 3, 109);">
                  <h3 class="text-white text-center text-primary mb-0">Contact Us</h3>
                </div>
              </div>
              <div class="card-body">
                <p class="pb-3 text-center">
                  If you face any issues using our platform, please let us know!
                </p>
                <?php 
                $email_sent = $this->session->flashdata('email_sent');
                if($email_sent!=null){
                  if($email_sent == 0){
                    echo "<script>document.getElementById('contact_failed').style = 'margin-top:-20px;';</script>";
                  }
                  if($email_sent == 1){
                    echo "<script>document.getElementById('contact_success').style = 'margin-top:-20px;';</script>";
                  }
                }
                echo form_open('/Home/contact_submit','class="text-start" id="contact-form" name="contact-form" onsubmit="return validcontact()"');
                ?>
                  <div class="card-body p-0 my-3">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="input-group input-group-static mb-4">
                          <label>Full Name</label>
                          <input type="text" id="name" name="name" class="form-control" placeholder="Full Name" required>
                        </div>
                      </div>
                      <div class="col-md-6 ps-md-2">
                        <div class="input-group input-group-static mb-4">
                          <label>Email</label>
                          <input type="email" id="email" name="email" class="form-control" placeholder="Email Address" required>
                        </div>
                      </div>
                    </div>
                    <div class="form-group mb-0 mt-md-0 mt-4">
                      <div class="input-group input-group-static mb-4">
                        <label>How can we help you?</label>
                        <textarea name="message"id="message" name="message"  class="form-control" id="message" rows="6" placeholder="Describe your problem in at least 100 characters" required></textarea>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 text-center">
                        <button type="submit" class="btn mt-3 mb-0 text-white" style="background-color: rgb(109, 3, 109);">Send Message</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
      </div>
    </div>
  </section>
<script>
   const input_fields = {
    plaintext: /^[a-zA-Z0-9.,-\s]*$/,
    email: /^([a-z\d\.-]+)@([a-z\d-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/,
}
  function validcontact(){
    let flag = 0;
  if(!(input_fields.plaintext.test(document.forms["contact-form"]["name"].value))){
    flag = 1;
  }
  if(!(input_fields.email.test(document.forms["contact-form"]["email"].value))){
    flag = 1;
  }
  if(document.forms["contact-form"]["message"].value.length<100){
    flag = 1;
  }
  if(flag == 1){
    document.getElementById('contact_failed').style= "margin-top:-20px;";
    return false;
  }else return true;
  }
</script>
