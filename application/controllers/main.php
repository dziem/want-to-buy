<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Main extends CI_Controller {	

	function __construct(){
		parent::__construct();
		$this->load->model('model');
		$this->load->helper('url');
	}
	
	public function index(){
		$data['fashion'] = $this->model->home_offer('Fashion');
		$data['gadget'] = $this->model->home_offer('Gadget');
		$data['appliances'] = $this->model->home_offer('Appliances');
		$data['art'] = $this->model->home_offer('Art');
		$this->load->view('home.php',$data);
	}
	
	public function register(){
		$this->load->view('register.php');
	}
	
	public function login(){
		$this->load->view('login.php');
	}
	
	public function post(){
		if (isset($this->session->userdata['logged_in'])) {
			$data['category'] = $this->uri->segment(3);
			$this->load->view('post.php',$data);
		}else{redirect('main/login');}
	}
	
	public function browse(){
		if(!$this->input->post('search')){
			$category = $this->uri->segment(3);
			if(empty($category)){
				$data['trans'] = $this->model->browse_all();
				$data['category_view'] = false;
				$data['search'] = false;
				$data['category'] = $this->model->category_count();
				$this->load->view('browse.php',$data);
			}else{
				$data['trans'] = $this->model->browse_category($category);
				$data['category_view'] = $category;
				$data['search'] = false;
				$data['category'] = $this->model->category_count();
				$this->load->view('browse.php',$data);
			}
		}else{
			$keyword = $this->input->post('keyword');
			$data['trans'] = $this->model->browse_search($keyword);
			$data['category_view'] = false;
			$data['search'] = true;
			$data['category'] = $this->model->category_count();
			$this->load->view('browse.php',$data);
		}
	}
	
	public function detail(){
		$trans_id = $this->uri->segment(3);
		if(isset(($this->session->userdata['logged_in']))){
			$userID = ($this->session->userdata['logged_in']);
			$data['det'] = $this->model->trans_detail($trans_id);
			$data['off'] = $this->model->trans_offer($trans_id);		
			$data['off_taken'] = $this->model->trans_offer_taken($trans_id);
			$data['offered'] = $this->model->trans_offered($trans_id,$userID);
			$data['avg'] = $this->model->trans_offer_avg($trans_id);
			$this->load->view('detail.php',$data);
		}else{
			$data['det'] = $this->model->trans_detail($trans_id);
			$data['off'] = $this->model->trans_offer($trans_id);
			$data['offered'] = false;
			$data['avg'] = $this->model->trans_offer_avg($trans_id);
			$this->load->view('detail.php',$data);
		}
	}
	
	public function offer(){
		if (isset($this->session->userdata['logged_in'])) {
			$trans_id = $this->uri->segment(3);
			$data['det'] = $this->model->trans_detail($trans_id);
			$this->load->view('offer.php',$data);
		}else{redirect('main/login');}
	}
	
	public function myTrans(){
		if (isset($this->session->userdata['logged_in'])) {
			$user_id = $this->session->userdata['logged_in'];
			if(!$this->input->post('search')){
				$status = $this->uri->segment(3);
				if(empty($status)){
					$data['trans'] = $this->model->my_trans($user_id);
					$data['status_view'] = false;
					$data['search'] = false;
					$data['status'] = $this->model->user_status_count('transaction',$user_id);
					$this->load->view('mytrans.php', $data);
				}else{
					$data['trans'] = $this->model->my_trans_status($user_id, $status);
					$data['status_view'] = $status;
					$data['search'] = false;
					$data['status'] = $this->model->user_status_count('transaction',$user_id);
					$this->load->view('mytrans.php', $data);
				}
			}else{
				$keyword = $this->input->post('keyword');
				$data['trans'] = $this->model->my_trans_search($user_id,$keyword);
				$data['status_view'] = false;
				$data['search'] = true;
				$data['status'] = $this->model->user_status_count('transaction',$user_id);
				$this->load->view('mytrans.php', $data);
			}
		}else{redirect('main/login');}
	}
	
	public function myTransDet(){
		if (isset($this->session->userdata['logged_in'])) {
			$trans_id = $this->uri->segment(3);
			$userID = ($this->session->userdata['logged_in']);
			$data['det'] = $this->model->trans_detail($trans_id);
			$data['off'] = $this->model->trans_offer($trans_id);
			$data['off_taken'] = $this->model->trans_offer_taken($trans_id);
			$data['offered'] = $this->model->trans_offered($trans_id,$userID);
			$data['avg'] = $this->model->trans_offer_avg($trans_id);
			$this->load->view('transdet.php', $data);
		}else{redirect('main/login');}
	}
	
	public function take($offerid,$transid){
		$selected = array('status' => 'Selected');
		$notselected = array('status' => 'Unselected');
		$take = array('status' => 'Done');
		$this->model->update_many_offer($transid,$notselected);
		$this->model->update_offer($offerid,$selected);
		$this->model->update_trans($transid,$take);
		redirect('main/myTransDet/'.$transid);
	}
	
	public function myOffer(){
		if (isset($this->session->userdata['logged_in'])) {
			$user_id = $this->session->userdata['logged_in'];
			if(!$this->input->post('search')){
				$status = $this->uri->segment(3);
				if(empty($status)){
					$data['off'] = $this->model->my_offer($user_id);
					$data['status_view'] = false;
					$data['search'] = false;
					$data['status'] = $this->model->user_status_count('offer', $user_id);
					$this->load->view('myoffer.php', $data);
				}else{
					$data['off'] = $this->model->my_offer_status($user_id, $status);
					$data['status_view'] = $status;
					$data['search'] = false;
					$data['status'] = $this->model->user_status_count('offer', $user_id);
					$this->load->view('myoffer.php', $data);
				}
			}else{
				$data['off'] = $this->model->my_offer($user_id);
				$data['status_view'] = true;
				$data['search'] = false;
				$data['status'] = $this->model->user_status_count('offer', $user_id);
				$this->load->view('myoffer.php', $data);
			}
		}else{redirect('main/login');}
	}
	
	function register_action(){
		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'email' => $this->input->post('email'),
			'phoneNumber' => $this->input->post('phone')
		);
		$result = $this->model->regist_insert($data);
		if ($result == TRUE) {
			$username = $this->input->post('username');
			$results = $this->model->read_user_information($username);
			if ($results != false) {
				$session_data = $results[0]->userID;
				$this->session->set_userdata('logged_in', $session_data);
				redirect(base_url());
			}
		} else {
			$data['message_display'] = 'Username already exist!';
			$this->load->view('register.php', $data);
		}
	}
	
	function login_action(){
		if(isset($this->session->userdata['logged_in'])){
			$this->load->view('home.php');
		}else{
			$this->load->view('login.php');
		}$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		);
		$result = $this->model->login($data);
		if ($result == TRUE) {
			$username = $this->input->post('username');
			$result = $this->model->read_user_information($username);
			if ($result != false) {
				$session_data = $result[0]->userID;
				$this->session->set_userdata('logged_in', $session_data);
				redirect(base_url());
			}
		} else {
			$data['message_display'] =  'Invalid Username or Password';
			$this->load->view('login.php', $data);
		}
	}
	
	public function logout() {
		$sess_array = array(
		'username' => ''
		);
		$this->session->unset_userdata('logged_in', $sess_array);
		redirect(base_url());
	}
	
	function post_action(){
		$data = array(
			'userID' => $this->input->post('user_id'),
			'name' => $this->input->post('thing'),
			'category' => $this->input->post('category'),
			'description' => $this->input->post('desc'),
			'minbudget' => $this->input->post('minB'),
			'maxbudget' => $this->input->post('maxB'),
			'status' => 'Active'
		);
		$result = $this->model->create($data,'transaction');
		if ($result == TRUE) {
			redirect('main/browse');
		}else{
			$data['message_display'] = 'Error';
			$this->load->view('post.php', $data);
		}	
	}
	function offer_action(){
		$data = array(
			'userID' => $this->input->post('user_id'),
			'transID' => $this->input->post('trans_id'),
			'description' => $this->input->post('desc'),
			'price' => $this->input->post('price'),
			'status' => 'Active'
		);
		$result = $this->model->create($data,'offer');
		if ($result == TRUE) {
			redirect('main/detail/'.$this->input->post('trans_id'));
		}else{
			$data['message_display'] = 'Error';
			$this->load->view('offer.php', $data);
		}	
	}
}