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
            Registeration Successful! Redirecting to login page.
          </div>
        </div>
        <div class="alert alert-danger d-flex align-items-center" role="alert" id="form_failed" style="margin-top:-20px;display:none!important">
          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
          <div>
            One or more fields are empty or incorrect. Please try again.
          </div>
        </div>
      <script>//setInterval(function(){document.getElementById("form_success").style="margin-top:-20px;display:none!important";},5000);
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
                <h4 class="text-white font-weight-bolder text-center mt-2 mb-2">Sign Up</h4>
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
              <style>
                .image-upload>input {
                  display: none;
                }
                .tooltip-inner {
                  max-width: 100% !important;
                }
.autocomplete-input {
 padding:0 31px 0 7px;
 width:calc(100%);
 border: 1px solid #d2d6da;
border-radius: 0.375rem;
border-top-left-radius: 0.375rem;
border-bottom-left-radius: 0.375rem;
border-top-left-radius: 0.375rem !important;
border-bottom-left-radius: 0.375rem !important;
padding: 0.625rem 0.75rem !important;
line-height: 1.3 !important;
font-size: 0.875rem;
font-weight: 400;
color: #495057;
}
.autocomplete-items {
 position:relative;
 border:1px solid rgba(0,0,0,.3);
 border-top:none;
 background-color:#fff;
 z-index:99;
 top:100%;
 left:0;
 right:0;
}
.autocomplete-items div {
 padding:10px;
 cursor:pointer
}
.autocomplete-items div:hover,
.autocomplete-items .active {
 background-color:#0000001a
}
.autocomplete-item {
 display:flex;
 flex-direction:row;
 align-items:center
}
.autocomplete-item .icon {
 display:inline-block;
 width:40px;
 height:24px;
 color:#aaa
}
.autocomplete-item .icon.emoji {
 color:inherit;
 font-size:20px;
 opacity:.9
}
.close-button {
 right: 20px;
 top: 396px;
 display:none;
 align-items:center
}
.close-button.visible {
 display:flex
}
.close-button {
 color:#0006;
 cursor:pointer;
 position:absolute;
}
.close-button:hover {
 color:#0009
}
.autocomplete-items .secondary-part {
 margin-left:10px;
 font-size:small;
 color:#0009
}
              </style>
          <div class="tab-content" id="ex1-content">
            <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel" aria-labelledby="ex1-tab-1">
              <?php echo form_open('LoginSystem/recruiterform', 'class="text-start" id="recruiter-main-form" name="recruiter-main-form" onsubmit="return validrec()"'); ?>
              <label class="form-label" style="color:#7b809a;">Profile Image*</label>
                <div class="image-upload" style="display: flex;justify-content: center;">
                  <label for="file-input1">
                    <img id="image_file1" src="<?php echo base_url(); ?>assets/img/avatar.png" style="max-height: 100px;">
                  </label>
                  <input id="file-input1" type="file" accept="image/jpeg, image/png"/>
                </div>
                <div class="input-group input-group-outline my-3">
                  <label class="form-label">Name*</label>
                  <input type="text" name="rname" id="rname" class="form-control" value="" required>
                </div>
                <div class="input-group input-group-outline my-3">
                  <label class="form-label">Email*</label>
                  <input type="email" name="remail" id="remail" class="form-control" value="" required>
                </div>        
                <div class="input-group input-group-outline mb-3">
                  <label class="form-label">Password*</label>
                  <input type="password" name="rpassword" id="rpassword" class="form-control" value="" required>
                </div>
                <div class="input-group input-group-outline my-3">
                  <label class="form-label">Phone Number*</label>
                  <input type="number" min="0" name="rphone" id="rphone" class="form-control" value="" required>
                </div>
                <div class="input-group input-group-outline my-3">
                  <label class="form-label">Company Name*</label>
                  <input type="text" name="companyname" id="comapanyname" class="form-control" value="" required>
                </div>
                  <div class="input-group input-group-outline my-0">
                        <select class="form-select" style="color:#7b809a;" aria-label="form-select" id="companytype" name="companytype">
                        <option disabled="" selected>&nbsp;&nbsp;Company Type*</option>
                        <option value="Automobile">&nbsp;&nbsp;Automobile</option>
                        <option value="Accounting">&nbsp;&nbsp;Accounting</option>
                        <option value="Ads">&nbsp;&nbsp;Ads</option>
                        <option value="Health">&nbsp;&nbsp;Health</option>
                        <option value="Marketing">&nbsp;&nbsp;Marketing</option>
                        <option value="Management">&nbsp;&nbsp;Management</option>
                        <option value="Sales">&nbsp;&nbsp;Sales</option>
                        <option value="Tech">&nbsp;&nbsp;Tech</option>
                        <option value="Other">&nbsp;&nbsp;Other</option>
                        </select>
                      </div>
                <div class="input-group input-group-outline my-3">
                  <label class="form-label">Company URL*</label>
                  <input type="text" name="companyurl" id="comapanyurl" class="form-control" value="" required>
                </div>
                <div class="input-group input-group-outline my-3">
                <textarea class="form-control" form="recruiter-main-form" name="companydescription" id="companydescription" placeholder="Enter company details*" required></textarea>
                </div>
                <input type="hidden" id="rimage_url" name="rimage_url" value=""> 
                <div class="text-center">
                  <button type="submit" class="btn w-auto my-4 mb-2 text-white" style="background-color: rgb(109, 3, 109);" form="recruiter-main-form">Sign Up</button>
                </div>
                <p class="mt-4 text-sm text-center">
                 <a href="<?php echo base_url(); ?>login" class="">Already have an account? Sign In</a> 
                </p>
            </form>
            </div>
            <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
            <?php echo form_open('LoginSystem/employeeform', 'class="text-start" id="employee-main-form" name="employee-main-form" onsubmit="return validemp()"'); ?>
            <div class="container">
            <div class="row">
              <div class="col-sm-5 col-md-6">
                <form id="resume_upload" method="post" action="" enctype="multipart/form-data">
                <label class="form-label" style="color:#7b809a;">Upload Resume*&nbsp;<small data-bs-toggle="tooltip" data-bs-placement="right" title="Upload resume first, We will auto fill some data using your resume."><i class="fas fa-question-circle"></i></small></label>
                <div class="dropify-wrapper"><div class="dropify-message">
                    <span class="file-icon"></span> 
                    <p id="resume_msg">Drag & drop or click to upload resume</p>
                    <p class="dropify-error">Ooops, something wrong appended.</p>
                    </div>
                    <div class="dropify-loader"></div><div class="dropify-errors-container">
                    <ul></ul>
                    </div>
                    <input type="file" id="resume_file" class="dropify" accept="application/pdf">
                    <button type="button" class="dropify-clear">Remove</button><div class="dropify-preview">
                    <span class="dropify-render"></span><div class="dropify-infos">
                    <div class="dropify-infos-inner"><p class="dropify-filename">
                      <span class="file-icon"></span> <span class="dropify-filename-inner"></span>
                    </p><p class="dropify-infos-message">Drag and drop or click to replace</p>
                  </div></div></div></div>
                  </form><br/>
                  <div id="elename" class="input-group input-group-outline my-3">
                    <label class="form-label">Name*</label>
                    <input type="text" name="name" id="name" class="form-control" value="" required>
                  </div>
                  <div id="elephone" class="input-group input-group-outline my-3">
                    <label class="form-label">Phone Number*</label>
                    <input type="number" min="0" name="phone" id="phone" class="form-control" value="" required>
                  </div>
                  <div id="elerole" class="input-group input-group-outline my-3">
                    <label class="form-label">Role*</label>
                    <input type="text" name="role" id="role" class="form-control" value="" required>
                  </div>
                  <div class="input-group input-group-outline my-0">
                  <select class="form-select" onchange="load_morefields(this.value)" style="color:#7b809a;" aria-label="form-select" id="employee_status" name="employee_status">
                  <option disabled="" selected>&nbsp;&nbsp;Are you currently employed?</option>
                  <option value="1">&nbsp;&nbsp;Yes, I'm Employed.</option>
                  <option value="2">&nbsp;&nbsp;No, I'm not Employed.</option>
                  </select>
                  </div>
                  <div id="morefieids" class="row" style="visibility:hidden;">
                  <div id="elecompany" class="input-group input-group-outline my-3">
                        <label class="form-label">Current Company</label>
                        <input type="text" name="company" id="company" class="form-control" value="">
                      </div>
                    <div class="col-sm-5 col-md-6">
                      <div id="elecurrentrole" class="input-group input-group-outline my-0">
                        <label class="form-label">Current Role</label>
                        <input type="text" name="currentrole" id="currentrole" class="form-control" value="">
                      </div>
                    </div>
                    <div class="col-sm-5 col-md-6">
                      <div class="input-group input-group-outline my-0">
                        <select class="form-select" style="color:#7b809a;" aria-label="form-select" id="current_company_type" name="current_company_type">
                        <option disabled="" selected>&nbsp;&nbsp;Current Company Type</option>
                        <option value="Automobile">&nbsp;&nbsp;Automobile</option>
                        <option value="Accounting">&nbsp;&nbsp;Accounting</option>
                        <option value="Ads">&nbsp;&nbsp;Ads</option>
                        <option value="Health">&nbsp;&nbsp;Health</option>
                        <option value="Marketing">&nbsp;&nbsp;Marketing</option>
                        <option value="Management">&nbsp;&nbsp;Management</option>
                        <option value="Sales">&nbsp;&nbsp;Sales</option>
                        <option value="Tech">&nbsp;&nbsp;Tech</option>
                        <option value="Other">&nbsp;&nbsp;Other</option>
                        </select>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0">
              <label class="form-label" style="color:#7b809a;">Profile Image*</label>
              <div class="image-upload" style="display: flex;justify-content: center;margin-top:67px;margin-bottom:67px">
                <label for="file-input2">
                  <img id="image_file2" src="<?php echo base_url(); ?>assets/img/avatar.png" style="max-height: 100px;">
                </label>
                <input id="file-input2" type="file" accept="image/jpeg, image/png"/>
              </div>
              <div id="eleemail" class="input-group input-group-outline my-3">
                  <label class="form-label">Email*</label>
                  <input type="email" name="email" id="email" class="form-control" value="" required>
                </div>        
                <div class="input-group input-group-outline mb-3">
                  <label class="form-label">Password*</label>
                  <input type="password" name="password" id="password" class="form-control" value="" required>
                </div>
                <div id="elelocation">
                  <input class="autocomplete-input" type="text" name="location" onChange="Suggest_API()" id="location" class="form-control" placeholder="Location*" value="" required><div class="close-button" id="close_button" onclick="button_close()"><svg viewBox="0 0 24 24" height="24"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" fill="currentColor"></path></svg></div>
                  <div id="location_show">
                    </div>
                </div>
                <div id="eleexperience" class="input-group input-group-outline my-3">
                  <label class="form-label">Experience*</label>
                  <input type="number" min="0" max="50" name="experience"  id="experience" class="form-control" value="" required>
                </div>
                <div id="elelinkedin" class="input-group input-group-outline my-3">
                  <label class="form-label">LinkedIn Profile URL</label>
                  <input type="text" name="linkedin"  id="linkedin" class="form-control" value="">
                </div>
                <input type="hidden" id="image_url" name="image_url" value=""> 
                <input type="hidden" id="resume_url" name="resume_url" value=""> 
                </form>
            </div>
            <div class="text-center">
                  <button type="submit" form="employee-main-form" class="btn w-auto my-4 mb-2 text-white" style="background-color: rgb(109, 3, 109);">Sign Up</button>
                </div>
                <p class="mt-4 text-sm text-center">
                  <a href="<?php echo base_url(); ?>login" class="">Already have an account? Sign In</a> 
                </p>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
</div>
<script>
function Suggest_API(){
    let text = document.getElementById('location').value;
    if(text.length > 3){
    let render_suggestions = '';
    var url = "https://api.geoapify.com/v1/geocode/autocomplete?text="+text+"&lang=en&limit=5&type=city&format=json&apiKey=8bc007ddbed4415a86ced6c589163b9a";
    var xhr = new XMLHttpRequest();
    xhr.open("GET", url);
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4) {
        let parseJSON = JSON.parse(xhr.responseText);
        let i = 0;
        if(parseJSON.results.length > 0){
          render_suggestions = `<div class="autocomplete-items" id="suggestions" style="display:block">`;
          for(i=0;i<parseJSON.results.length;i++){
            render_suggestions += `<div class='autocomplete-item' onclick='updateLocation("`+parseJSON.results[i].formatted+`")'>
          `+parseJSON.results[i].formatted+`</div>`;
          }
          render_suggestions += `</div>`;
          document.getElementById('location_show').innerHTML = render_suggestions;
          document.getElementById('close_button').className = "close-button visible";
        }
      }};
    xhr.send();
    }
}
function updateLocation(loc){
  document.getElementById("location").setAttribute("value", loc);
  document.getElementById("location").value = loc;
  document.getElementById("suggestions").style = "display:none";
  document.getElementById('close_button').className = "close-button";
}
function button_close(){
  document.getElementById('location_show').innerHTML = "";
  document.getElementById('close_button').className = "close-button";
}
  const input_fields = {
  plaintext: /^[a-zA-Z0-9,.-\s]*$/,
  email: /^([a-z\d\.-]+)@([a-z\d-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/,
  password: /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,}$/,
  phone:/^[0-9]+$/,
  url:/(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})/,
  location:/^[a-zA-Z0-9,\s]*$/
}

  function validemp(){
    let flag = 0;
  if(!(input_fields.plaintext.test(document.forms["employee-main-form"]["name"].value))){
    flag = 1;
  }
  if(!(input_fields.email.test(document.forms["employee-main-form"]["email"].value))){
    flag = 1;
  }
  if(!(input_fields.password.test(document.forms["employee-main-form"]["password"].value))){
    flag = 1;
  }
  if(!(input_fields.phone.test(document.forms["employee-main-form"]["phone"].value))||((document.forms["employee-main-form"]["phone"].value.length<10)||(document.forms["employee-main-form"]["phone"].value.length>13))){
    flag = 1;
  }
  if(!(input_fields.plaintext.test(document.forms["employee-main-form"]["role"].value))){
    flag = 1;
  }
if(document.forms["employee-main-form"]["employee_status"].value == 1){
  if(!(input_fields.plaintext.test(document.forms["employee-main-form"]["current_company_type"].value))){
    flag = 1;
  }
  if(!(input_fields.plaintext.test(document.forms["employee-main-form"]["currentrole"].value))){
    flag = 1;
  }
  if(!(input_fields.plaintext.test(document.forms["employee-main-form"]["company"].value))){
    flag = 1;
  }
}
  if(!(input_fields.location.test(document.forms["employee-main-form"]["location"].value))){
    flag = 1;
  }
  if(!(input_fields.phone.test(document.forms["employee-main-form"]["experience"].value))){
    flag = 1;
  }
  if(document.forms["employee-main-form"]["linkedin"].value != ""){
  if(!(input_fields.url.test(document.forms["employee-main-form"]["linkedin"].value))){
    flag = 1;
  }
}
  if(document.forms["employee-main-form"]["image_url"].value == ""){
    flag = 1;
  }
  if(document.forms["employee-main-form"]["resume_url"].value == ""){
    flag = 1;
  }
  if(flag == 1){
    document.getElementById('form_failed').style = "margin-top:-20px;";
    return false;
  }else return true;
  }
  function validrec(){
    let flag = 0;
  if(!(input_fields.plaintext.test(document.forms["recruiter-main-form"]["rname"].value))){
    flag = 1;
  }
  if(!(input_fields.email.test(document.forms["recruiter-main-form"]["remail"].value))){
    flag = 1;
  }
  if(!(input_fields.phone.test(document.forms["recruiter-main-form"]["rphone"].value))||((document.forms["recruiter-main-form"]["rphone"].value.length<10)||(document.forms["recruiter-main-form"]["rphone"].value.length>13))){
    flag = 1;
  }
  if(!(input_fields.password.test(document.forms["recruiter-main-form"]["rpassword"].value))){
    flag = 1;
  }
  if(!(input_fields.plaintext.test(document.forms["recruiter-main-form"]["companyname"].value))){
    flag = 1;
  }
  if(!(input_fields.plaintext.test(document.forms["recruiter-main-form"]["companytype"].value))){
    flag = 1;
  }
  if(!(input_fields.url.test(document.forms["recruiter-main-form"]["companyurl"].value))){
    flag = 1;
  }
  if(!(input_fields.plaintext.test(document.forms["recruiter-main-form"]["companydescription"].value))){
    flag = 1;
  }
  if((document.forms["recruiter-main-form"]["rimage_url"].value == "")||(document.forms["recruiter-main-form"]["rimage_url"].value == null)){
    flag = 1;
  }
  if(flag == 1){
    document.getElementById('form_failed').style= "margin-top:-20px;";
    return false;
  }else return true;
  }

  if(document.getElementById("employee_status").value == 1)
      document.getElementById("morefieids").style.visibility="visible";
  else document.getElementById("morefieids").style.visibility="hidden";
  function load_morefields(check){
      if(check == 1){
        document.getElementById("morefieids").style.visibility="visible";
      }
      else{
        document.getElementById("morefieids").style.visibility="hidden";
      }
  }

$(document).ready(function(){
$("#resume_file").change(function(){
    document.getElementById('resume_msg').innerHTML = "Resume Uploaded! Drag & drop or click to upload again";
    var fd = new FormData();
    var files = $('#resume_file')[0].files;
    var inputFile = $('input[name=file]');
    if(files.length > 0 ){
       fd.append('file',files[0]);
       fd.append('filename',inputFile);
       $.ajax({
          url: '<?php echo base_url().'LoginSystem/resume_upload' ?>',
          type: 'post',
          data: fd,
          contentType: false,
          processData: false,
          success: function(response){
             if(response != null){
              const resobj = JSON.parse(JSON.stringify(response));
              document.getElementById('resume_url').value = response.url;
              if(resobj.name !== undefined){
              document.getElementById("elename").className="input-group input-group-outline my-3 is-filled";
              document.getElementById("name").setAttribute("value", resobj.name);
              document.getElementById("name").value = resobj.name;
              }
              if(resobj.email !== undefined){
              document.getElementById("eleemail").className="input-group input-group-outline my-3 is-filled";
              document.getElementById("email").setAttribute("value", resobj.email);
              document.getElementById("email").value = resobj.email;
              }
              if(resobj.phone !== undefined){
              document.getElementById("elephone").className="input-group input-group-outline my-3 is-filled";
              document.getElementById("phone").setAttribute("value", resobj.phone);
              document.getElementById("phone").value = resobj.phone;
              }
              if(resobj.jobtitle !== undefined){
              document.getElementById("elerole").className="input-group input-group-outline my-3 is-filled";
              document.getElementById("elecurrentrole").className="input-group input-group-outline my-0 is-filled";
              document.getElementById("role").setAttribute("value", resobj.jobtitle);
              document.getElementById("role").value = resobj.jobtitle;
              document.getElementById("currentrole").setAttribute("value", resobj.jobtitle);
              document.getElementById("currentrole").value = resobj.jobtitle;
              }
              if(resobj.location !== undefined){ 
              document.getElementById("location").setAttribute("value", resobj.location);
              document.getElementById("location").value = resobj.location;
              }
              if(resobj.experience !== undefined){
              document.getElementById("eleexperience").className="input-group input-group-outline my-3 is-filled";
              document.getElementById("experience").setAttribute("value", resobj.experience);
              document.getElementById("experience").value = resobj.experience;
              }
              if(resobj.linkedin !== undefined){
              document.getElementById("elelinkedin").className="input-group input-group-outline my-3 is-filled";
              document.getElementById("linkedin").setAttribute("value", resobj.linkedin);
              document.getElementById("linkedin").value = resobj.linkedin;
              }
              if(resobj.company !== undefined){
              document.getElementById("elecompany").className="input-group input-group-outline my-0 is-filled";
              document.getElementById("company").setAttribute("value", resobj.company);
              document.getElementById("company").value = resobj.company;
              }
             }
          },
       });
    }
});
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
$("#file-input2").change(function(){
  var fd = new FormData();
  var files = $('#file-input2')[0].files;
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
              document.getElementById('image_file2').src = "<?php echo base_url(); ?>uploads/images/" + response;
              document.getElementById('image_url').value = "<?php echo base_url(); ?>uploads/images/" + response;
             }
            }
            });
          }
});
});
</script>