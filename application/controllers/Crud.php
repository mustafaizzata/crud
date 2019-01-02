<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_crud');
    }

    public function index()
    {
        $data['query'] = $this->M_crud->show();
        $data['konten']= 'crud_product';
        $this->load->view('crud_message', $data);
    }

    function add()
    {
        $submit = $this->input->post('submit');
        if(isset($submit))
        {
            unset($_POST['submit']);
            $this->M_crud->add($this->input->post());
        }
        $data['konten']='input_data';
        $this->load->view('crud_message', $data);
    }

	
}
