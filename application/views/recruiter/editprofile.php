<div class="page-header align-items-start min-vh-100" style="background-color: white;" loading="lazy">
    <span class="mask opacity-6"></span>
    <div class="container" style="margin-top:120px;margin-bottom:auto;margin-left:auto;margin-right:auto;">
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
            Profile Updated Successfully!
          </div>
        </div>
        <div class="alert alert-danger d-flex align-items-center" role="alert" id="form_failed" style="margin-top:-20px;display:none!important">
          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
          <div>
            One or more fields are empty or incorrect. Please try again.
          </div>
        </div>
      <script>setInterval(function(){document.getElementById("form_success").style="margin-top:-20px;display:none!important";},5000);
              setInterval(function(){document.getElementById("form_failed").style="margin-top:-20px;display:none!important";},5000);</script> 
      <?php
if($form_status!=null){
  if($form_status == 0){
    echo "<script>document.getElementById('form_failed').style = 'margin-top:-20px;';</script>";
  }
  if($form_status == 1){
    echo "<script>document.getElementById('form_success').style = 'margin-top:-20px;';</script>";
  }
}
?>
      <div class="row" style="margin-top:40px;">
        <div>
          <div class="card z-index-0 fadeIn3 fadeInBottom">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="col-lg-4 col-md-8 col-12 mx-auto shadow-primary border-radius-lg py-3 pe-1" style="background-color: rgb(109, 3, 109);">
                <h4 class="text-white font-weight-bolder text-center mt-2 mb-2">Edit Profile</h4>
              </div>
            </div>
            <div class="card-body">
              <style>
                .image-upload>input {
                  display: none;
                }
                .tooltip-inner {
                  max-width: 100% !important;
                }
              </style>
              <?php echo form_open('Recruiter/update_profile', 'class="text-start" id="update-recruiter-form" name="update-recruiter-form" onsubmit="return validrec()"'); ?>
              <label class="form-label" style="color:#7b809a;">Profile Image</label>
                <div class="image-upload" style="display: flex;justify-content: center;">
                  <label for="file-input1">
                    <img id="image_file1" src="<?php echo $image_url; ?>" style="max-height: 100px;">
                  </label>
                  <input id="file-input1" type="file" accept="image/jpeg, image/png"/>
                </div>
                <div class="input-group input-group-outline my-3 is-filled">
                  <label class="form-label">Name</label>
                  <input type="text" name="rname" id="rname" class="form-control" value="<?php echo $name; ?>" required>
                </div>
                <div class="input-group input-group-outline my-3 is-filled">
                  <label class="form-label">Phone Number</label>
                  <input type="number" min="0" name="rphone" id="rphone" class="form-control" value="<?php echo $phone; ?>" required>
                </div>
                <div class="input-group input-group-outline my-3 is-filled">
                  <label class="form-label">Company Name</label>
                  <input type="text" name="companyname" id="comapanyname" class="form-control" value="<?php echo $company_name; ?>" required>
                </div>
                <div class="input-group input-group-outline my-0 is-filled">
                        <select class="form-select" style="color:#7b809a;" aria-label="form-select" id="companytype" name="companytype">
                        <option disabled="">&nbsp;&nbsp;Company Type*</option>
                        <?php 
                    if($company_type == "Automobile")
                    echo '<option value="Automobile" selected>&nbsp;&nbsp;Automobile</option>';
                    else echo '<option value="Automobile">&nbsp;&nbsp;Automobile</option>';
                    if($company_type == "Accounting")
                      echo '<option value="Accounting" selected>&nbsp;&nbsp;Accounting</option>';
                      else echo '<option value="Accounting" >&nbsp;&nbsp;Accounting</option>';
                    if($company_type == "Ads")
                      echo '<option value="Ads" selected>&nbsp;&nbsp;Ads</option>';
                      else echo '<option value="Ads" >&nbsp;&nbsp;Ads</option>';
                    if($company_type == "Health")
                      echo '<option value="Health" selected>&nbsp;&nbsp;Health</option>';
                      else echo '<option value="Health" >&nbsp;&nbsp;Health</option>';
                    if($company_type == "Marketing")
                      echo '<option value="Marketing" selected>&nbsp;&nbsp;Marketing</option>';
                      else echo '<option value="Marketing" >&nbsp;&nbsp;Marketing</option>';
                    if($company_type == "Management")
                      echo '<option value="Management" selected>&nbsp;&nbsp;Management</option>';
                      else echo '<option value="Management" >&nbsp;&nbsp;Management</option>';
                    if($company_type == "Sales")
                      echo '<option value="Sales" selected>&nbsp;&nbsp;Sales</option>';
                      else echo '<option value="Sales" >&nbsp;&nbsp;Sales</option>';
                    if($company_type == "Tech")
                      echo '<option value="Tech" selected>&nbsp;&nbsp;Tech</option>';
                      else echo '<option value="Tech" >&nbsp;&nbsp;Tech</option>';
                    if($company_type == "Other")
                      echo '<option value="Other" selected>&nbsp;&nbsp;Other</option>';
                      else echo '<option value="Other" >&nbsp;&nbsp;Other</option>';  
                   ?>
                        </select>
                      </div>
                <div class="input-group input-group-outline my-3 is-filled">
                  <label class="form-label">Company URL</label>
                  <input type="text" name="companyurl" id="comapanyurl" class="form-control" value="<?php echo $company_url; ?>" required>
                </div>
                <div class="input-group input-group-outline my-3">
                <textarea class="form-control" form="update-recruiter-form" name="companydescription" id="companydescription" placeholder="Enter company details" required><?php echo $company_description; ?></textarea>
                </div>
                <input type="hidden" id="rimage_url" name="rimage_url" value="<?php echo $image_url; ?>"> 
                <div class="text-center">
                  <button type="submit" class="btn w-auto my-4 mb-2 text-white" style="background-color: rgb(109, 3, 109);" form="update-recruiter-form">Update</button>
                </div>
            </form>
        </div>
      </div>
    </div>
    </div>
    </div>
</div>
<script>
  const input_fields = {
  plaintext: /^[a-zA-Z0-9,.-\s]*$/,
  email: /^([a-z\d\.-]+)@([a-z\d-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/,
  password: /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,}$/,
  phone:/^[0-9]+$/,
  url:/(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})/,
  location:/^[a-zA-Z0-9,\s]*$/
}

  function validrec(){
    let flag = 0;
  if(!(input_fields.plaintext.test(document.forms["update-recruiter-form"]["rname"].value))){
    flag = 1;
  }
  if(!(input_fields.phone.test(document.forms["update-recruiter-form"]["rphone"].value))||((document.forms["update-recruiter-form"]["rphone"].value.length<10)||(document.forms["update-recruiter-form"]["rphone"].value.length>13))){
    flag = 1;
  }
  if(!(input_fields.plaintext.test(document.forms["update-recruiter-form"]["companyname"].value))){
    flag = 1;
  }
  if(!(input_fields.plaintext.test(document.forms["update-recruiter-form"]["companytype"].value))){
    flag = 1;
  }
  if(!(input_fields.url.test(document.forms["update-recruiter-form"]["companyurl"].value))){
    flag = 1;
  }
  if(!(input_fields.plaintext.test(document.forms["update-recruiter-form"]["companydescription"].value))){
    flag = 1;
  }
  if((document.forms["update-recruiter-form"]["rimage_url"].value == "")||(document.forms["update-recruiter-form"]["rimage_url"].value == null)){
    flag = 1;
  }
  if(flag == 1){
    document.getElementById('form_failed').style= "margin-top:-20px;";
    return false;
  }else return true;
  }
$("#file-input1").change(function(){
  var fd = new FormData();
  var files = $('#file-input1')[0].files;
  var inputFile = $('input[name=file]');
  if(files.length > 0 ){
       fd.append('file',files[0]);
       fd.append('filename',inputFile);
       $.ajax({
          url: '<?php echo base_url().'LoginSystem/image_upload' ?>',
          type: 'post',
          data: fd,
          contentType: false,
          processData: false,
          success: function(response){
             if(response != null){
              const resobj = JSON.parse(JSON.stringify(response));
              document.getElementById('image_file1').src = "<?php echo base_url(); ?>uploads/images/" + response;
              document.getElementById('rimage_url').value = "<?php echo base_url(); ?>uploads/images/" + response;
             }
            }
            });
          }
});
</script>
<?php
?>