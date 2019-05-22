<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
		
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('Common_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }
	public function index()
	{
		$this->checkSession();
		
	}
	public function checkUser(){
		
		 $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		 $this->form_validation->set_rules('password', 'Password', 'required');
		 if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('login');
                }
                else
                {
                        $rs = $this->Common_model->getByCondition('admin',array('email'=>$this->input->post('email'),'password'=>md5($this->input->post('password'))));
                        if(empty($rs)){
                        	$this->session->set_userdata('error','Invalid credentials');
                        	$this->load->view('login');
                        }
                        else{
                        	$this->session->set_userdata('user_id',$rs[0]->id);
                        	$this->load->view('header');
                        	$this->load->view('dashboard');
                        	$this->load->view('footer');
                        }
                }
		
		
	}
	public function checkSession(){
		if(!$this->session->userdata('user_id')){
			
			$this->load->view('login');

		}
		else{
			$this->load->view('header');
            $this->load->view('dashboard');
            $this->load->view('footer');
		}
		
	}
	public function logout(){
		$this->session->sess_destroy();
		$this->load->view('login');
	}
	public function viewCustomer(){
		$rs['data'] = $this->Common_model->getAll('customer');
		$this->load->view('header');
		$this->load->view('customer_list',$rs);
		$this->load->view('footer');

	}
	public function addCustomer(){
		$this->load->view('header');
		$this->load->view('add_customer_form');
		$this->load->view('footer');
	}
	public function customerSubmit(){
		$rs = $this->Common_model->getByCondition('customer',array('mobile_no'=>$this->input->post('mobile_no')));
		if($rs){
			
			$this->session->set_flashdata('error', 'mobile no already exist');
			redirect("home/addCustomer");
		}
		else{
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$mobile = $this->input->post('mobile_no');
			$gender = $this->input->post('gender');
			$id = $this->Common_model->insert('customer',array('name'=>$name,'email'=>$email,'mobile_no'=>$mobile,'gender'=>$gender));
			$this->session->set_flashdata('success', 'record added successfully');
			redirect("home/addCustomer");
		}
		
	}
	public function deleteCustomer($id){
		$this->Common_model->delete('customer',array('id'=>$id));
		redirect("home/viewCustomer");
	}
	public function updateCustomer($id){
		$rs['data'] = $this->Common_model->getByCondition('customer',array('id'=>$id));
		$this->load->view('header');
		$this->load->view('update_customer_form',$rs);
		$this->load->view('footer');
	}
	public function updateCustomerSubmit(){
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$gender = $this->input->post('gender');
		$id = $this->input->post('id');
		$this->Common_model->updateWhere('customer',array('name'=>$name,'email'=>$email,'gender'=>$gender),array('id'=>$id));
		$this->session->set_flashdata('success', 'record updated successfully');
		redirect("home/updateCustomer/".$id);
	}
	public function services(){
		$rs['data'] = $this->Common_model->getAll('services');
		$this->load->view('header');
		$this->load->view('service_list',$rs);
		$this->load->view('footer');
	}
	public function addService(){
		$this->load->view('header');
		$this->load->view('add_service_form');
		$this->load->view('footer');
	}
	public function serviceSubmit(){
		
		
			$name = $this->input->post('name');
			$category = $this->input->post('category');
			$price = $this->input->post('price');
			
			$id = $this->Common_model->insert('services',array('name'=>$name,'category'=>$category,'price'=>$price));
			$this->session->set_flashdata('success', 'record added successfully');
			redirect("home/addService");
		
		
	}
	public function deleteService($id){
		$this->Common_model->delete('services',array('id'=>$id));
		redirect("home/services");
	}
	public function updateService($id){
		$rs['data'] = $this->Common_model->getByCondition('services',array('id'=>$id));
		$this->load->view('header');
		$this->load->view('update_service_form',$rs);
		$this->load->view('footer');
	}
	public function updateServiceSubmit(){
		$name = $this->input->post('name');
		$category = $this->input->post('category');
		$price = $this->input->post('price');
		$id = $this->input->post('id');
		$this->Common_model->updateWhere('services',array('name'=>$name,'category'=>$category,'price'=>$price),array('id'=>$id));
		$this->session->set_flashdata('success', 'record updated successfully');
		redirect("home/updateService/".$id);
	}
	public function customerDetail(){
		$this->load->view('header');
		$this->load->view('customer_search');
		$this->load->view('footer');
	}
	public function todayWork(){
		$mobile_no = $this->uri->segment(3);
		$rs['customer'] = $this->Common_model->getByCondition('customer',array('mobile_no'=>$mobile_no));
		$rs['services'] = $this->Common_model->getAll('services');
		$this->load->view('header');
		$this->load->view('today_work_form',$rs);
		$this->load->view('footer');
	}
	public function workSubmit(){
		$customer_id  = $this->input->post('customerid');
		$services_id = implode(',',$this->input->post('service'));
		$price = $this->input->post('price');
		$mobile = $this->input->post('mobile');
		if(!$price){
			$price = 0;
			$ss = $this->input->post('service');

			foreach ($ss as $key => $value) {
				$rs = $this->Common_model->getByCondition('services',array('id'=>$value));
				$price = $price+$rs[0]->price;
			}
		}
		$this->Common_model->insert('works',array('customer_id' => $customer_id,'services_id'=> $services_id,'price'=>$price,'mobile'=>$mobile));
		$this->session->set_flashdata('success','record added successfully');
		redirect("home/customerDetail");
	}
	public function search(){
		$rs['customer'] = $this->Common_model->getByCondition('customer',array('mobile_no'=>$this->input->post('mobile_no')));
		$rs['works'] = $this->Common_model->getByCondition('works',array('mobile'=>$this->input->post('mobile_no')));
		foreach ($rs['works'] as $key => $value) {
			$value->service_name = $this->Common_model->getServices('services',$value->services_id);
		}
		echo json_encode(array('status'=>true, 'data'=>$rs));
	}
	
}
