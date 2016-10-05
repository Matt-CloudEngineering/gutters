<?php
class Jobs extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Jobs_model');
                $this->load->helper('url_helper');
                $this->load->helper('html');

        }

        public function index($status=NULL)
        {

                $data['title'] = 'Jobs';

                $this->load->helper('form');
                $this->load->library('form_validation');

                $status= $this->input->post('status');

                $data['job'] = $this->Jobs_model->get_jobs_status($status);                
                $data['jobs_summ'] = $this->Jobs_model->get_summ('jobs');
                $data['summary'] = $this->Jobs_model->get_summ('custies');

                $this->load->view('templates/cheader', $data);
                $this->load->view('templates/nav', $data);
                $this->load->view('jobs/index', $data);
                $this->load->view('templates/footer');
        }
        public function view($slug = NULL)
        {
                $data['jobs_item'] = $this->Jobs_model->get_jobs($slug);
                $data['jobs_summ'] = $this->Jobs_model->get_summ('jobs');
                $data['summary'] = $this->Jobs_model->get_summ('jobs');

                if (empty($data['jobs_item']))
                {
                        show_404();
                }

                $data['title'] = $data['jobs_item']['cust_id'];

                $this->load->view('templates/cheader', $data);
                $this->load->view('templates/nav', $data);
                $this->load->view('jobs/view', $data);
                $this->load->view('templates/footer');
        }



        public function edit($slug = NULL)
        {
                $data['jobs_item'] = $this->Jobs_model->get_jobs($slug);
                $data['jobs_summ'] = $this->Jobs_model->get_summ('jobs');
                $data['summary'] = $this->Jobs_model->get_summ('jobs');

                if (empty($data['jobs_item']))
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
                       $data['title'] = $data['jobs_item']['name'];

                       $this->load->view('templates/cheader', $data);
                       $this->load->view('templates/nav', $data);
                       $this->load->view('jobs/edit', $data);
                       $this->load->view('templates/footer');

                }
                else 
                {
                        $this->Jobs_model->set_jobs($slug);

                        $this->load->view('templates/cheader', $data);
                        $this->load->view('templates/nav', $data);
                        $this->load->view('jobs/success');
                        $this->load->view('templates/footer');
                }



        }
        public function home()
        {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/nav', $data);
            $this->load->view('jobs/home'); 
            $this->load->view('templates/footer');

        }

        /*        public function customers()
                {
                        $data['jobs'] = $this->Jobs_model->get_jobs();
                        $data['jobs_summ'] = $this->Jobs_model->get_summ('jobs');
                        $data['title'] = 'jobs complete';
                        $data['summary'] = $this->Jobs_model->get_summ('jobs');
                        $data['jobs_item']['cust_id']=22;

                        
                        $this->load->view('templates/nav_li', $data);
                        $this->load->view('templates/header', $data);
                        $this->load->view('jobs/index', $data);
                        //$this->load->view('templates/footer');
                }*/
}