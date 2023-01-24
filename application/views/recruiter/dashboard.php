<section class="my-5 py-5">
  <div class="container">
    <div class="row">
      <div class="row justify-content-center text-center my-sm-5">
        <div class="col-lg-6">
          <h2 class="text-dark mb-0">Dashboard</h2>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
    <div class="col-lg-9 mx-auto py-3">
    <div class="row">
    <div class="col-md-4 position-relative">
    <div class="card p-3 text-center">
    <h1 class="text-gradient text-primary" id="state1" countTo="<?php echo $jobs_posted[0]->job_post; ?>"></h1>
    <h5 class="mt-3">Job Posted</h5>
    </div>
    </div>
    <div class="col-md-4 position-relative">
    <div class="card p-3 text-center">
    <h1 class="text-gradient text-primary" id="state2" countTo="<?php echo $jobs_categories; ?>"></h1>
    <h5 class="mt-3">Job Categories</h5>
    </div>
    </div>
    <div class="col-md-4">
    <div class="card p-3 text-center">
    <h1 class="text-gradient text-primary" id="state3" countTo="<?php echo $applicants; ?>"></h1>
    <h5 class="mt-3">Candidates Applied</h5>
    </div>
    </div>
    </div>
    </div>
    </div>
    <div>
    </div>
  </div>  
  <script src="<?php echo base_url(); ?>assets/js/plugins/countup.min.js"></script>
  <script type="text/javascript">
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
