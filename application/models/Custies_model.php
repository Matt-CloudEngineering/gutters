<?php

class Custies_model extends CI_model {
     public function __construct ()
     {
          $this->load->database();
     }

     public function get_summ($dbname)
     {
        $count = $this->db->count_all($dbname);
        return $count;
     }

     public function get_custies($cust_id = FALSE)
	{
        if ($cust_id === FALSE)
        {
                $this->db->order_by("name","asc");
                $query = $this->db->get('custies');
                return $query->result_array();
        }

        
        $query = $this->db->get_where('custies', array('cust_id' => $cust_id));
        return $query->row_array();
	}
    public function set_custies($cust_id = FALSE)
    {
         $data = array(
            'cust_id' => $cust_id,
            'name' => $this->input->post('name'),            
            'street' => $this->input->post('street'),
            'townzip' => $this->input->post('townzip'),
            'phone' => $this->input->post('phone')
            );


        $query_result = $this->db->insert('custies', $data);

          if(!$query_result) {
             $this->error = $this->db->_error_message();
             $this->errorno = $this->db->_error_number();
             return false;
          }

        return $query_result;
    }

    public function new_custies($cust_id = FALSE)
    {
         $data = array(
            'cust_id' => $cust_id,
            'name' => $this->input->post('name'),            
            'street' => $this->input->post('street'),
            'townzip' => $this->input->post('townzip'),
            'phone' => $this->input->post('phone')
            );


        $query_result = $this->db->insert('custies', $data);

          if(!$query_result) {
             $this->error = $this->db->_error_message();
             $this->errorno = $this->db->_error_number();
             return false;
          }

        return $query_result;
    }

    //Get jobs for the customer id given
    public function get_cust_jobs($cust_id=FALSE)
    {
        $status= $this->input->post('status');
        
        $query = $this->db->get_where('jobs', array('cust_id' => $cust_id));
        return $query->result_array();
    }

    //Search customer database using any
    public function find_cust()
    {
        $data = array(
           'name' => $this->input->post('name'),            
           'street' => $this->input->post('street'),
           'townzip' => $this->input->post('townzip'),
           'phone' => $this->input->post('phone')
           );

        
        $this->db->select('*');
        $this->db->from('custies');
        $this->db->like($data);

        return $this->db->get()->result_array();
        //return $this->db->get_compiled_select();

    }
}
