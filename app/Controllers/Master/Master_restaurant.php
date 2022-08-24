<?php 

namespace App\Controllers\Master;

use App\Controllers\BaseController;
use App\Models\Global_model;
use CodeIgniter\Files\File;

class Master_restaurant extends BaseController
{
	public function index()
	{
		$menu 			= $this->Global_model->get_menu(session()->get('idrole'));
		$sidebar 		= $this->Multi_menu->fetch_menu($menu);
		$list_resto	= $this->Global_model->table('restaurants');
		$data = [
			'title'			=>'List Restaurant',
			'resto' 		=>$list_resto, 	
			'sidebar'		=>$sidebar
		];
		return view('master/master_restaurant/view_list',$data);
		
	}

	public function add_form()
	{
		$menu 		= $this->Global_model->get_menu(session()->get('idrole'));
		$sidebar 	= $this->Multi_menu->fetch_menu($menu);
		$data = [
			'title'			=>'Add Restaurant', 	
			'sidebar'		=>$sidebar
		];
		return view('master/master_restaurant/add_form',$data);
		
	}

	public function edit_form($id)
	{
		$menu 		= $this->Global_model->get_menu(session()->get('idrole'));
		$sidebar 	= $this->Multi_menu->fetch_menu($menu);
		$resto 		= $this->Global_model->getTable('restaurants',['r_id'=>$id]);
		$data = [
			'title'			=>'Edit Restaurant',
			'resto' 		=>$resto, 		
			'sidebar'		=>$sidebar
		];
		return view('master/master_restaurant/edit_form',$data);
		
	}
	public function logo_form($id)
	{
		$menu 		= $this->Global_model->get_menu(session()->get('idrole'));
		$sidebar 	= $this->Multi_menu->fetch_menu($menu);
		$resto 		= $this->Global_model->getTable('restaurants',['r_id'=>$id]);
		$logo 		= $this->Global_model->getTable('available_logo',['r_id'=>$id]);
		$data = [
			'title'			=>'Available Logo',
			'resto' 		=>$resto,
			'logo' 			=>$logo, 		
			'sidebar'		=>$sidebar
		];
		return view('master/master_restaurant/logo_form',$data);
		
	}
	public function delete($id)
	{
		
		$this->Global_model->updateTable('restaurants',['r_id'=>$id],['active'=>0]);
        echo json_encode(array('message'=>'success'));	
	}

	public function active($id)
	{
		
		$this->Global_model->updateTable('restaurants',['r_id'=>$id],['active'=>1]);
        echo json_encode(array('message'=>'success'));	
	}

	public function logo()
	{
		$r_id = $this->request->getPost('r_id');
		if (!$this->validate([
			'link' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Start Hours Harus diisi'
				]
			],
			'show' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Show Harus diisi'
				]
			]
		])) {
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->to('/Master/Master_restaurant/logo_form/'.$r_id)->withInput();;
		} else {
			$link 		= $this->request->getPost('link[]');
			$show 		= $this->request->getPost('show[]');


			$this->Global_model->deleteTable('available_logo',['r_id'=>$r_id]);
			$img 			= $this->request->getFileMultiple('img');
			$img_old 		= $this->request->getPost('img_old[]');



			

			foreach ($link as $key=>$value) {

				if($img[$key]->isValid()){

					if(!empty($img_old[$key])){
						unlink($_SERVER['DOCUMENT_ROOT'].'public/resto_assets/assets/img/icon/'.$img_old[$key]);  
					}			
					$filename =$img[$key]->getRandomName();
					$img[$key]->move(FCPATH . 'public/resto_assets/assets/img/icon', $filename);			

				}else{
					if(!empty($img_old[$key])){
						$filename	= $img_old[$key];
					}else{
						$filename =NULL;
					}				
				}

				$data=[
					'r_id' 			=> $r_id,
					'link'			=> $value,
					'show'			=> $show[$key],
					'img' 			=> $filename,
					'create_by' 	=> session()->get('full_name')
				];
				$this->Global_model->insertTable('available_logo',$data);
			}

			session()->setFlashdata('success', 'Available Logo updated');
			return redirect()->to('/Master/Master_restaurant');
		}
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
			'email' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'email Harus diisi'
				]
			],
			'wa' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Whatsapp Date Harus diisi'
				]
			],
			'opening_hours' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Opening hours Harus diisi'
				]
			],
			'about' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'about Harus diisi'
				]
			],
			'tagline' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'tagline Harus diisi'
				]
			],
			'address' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'address Harus diisi'
				]
			],
			'link_facebook' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'link facebook Harus diisi'
				]
			],
			'link_instagram' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'link instagram Harus diisi'
				]
			],
			'link_gofood' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'link gofood Harus diisi'
				]
			],
			'link_maps' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'link maps Harus diisi'
				]
			],
			'link_google' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'link google Harus diisi'
				]
			],
			'link_youtube' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'link youtube Harus diisi'
				]
			],
			'link_tiktok' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'link tiktok Harus diisi'
				]
			],
			'img' => [
                'label' => 'Image File',
                'rules' => 'uploaded[img]'
                    . '|is_image[img]'
                    . '|mime_in[img,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                    . '|max_size[img,1]',
            ],
			'link_tripadvisor' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'link tripadvisor Harus diisi'
				]
			]
		])) {
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->to('/Master/Master_restaurant/add_form')->withInput();;
		} else {
			$name 			= $this->request->getPost('name');
			$index_name		= str_replace(" ","-",$name);	
			$email 			= $this->request->getPost('email');
			$wa 			= $this->request->getPost('wa');
			$opening_hours 	= $this->request->getPost('opening_hours');
			$about 			= $this->request->getPost('about');
			$tagline 		= $this->request->getPost('tagline');
			$address 		= $this->request->getPost('address');
			$link_facebook 	= $this->request->getPost('link_facebook');
			$link_instagram	= $this->request->getPost('link_instagram');
			$link_gofood 	= $this->request->getPost('link_gofood');
			$link_maps 		= $this->request->getPost('link_maps');
			$link_google 	= $this->request->getPost('link_google');
			$link_youtube 	= $this->request->getPost('link_youtube');
			$link_tiktok 	= $this->request->getPost('link_tiktok');
			$link_tripadvisor= $this->request->getPost('link_tripadvisor');
			$widget_tripadvisor= $this->request->getPost('widget_tripadvisor');


			$img 			= $this->request->getFile('img');



			$filename =$img->getRandomName();
			$img->move(FCPATH . 'public/resto_assets/assets/img/resto', $filename);
			

			$data = [
				'name' 				=> $name,
				'index_name' 		=> $index_name,
				'email' 			=> $email,
				'wa' 				=> $wa,
				'opening_hours' 	=> $opening_hours,
				'about' 			=> $about,
				'tagline' 			=> $tagline,
				'address' 			=> $address,
				'link_facebook' 	=> $link_facebook,
				'link_instagram' 	=> $link_instagram,
				'img' 				=> $filename,
				'link_gofood' 		=> $link_gofood,
				'link_maps' 		=> $link_maps,
				'link_google' 		=> $link_google,
				'link_youtube' 		=> $link_youtube,
				'link_tiktok' 		=> $link_tiktok,
				'link_tripadvisor' 	=> $link_tripadvisor,
				'widget_tripadvisor'=> $widget_tripadvisor,
				'create_by' 		=> session()->get('full_name')
			];
			$this->Global_model->insertTable('restaurants',$data);
			session()->setFlashdata('success', 'Restaurant Added');
			return redirect()->to('/Master/Master_restaurant');
		}
	}

	public function update()
	{
		$r_id = $this->request->getPost('r_id');

		if (!$this->validate([
			'name' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Harus diisi'
				]
			],
			'email' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'email Harus diisi'
				]
			],
			'wa' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Whatsapp Harus diisi'
				]
			],
			'opening_hours' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Opening hours Harus diisi'
				]
			],
			'about' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'about Harus diisi'
				]
			],
			'tagline' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'tagline Harus diisi'
				]
			],
			'address' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'address Harus diisi'
				]
			],
			'link_facebook' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'link facebook Harus diisi'
				]
			],
			'link_instagram' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'link instagram Harus diisi'
				]
			],
			'link_gofood' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'link gofood Harus diisi'
				]
			],
			'link_maps' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'link maps Harus diisi'
				]
			],
			'link_google' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'link google Harus diisi'
				]
			],
			'link_youtube' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'link youtube Harus diisi'
				]
			],
			'link_tiktok' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'link tiktok Harus diisi'
				]
			],
			'img_' => [
                'label' => 'Image File',
                'rules' => 'uploaded[img_]'
                    . '|is_image[img_]'
                    . '|mime_in[img_,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                    . '|max_size[img_,1000]',
            ],
			'link_tripadvisor' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'link tripadvisor Harus diisi'
				]
			]
		])) {
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->to('/Master/Master_restaurant/edit_form/'.$r_id)->withInput();;
		} else {
			$name 			= $this->request->getPost('name');
			$email 			= $this->request->getPost('email');
			$wa 			= $this->request->getPost('wa');
			$opening_hours 	= $this->request->getPost('opening_hours');
			$about 			= $this->request->getPost('about');
			$tagline 		= $this->request->getPost('tagline');
			$address 		= $this->request->getPost('address');
			$link_facebook 	= $this->request->getPost('link_facebook');
			$link_instagram	= $this->request->getPost('link_instagram');
			$link_gofood 	= $this->request->getPost('link_gofood');
			$link_maps 		= $this->request->getPost('link_maps');
			$link_google 	= $this->request->getPost('link_google');
			$link_youtube 	= $this->request->getPost('link_youtube');
			$link_tiktok 	= $this->request->getPost('link_tiktok');
			$link_tripadvisor= $this->request->getPost('link_tripadvisor');
			$widget_tripadvisor= $this->request->getPost('widget_tripadvisor');


			$img 				= $this->request->getFile('img_');
			$img_old 			= $this->request->getPost('img_old');



			if($img->isValid()){

				if(!empty($img_old)){
					unlink($_SERVER['DOCUMENT_ROOT'].'public/resto_assets/assets/img/resto/'.$img_old);  
				}			
				$filename =$img->getRandomName();
				// echo FCPATH.'public/resto_assets/assets/img/resto';
				// die;
				$img->move(FCPATH . 'public/resto_assets/assets/img/resto', $filename);			

			}else{

				log_message('error','masuk sini doang');
				if(!empty($img_old)){
					$filename	= $img_old;
				}else{
					$filename =NULL;
				}				
			}
			
			$data = [
				'name' 				=> $name,
				'email' 			=> $email,
				'wa' 				=> $wa,
				'opening_hours' 	=> $opening_hours,
				'img' 				=> $filename,
				'about' 			=> $about,
				'tagline' 			=> $tagline,
				'address' 			=> $address,
				'link_facebook' 	=> $link_facebook,
				'link_instagram' 	=> $link_instagram,
				'link_gofood' 		=> $link_gofood,
				'link_maps' 		=> $link_maps,
				'link_google' 		=> $link_google,
				'link_youtube' 		=> $link_youtube,
				'link_tiktok' 		=> $link_tiktok,
				'link_tripadvisor' 	=> $link_tripadvisor,
				'widget_tripadvisor'=> $widget_tripadvisor,
				'create_by' 		=> session()->get('full_name')
			];
			$this->Global_model->updateTable('restaurants',['r_id'=>$r_id],$data);
			session()->setFlashdata('success', 'Restaurant updated');
			return redirect()->to('/Master/Master_restaurant');
		}
	}
}