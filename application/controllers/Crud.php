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

    function edit($id = null)
    {
        $submit = $this->input->post('submit');
        if(isset($submit))
        {
            unset($_POST['submit']);

            $sparams['description'] = $this->input->post('description');
            $sparams['name'] = $this->input->post('name');
            $sparams['price'] = $this->input->post('price');
            $sparams['product_id'] = $this->input->post('product_id');

            $this->M_crud->add($sparams, $this->input->post('product_id'));
        }

        $arr= array('id' =>$id);
        $data['row'] = $this->M_crud->show($arr);
        $data['konten']='crud_edit';
        $this->load->view('crud_message',$data);
    }
    function delete($id)
    {
        $this->M_crud->delete($id);
        redirect('crud/index');
    }
}
