<?php namespace App\Controllers;

use App\Models\ComicModel;

class Comic extends BaseController
{
	protected $comicModel;
	public function __construct()
	{
		$this->comicModel = new ComicModel();
	}

	public function index()
	{
		$comics = $this->comicModel->getComic();
		// dd($comics);
		$data = [
			"comics" => $comics
		];
		return view('comicPage/index', $data);
	}
	
	public function comicDetail($id)
	{
		$comic = $this->comicModel->getComic($id);
		$data = [
			"comic" => $comic
		];

		return view('comicPage/comicDetail', $data);
	}
	
	public function createComic()
	{

		$data = ["validation" => \Config\Services::validation()];
		return view('comicPage/createComic', $data);
	}

	public function add()
	{

		if(!$this->validate([
			'title' => [
				'rules' => 'required|is_unique[comics.title]',
				'errors' => [
					'required' => 'title must be filled',
					'is_unique' => 'comic already exist'
				]
			],
			'author' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'author must be filled'
				]
			],
			'publisher' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'publisher must be filled'
				]
			]
		]))
		{
			$validation = \Config\Services::validation();
			return redirect()->to('/comic/createComic')->withInput()->with('validation', $validation);
		}

		$data = [
			'title' => $this->request->getVar('title'),
			'cover' => $this->request->getVar('cover'),
			'author' => $this->request->getVar('author'),
			'publisher' => $this->request->getVar('publisher'),
			'synopsis' => $this->request->getVar('synopsis')
		];
		$this->comicModel->insert($data);
		
		// dd($this->request->getVar('title'));

		return redirect()->to('/comic');
	}

	public function delete($id)
	{
		$this->comicModel->delete($id);
		// session()->setFlashdata('pesan', 'komik berhasil dihapus');
		return redirect()->to('/comic');
	}

	public function edit($id)
	{
		$data = [
			'validation' => \Config\Services::validation(),
			'comic' => $this->comicModel->getComic($id)
		];

		return view('comicPage/editComic', $data);
	}

	public function update($id)
	{
		// dd($this->request->getVar());
		if(!$this->validate([
			'title' => [
				'rules' => 'required|is_unique[comics.title]',
				'errors' => [
					'required' => 'title must be filled',
					'is_unique' => 'comic already exist'
				]
			],
			'author' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'author must be filled'
				]
			],
			'publisher' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'publisher must be filled'
				]
			]
		]))
		{
			$validation = \Config\Services::validation();
			return redirect()->to('/comic/edit/'.$id)->withInput()->with('validation', $validation);
		}

		$data = [
			// 'id' => $id,`
			'title' => $this->request->getVar('title'),
			'cover' => $this->request->getVar('cover'),
			'author' => $this->request->getVar('author'),
			'publisher' => $this->request->getVar('publisher'),
			'synopsis' => $this->request->getVar('synopsis')
		];
		$this->comicModel->update($id, $data);

		return redirect()->to('/comic');
	}

	public function signin()
	{
		$data = ["validation" => \Config\Services::validation()];
		return view('admin/login', $data);
	}

	public function login()
	{
		// dd($this->request->getVar());
		if(!$this->validate([
			'username' => [
				'rules' => 'required|min_length[5]',
				'errors' => [
					'required' => 'username harus diisi',
					'min_length' => 'username 5 karakter atau lebih'
				]
			],
			'password' => [
				'rules' => 'required|min_length[8]',
				'errors' => [
					'required' => 'password harus diisi',
					'min_length' => 'password 8 karakter atau lebih'
				]
			]
		]))
		{
			$validation = \Config\Services::validation();
			return redirect()->to('/comic/signin');
		}

		$username = "YoYo101";
		$password = "1234567890";
		if(!isset($_SESSION)) 
		{ 
			session_start(); 
		}
		// var_dump($username == $this->request->getVar('username') && $password == $this->request->getVar('password'));
		if($username == $this->request->getVar('username') && $password == $this->request->getVar('password'))
		{
			// dd($this->request->getVar('username'));
			$_SESSION['username'] = $username;
			return redirect()->to('/comic');
		}
		
		return redirect()->to('/comic/signin');
	}

	public function logout()
	{
		session_destroy();

		return redirect()->to('/comic');
	}

	//--------------------------------------------------------------------

}