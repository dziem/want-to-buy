<?php 
class Model extends CI_Model{
	
	public function select_all($table){
		$this->db->select('*');
		$this->db->from($table);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function home_offer($category){
		$condition = "category =" . "'" . $category . "' and status ='Active'";
		$this->db->select('*');
		$this->db->from('transaction');
		$this->db->where($condition);
		$this->db->order_by("transID", "desc");
		$this->db->limit(4);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function browse_all(){
		$condition = "transaction.status ='Active' ";
		$this->db->select('transaction.transID as tID, transaction.name, transaction.category, transaction.description, 
		transaction.minbudget, transaction.maxbudget, COUNT(offer.offerID) as offers');
        $this->db->from('transaction');
		$this->db->join('offer','transaction.transID = offer.transID','left');
		$this->db->where($condition);
		$this->db->order_by("transaction.transID", "desc");
		$this->db->group_by('transaction.transID');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function browse_search($search){
		$condition = "transaction.status ='Active'";
		$this->db->select('transaction.transID as tID, transaction.name, transaction.category, transaction.description, 
		transaction.minbudget, transaction.maxbudget, COUNT(offer.offerID) as offers');
        $this->db->from('transaction');
		$this->db->join('offer','transaction.transID = offer.transID','left');
		$this->db->where($condition);
		$this->db->like('transaction.name', $search);
		$this->db->order_by("transaction.transID", "desc");
		$this->db->group_by('transaction.transID');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function browse_category($category){
		$condition = "status='Active' and category =" . "'" . $category . "'";
		$this->db->select('transaction.transID as tID, transaction.name, transaction.category, transaction.description, 
		transaction.minbudget, transaction.maxbudget, COUNT(offer.offerID) as offers');
        $this->db->from('transaction');
		$this->db->join('offer','transaction.transID = offer.transID','left');
		$this->db->where($condition);
		$this->db->order_by("transaction.transID", "desc");
		$this->db->group_by('transaction.transID');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function category_count(){
		$condition = "status ='Active'";
		$this->db->select('category, count(category) as counts');
		$this->db->from('transaction');
		$this->db->where($condition);
		$this->db->group_by('category');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function user_status_count($table, $user_id){
		$condition = "userID ='".$user_id."'";
		$this->db->select('status, count(status) as counts');
		$this->db->from($table);
		$this->db->where($condition);
		$this->db->group_by('status');
		$query = $this->db->get();
		return $query->result();
	}
	
	/*public function count_avg_offer(){
		$this->db->select('transaction.transID as tID, transaction.name, transaction.status, transaction.category, transaction.description, 
		transaction.minbudget, transaction.maxbudget, COUNT(offer.offerID) as offers, avg(offer.price) as average');
        $this->db->from('transaction');
		$this->db->join('offer','transaction.transID = offer.transID','left');
		$this->db->group_by('transaction.transID');
		$query = $this->db->get();
		return $query->result();
	}*/
	
	public function trans_detail($id){
		$condition = "transID =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('transaction');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function trans_offer($id){
		$condition = "transID =" . "'" . $id . "'";
		$this->db->select('user.username, offer.description, offer.price, offer.offerID, offer.transID');
        $this->db->from('offer');
        $this->db->join('user', 'user.userID = offer.userID');
		$this->db->order_by("offer.offerID", "desc");
		$this->db->where($condition);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function trans_offer_taken($id){
		$condition = "transID =" . "'" . $id . "' and offer.status = 'Selected'";
		$this->db->select('user.username, offer.description, offer.price, offer.offerID, offer.transID, user.email, user.phoneNumber');
        $this->db->from('offer');
        $this->db->join('user', 'user.userID = offer.userID');
		$this->db->order_by("offer.offerID", "desc");
		$this->db->where($condition);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function trans_offered($tid, $uid){
		$condition = "transID =" . "'" . $tid . "' and userID =" . "'" . $uid . "'";
		$this->db->select('*');
		$this->db->from('offer');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}
	
	public function trans_offer_avg($id){
		$condition = "transID =" . "'" . $id . "'";
		$this->db->select('AVG(price) as avg');
		$this->db->from('offer');
		$this->db->where($condition);
		$this->db->group_by('transID');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function my_trans($id){
		$condition = "transaction.userID =" . "'" . $id . "'";
		$this->db->select('transaction.transID as tID, transaction.name, transaction.status, transaction.category, transaction.description, 
		transaction.minbudget, transaction.maxbudget, COUNT(offer.offerID) as offers, avg(offer.price) as average');
        $this->db->from('transaction');
		$this->db->join('offer','transaction.transID = offer.transID','left');
		$this->db->where($condition);
		$this->db->order_by("transaction.transID", "desc");
		$this->db->group_by('transaction.transID');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function my_trans_search($id, $search){
		$condition = "transaction.userID =" . "'" . $id . "'";
		$this->db->select('transaction.transID as tID, transaction.name, transaction.status, transaction.category, transaction.description, 
		transaction.minbudget, transaction.maxbudget, COUNT(offer.offerID) as offers, avg(offer.price) as average');
        $this->db->from('transaction');
		$this->db->join('offer','transaction.transID = offer.transID','left');
		$this->db->where($condition);
		$this->db->like('transaction.name', $search);
		$this->db->order_by("transaction.transID", "desc");
		$this->db->group_by('transaction.transID');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function my_trans_status($id, $status){
		$condition = "transaction.userID =" . "'" . $id . "' and transaction.status =" . "'" . $status . "'";
		$this->db->select('transaction.transID as tID, transaction.name, transaction.status, transaction.category, transaction.description, 
		transaction.minbudget, transaction.maxbudget, COUNT(offer.offerID) as offers, avg(offer.price) as average');
        $this->db->from('transaction');
		$this->db->join('offer','transaction.transID = offer.transID','left');
		$this->db->where($condition);
		$this->db->order_by("transaction.transID", "desc");
		$this->db->group_by('transaction.transID');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function my_offer($id){
		$condition = "offer.userID =" . "'" . $id . "'";
		$this->db->select('transaction.name, offer.description, offer.status, offer.price, offer.offerID');
		$this->db->from('offer');
		$this->db->join('transaction', 'offer.transID = transaction.transID');
		$this->db->where($condition);
		$this->db->order_by("offer.offerID", "desc");
		$query = $this->db->get();
		return $query->result();
	}
	
	public function my_offer_search($id, $search){
		$condition = "offer.userID =" . "'" . $id . "'";
		$this->db->select('transaction.name, offer.description, offer.status, offer.price, offer.offerID');
		$this->db->from('offer');
		$this->db->join('transaction', 'offer.transID = transaction.transID');
		$this->db->where($condition);
		$this->db->order_by("offer.offerID", "desc");
		$this->db->like('transaction.name', $search);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function my_offer_status($id, $status){
		$condition = "offer.userID =" . "'" . $id . "' and offer.status =" . "'" . $status . "'";
		$this->db->select('transaction.name, offer.description, offer.status, offer.price, offer.offerID');
		$this->db->from('offer');
		$this->db->join('transaction', 'offer.transID = transaction.transID');
		$this->db->where($condition);
		$this->db->order_by("offer.offerID", "desc");
		$query = $this->db->get();
		return $query->result();
	}
	
	public function update_offer($id,$data){
		$condition = "offerID = '".$id."'";
		$this->db->where($condition);
		$this->db->update('offer',$data);
	}
	
	public function update_trans($id,$data){
		$condition = "transID = '".$id."'";
		$this->db->where($condition);
		$this->db->update('transaction',$data);
	}
	
	public function update_many_offer($id,$data){
		$condition = "transID = '".$id."'";
		$this->db->where($condition);
		$this->db->update('offer',$data);
	}
 
	public function create($data,$table){
		$this->db->insert($table,$data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}
	
	public function regist_insert($data){
		$condition = "username =" . "'" . $data['username'] . "'";
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			$this->db->insert('user', $data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}
		} else {
			return false;
		}
	}
	
	public function login($data) {
		$condition = "username =" . "'" . $data['username'] . "' AND " . "password =" . "'" . $data['password'] . "'";
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}
	
	public function read_user_information($username) {
		$condition = "username =" . "'" . $username . "'";
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}
}