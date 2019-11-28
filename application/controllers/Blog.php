<?php

defined('BASEPATH') OR exit('No direct script access allowed');


Class Blog extends CI_Controller{

function __construct(){
  parent:: __construct();
  $this->load->model('blog_m', 'm');
}

  function index(){
    $data['blogs'] = $this->m->getBlog();
    $this->load->view('layout/header');
    $this->load->view('blog/index', $data);
    $this->load->view('layout/footer');
  }

  public function add(){
    $this->load->view('layout/header');
    $this->load->view('blog/add');
    $this->load->view('layout/footer');
  }


  public function submit(){
    $result = $this->m->submit();
    if($result){
      $this->session->set_flashdata('success_msg', 'Record added successfully');
    }else{
      $this->session->set_flashdata('error_msg', 'Fail to add Record');
    }
    redirect(base_url('blog/index'));
  }


  public function edit($id){
    $data['blog'] = $this->m->getBlogById($id);
    $this->load->view('layout/header');
    $this->load->view('blog/edit', $data);
    $this->load->view('layout/footer');
  }
 
  public function update()
  {
   $result = $this->m->update();
   if($result){
    $this->session->set_flashdata('success_msg', 'Record Update successfully');
  }else{
    $this->session->set_flashdata('error_msg', 'Fail to Update Record');
  }
   redirect(base_url('blog/index'));  
  }

  public function delete($id)
  {
   $result = $this->m->delete($id);
   redirect(base_url('blog/index'));
   if($result){
    $this->session->set_flashdata('success_msg', 'Record Deleted successfully');
  }else{
    $this->session->set_flashdata('error_msg', 'Fail to Delete Record');
  }


  }






}  // end

?>