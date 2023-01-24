<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Candidate extends CI_Controller {
     public function dashboard()
	 {  $this->load->library('session');
        $userid=$this->session->userdata('user_id');
        $this->load->model('Candidate_model'); 
        $data = $this->Candidate_model->get_stats($userid); 
		$this->load->view('template/header');
		$this->load->view('template/menu_can');
		$this->load->view('candidate/dashboard',$data);
		$this->load->view('template/footer');
	 }
     public function edit_profile()
	 {  $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $userid=$this->session->userdata('user_id');
        $this->load->model('Candidate_model'); 
        $data = $this->Candidate_model->get_candidate_data($userid); 
        if($this->session->flashdata('form_status') == null)   
        $data['form_status'] = null;
        else $data['form_status'] = $this->session->flashdata('form_status');
		$data['login_status'] = null;
		$this->load->view('template/header');
		$this->load->view('template/menu_can');
		$this->load->view('candidate/editprofile',$data);
		$this->load->view('template/footer');
	 }
     public function update_profile()
    {  $this->load->library('session');
       $this->load->helper(array('form', 'url'));
       $this->load->library('form_validation');
       $this->load->model('Candidate_model'); 
       $this->form_validation->set_rules('image_url', 'Image Url','required');
       $this->form_validation->set_rules('resume_url', 'Image Url','required');
       $this->form_validation->set_rules('name', 'Name','required');
       $this->form_validation->set_rules('phone', 'Phone','required|min_length[10]|max_length[13]');
       $this->form_validation->set_rules('role', 'Role','required');
	   $this->form_validation->set_rules('location', 'Location','required');
	   $this->form_validation->set_rules('experience', 'Experience','required');
       if(($this->input->post('company') != null)||(!empty($this->input->post('company')))){
        $this->form_validation->set_rules('company', 'Company','required');
        $this->form_validation->set_rules('currentrole', 'CurrentRole','required');
    }
       if($this->form_validation->run()===FALSE){
           $this->session->set_flashdata('form_status',0);
           redirect('candidate/edit_profile');
       }
       else{
           if($this->Candidate_model->update_profile($this->session->userdata('user_id'))){
           $this->session->set_flashdata('form_status',1);
           redirect('candidate/edit_profile');
           }
           else{
           $this->session->set_flashdata('form_status',0);
           redirect('candidate/edit_profile');
           }
       }
   }
   public function view_job($job_id)
	 {  
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $userid=$this->session->userdata('user_id');
        $this->load->model('Candidate_model'); 
        $data = $this->Candidate_model->get_job_data($job_id); 
        $data['applied'] = $this->Candidate_model->check_if_applied($job_id,$userid);
        if($this->session->flashdata('form_status') == null)   
        $data['form_status'] = null;
        else $data['form_status'] = $this->session->flashdata('form_status');
		$data['login_status'] = null;
		$this->load->view('template/header');
        if($this->session->userdata('logged_in')){
            $this->load->view('template/menu_can');
        }
        else $this->load->view('template/menu');
		$this->load->view('candidate/viewjob',$data);
		$this->load->view('template/footer');
	 }
     public function view_applied_jobs()
	 {  
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $userid=$this->session->userdata('user_id');
        $this->load->model('Candidate_model'); 
        $data['jobs'] = $this->Candidate_model->get_applied_job_data($userid); 
        if($this->session->flashdata('form_status') == null)   
        $data['form_status'] = null;
        else $data['form_status'] = $this->session->flashdata('form_status');
		$data['login_status'] = null;
		$this->load->view('template/header');
		$this->load->view('template/menu_can');
		$this->load->view('candidate/viewappliedjobs',$data);
		$this->load->view('template/footer');
	 }
     public function view_search_page()
	 {  
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $userid=$this->session->userdata('user_id');
        $this->load->model('Candidate_model');
        $data['jobs'] = $this->Candidate_model->get_jobs(); 
        if($this->session->flashdata('form_status') == null)   
        $data['form_status'] = null;
        else $data['form_status'] = $this->session->flashdata('form_status');
		$data['login_status'] = null;
        $this->load->view('template/header');
		$this->load->view('template/menu_can');
		$this->load->view('candidate/searchjobs',$data);
		$this->load->view('template/footer');
     }
     public function search_jobs()
	 {  
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $userid=$this->session->userdata('user_id');
        $this->load->model('Candidate_model');
        $data['jobs'] = $this->Candidate_model->search_jobs($userid); 
        if($this->session->flashdata('form_status') == null)   
        $data['form_status'] = null;
        else $data['form_status'] = $this->session->flashdata('form_status');
		$data['login_status'] = null;
		$this->load->view('template/header');
		$this->load->view('template/menu_can');
		$this->load->view('candidate/searchjobs',$data);
		$this->load->view('template/footer');
	 }
     public function preferred_jobs()
	 {  
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $userid=$this->session->userdata('user_id');
        $this->load->model('Candidate_model'); 
        $data['jobs'] = $this->Candidate_model->preferred_jobs($userid); 
        if($this->session->flashdata('form_status') == null)   
        $data['form_status'] = null;
        else $data['form_status'] = $this->session->flashdata('form_status');
		$data['login_status'] = null;
		$this->load->view('template/header');
		$this->load->view('template/menu_can');
		$this->load->view('candidate/preferredjobs',$data);
		$this->load->view('template/footer');
	 }
     public function apply_job($job_id)
	 {  
        $this->load->library('session');
        if($this->session->userdata('logged_in')){
        $user_id=$this->session->userdata('user_id');
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
        if($this->Candidate_model->apply_job($job_id,$user_id)){
        $this->load->library('email',$config);
        $message = "<h2>Hi <strong>".$name."!</strong></h2><h3>Your application for ".$job_title." at ".$company." has been successfully submitted. We will update you once we receive any updates for your application.</h3><br>";
			$this->email->set_newline("\r\n");
			$this->email->from('XXXX-XXXX-XXXX@gmail.com', 'Job Portal');
			$this->email->to($email);
			$this->email->subject('Applied for '.$job_title.' at '.$company.' | Job Portal');
			$this->email->message($message);
			$this->email->send();
        $this->session->set_flashdata('form_status',1);
        if($this->session->flashdata('form_status') == null)   
        $data['form_status'] = null;
        else $data['form_status'] = $this->session->flashdata('form_status');
		$data['login_status'] = null;
		redirect('candidate/view_job/'.$job_id.'');
        } else{
            $this->session->set_flashdata('form_status',0);
            if($this->session->flashdata('form_status') == null)   
            $data['form_status'] = null;
            else $data['form_status'] = $this->session->flashdata('form_status');
            $data['login_status'] = null;
            redirect('candidate/view_job/'.$job_id.'');
        }
        }
        else redirect('login');
	 }
     public function disapply_job($job_id)
	 {  
        $this->load->library('session');
        $user_id=$this->session->userdata('user_id');
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
        if($this->Candidate_model->disapply_job($job_id,$user_id)){
        $this->load->library('email',$config);
        $message = "<h2>Hi <strong>".$name."!</strong></h2><h3>As per your request, your application for ".$job_title." at ".$company." has been successfully terminated. If you change your mind, you can always re-apply.</h3><br>";
			$this->email->set_newline("\r\n");
			$this->email->from('XXXX-XXXX-XXXX@gmail.com', 'Job Portal');
			$this->email->to($email);
			$this->email->subject('Application terminated for '.$job_title.' at '.$company.' | Job Portal');
			$this->email->message($message);
			$this->email->send();
        $this->session->set_flashdata('form_status',1);
        if($this->session->flashdata('form_status') == null)   
        $data['form_status'] = null;
        else $data['form_status'] = $this->session->flashdata('form_status');
		$data['login_status'] = null;
		redirect('candidate/view_applied_jobs/');
        } else{
            $this->session->set_flashdata('form_status',0);
            if($this->session->flashdata('form_status') == null)   
            $data['form_status'] = null;
            else $data['form_status'] = $this->session->flashdata('form_status');
            $data['login_status'] = null;
            redirect('candidate/view_applied_jobs/');
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