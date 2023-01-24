<style>
  .search{
       position: relative;
       box-shadow: 0 0 40px rgba(51, 51, 51, .1);
         
       }

       .search input{

        height: 60px;
        text-indent: 25px;
        border: 2px solid #d6d4d4;


       }
       search input:focus{

        box-shadow: none;
        border: 2px solid blue;


        }

        .search .fa-search{

        position: absolute;
        top: 20px;
        left: 16px;

        }

        .search button{

        position: absolute;
        top: 5px;
        right: 5px;
        height: 50px;
        width: 110px;

        }
  </style>
<section class="my-5 py-5">
  <div class="container">
  <div class="col">
    <div class="row">
      <div class="row justify-content-center text-center my-sm-5">
        <div class="col-lg-6">
          <h2 class="text-dark mb-0 text-center">Search Jobs</h2>
        </div>
      </div>
    </div>
    <?php echo form_open('Candidate/search_jobs/', 'class="text-start" id="search_job" name="search_job"'); ?>
    <div class="search">
      <i class="fa fa-search" style="margin-left:-8px;"></i>
      <input type="text" class="form-control" placeholder="Enter keywords like full stack developer" name="keyword" id="keyword">
      <button type="submit" class="btn bg-gradient-warning mb-0">Search</button>
    </div>
    <br><br>
    <div class="card z-index-0 fadeIn3 fadeInBottom">
    <div class="card-body">
      <p class="text-dark mb-0 text-center">Job Preferences</p>
      <div class="row">
        <div class="col-lg-4">
        <div class="input-group input-group-outline my-3">
          <label class="form-label">Location</label>
          <input type="text" name="location" id="location" class="form-control" value="" >
        </div>
      </div>
      <div class="col-lg-4">
        <div class="input-group input-group-outline my-3">
          <select class="form-select" style="color:#7b809a;" aria-label="form-select" id="jobtype" name="jobtype">
          <option disabled="" selected>&nbsp;&nbsp;Job Type</option>
          <option value="Part-Time">&nbsp;&nbsp;Part-Time</option>
          <option value="Full-Time">&nbsp;&nbsp;Full-Time</option>
          <option value="Internship">&nbsp;&nbsp;Internship</option>
          </select>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="input-group input-group-outline my-3">
          <select class="form-select" style="color:#7b809a;" aria-label="form-select" id="companytype" name="companytype">
          <option disabled="" selected>&nbsp;&nbsp;Company Type</option>
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
    </div>
      </div>
      </form>
  </div>  
  <br><br>
<div style="display: flex;justify-content: center;">
  <div class="card" style="width: 80%;">
    <div class="table-responsive">
    <?php
        if(!empty($jobs['data'])){
          if($jobs['show_text'] == 1){
            echo '<h5 class="text-center my-3">No jobs were found with such parameters. <br>Here are some more suggested jobs.</h5>';
          }  
        }else{
          echo '<h5 class="text-center my-3">No jobs found with such parameters.</h5>';
        }
         ?>
      <table class="table align-items-center mb-0" id="search_jobs" style="border-color:transparent">
        <thead>
          <tr style="border-color:#f0f2f5">
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10 ps-2">Job Title</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">Location</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">Experience</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">Job Type</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">Action</th>
          </tr>
        </thead>
        <tbody>
        <?php
        if($jobs != null){
        for($i=0;$i<count($jobs['data']);$i++) { ?>
          <tr style="border-color:#f0f2f5">
            <td class="text-center text-sm">
              <p class="text-xs font-weight-bold mb-0"><?php echo $jobs['data'][$i]->job_title; ?></p>
            </td>
            <td class="text-center text-sm">
              <p class="text-xs font-weight-bold mb-0"><?php echo $jobs['data'][$i]->location; ?></p>
            </td>
            <td class="text-center text-sm">
              <p class="text-xs font-weight-bold mb-0"><?php echo $jobs['data'][$i]->experience; ?></p>
            </td>
            <td class="text-center text-sm">
              <p class="text-xs font-weight-bold mb-0"><?php echo $jobs['data'][$i]->job_type; ?></p>
            </td>
            <td class="text-center align-middle">
            <a href="<?php echo base_url('candidate/view_job/'.$jobs['data'][$i]->job_id.''); ?>">
                <button class="btn bg-gradient-warning mb-0" type="button">View</button> 
              </a>
            </td>
          </tr>
          <?php }} ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
  
</section>
<script>
  $(document).ready( function () {
    $('#search_jobs').DataTable({paging: false,searching:false,info: false,"order": [],
    columns: [null,null,null,null,{ orderable: false }]});
});
</script>