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
                <h4 class="mt-2 mb-2">Job Title</h4>
                <h5 style="font-weight:400;" class="mt-2 mb-2"><?php echo $job_title;?></h5><br>
                <h4 class="mt-2 mb-2">Job Description</h4>
                <?php echo $job_description;?>
            </div>
            <div class="col">
                <h4 class="mt-2 mb-2">Location</h4>
                <h5 style="font-weight:400;" class="mt-2 mb-2"><?php echo $location;?></h5><br>
                <h4 class="mt-2 mb-2">Experience</h4>
                <h5 style="font-weight:400;" class="mt-2 mb-2"><?php echo $experience;?></h5><br>
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
            </div>
        </div>
        </div>
      </div>
    </div>
    </div>
    </div>
</div>