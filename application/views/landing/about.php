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
<header class="bg-gradient-dark">
    <div class="page-header min-vh-75" style="background-image: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,119,1) 9%, rgba(8,8,107,1) 59%, rgba(9,9,121,1) 72%, rgba(0,0,66,1) 100%, rgba(0,212,255,1) 100%);">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8 text-center mx-auto my-auto">
            <h1 class="text-white">Job Portal</h1>
            <p class="lead mb-4 text-white opacity-8">
              My project entitled “Job Portal” is a job posting site developed in Codeigniter where employer can register their company profile, login and then add job postings. Employee can apply for the Job. There is a dashboard section for candidate as well as employer. In employer section, employer can check his job posting list and view candidate details who have applied for the job based on which employee can move the application to next steps (screening, task assignment etc) or reject the application. In candidate section, candidate can view all the job postings where he has applied and apply to other job postings.</p>
          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="container">
      <div class="row justify-content-center my-sm-5">
      <h2 class="text-dark text-center mb-0">It is made using these amazing open source tools and technologies</h2>
        <div class="col-lg-6">
        <section class="py-7" style="margin-top:-50px ;">
      <div class="container">
        <div class="row align-items-center">
          <div class="col">
            <div class="row justify-content-start">
              <div class="col-md-6">
                <div class="info">
                <a href="https://www.codeigniter.com/">
                  <img src="<?php echo base_url(); ?>/assets/img/tech/c.png" style="max-width: 100px;display: flex;margin-left: auto;margin-right: auto;" alt="Python - Django">
                </a>
                  <h5 class="text-center">PHP - Codeigniter</h5>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info">
                <a href="https://getbootstrap.com/">
                  <img src="<?php echo base_url(); ?>/assets/img/tech/b.png" style="max-width: 100px;display: flex;margin-left: auto;margin-right: auto;" alt="Bootstrap">
                  </a>
                  <h5 class="text-center">Bootstrap 5</h5>
                </div>
              </div>
            </div>
            <div class="row justify-content-start mt-4">
              <div class="col-md-6">
                <div class="info">
                  <a href="https://www.mysql.com/">
                  <img src="<?php echo base_url(); ?>/assets/img/tech/hc.png" style="max-width: 100px;display: flex;margin-left: auto;margin-right: auto;" alt="HTML/CSS">
                  </a>
                  <h5 class="text-center">MySQL</h5>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info">
                <a href="https://www.javascript.com/">
                  <img  src="<?php echo base_url(); ?>/assets/img/tech/js.png" style="max-width: 100px;display: flex;margin-left: auto;margin-right: auto;" alt="Javascript">
                  </a>
                  <h5 class="text-center">Javascript</h5>
                </div>
              </div>
            </div>
          </div>
         
        </div>
      </div>
    </section>
        </div>
        <div class="col-lg-6"><center>
        <img src="<?php echo base_url(); ?>assets/img/about.svg" class="img-fluid floating" style="margin-top:25px"></center>      
        </div>
      </div>
  </div>