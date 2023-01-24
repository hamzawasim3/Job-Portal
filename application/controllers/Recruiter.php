<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recruiter extends CI_Controller {
     public function dashboard()
	 {  $this->load->library('session');
        $userid=$this->session->userdata('user_id');
        $this->load->model('Recruiter_model'); 
        $data = $this->Recruiter_model->get_stats($userid); 
		$this->load->view('template/header');
		$this->load->view('template/menu_rec');
		$this->load->view('recruiter/dashboard',$data);
		$this->load->view('template/footer');
	 }
     public function edit_profile()
	 {  $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $userid=$this->session->userdata('user_id');
        $this->load->model('Recruiter_model'); 
        $data = $this->Recruiter_model->get_recruiter_data($userid); 
        if($this->session->flashdata('form_status') == null)   
        $data['form_status'] = null;
        else $data['form_status'] = $this->session->flashdata('form_status');
		$data['login_status'] = null;
		$this->load->view('template/header');
		$this->load->view('template/menu_rec');
		$this->load->view('recruiter/editprofile',$data);
		$this->load->view('template/footer');
    }
    public function update_profile()
    {  $this->load->library('session');
       $this->load->helper(array('form', 'url'));
       $this->load->library('form_validation');
       $this->load->model('Recruiter_model'); 
       $this->form_validation->set_rules('rimage_url', 'Image Url','required');
       $this->form_validation->set_rules('rname', 'Name','required');
       $this->form_validation->set_rules('rphone', 'Phone','required|min_length[10]|max_length[13]');
       $this->form_validation->set_rules('companyname', 'CompanyName','required');
       $this->form_validation->set_rules('companytype', 'CompanyType','required');
       $this->form_validation->set_rules('companyurl', 'CompanyUrl','required');
       $this->form_validation->set_rules('companydescription', 'CompanyDescription','required');
       if($this->form_validation->run()===FALSE){
           $this->session->set_flashdata('form_status',0);
           redirect('recruiter/edit_profile');
       }
       else{
           if($this->Recruiter_model->update_profile($this->session->userdata('user_id'))){
           $this->session->set_flashdata('form_status',1);
           redirect('recruiter/edit_profile');
           }
           else{
           $this->session->set_flashdata('form_status',0);
           redirect('recruiter/edit_profile');
           }
       }
   }
   public function add_job()
	 {  $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        if($this->session->flashdata('form_status') == null)   
        $data['form_status'] = null;
        else $data['form_status'] = $this->session->flashdata('form_status');
		$data['login_status'] = null;
        $data['jobdescription'] = '<p>Please specify each and every information regarding the position.</p>';
        $this->load->view('template/header');
		$this->load->view('template/menu_rec');
		$this->load->view('recruiter/addjob',$data);
		$this->load->view('template/footer');
    }
    public function submit_job()
	 {  $this->load->helper(array('form', 'url'));
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('Recruiter_model'); 
        $this->form_validation->set_rules('jobtitle', 'Job Title','required');
		$this->form_validation->set_rules('experience', 'Experience','required');
		$this->form_validation->set_rules('location', 'Location','required');
		$this->form_validation->set_rules('job_type', 'Job Type','required');
		$this->form_validation->set_rules('skills', 'Skills','required');
		$this->form_validation->set_rules('jobdescription', 'Job Description','required');
		if($this->form_validation->run()===FALSE){
			$this->session->set_flashdata('form_status',0);
			redirect('recruiter/add_job');
		}
		else{
			if($this->Recruiter_model->submit_job($this->session->userdata('user_id'))){
                $this->session->set_flashdata('form_status',1);
                redirect('recruiter/add_job');
                }
                else{
                $this->session->set_flashdata('form_status',0);
                redirect('recruiter/add_job');
            }
        }
    }
    public function view_jobs()
	 {  
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $userid=$this->session->userdata('user_id');
        $this->load->model('Recruiter_model'); 
        $data['jobs'] = $this->Recruiter_model->get_job_by_userid($userid); 
        if($this->session->flashdata('form_status') == null)   
        $data['form_status'] = null;
        else $data['form_status'] = $this->session->flashdata('form_status');
		$data['login_status'] = null;
		$this->load->view('template/header');
		$this->load->view('template/menu_rec');
		$this->load->view('recruiter/viewjobs',$data);
		$this->load->view('template/footer');
	 }
     public function view_job($job_id)
	 {  
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $userid=$this->session->userdata('user_id');
        $this->load->model('Recruiter_model'); 
        $data = $this->Recruiter_model->get_job_data($userid,$job_id); 
        if($this->session->flashdata('form_status') == null)   
        $data['form_status'] = null;
        else $data['form_status'] = $this->session->flashdata('form_status');
		$data['login_status'] = null;
		$this->load->view('template/header');
		$this->load->view('template/menu_rec');
		$this->load->view('recruiter/viewjob',$data);
		$this->load->view('template/footer');
	 }
    public function edit_job($job_id)
	 {  $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $userid=$this->session->userdata('user_id');
        $this->load->model('Recruiter_model'); 
        $data = $this->Recruiter_model->get_job_data($userid,$job_id); 
        $data['job_id'] = $job_id;
        set_value('job_description',$data['job_description']);
        if($this->session->flashdata('form_status') == null)   
        $data['form_status'] = null;
        else $data['form_status'] = $this->session->flashdata('form_status');
		$data['login_status'] = null;
		$this->load->view('template/header');
		$this->load->view('template/menu_rec');
		$this->load->view('recruiter/editjob',$data);
		$this->load->view('template/footer');
    }
    public function update_job($job_id)
	 {  $this->load->helper(array('form', 'url'));
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('Recruiter_model'); 
        $this->form_validation->set_rules('jobtitle', 'Job Title','required');
		$this->form_validation->set_rules('experience', 'Experience','required');
		$this->form_validation->set_rules('location', 'Location','required');
		$this->form_validation->set_rules('job_type', 'Job Type','required');
		$this->form_validation->set_rules('skills', 'Skills','required');
		$this->form_validation->set_rules('jobdescription', 'Job Description','required');
		if($this->form_validation->run()===FALSE){
			$this->session->set_flashdata('form_status',0);
			redirect('recruiter/edit_job/'.$job_id.'');
		}
		else{
			if($this->Recruiter_model->update_job($this->session->userdata('user_id'),$job_id)){
                $this->session->set_flashdata('form_status',1);
                redirect('recruiter/edit_job/'.$job_id.'');
                }
                else{
                $this->session->set_flashdata('form_status',0);
                redirect('recruiter/edit_job/'.$job_id.'');
            }
        }
    }
    public function delete_job($job_id)
	 {  
        $this->load->library('session');
        $this->load->model('Recruiter_model'); 
			if($this->Recruiter_model->delete_job($this->session->userdata('user_id'),$job_id)){
                $this->session->set_flashdata('form_status',1);
                redirect('recruiter/view_jobs');
                }
                else{
                $this->session->set_flashdata('form_status',0);
                redirect('recruiter/view_jobs');
            }
    }
    public function view_applicants()
	 {  
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $userid=$this->session->userdata('user_id');
        $this->load->model('Recruiter_model'); 
        $data['applicants_data'] = $this->Recruiter_model->get_job_applicants($userid); 
        if($this->session->flashdata('form_status') == null)   
        $data['form_status'] = null;
        else $data['form_status'] = $this->session->flashdata('form_status');
		$data['login_status'] = null;
		$this->load->view('template/header');
		$this->load->view('template/menu_rec');
		$this->load->view('recruiter/viewapplicants',$data);
		$this->load->view('template/footer');
	 }
     public function view_job_applicants($job_id)
	 {  
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $userid=$this->session->userdata('user_id');
        $this->load->model('Recruiter_model'); 
        $data['applicants_data'] = $this->Recruiter_model->get_applicants($userid,$job_id); 
        $data['job_id'] = $job_id;
        if($this->session->flashdata('form_status') == null)   
        $data['form_status'] = null;
        else $data['form_status'] = $this->session->flashdata('form_status');
		$data['login_status'] = null;
		$this->load->view('template/header');
		$this->load->view('template/menu_rec');
		$this->load->view('recruiter/viewapplicants',$data);
		$this->load->view('template/footer');
	 }
     public function view_application($user_id,$job_id)
	 {  
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('Recruiter_model'); 
        $data = $this->Recruiter_model->get_application($user_id,$job_id); 
        if($this->session->flashdata('form_status') == null)   
        $data['form_status'] = null;
        else $data['form_status'] = $this->session->flashdata('form_status');
		$data['login_status'] = null;
		$this->load->view('template/header');
		$this->load->view('template/menu_rec');
		$this->load->view('recruiter/viewapplication',$data);
		$this->load->view('template/footer');
	 }
     public function move_application($user_id,$job_id)
	 {  
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('Recruiter_model'); 
        $this->load->model('Candidate_model'); 
        $config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'XXXX-XXXX-XXXX@gmail.com',
			'smtp_pass' => 'XXXX-XXXX-XXXX',
			'charset' => 'utf-8',
			'mailtype' => 'html'
		  );
        $candidate_details = $this->Candidate_model->get_candidate_data($user_id);
        $job_details = $this->Candidate_model->get_job_data($job_id);
        $recruiter_details = $this->Candidate_model->get_recruiter_data($job_id);
        $name = $candidate_details['name'];
        $email = $candidate_details['email'];
        $job_title = $job_details['job_title'];
        $company = $recruiter_details['company'];
        if($this->Recruiter_model->reject_application($user_id,$job_id)){
            $this->load->library('email',$config);
            $message = "<h2>Hi <strong>".$name."!</strong></h2><h3>Congratulations! Your application for ".$job_title." at ".$company." has been shortlisted. Company will directly contact you with the next steps.</h3><br>";
			$this->email->set_newline("\r\n");
			$this->email->from('XXXX-XXXX-XXXX@gmail.com', 'Job Portal');
			$this->email->to($email);
			$this->email->subject('Update for '.$job_title.' at '.$company.' | Job Portal');
			$this->email->message($message);
			$this->email->send();
        $this->load->model('Recruiter_model'); 
        $data['applicants_data'] = $this->Recruiter_model->get_applicants($this->session->userdata('user_id'),$job_id);  
        $data['job_id'] = $job_id;   
        if($this->session->flashdata('form_status') == null)   
        $data['form_status'] = null;
        else $data['form_status'] = $this->session->flashdata('form_status');
		$data['login_status'] = null;
		$this->load->view('template/header');
		$this->load->view('template/menu_rec');
		$this->load->view('recruiter/viewapplicants',$data);
		$this->load->view('template/footer');
        }
	 }
     public function reject_application($user_id,$job_id)
	 {  
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('Recruiter_model'); 
        $this->load->model('Candidate_model'); 
        $config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'XXXX-XXXX-XXXX@gmail.com',
			'smtp_pass' => 'XXXX-XXXX-XXXX',
			'charset' => 'utf-8',
			'mailtype' => 'html'
		  );
        $candidate_details = $this->Candidate_model->get_candidate_data($user_id);
        $job_details = $this->Candidate_model->get_job_data($job_id);
        $recruiter_details = $this->Candidate_model->get_recruiter_data($job_id);
        $name = $candidate_details['name'];
        $email = $candidate_details['email'];
        $job_title = $job_details['job_title'];
        $company = $recruiter_details['company'];
        if($this->Recruiter_model->reject_application($user_id,$job_id)){
            $this->load->library('email',$config);
            $message = "<h2>Hi <strong>".$name."!</strong></h2><h3>Unfortunately, your application for ".$job_title." at ".$company." has been rejected.</h3><br>";
			$this->email->set_newline("\r\n");
			$this->email->from('XXXX-XXXX-XXXX@gmail.com', 'Job Portal');
			$this->email->to($email);
			$this->email->subject('Update for '.$job_title.' at '.$company.' | Job Portal');
			$this->email->message($message);
			$this->email->send();
        $this->load->model('Recruiter_model'); 
        $data['applicants_data'] = $this->Recruiter_model->get_applicants($this->session->userdata('user_id'),$job_id);   
        $data['job_id'] = $job_id;  
        if($this->session->flashdata('form_status') == null)   
        $data['form_status'] = null;
        else $data['form_status'] = $this->session->flashdata('form_status');
		$data['login_status'] = null;
		$this->load->view('template/header');
		$this->load->view('template/menu_rec');
		$this->load->view('recruiter/viewapplicants',$data);
		$this->load->view('template/footer');
        }
	 }
   public function sign_out()
	 {  $this->load->library('session');
        $this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('user_type');
		redirect('/');
	 }
}
?>