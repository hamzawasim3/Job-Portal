<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function landing()
	{	$this->load->library('session');
		$this->load->model('Home_model');
		if($this->session->userdata('user_id') != null)
		$data = $this->Home_model->get_stats($this->session->userdata('user_id'));
		else $data = $this->Home_model->get_stats(null);
		if($this->session->userdata('logged_in')){
			if($this->session->userdata('user_type')=="rec"){
				$data['user_type'] = "rec";
				$this->load->view('template/header');
				$this->load->view('template/menu_rec');
				$this->load->view('landing/index',$data);
				$this->load->view('template/footer');
			}
			if($this->session->userdata('user_type')=="emp"){
				$data['user_type'] = "emp";
				$this->load->view('template/header');
				$this->load->view('template/menu_can');
				$this->load->view('landing/index',$data);
				$this->load->view('template/footer');
			}
		}
		else{
		$data['user_type'] = "emp";
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('landing/index',$data);
		$this->load->view('template/footer');
		}
	}
	public function about()
	{	$this->load->library('session');
		if($this->session->userdata('logged_in')){
			if($this->session->userdata('user_type')=="rec"){
				$this->load->view('template/header');
				$this->load->view('template/menu_rec');
				$this->load->view('landing/about');
				$this->load->view('template/footer');
			}
			if($this->session->userdata('user_type')=="emp"){
				$this->load->view('template/header');
				$this->load->view('template/menu_can');
				$this->load->view('landing/about');
				$this->load->view('template/footer');
			}
		}
		else{
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('landing/about');
		$this->load->view('template/footer');
		}
	}
	public function contact()
	{	$this->load->library('session');
		if($this->session->userdata('logged_in')){
			if($this->session->userdata('user_type')=="rec"){
				$this->load->helper('form');
				$this->load->library('session');
				$data['email_sent'] = null;
				$this->load->view('template/header');
				$this->load->view('template/menu_rec');
				$this->load->view('landing/contact',$data);
				$this->load->view('template/footer');
			}
			if($this->session->userdata('user_type')=="emp"){
				$this->load->helper('form');
				$this->load->library('session');
				$data['email_sent'] = null;
				$this->load->view('template/header');
				$this->load->view('template/menu_can');
				$this->load->view('landing/contact',$data);
				$this->load->view('template/footer');
			}
		}
		else{
			$this->load->helper('form');
			$this->load->library('session');
			$data['email_sent'] = null;
			$this->load->view('template/header');
			$this->load->view('template/menu');
			$this->load->view('landing/contact',$data);
			$this->load->view('template/footer');
		}
	}
	public function contact_submit()
	{   $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		$this->load->library('session');
		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'XXXX-XXXX-XXXX@gmail.com',
			'smtp_pass' => 'XXXX-XXXX-XXXX'
		  );
		$this->load->library('email',$config);
		$this->form_validation->set_rules('name', 'Name','required');
		$this->form_validation->set_rules('email', 'Email','required');
		$this->form_validation->set_rules('message', 'Message','required|min_length[100]');
		if($this->form_validation->run()===FALSE){
			$this->session->set_flashdata('email_sent',0);

            redirect('/contact');
		}
        else{
			$name = strip_tags(trim($this->input->post('name')));
			$email = strip_tags(trim($this->input->post('email')));
			$message = strip_tags(trim($this->input->post('message')));
			$this->email->set_newline("\r\n");
            $this->email->from('XXXX-XXXX-XXXX', 'Job Portal');
			$this->email->to($email);
			$this->email->subject('Feedback from '.$name.' for Job Portal');
			$this->email->message($message);
			if($this->email->send()){
				$this->session->set_flashdata('email_sent',1);
            	redirect('/contact');
			} else {
				$this->session->set_flashdata('email_sent',0);
            	redirect('/contact');
			}
            
        }
	}
}
