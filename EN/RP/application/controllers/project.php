<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('html');
		$this->load->library('pagination');
		$this->load->library('session');
	}

	public function index()
	{
		$this->home();
	}

	public function home()
	{

		$data = array('title_sk' => 'Domov','navCurrent' => 'home');
		$this->load->view('templates/header',$data);
		if ($this->session->userdata('username') != null)
			$this->load->view('templates/header_logged');
		else
			$this->load->view('templates/header_not_logged');
		$this->load->view('templates/navigation_sk');
		$this->load->view('home');
		$this->load->view('templates/footer');
	}

	public function profile()
	{
		$data = array('title_sk' => 'Profil','navCurrent'=>'');
		$this->load->view('templates/header',$data);
		$this->load->view('templates/header_logged');
		$this->load->view('templates/navigation_sk');
		$this->load->view('profile');
		$this->load->view('templates/footer');
	}

	public function update_profile($param)
	{

		$this->load->library('form_validation');
		$this->form_validation->set_message('is_unique','Daná položka "%s" sa v našej databáze už vyskytuje!');
		$this->form_validation->set_message('valid_email','Váš e-mail nebol zadaný v správnom tvare!');
		$this->form_validation->set_message('is_natural','%s sa môže skladať iba z číslic!');
		$this->form_validation->set_message('numeric','%s sa môže skladať iba z čiselných znakov!');

		$this->form_validation->set_rules('username','Prihlasovacie meno','trim|xss_clean|is_unique[users.username]');
		$this->form_validation->set_rules('password','Prihlasovacie heslo','trim');
		$this->form_validation->set_rules('phone','Tel. cislo / mobil','trim|numeric');
		$this->form_validation->set_rules('email','Email','trim|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('city','Mesto','trim');
		$this->form_validation->set_rules('street','Ulica','trim');
		$this->form_validation->set_rules('psc','PSC','trim|is_natural');

		if ($this->form_validation->run()){
			$this->load->model('users');
			if ($this->users->update($param,$this->input->post($param))){
				if ($param == 'username')
					$this->session->set_userdata('username',$this->input->post('username'));
				else
					$this->session->set_userdata($param,$this->users->get_userdata_update()->$param);
				$this->session->set_flashdata('info','edit_successful');
				redirect('project/info');
			}
			else{
				$this->session->set_flashdata('info','edit_unseccessful');
				redirect('project/info');
			}
		}
		else
			$this->profile();
	}

	public function books($from = 0)
	{

		$hodnoty = array(3,5,10);
		if (isset($_POST['perPage']))
			$userOptions['perPage'] = $_POST['perPage'];
		else if (!in_array($this->session->userdata('perPage'),$hodnoty))
			$userOptions['perPage'] = 3;

		if (isset($_POST['orderBy']))
			$userOptions['orderBy'] = $_POST['orderBy'];
		else if ($this->session->userdata('orderBy') != 'nameAsc')
			$userOptions['orderBy'] = $this->session->userdata('orderBy');
		else
			$userOptions['orderBy'] = 'nameAsc';

		$this->session->set_userdata($userOptions);
		
		$config['per_page'] = $this->session->userdata('perPage');
		$this->load->model('books');
		$data = array(
			'title_sk' => 'Knihy',
			'navCurrent' => 'books',
			'orderBy' => $this->session->userdata('orderBy'),
			'results' => $this->books->get($this->session->userdata('orderBy'), $from, $config['per_page']) ,
			'perPage' => $config['per_page']
		);

		$config['base_url'] = base_url('project/books');
		$config['total_rows'] = ceil($this->books->amount());
		$this->pagination->initialize($config);

		$this->load->view('templates/header',$data);
		if ($this->session->userdata('username') != null)
			$this->load->view('templates/header_logged');
		else
			$this->load->view('templates/header_not_logged');
		$this->load->view('templates/navigation_sk');
		$this->load->view('books', $data);
		$this->load->view('templates/footer');
	}

	public function reviews($id)
	{
		$this->load->model('books');	
		$data = array('title_sk' => 'Hodnotenie','navCurrent' => '', 'id' => $id);

		$this->load->view('templates/header',$data);
		if ($this->session->userdata('username') != null)
			$this->load->view('templates/header_logged');
		else
			$this->load->view('templates/header_not_logged');
		$this->load->view('templates/navigation_sk');
		$this->load->view('review');
		$this->load->view('templates/footer');
	}

	public function submit_review($id)
	{
		$this->load->model('books');
		$this->books->submit_review($id, $this->session->userdata('username'));
		redirect('project');
	}

	public function about()
	{
		$data = array('title_sk' => 'O nás','navCurrent' => 'about');

		$this->load->view('templates/header',$data);
		if ($this->session->userdata('username') != null)
			$this->load->view('templates/header_logged');
		else
			$this->load->view('templates/header_not_logged');
		$this->load->view('templates/navigation_sk');
		$this->load->view('about');
		$this->load->view('templates/footer');
	}

	public function bazaar()
	{
		$this->load->model('books');
		$data = array(
			'title_sk' => 'Bazár',
			'navCurrent' => 'bazaar',
			'results' => $this->books->book_offerings()
		);

		$this->load->view('templates/header',$data);
		if ($this->session->userdata('username') != null)
			$this->load->view('templates/header_logged');
		else
			$this->load->view('templates/header_not_logged');
		$this->load->view('templates/navigation_sk');
		$this->load->view('bazaar');
		$this->load->view('templates/footer');
	}

	public function registration_validation()
   	{
		$this->load->library('form_validation');
		$this->form_validation->set_message('required','Položka "%s" je povinný údaj!');
		$this->form_validation->set_message('is_unique','Daná položka "%s" sa v našej databáze už vyskytuje!');
		$this->form_validation->set_message('matches','"%s" a "Prihlasovacie heslo" sa nezhodujú!');
		$this->form_validation->set_message('valid_email','Váš e-mail nebol zadaný v správnom tvare!');

		$this->form_validation->set_rules('username','Prihlasovacie meno','required|trim|xss_clean|is_unique[users.username]');
		$this->form_validation->set_rules('password','Prihlasovacie heslo','required|trim');
		$this->form_validation->set_rules('cpassword','Potvrdenie hesla','required|trim|matches[password]');
		$this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[users.email]');

		if ($this->form_validation->run()) {

			$this->load->model('users');

			$config = Array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.googlemail.com',
				'smtp_port' => 465,
				'smtp_user' => 'rp.bencko@gmail.com',
				'smtp_pass' => 'bencko.rp',
				'mailtype'  => 'html', 
				'charset' => 'utf-8',
				'wordwrap' => TRUE
			);

			$key = md5($this->input->post('username'));
			$this->load->library('email',$config);
			$this->email->set_newline("\r\n");
			$this->email->from($config['smtp_user'],"Fantasybooks");
			$this->email->to($this->input->post('email'));
			$this->email->subject("Potvrdenie registrácie");

			$message="<p>Ďakujeme za registráciu.</p>";
			$message .= "<p><a href='".base_url()."project/register_user/$key'>Kliknite sem</a>  pre potvrdenie registrácie.</p>";

			$this->email->message($message);

			if ($this->users->add_temp_user($key)){
				if ($this->email->send()){
					$this->session->set_flashdata('info','mail_sent');
					redirect('project/info');
				}
				else {
					$this->session->set_flashdata('info','mail_not_sent');
					redirect('project/info');
				}
			}
			else{
				$this->session->set_flashdata('info','reg_failed');
				redirect('project/info');
			}
		}
		else {
			$this->registracia();
		}
	}

	public function info($param = ""){
		$data = array('title_sk' => 'Info','navCurrent'=>'');
		
		$this->load->view('templates/header',$data);
		if ($this->session->userdata('username') != null)
			$this->load->view('templates/header_logged');
		else
			$this->load->view('templates/header_not_logged');
		$this->load->view('templates/navigation_sk');
		$this->load->view('info');
		$this->load->view('templates/footer');
	}

	public function register_user($key){
		$this->load->model('users');
		if ($this->users->check_key($key)){
			if ($this->users->register_user($key)){
				$this->session->set_flashdata('info','registration_successful');
				redirect('project/info');
			}
			else{
				$this->session->set_flashdata('info','registration_unsuccessful');
				redirect('project/info');
			}
		}	
		else{
			$this->session->set_flashdata('info','invalid_key');
			redirect('project/info');
		}
	}

	public function logout_user(){
		$data = array(
			'username' => '',
			'password' => '',
			'email' => '',
			'phone' => '',
			'street' => '',
			'city' => '',
			'psc' => '',
			'newsletter' => ''
		);
		$this->session->unset_userdata($data);
		$this->session->set_flashdata('info','logout_successful');
		redirect('project/info');
	}

	public function login_user()
   	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username','Prihlasovacie meno','required|trim|xss_clean|callback_login_validation');
		$this->form_validation->set_rules('password','Prihlasovacie heslo','required|md5|trim|callback_login_validation');

		if ($this->form_validation->run()) {
			$this->load->model('users');

			$userData = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'firstName' => $this->users->get_userdata_login()->firstName,
				'lastName' => $this->users->get_userdata_login()->lastName,
				'email' => $this->users->get_userdata_login()->email,
				'phone' => $this->users->get_userdata_login()->phone,
				'city' => $this->users->get_userdata_login()->city,
				'street' => $this->users->get_userdata_login()->street,
				'psc' => $this->users->get_userdata_login()->psc,
				'newsletter' => $this->users->get_userdata_login()->newsletter,
			);

			$this->session->set_userdata($userData);

			$this->session->set_flashdata('info','login_successful');
			redirect('project/info');
		}
		else {
			$this->session->set_flashdata('info','login_unsuccessful');
			redirect('project/info');
		}
	}

	public function login_validation()
	{
		$this->load->model('users');

		if ($this->users->is_valid()){
			return true;
		}
		else {
			return false;
		}
	}

	public function registracia()

	{
		$data = array('title_sk' => 'Registracia','navCurrent'=>'');
		
		$this->load->view('templates/header',$data);
		$this->load->view('templates/header_not_logged');
		$this->load->view('templates/navigation_sk');
		$this->load->view('templates/form_reg_sk');
		$this->load->view('templates/footer');
	}

	public function del_from_cart($param)
	{
		$pole = $this->session->userdata('cart');
		foreach ($pole as $index => $item)
			if ($item == $param)
				unset($pole[$index]);
		$this->session->set_userdata('cart',$pole);

		redirect('project/cart');
	}

	public function add_to_cart($param)
	{
		
		if ($this->session->userdata('cart') == null)
			$data = array($param);
		else{
			$data = $this->session->userdata('cart');
			array_push($data,$param);
		}
		$this->session->set_userdata('cart',$data);

		$this->session->set_flashdata('item_added',true);
		redirect('project/books');
	}

	public function cart()
	{
		$this->load->model('books');
		if ($this->session->userdata('cart') != null)
			$data = array('title_sk' => 'Nakupny kosik - Potvrdenie nakupu','navCurrent' => '', 'next' => 'project/address', 'prev' => 'project/cart','results' => $this->books->booksToCart($this->session->userdata('cart')), 'isEmpty' => false);
		else
			$data = array('title_sk' => 'Nakupny kosik - Potvrdenie nakupu','navCurrent' => '', 'next' => 'project/cart', 'prev' => 'project/cart', 'isEmpty' => true);

		$this->load->view('templates/header',$data);
		if ($this->session->userdata('username') != null)
			$this->load->view('templates/header_logged');
		else
			$this->load->view('templates/header_not_logged');
		$this->load->view('templates/navigation_sk');

		$this->load->model('books');
		$this->load->view('cart');
		$this->load->view('templates/footer');
	}

	public function check_cart()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_message('required','Položka "%s" je povinný údaj!');
		$this->form_validation->set_message('valid_email','Váš e-mail nebol zadaný v správnom tvare!');

		$this->form_validation->set_rules('firstName','Meno','required|trim|xss_clean');
		$this->form_validation->set_rules('lastName','Priezvisko','required|trim|xss_clean');
		$this->form_validation->set_rules('telephone','Telefonne cislo','required|trim');
		$this->form_validation->set_rules('email','Email','required|trim|valid_email');
		$this->form_validation->set_rules('street','Ulica','required|trim|xss_clean');
		$this->form_validation->set_rules('city','Mesto','required|trim|xss_clean');
		$this->form_validation->set_rules('psc','PSC','required|trim|xss_clean');
		$this->form_validation->set_rules('payment','Sposob platby','required');
		$this->form_validation->set_rules('delivery','Sposob dopravy','required');

		if ($this->form_validation->run()){
			$this->session->set_flashdata('gainAccess',true);
			$this->session->set_flashdata('data',$this->input->post());
			redirect('project/summary');
		}
		else
			$this->cart();
	}

	public function summary()
	{
		$this->load->model('books');
		$data = array('title_sk' => 'Suhrn','navCurrent' => '','results' => $this->books->booksToCart($this->session->userdata('cart')));
		$this->load->view('templates/header',$data);
		if ($this->session->userdata('username') != null)
			$this->load->view('templates/header_logged');
		else
			$this->load->view('templates/header_not_logged');
		$this->load->view('templates/navigation_sk');
		$this->load->view('summary');
		$this->load->view('templates/footer');
	}

	public function submit_order()
	{
		$this->load->model('books');
		$this->books->submit_order();

		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'rp.bencko@gmail.com',
			'smtp_pass' => 'bencko.rp',
			'mailtype'  => 'html', 
			'charset' => 'utf-8',
			'wordwrap' => TRUE
		);

		$this->load->library('email',$config);
		$this->email->set_newline("\r\n");
		$this->email->from($config['smtp_user'],"Fantasybooks");
		if (null != ($this->session->userdata('username')))
			$this->email->to($this->session->userdata('email'));
		else
			$this->email->to($this->session->userdata('submitUserData')['email']);
		$this->email->subject("Suhrn objednavky");

		$message="<p>Ďakujeme za objednavku.</p>";
		$message .= "<p> Objednany tovar:</p>";
		$message .= "<p>".$this->session->userdata('submitName')."</p>";
		$message .= "<p>Cena: ".$this->session->userdata('submitPrice')."</p>";

		$this->email->message($message);

		if ($this->email->send())
			$this->session->set_flashdata('info','order_sent');
		else
			$this->session->set_flashdata('info','order_not_sent');

		$this->session->unset_userdata('cart');
		redirect('project/info');
	}

	public function offer_book_submit()
	{
		$this->load->model('books');
		$name = $this->input->post('name');
		$price = $this->input->post('price');
		$about = $this->input->post('text');
		$email = $this->session->userdata('email');

		$this->books->offer_book($name, $price, $about, $email);
		redirect('project/home');
	}
	
	public function delete_offer($id)
	{
		$this->load->model('books');
		$this->books->del_offer($id);
		redirect('project/bazaar');
	}

	public function about_project()
	{
		$data = array('title_sk' => 'O projekte','navCurrent' => 'about_project');
		$this->load->view('templates/header',$data);
		if ($this->session->userdata('username') != null)
			$this->load->view('templates/header_logged');
		else
			$this->load->view('templates/header_not_logged');
		$this->load->view('templates/navigation_sk',$data);
		$this->load->view('about_project');
		$this->load->view('templates/footer',$data);
	}
}
