<?php

class Jobs_model extends CI_model {
     public function __construct ()
     {
          $this->load->database();
     }

     public function get_summ($dbname)
     {
        $count = $this->db->count_all($dbname);
        return $count;
     }

     public function get_jobs($job_id = FALSE)
	{
        if ($job_id === FALSE)
        {
                $this->db->order_by("job_id","asc");
                $query = $this->db->get('jobs');
                return $query->result_array();
        }

        
        $query = $this->db->get_where('jobs', array('job_id' => $job_id));
        return $query->row_array();
	}
    //Get jobs by status
    
        public function set_jobs($job_id = FALSE)
    {
         $data = array(
            'job_id' => $job_id,
            'name' => $this->input->post('name'),            
            'street' => $this->input->post('street'),
            'townzip' => $this->input->post('townzip'),
            'phone' => $this->input->post('phone')
            );

        $this->db->where('job_id', $job_id);
        return $this->db->replace('jobs', $data, $job_id);
    }
    public function get_jobs_status($status)
    {
        $query = $this->db->get_where('jobs', array('status' => $status));
        return $query->result_array();
    }
}
