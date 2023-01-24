<?php defined('BASEPATH') or exit('No direct script access allowed');

class Candidate_model extends CI_Model{
    public function get_candidate_data($user_id)
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
        $query = $this->db->get('candidate_data');
        $row = ($query) ? $query->row_array() : false;
        if (($query->num_rows() > 0)) {
            $data['image_url'] = $row['image_url'];
            $data['resume_url'] = $row['resume_url'];
            $data['name'] = $row['name'];
            $data['phone'] = $row['phone'];
            $data['role'] = $row['role'];
            $data['location'] = $row['location'];
            $data['experience'] = $row['experience'];
            if($row['company'] != null){
                $data['company'] = $row['company'];
                $data['current_role'] = $row['current_role'];
                $data['current_company_type'] = $row['current_company_type'];
            }else{
                    $data['company'] = "";
                    $data['current_role'] =  "";
                    $data['current_company_type'] = "";
            }
            if($row['linkedin'] != null){
                $data['linkedin'] = $row['linkedin'];
            }else{
                $data['linkedin'] = "";
            }
        }  
        return $data;
    }
    public function get_recruiter_data($job_id)
    {   
        $data = array();
        $this->load->database();
        $this->db->where('job_id', $job_id);
        $query = $this->db->get('jobs');
        $row = ($query) ? $query->row_array() : false;
        if (($query->num_rows() > 0)) {
            $user_id = $query->result()[0]->user_id;
            $this->db->where('user_id', $user_id);
            $query = $this->db->get('recruiter_data');
            $row = ($query) ? $query->row_array() : false;
            if (($query->num_rows() > 0)) {
                $data['company'] = $query->result()[0]->company_name;
            }
        }  
        return $data;
    }
    public function update_profile($user_id)
    {   
        $image_url=strip_tags(trim($this->input->post('image_url')));
        $resume_url=strip_tags(trim($this->input->post('resume_url')));
        $name=strip_tags(trim($this->input->post('name')));
        $phone=strip_tags(trim($this->input->post('phone')));
        $role=strip_tags(trim($this->input->post('role')));
        $location=strip_tags(trim($this->input->post('location')));
        $experience=strip_tags(trim($this->input->post('experience')));
        $phone=strip_tags(trim($this->input->post('phone')));
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
            'image_url' => $image_url,
            'resume_url' => $resume_url,
            'name' => $name,
            'phone' => $phone,
            'linkedin' => $linkedin,
            'location' => $location,
            'company' => $company,
            'experience' => $experience,
            'current_role' => $current_role,
            'current_company_type'=> $current_company_type
        );
        $this->load->database();
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->update('candidate_data', $data);
        return true;
    }
    public function check_if_applied($job_id,$user_id)
    {   $this->load->database();
        $this->db->where('user_id',$user_id);
        $this->db->where('job_id',$job_id);
        $query = $this->db->get('apply_job');
        $row = ($query) ? $query->row_array() : false;
        if (($query->num_rows() > 0)) {
        return 1;
        }
        else {
            return 0;
        }
    }
    public function get_job_data($job_id)
    {   $this->load->database();
        $this->db->where('job_id', $job_id);
        $query = $this->db->get('jobs');
        $userid = $query->result()[0]->user_id;
        $row = ($query) ? $query->row_array() : false;
        if (($query->num_rows() > 0)) {
            $data['job_id'] = $row['job_id'];
            $data['job_title'] = $row['job_title'];
            $data['location'] = $row['location'];
            $data['experience'] = $row['experience'];
            $data['skills'] = $row['skills'];
            $data['job_type'] = $row['job_type'];
            $data['job_description'] = $row['job_description'];
            $data['app_deadline'] = $row['application_deadline'];
        }  
        $this->db->where('user_id',$userid);
        $query = $this->db->get('recruiter_data');
        $row = ($query) ? $query->row_array() : false;
        if (($query->num_rows() > 0)) {
            $data['company_name'] = $row['company_name'];
            $data['company_type'] = $row['company_type'];
            $data['company_url'] = $row['company_url'];
            $data['company_description'] = $row['company_description'];
        }  
        return $data;
    }

    public function get_jobs_data()
    {   $this->load->database();
        $query = $this->db->get('jobs');
        $data = $query->result();  
        return $data;
    }
    public function apply_job($job_id,$user_id)
    {   $this->load->database();
        $this->db->where('user_id',$user_id);
        $this->db->where('job_id',$job_id);
        $query = $this->db->get('apply_job');
        $row = ($query) ? $query->row_array() : false;
        if (($query->num_rows() == 0)) {
        $data = array(
            'id' => 0,
            'user_id' => $user_id,
            'job_id' => $job_id,
        );
        $this->db->insert('apply_job', $data);
        return true;
        }
        else return false;
    }
    public function get_applied_job_data($user_id)
    {   $this->load->database();
        $this->db->where('user_id',$user_id);
        $query = $this->db->get('apply_job');
        $applied_data = array();
        $num_rows = $query->num_rows();
        if($query->num_rows() > 0){
            for($i=0;$i<$num_rows;$i++){
                $job_id = $query->result()[$i]->job_id;
                $this->db->where('job_id',$job_id);
                $query1 = $this->db->get('jobs');
               $applied_data[$i] = $query1->result();
            }
        return $applied_data;
        }
        else return null;
    }
    public function get_stats($user_id)
    {   
        $this->load->database();
        $this->db->select('count(*) as job_applied');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('apply_job');
        $data['job_applied'] = $query->result();
        $this->load->database();
        $applied_data = array();
        $this->db->where('user_id',$user_id);
        $query = $this->db->get('candidate_data');
        $row_array = $query->row_array();
        $role = $row_array['role'];
        $experience = $row_array['experience'];
        $location = $row_array['location'];
        $location1 = str_replace(" ","",$location);
        $location1 = explode(",",$location1);
        $experience1=$experience+3;

        //Most Preferred Jobs --
        $this->db->where('experience BETWEEN 0 AND '.$experience.'', NULL, FALSE );
        $this->db->group_start()
        ->like('job_title',$role)
        ->or_like('job_description',$role)
        ->group_end();
        $this->db->like('location',$location);
        if(!empty($row_array['current_company_type'])){
            $current_company_type = $row_array['current_company_type'];
            $que = $this->db->query("SELECT * FROM recruiter_data WHERE company_type = '$current_company_type'");
            if($que->num_rows()>0){
            $query1 = $this->db->get('jobs');
            $applied_data0 = $query1->result();
            }
            else{
            $applied_data0 = array();
            }
        }else{
            $query1 = $this->db->get('jobs');
            $applied_data0 = $query1->result();
        }

        //Other Suggestions -- 
        if($query1->num_rows()>0){
        foreach($query1->result() as $prefer){
        $this->db->where('job_id !=',$prefer->job_id);
        }
        }
        $this->db->group_start()
        ->where('experience BETWEEN  0 AND '.$experience1.'', NULL, FALSE )
        ->group_end();
        $this->db->group_start()
        ->like('job_title',$role)
        ->or_like('job_description',$role)
        ->group_end();
        $this->db->group_start()->like('location',$location1[0]);
        if(count($location1)>1){
            for($i=1;$i<count($location1);$i++){
                $this->db->or_like('location',$location1[$i]);
            }
        }
        $this->db->group_end();
        $query2 = $this->db->get('jobs');
        $applied_data1 = $query2->result();
        $applied_data['data'] = array_merge($applied_data0,$applied_data1); 
        $data['job_preffered'] = count($applied_data0);
        return $data;
    }
    public function disapply_job($job_id,$user_id)
    {   $this->load->database();
        $this->db->where('user_id',$user_id);
        $this->db->where('job_id',$job_id);
        $this->db->delete('apply_job');
        return true;
    }
    public function get_jobs()
    {   
        $data = array();
        $this->load->database();
        $this->db->order_by("id", "desc");
        $query1 = $this->db->get('jobs');
        $num_jobs = $query1->num_rows();
        $data = $query1->result();
        $new_arr = array();
        $count = 0;
        if(!empty($data)){
            $return_array['show_text'] = 0;  
            for($i=0;$i<$query1->num_rows();$i++){    
                $new_arr[$count] = $query1->result()[$i];
                $count++; 
            } 
        }
        else $return_array['show_text'] = 1;
        $return_array['data'] = $new_arr;
        return $return_array;
    }
    
    public function search_jobs($user_id)
    {   $this->load->database();
        if(($this->input->post('companytype') != null)&&($this->input->post('jobtype') != null)&&($this->input->post('location') != null)&&($this->input->post('keyword') != null)){
            $company_type=strip_tags(trim($this->input->post('companytype')));
            $job_type=strip_tags(trim($this->input->post('jobtype'))); 
            $location=strip_tags(trim($this->input->post('location')));  
            $keyword=strip_tags(trim($this->input->post('keyword')));  
            $que = $this->db->query("SELECT * FROM recruiter_data WHERE company_type = '$company_type'");
            if($que->num_rows()>0){
            $this->db->where('job_type',$job_type);   
            $this->db->like('location',$location);  
            $this->db->group_start()
            ->like('job_title',$keyword)
            ->or_like('job_description',$keyword)
            ->group_end();
            $query11 = $this->db->get('jobs');
            $data_search['all'] = $query11->result();
            }
            else{
            $data_search['all'] = array();
            }
        }
        else if(($this->input->post('companytype') != null)&&($this->input->post('jobtype') == null)&&($this->input->post('location') == null)&&($this->input->post('keyword') == null)){
            $company_type=strip_tags(trim($this->input->post('companytype')));    
            $this->db->select('user_id');
            $this->db->like('company_type',$company_type);
            $query9 = $this->db->get('recruiter_data');
            $num_rows = $query9->num_rows();
            $flag = 0;
            for($i=0;$i<$num_rows;$i++){
                $this->db->where('user_id',$query9->result()[$i]->user_id);
                $query = $this->db->get('jobs');
                if(!empty($query)){
                    $data_search['ctype'][$i]=$query->result();
                }else $flag = 1;
            }  
            if($flag == 1){
                 $data_search['ctype']=array();
            }          
        }
        else if(($this->input->post('companytype') == null)&&($this->input->post('jobtype') != null)&&($this->input->post('location') == null)&&($this->input->post('keyword') == null)){
            $job_type=strip_tags(trim($this->input->post('jobtype')));    
            $this->db->like('job_type',$job_type);
            $query1 = $this->db->get('jobs');
            if(!empty($query1)){
                $data_search['jtype']=$query1->result();
            }
            else $data_search['jtype']=array();
            }
            
        else if(($this->input->post('companytype') == null)&&($this->input->post('jobtype') == null)&&($this->input->post('location') != null)&&($this->input->post('keyword') == null)){
            $location=strip_tags(trim($this->input->post('location')));    
            $this->db->like('location',$location);
            $query2 = $this->db->get('jobs');
            if(!empty($query2)){
                $data_search['location']=$query2->result();
            }
            else $data_search['location']=array();
            }
        else if(($this->input->post('companytype') == null)&&($this->input->post('jobtype') == null)&&($this->input->post('location') == null)&&($this->input->post('keyword') != null)){
            $keyword=strip_tags(trim($this->input->post('keyword')));    
            $this->db->like('job_title',$keyword);
            $this->db->or_like('job_description',$keyword);
            $query3 = $this->db->get('jobs');
            if(!empty($query3)){
                $data_search['keyword']=$query3->result();
            }
            else $data_search['keyword']=array();
            }
        else{
            if($this->input->post('companytype') != null){
                $company_type=strip_tags(trim($this->input->post('companytype')));
                $que = $this->db->query("SELECT user_id FROM recruiter_data WHERE company_type = '$company_type'");
                if($que->num_rows()>0){
                    $use_id = $que->result()[0]->user_id;
                    if($this->input->post('jobtype') != null){
                        $job_type=strip_tags(trim($this->input->post('jobtype'))); 
                        $this->db->where('job_type',$job_type);
                        } 
                        if($this->input->post('location') != null){
                        $location=strip_tags(trim($this->input->post('location'))); 
                        $this->db->like('location',$location);  
                        }
                        if($this->input->post('keyword') != null){
                        $keyword=strip_tags(trim($this->input->post('keyword'))); 
                        $this->db->group_start()
                        ->like('job_title',$keyword)
                        ->or_like('job_description',$keyword)
                        ->group_end();
                        }
                        $this->db->where('user_id',$use_id);
                    $query11 = $this->db->get('jobs');
                    $data_search['leftovers'] = $query11->result();
                    }
                    else{
                    $data_search['leftovers'] = array();
                    }
            }else{
                    if($this->input->post('jobtype') != null){
                    $job_type=strip_tags(trim($this->input->post('jobtype'))); 
                    $this->db->where('job_type',$job_type);
                    } 
                    if($this->input->post('location') != null){
                    $location=strip_tags(trim($this->input->post('location'))); 
                    $this->db->like('location',$location);  
                    }
                    if($this->input->post('keyword') != null){
                    $keyword=strip_tags(trim($this->input->post('keyword'))); 
                    $this->db->group_start()
                    ->like('job_title',$keyword)
                    ->or_like('job_description',$keyword)
                    ->group_end();
                    }
                    $query12 = $this->db->get('jobs');
                    $data_search['leftovers'] = $query12->result();
            }
        }    

        $new_arr = array();
        $count = 0;
        $return_array['show_text'] = null;
        if(($this->input->post('companytype') != null)&&($this->input->post('jobtype') != null)&&($this->input->post('location') != null)&&($this->input->post('keyword') != null)){
            if(!empty($data_search['all'])){
                if(($return_array['show_text']==null))
                $return_array['show_text'] = 0;  
                for($i=0;$i<count($data_search['all']);$i++){    
                    $new_arr[$count] = $data_search['all'][$i];
                    $count++;    
                }  
            }
            else {
                if(($return_array['show_text']==null))
                $return_array['show_text'] = 1;
            }
        }
        else if(($this->input->post('companytype') != null)&&($this->input->post('jobtype') == null)&&($this->input->post('location') == null)&&($this->input->post('keyword') == null)){
            if(!empty($data_search['ctype'])){
                if(($return_array['show_text']==null))
                $return_array['show_text'] = 0;  
                for($i=0;$i<count($data_search['ctype']);$i++){    
                    for($j=0;$j<count($data_search['ctype'][$i]);$j++){
                        $new_arr[$count] = $data_search['ctype'][$i][$j];
                        $count++;
                    }    
                } 
            }
            else {
                if(($return_array['show_text']==null))
                $return_array['show_text'] = 1;
            }
        }
        else if(($this->input->post('companytype') == null)&&($this->input->post('jobtype') != null)&&($this->input->post('location') == null)&&($this->input->post('keyword') == null)){
            if(!empty($data_search['jtype'])){
                if(($return_array['show_text']==null))
                $return_array['show_text'] = 0; 
                for($i=0;$i<count($data_search['jtype']);$i++){    
                    $new_arr[$count] = $data_search['jtype'][$i];
                    $count++;    
                } 
            }
            else {
                if(($return_array['show_text']==null))
                $return_array['show_text'] = 1;
            }
        }
        else if(($this->input->post('companytype') == null)&&($this->input->post('jobtype') == null)&&($this->input->post('location') != null)&&($this->input->post('keyword') == null)){ 
            if(!empty($data_search['location'])){    
                if(($return_array['show_text']==null))
                $return_array['show_text'] = 0;  
                for($i=0;$i<count($data_search['location']);$i++){    
                    $new_arr[$count] = $data_search['location'][$i];
                    $count++;    
                }
            }
            else {
                if(($return_array['show_text']==null))
                $return_array['show_text'] = 1;
            }   
        }
        else if(($this->input->post('companytype') == null)&&($this->input->post('jobtype') == null)&&($this->input->post('location') == null)&&($this->input->post('keyword') != null)){  
            if(!empty($data_search['keyword'])){  
                if(($return_array['show_text']==null))
                $return_array['show_text'] = 0;   
                for($i=0;$i<count($data_search['keyword']);$i++){    
                    $new_arr[$count] = $data_search['keyword'][$i];
                    $count++;    
                }
            }
            else {
                if(($return_array['show_text']==null))
                $return_array['show_text'] = 1;
            }      
        }
        else{
            if(!empty($data_search['leftovers'])){  
                if(($return_array['show_text']==null))
                $return_array['show_text'] = 0;   
                for($i=0;$i<count($data_search['leftovers']);$i++){    
                    $new_arr[$count] = $data_search['leftovers'][$i];
                    $count++;    
                }
            }
            else {
                if(($return_array['show_text']==null))
                $return_array['show_text'] = 1;
            }
        }    
        $new_array1 = array_unique($new_arr,SORT_REGULAR);
        $return_array['data'] = array_values($new_array1);
        if(!empty($return_array))
        return $return_array;
        else return null;
    }

    public function preferred_jobs($user_id)
    {   $this->load->database();
        $applied_data = array();
        $this->db->where('user_id',$user_id);
        $query = $this->db->get('candidate_data');
        $row_array = $query->row_array();
        $role = $row_array['role'];
        $experience = $row_array['experience'];
        $location = $row_array['location'];
        $location1 = str_replace(" ","",$location);
        $location1 = explode(",",$location1);
        $experience1=$experience+3;

        //Most Preferred Jobs --
        $this->db->where('experience BETWEEN 0 AND '.$experience.'', NULL, FALSE );
        $this->db->group_start()
        ->like('job_title',$role)
        ->or_like('job_description',$role)
        ->group_end();
        $this->db->like('location',$location);
        if(!empty($row_array['current_company_type'])){
            $current_company_type = $row_array['current_company_type'];
            $que = $this->db->query("SELECT * FROM recruiter_data WHERE company_type = '$current_company_type'");
            if($que->num_rows()>0){
            $query1 = $this->db->get('jobs');
            $applied_data0 = $query1->result();
            }
            else{
            $applied_data0 = array();
            }
        }else{
            $query1 = $this->db->get('jobs');
            $applied_data0 = $query1->result();
        }

        //Other Suggestions -- 
        if($query1->num_rows()>0){
        foreach($query1->result() as $prefer){
        $this->db->where('job_id !=',$prefer->job_id);
        }
        }
        $this->db->group_start()
        ->where('experience BETWEEN  0 AND '.$experience1.'', NULL, FALSE )
        ->group_end();
        $this->db->group_start()
        ->like('job_title',$role)
        ->or_like('job_description',$role)
        ->group_end();
        $this->db->group_start()->like('location',$location1[0]);
        if(count($location1)>1){
            for($i=1;$i<count($location1);$i++){
                $this->db->or_like('location',$location1[$i]);
            }
        }
        $this->db->group_end();
        $query2 = $this->db->get('jobs');
        $applied_data1 = $query2->result();
        $applied_data['data'] = array_merge($applied_data0,$applied_data1); 
        $applied_data['suggestion_count'] = $query1->num_rows();
        if($applied_data != null)
        return $applied_data;
        else return null;
    }
    
}
?>