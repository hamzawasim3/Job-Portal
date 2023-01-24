<section class="my-5 py-5">
  <div class="container">
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
      <div class="row justify-content-center text-center my-sm-5">
        <div class="col-lg-6">
          <h2 class="text-dark mb-0">Applicants</h2>
        </div>
      </div>
    </div>
  </div>
<div style="display: flex;justify-content: center;">
  <div class="card" style="width: 80%;">
    <div class="table-responsive">
      <table class="table align-items-center mb-0" style="border-color:transperent" id="view_applicants">
        <thead>
          <tr style="border-color:#f0f2f5">
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10 ps-2">Name</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10 ps-2">Role</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">Experience</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">Location</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">Action</th>
            <th class="text-secondary opacity-7"></th>
          </tr>
        </thead>
        <tbody>
        <?php
        if($applicants_data != null){
           for($i=0;$i<count($applicants_data);$i++){
           ?>
        <tr style="border-color:#f0f2f5">
            <td class="text-center text-sm">
              <p class="text-xs font-weight-bold mb-0"><?php echo $applicants_data[$i][0]->name; ?></p>
            </td>
            <td class="text-center text-sm">
              <p class="text-xs font-weight-bold mb-0"><?php echo $applicants_data[$i][0]->role; ?></p>
            </td>
            <td class="text-center text-sm">
              <p class="text-xs font-weight-bold mb-0"><?php echo $applicants_data[$i][0]->experience; ?></p>
            </td>
            <td class="text-center text-sm">
              <p class="text-xs font-weight-bold mb-0"><?php echo $applicants_data[$i][0]->location; ?></p>
            </td>
            <td class="text-center align-middle">
            <a href="<?php echo base_url('recruiter/view_application/'.$applicants_data[$i][0]->user_id.'/'.$job_id.''); ?>">
                <button class="btn bg-gradient-warning mb-0" type="button">View Application</button> 
              </a>
              <a href="<?php echo $applicants_data[$i][0]->resume_url; ?>" target="_blank">
                <button class="btn bg-gradient-warning mb-0" type="button">View Resume</button> 
              </a>
              <a href="<?php echo base_url('recruiter/move_application/'.$applicants_data[$i][0]->user_id.'/'.$job_id.''); ?>">
                <button class="btn bg-gradient-warning mb-0" type="button">Shortlist</button> 
              </a>
              <a href="<?php echo base_url('recruiter/reject_application/'.$applicants_data[$i][0]->user_id.'/'.$job_id.''); ?>">
                <button class="btn bg-gradient-warning mb-0" type="button">Reject Application</button> 
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
    $('#view_applicants').DataTable({paging: false,searching:false,info: false,"order": [],
    columns: [null,null,null,null,{ orderable: false }]});
});
</script>