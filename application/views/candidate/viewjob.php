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
            Job Applied Successfully!
          </div>
        </div>
        <div class="alert alert-danger d-flex align-items-center" role="alert" id="form_failed" style="margin-top:-20px;display:none!important">
          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
          <div>
            Job Already Applied!
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
                <h4 class="text-white font-weight-bolder text-center mt-2 mb-2">Job Description</h4>
              </div>
            </div>
            <div class="card-body">
            <div class="row align-items-start">
            <div class="col">
                <p class="mt-2 mb-2">Job Posted On <?php echo date('d-m-Y h:i:s');?></p>
                <h4 class="mt-2 mb-2">Job Title</h4>
                <h5 style="font-weight:400;" class="mt-2 mb-2"><?php echo $job_title;?></h5>
                <h4 class="mt-2 mb-2">Job Description</h4>
                <?php echo $job_description;?>
                <h4 class="mt-2 mb-2">Location</h4>
                <h5 style="font-weight:400;" class="mt-2 mb-2"><?php echo $location;?></h5>
                <h4 class="mt-2 mb-2">Skills</h4>
                <?php 
                 $string1 = str_replace('[{"value":"','',$skills); $string2 = str_replace('{"value":"','',$string1);
                    $string3 = str_replace('"}','',$string2); $final_str = str_replace(']','',$string3); $tags = explode(",",$final_str); 
                foreach($tags as $tag){
                    echo '<span class="tag is-rounded">'.$tag.'</span>&nbsp;';
                }
                ?>
                <h4 class="mt-2 mb-2">Job Type</h4>
                <h5 style="font-weight:400;" class="mt-2 mb-2"><?php echo $job_type;?></h5>
                <h4 class="mt-2 mb-2">Application Deadline</h4>
                <h5 style="font-weight:400;" class="mt-2 mb-2"><?php echo date('d-m-Y',$app_deadline);?></h5>
            </div>
            <div class="col">
                <h4 class="mt-2 mb-2">Experience</h4>
                <h5 style="font-weight:400;" class="mt-2 mb-2"><?php echo $experience;?></h5>
                <h4 class="mt-2 mb-2">Company Name</h4>
                <h5 style="font-weight:400;" class="mt-2 mb-2"><?php echo $company_name;?></h5>
                <h4 class="mt-2 mb-2">Company Type</h4>
                <h5 style="font-weight:400;" class="mt-2 mb-2"><?php echo $company_type;?></h5>
                <h4 class="mt-2 mb-2">Company Description</h4>
                <h5 style="font-weight:400;" class="mt-2 mb-2"><?php echo $company_description;?></h5><br>
                <a href="<?php echo $company_url; ?>" target="_blank">
                <button class="btn bg-gradient-warning mb-0" type="button">Visit Company Website</button> 
              </a>
            </div>
        </div>
        <br><center>
        <?php if($applied == 0){ ?>
            <a href="<?php echo base_url('candidate/apply/'.$job_id.'') ?>"><center>
                <button class="btn bg-gradient-warning mb-0" type="button">Apply</button> </center>
              </a>
              <?php }elseif($applied == 1){ ?>
              <a href="<?php echo base_url('candidate/disapply/'.$job_id.''); ?>">
                <button class="btn bg-gradient-warning mb-0" type="button">Disapply</button> 
              </a>
              <?php } ?>
             </center>
        </div>
      </div>
    </div>
    </div>
    </div>
</div>