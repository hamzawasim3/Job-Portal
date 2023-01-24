<?php defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model{
    public function get_stats($user_id)
    {   
        $data = array();
        $this->load->database();
        $this->db->order_by("id", "desc");
        $query1 = $this->db->get('jobs');
        $num_jobs = $query1->num_rows();
        $data['jobs'] = $query1->result();
        $this->db->select('count(*) as job_count');
        $query = $this->db->get('jobs');
        $data['no_of_jobs'] = $query->result();
        if($user_id != null){
        $this->db->not_like('user_id',$user_id);
        $query = $this->db->get('recruiter_data');
        $data['companies'] = $query->result();
        }
        for($i=0;$i<$num_jobs;$i++){
        $userid = $query1->result()[$i]->user_id;
        $this->db->where('user_id',$userid);
        $query3 = $this->db->get('recruiter_data');    
        $data['company'][$i] = $query3->result();
        }
        $this->db->select('count(*) as recruiter_count');
        $query = $this->db->get('recruiter_data');
        $data['recruiter_registered'] = $query->result();
        $this->db->select('count(*) as candidate_count');
        $query = $this->db->get('candidate_data');
        $data['candidate_registered'] = $query->result();
        return $data;
    }
}    