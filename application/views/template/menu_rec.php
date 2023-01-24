<!-- Menu -->
<style>
  @media (min-width: 996px) {
    #ddmenu{
      margin-left: 25rem !important;
    }
    }
    @media (min-width: 1200px) {
    #ddmenu{
      margin-left: 27rem !important;
    }
    }
   @media (min-width: 1400px) {
    #ddmenu{
      margin-left: 35rem !important;
    }
  }
</style>
<nav
  class="navbar navbar-expand-lg z-index-3 py-3" style="background-color: rgb(109, 3, 109);position: fixed;top: 0;width: 100%;">
  <div class="container">
    <a href="<?php echo base_url(); ?>" rel="tooltip" data-placement="bottom">
      <h5 class="text-white" style="margin-bottom: 0rem;">Job Portal</h5>
    </a>
    <button class="navbar-toggler bg-gradient-warning" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon" style="background-image: linear-gradient();"></span>
    </button>
    <div class="collapse navbar-collapse" id="navigation">
      <ul class="navbar-nav navbar-nav-hover mx-2">
        <li class="nav-item px-3" style="display: flex;justify-content: center;align-items: center;">
          <a href="<?php echo base_url(); ?>about" class="nav-link text-white">About Us</a>
        </li>

        <li class="nav-item px-3" style="display: flex;justify-content: center;align-items: center;">
          <a href="<?php echo base_url(); ?>contact"class="nav-link text-white" >Contact Us</a>
        </li>
        <div class="dropdown mx-auto" id="ddmenu">
          <button class="btn bg-gradient-warning mb-0 dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" style="margin-left:10px;">Profile</button>
          <ul class="dropdown-menu mx-auto my-0" aria-labelledby="dropdownMenuButton">
          <li><a class="dropdown-item" href="<?php echo base_url(); ?>recruiter/">Dashboard</a></li>
          <li><a class="dropdown-item" href="<?php echo base_url(); ?>recruiter/edit_profile">Edit Profile</a></li>
          <li><a class="dropdown-item" href="<?php echo base_url(); ?>recruiter/add_job">Add Job</a></li>
          <li><a class="dropdown-item" href="<?php echo base_url(); ?>recruiter/view_jobs">View Jobs</a></li>
          <li><a class="dropdown-item" href="<?php echo base_url(); ?>recruiter/sign_out">Sign Out</a></li>
          </ul>
          </div>
      </ul>
    </div>
  </div>
</nav>