<?php
class Custies extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Custies_model');
                $this->load->helper('url_helper');
                $this->load->helper('html');

        }

        public function index()
        {
                $data['title'] = 'Customers';

                $data['custies'] = $this->Custies_model->get_custies();
                
                $data['jobs_summ'] = $this->Custies_model->get_summ('jobs');
                $data['summary'] = $this->Custies_model->get_summ('custies');
            //    $data['custies_item']['cust_id']=22;

                
/*                $this->load->view('templates/nav_li', $data);
                $this->load->view('templates/header', $data);
                $this->load->view('custies/index');*/

                $this->load->view('templates/cheader', $data);
                $this->load->view('templates/nav', $data);
                $this->load->view('custies/index', $data);
                $this->load->view('templates/footer');
        }
        public function view($slug = NULL)
        {
                $data['custies_item'] = $this->Custies_model->get_custies($slug);
                $data['job'] = $this->Custies_model->get_cust_jobs($slug);
                $data['jobs_summ'] = $this->Custies_model->get_summ('jobs');
                $data['summary'] = $this->Custies_model->get_summ('custies');

                $this->load->helper('form');
                $this->load->library('form_validation');

                if (empty($data['custies_item']))
                {
                        show_404();
                }

                $data['title'] = $data['custies_item']['name'];

                $this->load->view('templates/cheader', $data);
                $this->load->view('templates/nav', $data);
                $this->load->view('custies/edit', $data);

                $this->load->view('jobs/jobsby_cust', $data);

                $this->load->view('templates/footer');
        }



        public function edit($slug = NULL)
        {
                $data['custies_item'] = $this->Custies_model->get_custies($slug);
                $data['jobs_summ'] = $this->Custies_model->get_summ('jobs');
                $data['summary'] = $this->Custies_model->get_summ('custies');

                if (empty($data['custies_item']))
                {
                        show_404();
                }

                $this->load->helper('form');
                $this->load->library('form_validation');

                $this->form_validation->set_rules('name','Name','required');
                $this->form_validation->set_rules('street','Street','required');
                $this->form_validation->set_rules('townzip','Townzip','required');

                if ($this->form_validation->run() === FALSE)

                {
                       $data['title'] = $data['custies_item']['name'];

                       $this->load->view('templates/cheader', $data);
                       $this->load->view('templates/nav', $data);
                       $this->load->view('custies/edit', $data);
                       $this->load->view('templates/footer');

                }
                else 
                {
                        

                        $result1 = $this->Custies_model->set_custies($slug);
                        if($result1 === false)
                        {
                            $data['error']= $this->db->error_message();
                            $data['err_no']= $this->db->error_number();

                          $this->load->view('templates/cheader', $data);
                          $this->load->view('templates/nav', $data);
                          $this->load->view('templates/failure', $data);
                          $this->load->view('templates/footer');              
                          //and/or log the error message/ number 
                        }
                        else  //succesfull uipdate
                        {

                            $this->load->view('templates/cheader', $data);
                            $this->load->view('templates/nav', $data);
                            $this->load->view('custies/success');
                            $this->load->view('templates/footer');
                        }
                }



        }

        public function newq($slug = NULL)
        {

            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('name','Name','required');
            $this->form_validation->set_rules('street','Street','required');
            $this->form_validation->set_rules('townzip','Townzip','required');

            if ($this->form_validation->run() === FALSE)
            {
                $data['title'] = "Add New Customers";


                $this->load->view('templates/header', $data);
                $this->load->view('templates/nav', $data);
                $this->load->view('custies/new');
                $this->load->view('templates/footer');
            }
        }


        public function search($slug = NULL)
        {
                $data = array(
                    'name' => $this->input->post('name'),
                    'street' => $this->input->post('street'),
                    'phone' => $this->input->post('phone'),
                    'townzip' => $this->input->post('townzip')
                    );

                $data['title'] = "Search";
                $data['jobs_summ'] = $this->Custies_model->get_summ('jobs');
                $data['summary'] = $this->Custies_model->get_summ('custies');

                $this->load->helper('form');

                if ($data['name'] === NUll and $data['street'] === NUll and $data['townzip'] === NUll and $data['phone'] === NULL)
                {

                    $this->load->view('templates/cheader', $data);
                    $this->load->view('templates/nav', $data);
                    $this->load->view('custies/search', $data);
                    $this->load->view('templates/footer');
                }

                else
                
                {
                    $data['custies'] = $this->Custies_model->find_cust($data);
                    
                    $this->load->view('templates/cheader', $data);
                    $this->load->view('templates/nav', $data);
                    $this->load->view('custies/search', $data);
                    $this->load->view('custies/results', $data);
                    $this->load->view('templates/footer');
                }

                
        }

}