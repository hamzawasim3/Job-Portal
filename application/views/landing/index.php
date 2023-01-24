<style>
@keyframes floating
{
    0%
    {
        transform: translateY(0px);
    }
    50%
    {
        transform: translateY(10px);
    }
    100%
    {
        transform: translateY(0px);
    }
}
.floating
{
    animation: floating 3s ease infinite;

    will-change: transform;
}
.floating:hover
{
    animation-play-state: paused;
}
.img-fluid
{
    max-width: 75%;
    height: auto;
}
  </style>
<header class="header-2">
  <div class="page-header min-vh-75 relative" style="background-image: url('<?php echo base_url(); ?>/assets/img/bg2.jpg')">
    <span class="mask bg-gradient-primary opacity-4"></span>
    <div class="container">
      <div class="row">
        <div class="col-lg-7 text-center mx-auto">
          <h1 class="text-white pt-3 mt-n5">Job Portal</h1>
          <p id="head_text" class="lead text-white mt-3">Hire top talents in the industry.</p>
        </div>
      </div>
    </div>
  </div>
</header>
<script>
  function timeToggle(){
    
    window.setInterval(function () {if(document.getElementById("head_text").innerHTML == "Hire top talents in the industry."){
      $("#head_text").fadeOut();
      document.getElementById("head_text").innerHTML = "Apply to best in industry jobs in all fields.";
      $("#head_text").fadeIn();
        }
    else if(document.getElementById("head_text").innerHTML == "Apply to best in industry jobs in all fields."){
      $("#head_text").fadeOut();
      document.getElementById("head_text").innerHTML = "Hire top talents in the industry.";
      $("#head_text").fadeIn();
    }},4000);
  }
  window.onload = timeToggle();
</script>
<div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n6">
<section class="my-5 py-5">
<?php if($user_type == "emp"){ ?>
  <div class="container">
    <div class="row">
      <div class="row justify-content-center text-center my-sm-5">
        <div class="col-lg-6">
          <h2 class="text-dark mb-0">Current Openings</h2>
        </div>
      </div>
    </div>
  </div>
<div style="display: flex;justify-content: center;">
  <div class="card" style="width: 80%;">
    <div class="table-responsive">
    <table class="table align-items-center mb-0" style="border-color:transparent;" id="index_table2">
        <thead>
          <tr style="border-color:#f0f2f5">
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10 ps-2">Company</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">Job Title</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">Job Type</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">Location</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">Action</th>
          </tr>
        </thead>
        <tbody>
        <?php
        for($i=0;$i<count($company);$i++) { ?>
        <tr style="border-color:#f0f2f5">
          <td class="text-center text-sm">
            <p class="text-xs font-weight-bold mb-0"><?php echo $company[$i][0]->company_name; ?></p>
          </td>
          <td class="text-center text-sm">
              <p class="text-xs font-weight-bold mb-0"><?php echo $jobs[$i]->job_title; ?></p>
          </td>
            <td class="text-center text-sm">
              <p class="text-xs font-weight-bold mb-0"><?php echo $jobs[$i]->job_type; ?></p>
          </td>
            <td class="text-center text-sm">
              <p class="text-xs font-weight-bold mb-0"><?php echo $jobs[$i]->location; ?></p>
          </td>
            <td class="text-center align-middle">
              <a href="<?php echo base_url('candidate/view_job/'.$jobs[$i]->job_id.''); ?>">
                <button class="btn bg-gradient-warning mb-0" type="button">View</button> 
              </a>
          </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
  <?php }else{ ?>
    <div class="container">
    <div class="row">
      <div class="row justify-content-center text-center my-sm-5">
        <div class="col-lg-6">
          <h2 class="text-dark mb-0">Our Partners</h2>
        </div>
      </div>
    </div>
  </div>
<div style="display: flex;justify-content: center;">
  <div class="card" style="width: 80%;">
    <div class="table-responsive">
    <table class="table align-items-center mb-0" style="border-color:transparent" id="index_table1">
        <thead>
          <tr style="border-color:#f0f2f5">
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10 ps-2">Company</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">Company Type</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">Website</th>
          </tr>
        </thead>
        <tbody>
        <?php 
        foreach ($companies as $row) { ?>
      <tr style="border-color:#f0f2f5">
        <td class="text-center text-sm">
            <p class="text-xs font-weight-bold mb-0"><?php echo $row->company_name; ?></p>
          </td>
          <td class="text-center text-sm">
            <p class="text-xs font-weight-bold mb-0"><?php echo $row->company_type; ?></p>
          </td>
          <td class="text-center align-middle">
              <a href="<?php echo $row->company_url; ?>">
                <button class="btn bg-gradient-warning mb-0" type="button">Visit</button> 
              </a>
            </td>
        </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
  <?php } ?> 
</section>
<div class="container">
      <div class="row justify-content-center my-sm-5">
      <h2 class="text-dark text-center mb-0">Features</h2>
        <div class="col-lg-6">
        <ul style="margin-top:20%;font-size:16pt">
          <li>Auto fill registration with resume</li>
          <li>Get preferred jobs in seconds</li>
          <li>Get most preferred applicant for your job post in seconds</li>
          <li>Free to use</li>
        </ul>
        </div>
        <div class="col-lg-6"><center>
        <img src="<?php echo base_url(); ?>assets/img/hiring.svg" class="img-fluid floating" style="align:center;"></center>      
        </div>
      </div>
  </div>
<section class="my-5 py-5">
  <div class="container">
    <div class="row">
      <div class="row justify-content-center text-center my-sm-5">
        <div class="col-lg-6">
          <h2 class="text-dark mb-0">Why Job Portal</h2>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
    <div class="col-lg-9 mx-auto py-3">
    <div class="row">
    <div class="col-md-4 position-relative">
    <div class="p-3 text-center">
    <h1 class="text-gradient text-primary"><span id="state1" countTo="<?php echo $candidate_registered[0]->candidate_count; ?>"></span>+</h1>
    <h5 class="mt-3">Talents Registered</h5>
    </div>
    <hr class="vertical dark">
    </div>
    <div class="col-md-4 position-relative">
    <div class="p-3 text-center">
    <h1 class="text-gradient text-primary"> <span id="state2" countTo="<?php echo $no_of_jobs[0]->job_count; ?>"></span>+</h1>
    <h5 class="mt-3">Jobs Added</h5>
    </div>
    <hr class="vertical dark">
    </div>
    <div class="col-md-4">
    <div class="p-3 text-center">
    <h1 class="text-gradient text-primary"> <span id="state3" countTo="<?php echo $recruiter_registered[0]->recruiter_count; ?>"></span>+</h1>
    <h5 class="mt-3">Companies Registered</h5>
    </div>
    </div>
    </div>
    </div>
    </div>
    <div>
    </div>
  </div>  
</section>
<script src="<?php echo base_url(); ?>assets/js/plugins/countup.min.js"></script>
<script type="text/javascript">
    $(document).ready( function () {
      $('#index_table1').DataTable({paging: false,searching:false,info: false,"order": [],
      columns: [null,null,{ orderable: false }]});
    });
    $(document).ready( function () {
      $('#index_table2').DataTable({paging: false,searching:false,info: false,"order": [],
      columns: [null,null,null,null,{ orderable: false }]});
    });
  if (document.getElementById('state1')) {
    const countUp = new CountUp('state1', document.getElementById("state1").getAttribute("countTo"));
    if (!countUp.error) {
      countUp.start();
    } else {
      console.error(countUp.error);
    }
  }
  if (document.getElementById('state2')) {
    const countUp1 = new CountUp('state2', document.getElementById("state2").getAttribute("countTo"));
    if (!countUp1.error) {
      countUp1.start();
    } else {
      console.error(countUp1.error);
    }
  }
  if (document.getElementById('state3')) {
    const countUp2 = new CountUp('state3', document.getElementById("state3").getAttribute("countTo"));
    if (!countUp2.error) {
      countUp2.start();
    } else {
      console.error(countUp2.error);
    };
  }
</script>

