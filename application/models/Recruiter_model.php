<?php defined('BASEPATH') or exit('No direct script access allowed');
class Recruiter_model extends CI_Model{
    public function get_recruiter_data($user_id)
    {   
        $data = array();
        $this->load->database();
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('user_login_data');
        $row = ($query) ? $query->row_array() : false;
        if (($query->num_rows() > 0)) {
            $data['email'] = $row['email'];
        }
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('recruiter_data');
        $row = ($query) ? $query->row_array() : false;
        if (($query->num_rows() > 0)) {
            $data['image_url'] = $row['image_url'];
            $data['name'] = $row['name'];
            $data['phone'] = $row['phone'];
            $data['company_name'] = $row['company_name'];
            $data['company_type'] = $row['company_type'];
            $data['company_url'] = $row['company_url'];
            $data['company_description'] = $row['company_description'];
        }  
        return $data;
    }
    public function update_profile($user_id)
    {   
        $image_url=strip_tags(trim($this->input->post('rimage_url')));
        $name=strip_tags(trim($this->input->post('rname')));
        $phone=strip_tags(trim($this->input->post('rphone')));
        $companyname=strip_tags(trim($this->input->post('companyname')));
        $companytype=strip_tags(trim($this->input->post('companytype')));
        $companyurl=strip_tags(trim($this->input->post('companyurl')));
        $companydescription=strip_tags(trim($this->input->post('companydescription')));
        $data = array(
            'image_url' => $image_url,
            'name' => $name,
            'phone' => $phone,
            'company_name' => $companyname,
            'company_type' => $companytype,
            'company_url' => $companyurl,
            'company_description' => $companydescription

        );
        $this->load->database();
        $this->db->where('user_id', $user_id);
        $this->db->update('recruiter_data', $data);
        return true;
    }
    public function submit_job($user_id)
    {   $this->load->database();
        $this->load->helper('string');
        $job_id=random_string('alnum',5);
        $time=time();
        $jobtitle=strip_tags(trim($this->input->post('jobtitle')));
        $location=strip_tags(trim($this->input->post('location')));
        $experience=strip_tags(trim($this->input->post('experience')));
        $skills=strip_tags(trim($this->input->post('skills')));
        $jobdescription=$this->input->post('jobdescription');
        $jobtype=strip_tags(trim($this->input->post('job_type')));
        $deadline=strtotime(strip_tags(trim($this->input->post('app_deadline'))));
        $data = array(
            'id' => 0,
            'user_id' => $user_id,
            'job_id' => $job_id,
            'job_title' => $jobtitle,
            'location' => $location,
            'experience' => $experience,
            'skills' => $skills,
            'job_description' => $jobdescription,
            'job_type' => $jobtype,
            'posted_on' => $time,
            'application_deadline' => $deadline,
        );
        $this->db->insert('jobs', $data);
        return true;
    }

    public function get_job_by_userid($user_id)
    {   $this->load->database();
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('jobs');
        return $query->result();
    }

    public function get_job_data($user_id,$job_id)
    {   $this->load->database();
        $this->db->where('user_id', $user_id);
        $this->db->where('job_id', $job_id);
        $query = $this->db->get('jobs');
        $row = ($query) ? $query->row_array() : false;
        if (($query->num_rows() > 0)) {
            $data['job_title'] = $row['job_title'];
            $data['location'] = $row['location'];
            $data['experience'] = $row['experience'];
            $data['skills'] = $row['skills'];
            $data['job_type'] = $row['job_type'];
            $data['job_description'] = $row['job_description'];
            $data['app_deadline'] = $row['application_deadline'];
        }  
        return $data;
    }

    public function update_job($user_id,$job_id)
    {   
        $jobtitle=strip_tags(trim($this->input->post('jobtitle')));
        $location=strip_tags(trim($this->input->post('location')));
        $experience=strip_tags(trim($this->input->post('experience')));
        $skills=strip_tags(trim($this->input->post('skills')));
        $jobdescription=$this->input->post('jobdescription');
        $jobtype=strip_tags(trim($this->input->post('job_type')));
        $deadline=strtotime(strip_tags(trim($this->input->post('app_deadline'))));
        $data = array(
            'job_title' => $jobtitle,
            'location' => $location,
            'experience' => $experience,
            'skills' => $skills,
            'job_description' => $jobdescription,
            'job_type' => $jobtype,
            'application_deadline' => $deadline
        );
        $this->load->database();
        $this->db->where('user_id', $user_id);
        $this->db->where('job_id', $job_id);
        $this->db->update('jobs', $data);
        return true;
    }

    public function get_application($user_id,$job_id)
    {   $this->load->database();
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('candidate_data');
        $data['user_data'] = $query->result();
        $this->db->where('job_id', $job_id);
        $query = $this->db->get('jobs');
        $data['job_data'] = $query->result();
        return $data;
    }

    public function reject_application($user_id,$job_id)
    {   $this->load->database();
        $this->db->where('user_id',$user_id);
        $this->db->where('job_id',$job_id);
        $this->db->delete('apply_job');
        return true;
    }
    
    public function get_job_applicants($user_id)
    {   $this->load->database();
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('jobs');
        $i = 0;
        $j = 0;
        $data = array();
        $row = ($query) ? $query->row_array() : false;
        if (($query->num_rows() > 0)) {
            foreach ($query->row_array() as $job_id){
                $this->db->where('job_id', $job_id);
                $query2 = $this->db->get('apply_job');
                $row2 = ($query2) ? $query2->row_array() : false;
                if (($query2->num_rows() > 0)) {
                    $this->db->where('job_id', $job_id);
                    $query4 = $this->db->get('jobs');
                    $data[$i]['job_details1'] = $query4->result();
                    $data[$i]['job_details'] = $query2->result();
                    foreach ($query2->row_array() as $user_id){
                    $this->db->where('user_id', $user_id);
                    $query3 = $this->db->get('candidate_data');
                    $row3 = ($query3) ? $query3->row_array() : false;
                    if (($query3->num_rows() > 0)) {
                    $data[$j]['candidate_details'] = $query3->result();
                    $j++;
                    }
                    }
                    $i++;
                } 
            }
        }  
        if($data != null){
        return $data;
        }
        else return null;
    }
    public function get_applicants($user_id,$job_id)
    {   $this->load->database();
        $this->db->where('job_id', $job_id);
        $query2 = $this->db->get('apply_job');
        $data = array();
        if (($query2->num_rows() > 0)) {
            for($i=0;$i<$query2->num_rows();$i++){
            $this->db->where("user_type", "emp");
            $this->db->order_by("last_activity", "desc");
            $query6 = $this->db->get('user_login_data');
            $userid = $query6->result()[$i]->user_id;
            $this->db->where('user_id', $userid);
            $query3 = $this->db->get('candidate_data');
            if (($query3->num_rows() > 0)) {
            $data[$i] = $query3->result();
            }
            }
        }
        if($data != null){
        return $data;
        }
        else return null;
    }
    public function get_stats($user_id)
    {   
        $this->load->database();
        $this->db->select('count(*) as job_post');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('jobs');
        $data['jobs_posted'] = $query->result();
        $this->db->select('distinct(job_title) as job_categories');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('jobs');
        $data['jobs_categories'] = $query->num_rows();
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('jobs');
        $data['applicants'] = 0;
        if($query->num_rows() > 0){
            foreach($query->row_array() as $job_id){
                $this->db->select('count(*) as applicants');
                $this->db->where('job_id', $job_id);
                $query1 = $this->db->get('apply_job');
                if (($query1->num_rows() > 0)) {
                $data['applicants'] += $query1->result()[0]->applicants;
                }
                }
        }
        return $data;
    }
    public function delete_job($user_id,$job_id)
    {   
        $this->load->database();
        $this->db->where('user_id', $user_id);
        $this->db->where('job_id', $job_id);
        $this->db->delete('jobs');
        return true;
    }
}
?>