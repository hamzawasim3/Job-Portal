<style>
    .tag:not(body).is-rounded {
    border-radius:290486px
    }
    .tag:not(body) {
    align-items:center;
    background-color:#ecf0f1;
    border-radius:0;
    color:#4a4a4a;
    display:inline-flex;
    font-size:1rem;
    height:2rem;
    justify-content:center;
    line-height:1.5;
    padding-left:1em;
    padding-right:1em;
    white-space:nowrap
    }
    .tags {
    align-items:center;
    display:flex;
    flex-wrap:wrap;
    justify-content:flex-start
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
            Application Rejected Successfully!
          </div>
        </div>
        <div class="alert alert-danger d-flex align-items-center" role="alert" id="form_failed" style="margin-top:-20px;display:none!important">
          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
          <div>
          Error during application rejection!
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
                <h4 class="text-white font-weight-bolder text-center mt-2 mb-2">Application</h4>
              </div>
            </div>
            <div class="card-body">
            <div class="row align-items-start">
            <div class="col">
                <h4 class="mt-2 mb-2">Name</h4>
                <h5 style="font-weight:400;" class="mt-2 mb-2"><?php echo $user_data[0]->name; ?></h5>
                <h4 class="mt-2 mb-2">Experience</h4>
                <h5 style="font-weight:400;" class="mt-2 mb-2"><?php echo $user_data[0]->experience; ?></h5>
                <?php if($user_data[0]->linkedin != null){ ?>
                <h4 class="mt-2 mb-2">Linkedin&nbsp;
                <a href="<?php echo $user_data[0]->linkedin; ?>"><svg xmlns="http://www.w3.org/2000/svg" viewBox="80 30 408 612" width="20px" height="20px"><path d="M288 32c-17.7 0-32 14.3-32 32s14.3 32 32 32h50.7L169.4 265.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L384 141.3V192c0 17.7 14.3 32 32 32s32-14.3 32-32V64c0-17.7-14.3-32-32-32H288zM80 64C35.8 64 0 99.8 0 144V400c0 44.2 35.8 80 80 80H336c44.2 0 80-35.8 80-80V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v80c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V144c0-8.8 7.2-16 16-16h80c17.7 0 32-14.3 32-32s-14.3-32-32-32H80z"/></svg></i></a></h4>
                <?php } ?>
                <h4 class="mt-2 mb-2">Applied For </h4>
                <h5 style="font-weight:400;" class="mt-2 mb-2"><?php echo $job_data[0]->job_title; ?></h5>
                <h4 class="mt-2 mb-2">Job Description </h4>
                <?php echo $job_data[0]->job_description; ?>

            </div>
            <div class="col">
                <h4 class="mt-2 mb-2">Location</h4>
                <h5 style="font-weight:400;" class="mt-2 mb-2"><?php echo $user_data[0]->location; ?></h5>
                <h4 class="mt-2 mb-2">Phone</h4>
                <h5 style="font-weight:400;" class="mt-2 mb-2"><?php echo $user_data[0]->phone; ?></h5>
                <h4 class="mt-2 mb-2">Role</h4>
                <h5 style="font-weight:400;" class="mt-2 mb-2"><?php echo $user_data[0]->role; ?></h5>
                <?php if($user_data[0]->company != null){ ?>
                <h4 class="mt-2 mb-2">Current Company</h4>
                <h5 style="font-weight:400;" class="mt-2 mb-2"><?php echo $user_data[0]->company; ?></h5>
                <?php } ?>
                <?php if($user_data[0]->current_role != null){ ?>
                <h4 class="mt-2 mb-2">Current Role</h4>
                <h5 style="font-weight:400;" class="mt-2 mb-2"><?php echo $user_data[0]->current_role; ?></h5>
                <?php } ?>
            </div>
        </div>
        <br>
        <center>
            <a href="<?php echo $user_data[0]->resume_url; ?>" target="_blank">
                    <button class="btn bg-gradient-warning mb-0" type="button">View Resume</button> 
                </a>&nbsp;
            <a href="<?php echo base_url('recruiter/move_application/'.$user_data[0]->user_id.'/'.$job_data[0]->job_id.'') ?>">
                <button class="btn bg-gradient-warning mb-0" type="button">Shortlist</button> 
            </a>&nbsp;
            <a href="<?php echo base_url('recruiter/reject_application/'.$user_data[0]->user_id.'/'.$job_data[0]->job_id.'') ?>">
                <button class="btn bg-gradient-warning mb-0" type="button">Reject Application</button> 
            </a>
            </center>
            <br>
        </div>
      </div>
    </div>
    </div>
    </div>
</div>