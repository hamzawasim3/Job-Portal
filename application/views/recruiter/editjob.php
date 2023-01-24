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
  right: 30px;
top: 218px;
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
            Job Updated Successfully!
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
                <h4 class="text-white font-weight-bolder text-center mt-2 mb-2">Update Job</h4>
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
                .bootstrap-tagsinput .tag {
                    margin-right: 2px;
                    color: blue !important;
                    background-color: #0d6efd;
                    padding: 0.2rem;
                    }
                .input-group-append {
                    cursor: pointer;
                  }       
              </style>
              <?php echo form_open('Recruiter/update_job/'.$job_id.'', 'class="text-start" id="add-job-form" name="add-job-form" onsubmit="return validadd()"'); ?>
                <div class="input-group input-group-outline my-3 is-filled">
                  <label class="form-label">Job Title*</label>
                  <input type="text" name="jobtitle" id="job_title" class="form-control" value="<?php echo $job_title; ?>" required>
                </div>
                <div class="input-group input-group-outline my-3 is-filled">
                  <label class="form-label">Experience*</label>
                  <input type="number" min="0" name="experience" id="experience" class="form-control" value="<?php echo $experience; ?>" required>
                </div>
                <div id="elelocation">
                  <input class="autocomplete-input" type="text" name="location" onChange="Suggest_API()" id="location" class="form-control" placeholder="Location*" value="<?php echo $location; ?>" required><div class="close-button" id="close_button" onclick="button_close()"><svg viewBox="0 0 24 24" height="24"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" fill="currentColor"></path></svg></div>
                  <div id="location_show"></div>
                </div><br>
                <div class="input-group input-group-outline my-0">
                <select class="form-select" style="color:#7b809a;" aria-label="form-select" id="job_type" name="job_type">
                <option disabled="">&nbsp;&nbsp;Job Type*</option>
                  <?php if($job_type == "Part-Time")
                    echo '<option value="Part-Time" selected>&nbsp;&nbsp;Part-Time</option>';
                    else echo '<option value="Part-Time" >&nbsp;&nbsp;Part-Time</option>';
                    if($job_type == "Full-Time")
                      echo '<option value="Full-Time" selected>&nbsp;&nbsp;Full-Time</option>';
                      else echo '<option value="Full-Time" >&nbsp;&nbsp;Full-Time</option>';
                    if($job_type == "Internship")
                      echo '<option value="Internship" selected>&nbsp;&nbsp;Internship</option>';
                      else echo '<option value="Internship" >&nbsp;&nbsp;Internship</option>';
                   ?>
                        </select>
                      </div>
                <div class="col-2">
                  <div class="input-group input-group-outline my-3 date is-filled" id="datepicker">
                  <label class="form-label">Application Deadline*</label>
                  <input type="text" class="form-control" name="app_deadline" value="<?php echo date('d-m-Y',$app_deadline); ?>" required>
                        <span class="input-group-append">
                            <span class="input-group-text">
                                <i class="fa fa-calendar" aria-hidden="true" style="margin-left:-40px"></i>
                            </span>
                        </span>
                    </div></div>
                <?php $string1 = str_replace('[{"value":"','',$skills); $string2 = str_replace('{"value":"','',$string1);
                  $string3 = str_replace('"}','',$string2); $final_str = str_replace(']','',$string3); ?>
                <label class="form-label">Skills*</label>&nbsp; 
                <input type="tags" name="skills" id="skills" value="<?php echo $final_str; ?>" autofocus><br>
                <label class="form-label">Job Description*</label>
                <textarea class="form-control" id="jobdescription" name="jobdescription" form="add-job-form" placeholder="Please specify each and every information regarding the position." rows="6" required><?php
        if(!empty(set_value('job_description'))) {
          echo set_value('job_description');
        }
        else{ 
          echo $job_description; 
        }
        ?></textarea>
                <div class="text-center">
                  <button type="submit" class="btn w-auto my-4 mb-2 text-white" style="background-color: rgb(109, 3, 109);" form="add-job-form">Update</button>
                </div>
            </form>
        </div>
      </div>
    </div>
    </div>
    </div>
</div>
<script src="https://unpkg.com/@yaireo/tagify"></script>
<script src="https://unpkg.com/@yaireo/tagify@3.1.0/dist/tagify.polyfills.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script>
  $(function(){
  $('#datepicker').datepicker();
});
  var CkToolbar = [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo','FontColor'];
  ClassicEditor.create( document.querySelector( '#jobdescription' ), {
    toolbar: CkToolbar,
    link: {
      decorators: {
        addTargetToLinks: {
          mode: 'manual',
          label: 'Open in a new tab',
          attributes: {
            target: '_blank'
          }
        }
      }
    }
  });
  </script>
<script>
var input = document.querySelector('input[type=tags]');
new Tagify(input);
  </script>
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

  function validadd(){
    let flag = 0;
  if(!(input_fields.plaintext.test(document.forms["add-job-form"]["jobtitle"].value))){
    flag = 1;
  }
  if(document.forms["add-job-form"]["app_deadline"].value == ""){
    flag = 1;
  }
  if(!(input_fields.phone.test(document.forms["add-job-form"]["experience"].value))){
    flag = 1;
  }
  if(!(input_fields.location.test(document.forms["add-job-form"]["location"].value))){
    flag = 1;
  }
  if(!(input_fields.plaintext.test(document.forms["add-job-form"]["job_type"].value))){
    flag = 1;
  }
  if(flag == 1){
    document.getElementById('form_failed').style= "margin-top:-20px;";
    return false;
  }else return true;
  }
</script>