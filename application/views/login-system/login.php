<div class="page-header align-items-start min-vh-100" style="background-color: white;" loading="lazy">
    <span class="mask opacity-6"></span>
    <div class="container my-auto">
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
          <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
        </svg>
        <div class="alert alert-success d-flex align-items-center" role="alert" id="form_success" style="margin-top:-20px;display:none!important">
          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
          <div>
            Registeration Successful! Verification Email has been sent. Please verify your account.
          </div>
        </div>
        <div class="alert alert-danger d-flex align-items-center" role="alert" id="form_failed" style="margin-top:-20px;display:none!important">
          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
          <div>
            One or more fields are empty or incorrect. Please try again.
          </div>
        </div>
        <div class="alert alert-success d-flex align-items-center" role="alert" id="login_success" style="margin-top:-20px;display:none!important">
          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
          <div>
            Login Successful!
          </div>
        </div>
        <div class="alert alert-danger d-flex align-items-center" role="alert" id="login_failed" style="margin-top:-20px;display:none!important">
          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
          <div>
            Incorrect Email or Password!
          </div>
        </div>
      <script>setInterval(function(){document.getElementById("form_success").style="margin-top:-20px;display:none!important";},5000);
    setInterval(function(){document.getElementById("form_failed").style="margin-top:-20px;display:none!important";},5000);
    setInterval(function(){document.getElementById("login_success").style="margin-top:-20px;display:none!important";},5000);
    setInterval(function(){document.getElementById("login_failed").style="margin-top:-20px;display:none!important";},5000);</script> 
      <?php 
       $form_status = $this->session->flashdata('form_status'); 
       
       $login_status = $this->session->flashdata('login_status');
if(($form_status!=null)||($form_status!="")){
  if($form_status == 0){
    echo "<script>document.getElementById('form_failed').style = 'margin-top:-20px;';</script>";
  }
  if($form_status == 1){
    echo "<script>document.getElementById('form_success').style = 'margin-top:-20px;';</script>";
  }
}
if(($login_status!=null)||($login_status!="")){
  if($login_status == 0){
    echo "<script>document.getElementById('login_failed').style = 'margin-top:-20px;';</script>";
  }
  if($login_status == 1){
    echo "<script>document.getElementById('login_success').style = 'margin-top:-20px;';</script>";
  }
}
?>
      <div class="row" style="margin-top:40px;">
        <div class="col-lg-4 col-md-8 col-12 mx-auto">
          <div class="card z-index-0 fadeIn3 fadeInBottom">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="shadow-primary border-radius-lg py-3 pe-1"  style="background-color: rgb(109, 3, 109);">
                <h4 class="text-white font-weight-bolder text-center mt-2 mb-2">Sign In</h4>
              </div>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs mb-3" id="ex1" role="tablist">
                  <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="ex1-tab-1" data-bs-toggle="tab" href="#ex1-tabs-1" role="tab" aria-controls="ex1-tabs-1" aria-selected="true">Recruiter</a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a class="nav-link" id="ex1-tab-2" data-bs-toggle="tab" href="#ex1-tabs-2" role="tab" aria-controls="ex1-tabs-2" aria-selected="true">Candidate</a>
                  </li>
                </ul>
                <div class="tab-content" id="ex1-content">
                  <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel" aria-labelledby="ex1-tab-1">
                  <?php echo form_open('LoginSystem/verifyreclogin', 'class="text-start" id="recruiter-login-form" name="recruiter-login-form" onsubmit="return validrec()"'); ?>
                      <div class="input-group input-group-outline my-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="remail" id="remail">
                      </div>
                      <div class="input-group input-group-outline mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="rpassword" id="rpassword">
                      </div>
                      <div class="form-check form-switch d-flex align-items-center mb-3">
                        <input class="form-check-input" type="checkbox" id="rememberMe" checked>
                        <label class="form-check-label mb-0 ms-3" for="rememberMe">Remember me</label>
                      </div>
                      <div class="text-center">
                        <button type="submit" class="btn w-100 my-4 mb-2 text-white" style="background-color: rgb(109, 3, 109);">Sign in</button>
                      </div>
                      <p class="mt-4 text-sm text-center">
                        <a href="<?php echo base_url(); ?>register" class="">Don't have an account? Sign Up</a> 
                      </p>
                    </form>
                  </div>
                  <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                  <?php echo form_open('LoginSystem/verifyemplogin', 'class="text-start" id="employee-login-form" name="employee-login-form" onsubmit="return validemp()"'); ?>
                      <div class="input-group input-group-outline my-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email">
                      </div>
                      <div class="input-group input-group-outline mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                      </div>
                      <div class="form-check form-switch d-flex align-items-center mb-3">
                        <input class="form-check-input" type="checkbox" id="rememberMe" checked>
                        <label class="form-check-label mb-0 ms-3" for="rememberMe">Remember me</label>
                      </div>
                      <div class="text-center">
                        <button type="submit" class="btn w-100 my-4 mb-2 text-white" style="background-color: rgb(109, 3, 109);">Sign in</button>
                      </div>
                      <p class="mt-4 text-sm text-center">
                        <a href="<?php echo base_url(); ?>register" class="">Don't have an account? Sign Up</a> 
                      </p>
                    </form>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<script>
  const input_fields = {
  email: /^([a-z\d\.-]+)@([a-z\d-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/,
  password: /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,}$/
}
  function validemp(){
    let flag = 0;
  if(!(input_fields.email.test(document.forms["employee-login-form"]["email"].value))){
    flag = 1;
  }
  if(!(input_fields.password.test(document.forms["employee-login-form"]["password"].value))){
    flag = 1;
  }
  if(flag == 1){
    document.getElementById('form_failed').style = "margin-top:-20px;";
    return false;
  }else return true;
  }
  function validrec(){
    let flag = 0;
  if(!(input_fields.email.test(document.forms["recruiter-login-form"]["remail"].value))){
    flag = 1;
  }
  if(!(input_fields.password.test(document.forms["recruiter-login-form"]["rpassword"].value))){
    flag = 1;
  }
  if(flag == 1){
    document.getElementById('form_failed').style= "margin-top:-20px;";
    return false;
  }else return true;
  }
  </script>