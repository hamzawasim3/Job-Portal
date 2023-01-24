<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class LoginSystem extends CI_Controller {
	public function login()
	{	$this->load->helper('form');
		$this->load->library('session');
		$data['form_status'] = null;
		$data['login_status'] = null;
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('login-system/login',$data);
		$this->load->view('template/footer');
	}
	
	public function register()
	{	$this->load->helper('form');
		$data['form_status'] = null;
		$data['login_status'] = null;
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('login-system/register',$data);
		$this->load->view('template/footer');
	}

	public function resume_upload(){
        $config['upload_path']="uploads/resume";
        $config['allowed_types']='pdf';
		$config['encrypt_name'] = TRUE;
        $this->load->library('upload',$config);
        if($this->upload->do_upload("file")){
        $data = array('upload_data' => $this->upload->data());
		$filepath = $data['upload_data']['file_name'];
		$parser = new \Smalot\PdfParser\Parser();
		$pdf = $parser->parseFile(base_url('uploads/resume/'.$data['upload_data']['file_name']));
        $text = $pdf->getText();
		$parsedtext = str_replace(' ', '', $text);
		$parsedarr = explode("\n",$parsedtext);
		$response_array = array();
		for($i=0;$i<count($parsedarr);$i++){
			if((preg_match("/^[a-zA-Z\s]*$/",$parsedarr[$i]))&&($i<=5)){
				if((empty($response_array['name']))||($response_array['name'] == null)||($response_array['name'] == "")||(!isset($response_array['name'])))
				$response_array['name'] = str_replace(array("\r\n", "\r", "\n", "\t"," "), '', $parsedarr[$i]);
			}
			if((strlen($parsedarr[$i])>=10)&&(strlen($parsedarr[$i])<=13)&&(preg_match("/^[0-9]+$/",$parsedarr[$i]))){
				if((empty($response_array['phone']))||($response_array['phone'] == null)||($response_array['phone'] == "")||(!isset($response_array['phone'])))
				$response_array['phone'] = str_replace(array("\r\n", "\r", "\n", "\t"," "), '', $parsedarr[$i]);
			}
			if(filter_var($parsedarr[$i], FILTER_VALIDATE_EMAIL)){
				if((empty($response_array['email']))||($response_array['email'] == null)||($response_array['email'] == "")||(!isset($response_array['email'])))
				$response_array['email'] = str_replace(array("\r\n", "\r", "\n", "\t"," "), '', $parsedarr[$i]);
			}
			if((str_contains($parsedarr[$i], ','))&&(!preg_match("/^[a-zA-Z-' ]*$/",$parsedarr[$i]))&&($i<=8)){
				if((empty($response_array['location']))||($response_array['location'] == null)||($response_array['location'] == "")||(!isset($response_array['location'])))
				$response_array['location'] = str_replace(array("\r\n", "\r", "\n", "\t"," "), '', $parsedarr[$i]);
			}
			if(((str_contains($parsedarr[$i], 'https://linkedin.'))||(str_contains($parsedarr[$i], 'http://linkedin.'))||(str_contains($parsedarr[$i], 'https://www.linkedin.'))||(str_contains($parsedarr[$i], 'Linkedin.'))||(str_contains($parsedarr[$i], 'linkedin.')))&&(filter_var($parsedarr[$i],FILTER_VALIDATE_URL))){
				if((empty($response_array['linkedin']))||($response_array['linkedin'] == null)||($response_array['linkedin'] == "")||(!isset($response_array['linkedin'])))
				$response_array['linkedin'] = str_replace(array("\r\n", "\r", "\n", "\t"," "), '', $parsedarr[$i]);
			}
			if((stripos($parsedarr[$i], 'work experience')!==false)||(stripos($parsedarr[$i], 'Work Experience')!==false)||(stripos($parsedarr[$i], 'WORK EXPERIENCE')!==false)||(stripos($parsedarr[$i], 'WorkExperience')!==false)||(stripos($parsedarr[$i], 'workexperience')!==false)||(stripos($parsedarr[$i], 'WORKEXPERIENCE')!==false)){
				if(($i+1)<count($parsedarr)){
					if(((stripos($parsedarr[$i+1], 'developer')!==false)||(stripos($parsedarr[$i+1], 'manager')!==false)||(stripos($parsedarr[$i+1], 'assistant')!==false)||(stripos($parsedarr[$i+1], 'leader')!==false))){
						if((empty($response_array['jobtitle']))||($response_array['jobtitle'] == null)||($response_array['jobtitle'] == "")||(!isset($response_array['jobtitle'])))
						$response_array['jobtitle'] = str_replace(array("\r\n", "\r", "\n", "\t"," "), '', $parsedarr[$i+1]);
					}
					else {
						if((preg_match("/^[a-zA-Z\s]*$/",$parsedarr[$i+1]))){
						if((empty($response_array['company']))||($response_array['company'] == null)||($response_array['company'] == "")||(!isset($response_array['company'])))
						$response_array['company'] = str_replace(array("\r\n", "\r", "\n", "\t"," "), '', $parsedarr[$i+1]);
						}
					}
				}
				if(($i+2)<count($parsedarr)){
					if(((stripos($parsedarr[$i+2], 'developer')!==false)||(stripos($parsedarr[$i+2], 'manager')!==false)||(stripos($parsedarr[$i+2], 'assistant')!==false)||(stripos($parsedarr[$i+2], 'leader')!==false))){
						if((empty($response_array['jobtitle']))||($response_array['jobtitle'] == null)||($response_array['jobtitle'] == "")||(!isset($response_array['jobtitle'])))
						$response_array['jobtitle'] = str_replace(array("\r\n", "\r", "\n", "\t"," "), '', $parsedarr[$i+2]);
					}
					else {
						if((preg_match("/^[a-zA-Z\s]*$/",$parsedarr[$i+2]))){
						if((empty($response_array['company']))||($response_array['company'] == null)||($response_array['company'] == "")||(!isset($response_array['company'])))
						$response_array['company'] = str_replace(array("\r\n", "\r", "\n", "\t"," "), '', $parsedarr[$i+2]);
						}
					}
				}
			}
			if(((str_contains($parsedarr[$i], 'years experience'))||(str_contains($parsedarr[$i], 'years of experience'))||(str_contains($parsedarr[$i], 'experience')))){
				if((empty($response_array['experience']))||($response_array['experience'] == null)||($response_array['experience'] == "")||(!isset($response_array['experience'])))
				$response_array['experience'] =  str_replace(array("\r\n", "\r", "\n", "\t"," "), '', preg_replace('/[^0-9.]+/', '', $parsedarr[$i]));
			}
		}
		$response_array['url'] = base_url('uploads/resume/'.$data['upload_data']['file_name']);
		header('Content-Type: application/json');
   		echo json_encode($response_array);
        }
     }

	 public function image_upload(){
		$config['upload_path']="uploads/images";
        $config['allowed_types']='png|jpg|webp';
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload',$config);
		if($this->upload->do_upload("file")){
		$data = array('upload_data' => $this->upload->data());
		$filepath = $data['upload_data']['file_name'];
		header('Content-Type: application/json');
   		echo json_encode($filepath);
		}
	 }

	 public function employeeform(){
		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'XXXX-XXXX-XXXX@gmail.com',
			'smtp_pass' => 'XXXX-XXXX-XXXX',
			'charset' => 'utf-8',
			'mailtype' => 'html'
		  );
		$this->load->model('LoginSystem_model');
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('email',$config);
		$this->form_validation->set_rules('image_url', 'Image Url','required');
		$this->form_validation->set_rules('resume_url', 'Resume Url','required');
		$this->form_validation->set_rules('name', 'Name','required');
		$this->form_validation->set_rules('email', 'Email','required');
		$this->form_validation->set_rules('phone', 'Phone','required|min_length[10]|max_length[13]');
		$this->form_validation->set_rules('password', 'Password','required|min_length[8]');
		$this->form_validation->set_rules('role', 'Role','required');
		$this->form_validation->set_rules('location', 'Location','required');
		$this->form_validation->set_rules('experience', 'Experience','required');
		if(($this->input->post('company') != null)||(!empty($this->input->post('company')))){
			$this->form_validation->set_rules('company', 'Company','required');
			$this->form_validation->set_rules('currentrole', 'CurrentRole','required');
			$this->form_validation->set_rules('current_compnay_type', 'CurrentCompanyType','required');
		}
		if($this->form_validation->run()===FALSE){
			$this->session->set_flashdata('form_status',0);
			redirect('register');
		}
		else{
			$name = strip_tags(trim($this->input->post('name')));
			$email = strip_tags(trim($this->input->post('email')));			
			if($this->LoginSystem_model->check_not_duplicate($email,"emp")){
				if($this->LoginSystem_model->employee_register()){
					$this->load->helper('string');
					$verify_code=random_string('alnum',5);
					$message = "<h2>Hi <strong>".$name."!</strong></h2><h3>Please Verify Your Job Portal Account using the following link:</h3><br>
					<a href='".base_url('/LoginSystem/verify_email?token='.$verify_code.'&email='.$email.'&user_type=emp')."' style='background-color:#ffbe00; color:#000000; display:inline-block; padding:12px 40px 12px 40px; text-align:center; text-decoration:none;' target='_blank'>Verify Email Now</a>";
					$this->email->set_newline("\r\n");
					$this->email->from('XXXX-XXXX-XXXX@gmail.com', 'Job Portal');
					$this->email->to($email);
					$this->email->subject('Verify your email | Job Portal');
					$this->email->message($message);
					$this->email->send();	
					$this->LoginSystem_model->add_email_verify($email,$verify_code,"emp");
					$this->session->set_flashdata('form_status',1);
					redirect('login');
				}
				else{
					$this->session->set_flashdata('form_status',0);
					redirect('register');
				}
			}
			else{
				$this->session->set_flashdata('form_status',0);
				redirect('register');
			}
		}
	}

	 public function recruiterform(){
		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'XXXX-XXXX-XXXX@gmail.com',
			'smtp_pass' => 'XXXX-XXXX-XXXX',
			'charset' => 'utf-8',
			'mailtype' => 'html'
		  );
		$this->load->model('LoginSystem_model');
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('email',$config);
		$this->form_validation->set_rules('rimage_url', 'Image Url','required');
		$this->form_validation->set_rules('rname', 'Name','required');
		$this->form_validation->set_rules('remail', 'Email','required');
		$this->form_validation->set_rules('rphone', 'Phone','required|min_length[10]|max_length[13]');
		$this->form_validation->set_rules('rpassword', 'Password','required|min_length[8]');
		$this->form_validation->set_rules('companyname', 'CompanyName','required');
		$this->form_validation->set_rules('companytype', 'CompanyType','required');
		$this->form_validation->set_rules('companyurl', 'CompanyUrl','required');
		$this->form_validation->set_rules('companydescription', 'CompanyDescription','required');
		if($this->form_validation->run()===FALSE){
			$this->session->set_flashdata('form_status',0);
			redirect('register');
		}
		else{
			$name = strip_tags(trim($this->input->post('rname')));
			$email = strip_tags(trim($this->input->post('remail')));
			if($this->LoginSystem_model->check_not_duplicate($email,"rec")){
				if($this->LoginSystem_model->recruiter_register()){
					$this->load->helper('string');
					$verify_code=random_string('alnum',5);
					$message = "<h2>Hi <strong>".$name."!</strong></h2><h3>Please Verify Your Job Portal Account using the following link:</h3><br>
					<a href='".base_url('/LoginSystem/verify_email?token='.$verify_code.'&email='.$email.'&user_type=rec')."' style='background-color:#ffbe00; color:#000000; display:inline-block; padding:12px 40px 12px 40px; text-align:center; text-decoration:none;' target='_blank'>Verify Email Now</a>";
					$this->email->set_newline("\r\n");
					$this->email->from('XXXX-XXXX-XXXX@gmail.com', 'Job Portal');
					$this->email->to($email);
					$this->email->subject('Verify your email | Job Portal');
					$this->email->message($message);
					$this->email->send();
					$this->LoginSystem_model->add_email_verify($email,$verify_code,"rec");
					$this->session->set_flashdata('form_status',1);
					redirect('login');
					}
					else{
					$this->session->set_flashdata('form_status',0);
					redirect('register');
					}
			}
			else{
				$this->session->set_flashdata('form_status',0);
				redirect('register');
			}
			
		}
	 }

	 public function verifyemplogin(){
		$this->load->model('LoginSystem_model');
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		$this->load->library('session');
		$this->form_validation->set_rules('email', 'Email','required');
		$this->form_validation->set_rules('password', 'Password','required|min_length[8]');
		if($this->form_validation->run()===FALSE){
			$this->session->set_flashdata('form_status',0);
			redirect('login');
		}
		else{
			if($this->LoginSystem_model->get_user_login($this->input->post('email'),$this->input->post('password'),"emp")){
			$this->session->set_flashdata('login_status',1);
			$this->session->set_userdata('logged_in',1);
			$this->session->set_userdata('user_type',"emp");
			$this->session->set_userdata('user_id',$this->LoginSystem_model->get_user_login($this->input->post('email'),$this->input->post('password'),"emp"));
			redirect('candidate');
			}
			else{
			$this->session->set_flashdata('login_status',0);
			redirect('login');
			}
		}
	 }

	 public function verifyreclogin(){
		$this->load->model('LoginSystem_model');
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		$this->load->library('session');
		$this->form_validation->set_rules('remail', 'Email','required');
		$this->form_validation->set_rules('rpassword', 'Password','required|min_length[8]');
		if($this->form_validation->run()===FALSE){
			$this->session->set_flashdata('form_status',0);
			redirect('login');
		}
		else{
			if($this->LoginSystem_model->get_user_login($this->input->post('remail'),$this->input->post('rpassword'),"rec")){
				$this->session->set_flashdata('login_status',1);
				$this->session->set_userdata('logged_in',1);
				$this->session->set_userdata('user_type',"rec");
				$this->session->set_userdata('user_id',$this->LoginSystem_model->get_user_login($this->input->post('remail'),$this->input->post('rpassword'),"rec"));
				redirect('recruiter');
				}
				else{
				$this->session->set_flashdata('login_status',0);
				redirect('login');
				}
		}
	 }
	 
	 public function verify_email()
	 {  
		$this->load->model('LoginSystem_model'); 
		$token = strip_tags(trim($this->input->get('token')));
		$email = strip_tags(trim($this->input->get('email')));
		$user_type = strip_tags(trim($this->input->get('user_type')));
		$this->LoginSystem_model->verify_email($email,$token,$user_type);
		redirect('/');
	 }
}
