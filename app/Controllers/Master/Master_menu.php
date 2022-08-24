<?php 

namespace App\Controllers\Master;

use App\Controllers\BaseController;
use App\Models\Global_model;

class Master_menu extends BaseController
{
	public function index()
	{
		$menu 			= $this->Global_model->get_menu(session()->get('idrole'));
		$sidebar 		= $this->Multi_menu->fetch_menu($menu);
		$list_menu	= $this->Global_model->selectQuery('SELECT *,b.name AS type_name,a.active AS ac FROM menus AS a JOIN type_menu AS b ON a.type_menu_id=b.type_menu_id');
		$data = [
			'title'			=>'List Menu',
			'menus' 		=>$list_menu, 	
			'sidebar'		=>$sidebar
		];
		return view('master/master_menu/view_list',$data);
		
	}

	public function add_form()
	{
		$menu 		= $this->Global_model->get_menu(session()->get('idrole'));
		$sidebar 	= $this->Multi_menu->fetch_menu($menu);
		$type_menu 	= $this->Global_model->getTable('type_menu',['active'=>1]);
		$data = [
			'title'			=>'Add menu',
			'type_menu' 	=>$type_menu, 	
			'sidebar'		=>$sidebar
		];
		return view('master/master_menu/add_form',$data);
		
	}

	public function edit_form($id)
	{
		$menu 		= $this->Global_model->get_menu(session()->get('idrole'));
		$sidebar 	= $this->Multi_menu->fetch_menu($menu);
		$menus 		= $this->Global_model->getTable('menus',['m_id'=>$id]);
		$type_menu 	= $this->Global_model->getTable('type_menu',['active'=>1]);
		$data = [
			'title'			=>'Edit Menu',
			'menus' 		=>$menus,
			'type_menu' 	=>$type_menu, 		
			'sidebar'		=>$sidebar
		];
		return view('master/master_menu/edit_form',$data);
		
	}
	public function delete($id)
	{
		
		$this->Global_model->updateTable('menus',['m_id'=>$id],['active'=>0]);
        echo json_encode(array('message'=>'success'));	
	}

	public function active($id)
	{
		
		$this->Global_model->updateTable('menus',['m_id'=>$id],['active'=>1]);
        echo json_encode(array('message'=>'success'));	
	}

	public function save()
	{
		if (!$this->validate([
			'name' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Harus diisi'
				]
			],
			'type_menu_id' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'type_menu Harus diisi'
				]
			],
			'img' => [
                'label' => 'Image File',
                'rules' => 'uploaded[img]'
                    . '|is_image[img]'
                    . '|mime_in[img,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                    . '|max_size[img,1000]',
            ],
			'ingredients' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'ingredients Harus diisi'
				]
			]
		])) {
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->to('/Master/Master_menu/add_form')->withInput();;
		} else {
			$name 			= $this->request->getPost('name');
			$type_menu_id 	= $this->request->getPost('type_menu_id');
			$ingredients 	= $this->request->getPost('ingredients');
			$menu_order 	= $this->request->getPost('menu_order');
			$img 			= $this->request->getFile('img');

			$filename =$img->getRandomName();
			$img->move(FCPATH . 'public/resto_assets/assets/img/menu', $filename);			

			$data = [
				'menu_name' 	=> $name,
				'type_menu_id'	=> $type_menu_id,
				'img_menu' 		=> $filename,
				'menu_order' 	=> $menu_order,	
				'ingredients' 	=> $ingredients,
				'create_by' 	=> session()->get('full_name')
			];
			$this->Global_model->insertTable('menus',$data);
			session()->setFlashdata('success', 'menu Added');
			return redirect()->to('/Master/Master_menu');
		}
	}

	public function update()
	{
		$m_id = $this->request->getPost('m_id');
		if (!$this->validate([
			'name' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Harus diisi'
				]
			],
			'type_menu_id' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'type_menu Harus diisi'
				]
			],
			'ingredients' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'ingredients Harus diisi'
				]
			]
		])) {
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->to('/Master/Master_menu/edit_form/'.$m_id)->withInput();;
		} else {
			$name 			= $this->request->getPost('name');
			$type_menu_id 	= $this->request->getPost('type_menu_id');
			$ingredients 	= $this->request->getPost('ingredients');
			$menu_order 	= $this->request->getPost('menu_order');
			$img_old 		= $this->request->getPost('img_old');
			$img 			= $this->request->getFile('img');
			if($img->isValid()){

				if(!empty($img_old)){
					unlink($_SERVER['DOCUMENT_ROOT'].'public/resto_assets/assets/img/menu/'.$img_old);  
				}			
				$filename =$img->getRandomName();
				$img->move(FCPATH . 'public/resto_assets/assets/img/menu', $filename);			

			}else{
				if(!empty($img_old)){
					$filename	= $img_old;
				}else{
					$filename =NULL;
				}				
			}			

			$data = [
				'menu_name' 	=> $name,
				'type_menu_id'	=> $type_menu_id,
				'img_menu' 		=> $filename,
				'ingredients' 	=> $ingredients,
				'menu_order' 	=> $menu_order,
				'update_date' 	=> date('Y-m-d h:i:s'),
				'update_by' 	=> session()->get('full_name')
			];
			$this->Global_model->updateTable('menus',['m_id'=>$m_id],$data);
			session()->setFlashdata('success', 'menu updated');
			return redirect()->to('/Master/Master_menu');
		}
	}
}