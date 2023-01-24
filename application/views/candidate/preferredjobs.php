<section class="my-5 py-5">
  <div class="container">
    <div class="row">
      <div class="row justify-content-center text-center my-sm-5">
        <div class="col-lg-6">
          <h2 class="text-dark mb-0">Jobs Based On Your Profile</h2>
        </div>
      </div>
    </div>
  </div>
<div style="display: flex;justify-content: center;">
  <div class="card" style="width: 80%;">
    <div class="table-responsive">
      <table class="table align-items-center mb-0" style="border-color:transparent;" id="preferred_jobs">
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
        for($i=0;$i<$jobs['suggestion_count'];$i++) {
          ?>
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
<?php if(count($jobs['data'])>$jobs['suggestion_count']){ ?>
<section>
  <div class="container">
    <div class="row">
      <div class="row justify-content-center text-center my-sm-5">
        <div class="col-lg-6">
          <h2 class="text-dark mb-0">More Suggestions</h2>
        </div>
      </div>
    </div>
  </div>
<div style="display: flex;justify-content: center;">
  <div class="card" style="width: 80%;">
    <div class="table-responsive">
      <table class="table align-items-center mb-0" style="border-color:transparent;" id="suggested_jobs">
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
        for($i=$jobs['suggestion_count'];$i<count($jobs['data']);$i++) {
          ?>
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
          <?php }}} ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
  
</section>

<script>
  $(document).ready( function () {
    $('#preferred_jobs').DataTable({paging: false,searching:false,info: false,"order": [],
    columns: [null,null,null,null,{ orderable: false }]});
});
$(document).ready( function () {
    $('#suggested_jobs').DataTable({paging: false,searching:false,info: false,"order": [],
    columns: [null,null,null,null,{ orderable: false }]});
});
</script>