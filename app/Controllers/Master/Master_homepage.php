<?php 

namespace App\Controllers\Master;

use App\Controllers\BaseController;
use App\Models\Global_model;

class Master_homepage extends BaseController
{
	public function index()
	{
		$menu 			= $this->Global_model->get_menu(session()->get('idrole'));
		$sidebar 		= $this->Multi_menu->fetch_menu($menu);
		$list_home		= $this->Global_model->getTable('business',['active'=>1]);
		$data = [
			'title'			=>'Home page Setting',
			'home' 			=>$list_home, 	
			'sidebar'		=>$sidebar
		];
		return view('master/master_homepage/homepage_form',$data);
		
	}



	public function update()
	{
		$b_id = $this->request->getPost('b_id');
		if (!$this->validate([
			'name' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Harus diisi'
				]
			],
			'about' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'about Harus diisi'
				]
			],
			'menu_dsc' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Menu Description Date Harus diisi'
				]
			],
			'tagline' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Tagline Date Harus diisi'
				]
			]
		])) {
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->to('/Master/Master_homepage/')->withInput();;
		} else {
			$name 			= $this->request->getPost('name');
			$about 			= $this->request->getPost('about');
			$menu_dsc 		= $this->request->getPost('menu_dsc');
			$tagline 		= $this->request->getPost('tagline');

			$data = [
				'name' 				=> $name,
				'about' 			=> $about,
				'menu_dsc' 			=> $menu_dsc, 
				'tagline' 			=> $tagline,
				'update_date' 		=> date('Y-m-d G:i:s'),
				'update_by' 		=> session()->get('full_name')
			];
			$this->Global_model->updateTable('business',['b_id'=>$b_id],$data);
			session()->setFlashdata('success', ' Homepage updated');
			return redirect()->to('/Master/Master_homepage');
		}
	}
}