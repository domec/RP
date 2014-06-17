<?php

class Users extends CI_Model {

	public function is_valid(){
		$this->db->where('username',$this->input->post('username'));
		$this->db->where('password',md5($this->input->post('password')));

		$query = $this->db->get('users');

		if ($query->num_rows() == 1){
			return true;
		}
		else {
			return false;
		}
	}

	public function add_temp_user($key){
		$data = array(
			'email' => $this->input->post('email'),
			'password' => md5($this->input->post('password')),
			'key' => $key,
			'username' => $this->input->post('username')
		);

		$query = $this->db->insert('temp_users',$data);
		if ($query){
			return true;
		}
		else {
			return false;
		}
	}

	public function check_key($key){
		$this->db->where('key',$key);
		$query = $this->db->get('temp_users');

		if ($query->num_rows() == 1)
			return true;
		else
			return false;
	}

	public function register_user($key){
		$this->db->where('key',$key);
		$query = $this->db->get('temp_users');

		if ($query){
			$row = $query->row();

			$data = array(
				'email' => $row->email,
				'password'=> $row->password,
				'username' => $row->username,
				'firstName' => '[zatial nevyplnene]',
				'lastName' => '[zatial nevyplnene]',
				'city' => '[zatiaľ nevyplnené]',
				'street' => '[zatiaľ nevyplnené]',
				'psc' => '[000]',
				'phone' => '[000]',
				'newsletter' => 1
			);

			$query_add_user = $this->db->insert('users',$data);
		}

		if ($query_add_user){
			$this->db->where('key',$key);
			$this->db->delete('temp_users');
			return true;
		}
		else
			return false;
	}

	public function update($param,$value){
		$this->db->where('username',$this->session->userdata('username'));
		if ($param == 'password')
			$value = md5($this->input->post('password'));
		if ($param == 'newsletter')
			if ($this->session->userdata('newsletter') == 1)
				$value = 0;
			else
				$value = 1;
		$data = array(
			$param => $value
		);
		if ($this->db->update('users',$data))
			return true;
		else
			return false;
	}

	public function get_userdata_login(){
		return  $this->db->get_where('users',array('username'=>$this->input->post('username')))->row();
	}

	public function get_userdata_update(){
		return  $this->db->get_where('users',array('username'=>$this->session->userdata('username')))->row();
	}
}
?>
