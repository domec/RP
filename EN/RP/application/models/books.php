<?php

class Books extends CI_Model{
	function get($orderBy, $from=0, $perPage=3){
		if ($orderBy == 'nameAsc')
			$query = $this->db->query("SELECT * FROM books_en ORDER BY name ASC LIMIT $from, $perPage");
		else if ($orderBy == 'nameDes')
			$query = $this->db->query("SELECT * FROM books_en ORDER BY name DESC LIMIT $from, $perPage");
		else if ($orderBy == 'priceAsc')
			$query = $this->db->query("SELECT * FROM books_en ORDER BY price ASC LIMIT $from, $perPage");
		else if ($orderBy == 'priceDes')
			$query = $this->db->query("SELECT * FROM books_en ORDER BY price DESC LIMIT $from, $perPage");
		else
			$query = $this->db->query("SELECT * FROM books_en LIMIT $from, $perPage");
		return $query->result();
	}

	function amount(){
		$query = $this->db->query("SELECT * FROM books");
		return $query->num_rows();
	}

	function booksToCart($arr){
		$pole = array();
		foreach ($arr as $item){
			$this->db->where('id',$item);
			$query = $this->db->get('books_en');
			array_push($pole,$query->result());
		}
		return $pole;

	}

	function submit_order(){
		$data = array(
			'firstName' => $this->session->userdata('submitUserData')['firstName'],
			'lastName' => $this->session->userdata('submitUserData')['lastName'],
			'street' => $this->session->userdata('submitUserData')['street'],
			'city' => $this->session->userdata('submitUserData')['city'],
			'psc' => $this->session->userdata('submitUserData')['psc'],
			'phone' => $this->session->userdata('submitUserData')['telephone'],
			'email' => $this->session->userdata('submitUserData')['email'],
			'orderName' => $this->session->userdata('submitName'),
			'orderPrice' => $this->session->userdata('submitPrice'),
			'payment' => $this->session->userdata('submitUserData')['payment'],
			'delivery' => $this->session->userdata('submitUserData')['delivery']
		);
		$this->db->insert('orders',$data);
	}

	public function offer_Book($name, $price, $about, $email)
	{
		$data = array(
			'book_name' => $name,
			'book_price' => $price,
			'book_description' => $about,
			'owner_email' => $email
		);
		$this->db->insert('offerings', $data);
			
	}

	public function book_offerings()
	{
		$query = $this->db->query("SELECT * FROM offerings");
		return $query->result();
	}
	
	public function del_offer($id)
	{
		if (null != $this->session->userdata('username')) {
			$this->db->where('id', $id);
			$this->db->where('owner_email', $this->session->userdata('email'));
			$query = $this->db->get('offerings');
			if ($query->num_rows() == 1)
				$this->db->delete('offerings',array('id'=>$id));
		}
	}

	public function submit_review($id, $author)
	{
		$data = array(
			'review' => $this->input->post('review_textarea'),
			'book_id' => $id,
			'author' => $author
		);
		$query = $this->db->insert('reviews', $data);
	}

	public function get_reviews($id)
	{
		$this->db->where('book_id', $id);
		$query = $this->db->get('reviews');
		return $query;
	}

	public function check_id($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('books_en');
		if ($query->num_rows() == 1)
			return true;
		return false;
	}

}
?>
