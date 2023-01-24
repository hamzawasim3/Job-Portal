<?php defined('BASEPATH') or exit('No direct script access allowed');

class LoginSystem_model extends CI_Model
{
    public function employee_register()
    {   $this->load->database();
        $this->load->library('encryption');
        $this->load->helper('string');
        $user_id=random_string('alnum',5);
        $email=strip_tags(trim($this->input->post('email')));
        $password=$this->encryption->encrypt($this->input->post('password'));
        $image_url=strip_tags(trim($this->input->post('image_url')));
        $resume_url=strip_tags(trim($this->input->post('resume_url')));
        $name=strip_tags(trim($this->input->post('name')));
        $phone=strip_tags(trim($this->input->post('phone')));
        $role=strip_tags(trim($this->input->post('role')));
        $location=strip_tags(trim($this->input->post('location')));
        $experience=strip_tags(trim($this->input->post('experience')));

        if($this->input->post('linkedin')!= null){
            $linkedin=strip_tags(trim($this->input->post('linkedin')));
        }else $linkedin = null;

        if($this->input->post('company')!= null){
            $company=strip_tags(trim($this->input->post('company')));
        }else $company = null;
        
        if($this->input->post('currentrole')!= null){
            $current_role=strip_tags(trim($this->input->post('currentrole')));
        }else $current_role = null;
        if($this->input->post('current_company_type')!= null){
            $current_company_type=strip_tags(trim($this->input->post('current_company_type')));
        }else $current_company_type = null;

        $data = array(
            'id' => 0,
            'user_id' => $user_id,
            'user_type' => "emp",
            'email' => $email,
            'password' => $password
        );

        $data1 = array(
            'id' => 0,
            'user_id' => $user_id,
            'image_url' => $image_url,
            'resume_url' => $resume_url,
            'name' => $name,
            'phone' => $phone,
            'role' => $role,
            'location' => $location,
            'experience' => $experience,
            'linkedin' => $linkedin,
            'company' => $company,
            'current_role' => $current_role,
            'current_company_type' => $current_company_type

        );
        $this->db->insert('user_login_data', $data);
        $this->db->insert('candidate_data', $data1);
        return true;
    }

    public function recruiter_register()
    {   $this->load->database();
        $this->load->library('encryption');
        $this->load->helper('string');
        $user_id=random_string('alnum',5);
        $email=strip_tags(trim($this->input->post('remail')));
        $password=$this->encryption->encrypt(strip_tags(trim($this->input->post('rpassword'))));
        $image_url=strip_tags(trim($this->input->post('rimage_url')));
        $name=strip_tags(trim($this->input->post('rname')));
        $phone=strip_tags(trim($this->input->post('rphone')));
        $companyname=strip_tags(trim($this->input->post('companyname')));
        $companytype=strip_tags(trim($this->input->post('companytype')));
        $companyurl=strip_tags(trim($this->input->post('companyurl')));
        $companydescription=strip_tags(trim($this->input->post('companydescription')));

        $data = array(
            'id' => 0,
            'user_id' => $user_id,
            'user_type' => "rec",
            'email' => $email,
            'password' => $password
        );

        $data1 = array(
            'id' => 0,
            'user_id' => $user_id,
            'image_url' => $image_url,
            'name' => $name,
            'phone' => $phone,
            'company_name' => $companyname,
            'company_type' => $companytype,
            'company_url' => $companyurl,
            'company_description' => $companydescription

        );
        $this->db->insert('user_login_data', $data);
        $this->db->insert('recruiter_data', $data1);
        return true;
    }

    public function check_not_duplicate($email,$user_type)
    {
        $this->load->database();
        $this->db->where('email', $email);
        $this->db->where('user_type', $user_type);
        $query = $this->db->get('user_login_data');
        $row = ($query) ? $query->row_array() : false;
        if($query->num_rows() == 0){
            return true;
        } else return false;
    }
    public function get_user_login($email,$password,$user_type)
    {   
        $this->load->database();
        $this->load->library('encryption');
        $this->load->helper('string');
        $time=time();
        $this->db->where('email', $email);
        $this->db->where('user_type', $user_type);
        $query = $this->db->get('user_login_data');
        $row = ($query) ? $query->row_array() : false;
        $decrypt_db_pass = $this->encryption->decrypt($row['password']);
        if (($query->num_rows() == 1) && ($decrypt_db_pass === $password)) {
            $data = array(
                'last_activity' => $time
            );
            $this->db->where('email', $email);
            $this->db->where('user_type', $user_type);
            $this->db->update('user_login_data', $data);
            return $row['user_id'];
        } else {
            return false;
        }
    }
    public function add_email_verify($email,$verify_code,$user_type)
    {   
        $this->load->database();
        $data = array(
            'id' => 0,
            'user_type' => $user_type,
            'email' => $email,
            'code' => $verify_code
        );
        $this->db->insert('pending_verify', $data);
    }
    public function verify_email($email,$verify_code,$user_type)
    {   
        $this->load->database();
        $this->db->where('email', $email);
        $query = $this->db->get('pending_verify');
        $row = ($query) ? $query->row_array() : false;
        if($query->num_rows() > 0){
            if($row['code'] === $verify_code){
            $this->db->where('email', $email);
            $this->db->where('user_type', $user_type);
            $this->db->delete('pending_verify');
            }
        }
    }
}