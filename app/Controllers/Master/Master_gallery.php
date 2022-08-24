<?php 

namespace App\Controllers\Master;

use App\Controllers\BaseController;
use App\Models\Global_model;

class Master_gallery extends BaseController
{
	public function index()
	{
		$menu 				= $this->Global_model->get_menu(session()->get('idrole'));
		$sidebar 			= $this->Multi_menu->fetch_menu($menu);
		$gallery_business	= $this->Global_model->table('gallery_business');
		$gallery_customer	= $this->Global_model->table('gallery_customer');
		$gallery_resto		= $this->Global_model->selectQuery('SELECT *,a.active AS ac FROM gallery_resto AS a JOIN restaurants AS b ON a.r_id = b.r_id');
		$data = [
			'title'					=>'List Gallery',
			'gallery_business' 		=>$gallery_business,
			'gallery_customer' 		=>$gallery_customer,
			'gallery_resto' 		=>$gallery_resto, 	
			'sidebar'				=>$sidebar
		];
		return view('master/master_gallery/view_list',$data);
		
	}

	public function add_form_gc()
	{
		$menu 		= $this->Global_model->get_menu(session()->get('idrole'));
		$sidebar 	= $this->Multi_menu->fetch_menu($menu);
		$data = [
			'title'			=>'Add Gallery Customers', 	
			'sidebar'		=>$sidebar
		];
		return view('master/master_gallery/gallery_customer/add_form',$data);
		
	}


	public function edit_form_gc($id)
	{
		$menu 		= $this->Global_model->get_menu(session()->get('idrole'));
		$sidebar 	= $this->Multi_menu->fetch_menu($menu);
		$gallery 	= $this->Global_model->getTable('gallery_customer',['gc_id'=>$id]);
		$data = [
			'title'			=>'Edit Gallery Customer',
			'gallery' 		=>$gallery, 		
			'sidebar'		=>$sidebar
		];
		return view('master/master_gallery/gallery_customer/edit_form',$data);
		
	}

	public function add_form_gb()
	{
		$menu 		= $this->Global_model->get_menu(session()->get('idrole'));
		$sidebar 	= $this->Multi_menu->fetch_menu($menu);
		$data = [
			'title'			=>'Add Gallery Business', 	
			'sidebar'		=>$sidebar
		];
		return view('master/master_gallery/gallery_business/add_form',$data);
		
	}


	public function edit_form_gb($id)
	{
		$menu 		= $this->Global_model->get_menu(session()->get('idrole'));
		$sidebar 	= $this->Multi_menu->fetch_menu($menu);
		$gallery 	= $this->Global_model->getTable('gallery_business',['gb_id'=>$id]);
		$data = [
			'title'			=>'Edit Gallery Business',
			'gallery' 		=>$gallery, 		
			'sidebar'		=>$sidebar
		];
		return view('master/master_gallery/gallery_business/edit_form',$data);
		
	}

	public function add_form_gr()
	{
		$menu 		= $this->Global_model->get_menu(session()->get('idrole'));
		$sidebar 	= $this->Multi_menu->fetch_menu($menu);
		$resto 		= $this->Global_model->getTable('restaurants',['active'=>1]);
		$data = [
			'title'			=>'Add Gallery Resto',
			'resto' 		=>$resto, 	
			'sidebar'		=>$sidebar
		];
		return view('master/master_gallery/gallery_resto/add_form',$data);
		
	}


	public function edit_form_gr($id)
	{
		$menu 		= $this->Global_model->get_menu(session()->get('idrole'));
		$sidebar 	= $this->Multi_menu->fetch_menu($menu);
		$gallery 	= $this->Global_model->getTable('gallery_resto',['gr_id'=>$id]);
		$resto 		= $this->Global_model->getTable('restaurants',['active'=>1]);
		$data = [
			'title'			=>'Edit Gallery Resto',
			'resto' 		=>$resto,
			'gallery' 		=>$gallery, 		
			'sidebar'		=>$sidebar
		];
		return view('master/master_gallery/gallery_resto/edit_form',$data);
		
	}
	public function delete_gc($id)
	{
		
		$this->Global_model->updateTable('gallery_customer',['gc_id'=>$id],['active'=>0]);
        echo json_encode(array('message'=>'success'));	
	}

	public function active_gc($id)
	{
		
		$this->Global_model->updateTable('gallery_customer',['gc_id'=>$id],['active'=>1]);
        echo json_encode(array('message'=>'success'));	
	}

	public function delete_gb($id)
	{
		
		$this->Global_model->updateTable('gallery_business',['gb_id'=>$id],['active'=>0]);
        echo json_encode(array('message'=>'success'));	
	}

	public function active_gb($id)
	{
		
		$this->Global_model->updateTable('gallery_business',['gb_id'=>$id],['active'=>1]);
        echo json_encode(array('message'=>'success'));	
	}

	public function delete_gr($id)
	{
		
		$this->Global_model->updateTable('gallery_resto',['gr_id'=>$id],['active'=>0]);
        echo json_encode(array('message'=>'success'));	
	}

	public function active_gr($id)
	{
		
		$this->Global_model->updateTable('gallery_resto',['gr_id'=>$id],['active'=>1]);
        echo json_encode(array('message'=>'success'));	
	}

	public function save_gc()
	{
		if (!$this->validate([
			'gallery_name' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Gallery Name Harus diisi'
				]
			],
			'img' => [
                'label' => 'Image File',
                'rules' => 'uploaded[img]'
                    . '|is_image[img]'
                    . '|mime_in[img,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                    . '|max_size[img,1000]',
            ],
			'gallery_link' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Gallery Link Harus diisi'
				]
			]
		])) {
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->to('/Master/Master_gallery/add_form_gc')->withInput();;
		} else {
			$gallery_name 	= $this->request->getPost('gallery_name');
			$gallery_link 	= $this->request->getPost('gallery_link');
			$img 			= $this->request->getFile('img');



			$filename =$img->getRandomName();
			$img->move(FCPATH . 'public/resto_assets/assets/img/gallery_customer', $filename);
			

			$data = [
				'gallery_name' 		=> $gallery_name,
				'gallery_link' 		=> $gallery_link, 
				'gallery_img' 		=> $filename,
				'create_by' 		=> session()->get('full_name')
			];
			$this->Global_model->insertTable('gallery_customer',$data);
			session()->setFlashdata('success', 'Gallery Custom Added');
			return redirect()->to('/Master/Master_gallery');
		}
	}

	public function save_gb()
	{
		if (!$this->validate([
			'img' => [
                'label' => 'Image File',
                'rules' => 'uploaded[img]'
                    . '|is_image[img]'
                    . '|mime_in[img,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                    . '|max_size[img,3000]',
            ],
			'gallery_name' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Gallery Name Harus diisi'
				]
			]
		])) {
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->to('/Master/Master_gallery/add_form_gb')->withInput();;
		} else {
			$gallery_name 	= $this->request->getPost('gallery_name');
			$img 			= $this->request->getFile('img');



			$filename =$img->getRandomName();
			$img->move(FCPATH . 'public/resto_assets/assets/img/gallery_business', $filename);
			

			$data = [
				'gallery_name' 		=> $gallery_name, 
				'gallery_img' 		=> $filename,
				'create_by' 		=> session()->get('full_name')
			];
			$this->Global_model->insertTable('gallery_business',$data);
			session()->setFlashdata('success', 'Gallery Business Added');
			return redirect()->to('/Master/Master_gallery');
		}
	}

	public function save_gr()
	{
		if (!$this->validate([
			'gallery_name' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Gallery Name Harus diisi'
				]
			],
			'type_gallery' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Gallery Type Name Harus diisi'
				]
			],
			'img' => [
                'label' => 'Image File',
                'rules' => 'uploaded[img]'
                    . '|is_image[img]'
                    . '|mime_in[img,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                    . '|max_size[img,3000]',
            ],
			'r_id' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Restaurant Harus diisi'
				]
			]
		])) {
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->to('/Master/Master_gallery/add_form_gr')->withInput();;
		} else {
			$gallery_name 	= $this->request->getPost('gallery_name');
			$type_gallery 	= $this->request->getPost('type_gallery');
			$r_id 			= $this->request->getPost('r_id');
			$img 			= $this->request->getFile('img');



			$filename =$img->getRandomName();
			if($type_gallery=='detail'){
				$img->move(FCPATH . 'public/resto_assets/assets/img/gallery_detail', $filename);
			}else{
				$img->move(FCPATH . 'public/resto_assets/assets/img/gallery_header', $filename);
			}

			$data = [
				'gallery_name' 		=> $gallery_name, 
				'gallery_img' 		=> $filename,
				'r_id' 				=> $r_id,
				'type_gallery' 		=> $type_gallery,
				'create_by' 		=> session()->get('full_name')
			];
			$this->Global_model->insertTable('gallery_resto',$data);
			session()->setFlashdata('success', 'Gallery Restaurant Added');
			return redirect()->to('/Master/Master_gallery');
		}
	}

	public function update_gc()
	{
		$gc_id = $this->request->getPost('gc_id');
		if (!$this->validate([
			'gallery_name' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Gallery Name Harus diisi'
				]
			],
			
			'gallery_link' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Gallery Link Harus diisi'
				]
			]
		])) {
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->to('/Master/Master_gallery/edit_form_gc/'.$gc_id)->withInput();;
		} else {
			$gallery_name 	= $this->request->getPost('gallery_name');
			$gallery_link 	= $this->request->getPost('gallery_link');
			$img 			= $this->request->getFile('img');
			$img_old 		= $this->request->getPost('img_old');

			if($img->isValid()){

				if(!empty($img_old)){
					unlink($_SERVER['DOCUMENT_ROOT'].'public/resto_assets/assets/img/gallery_customer/'.$img_old);  
				}			
				$filename =$img->getRandomName();
				$img->move(FCPATH . 'public/resto_assets/assets/img/gallery_customer', $filename);			

			}else{
				if(!empty($img_old)){
					$filename	= $img_old;
				}else{
					$filename =NULL;
				}				
			}
			

			$data = [
				'gallery_name' 		=> $gallery_name,
				'gallery_link' 		=> $gallery_link, 
				'gallery_img' 		=> $filename,
				'update_date' 		=> date('Y-m-d G:i:s'),
				'update_by' 		=> session()->get('full_name')
			];
			$this->Global_model->updateTable('gallery_customer',['gc_id'=>$gc_id],$data);
			session()->setFlashdata('success', 'Gallery Customer updated');
			return redirect()->to('/Master/Master_gallery');
		}
	}

	public function update_gb()
	{
		$gb_id = $this->request->getPost('gb_id');
		if (!$this->validate([
			
			'gallery_name' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Gallery Name Harus diisi'
				]
			]
		])) {
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->to('/Master/Master_gallery/edit_form_gb/'.$gb_id)->withInput();;
		} else {
			$gallery_name 	= $this->request->getPost('gallery_name');
			$img 			= $this->request->getFile('img');
			$img_old 		= $this->request->getPost('img_old');

			if($img->isValid()){

				if(!empty($img_old)){
					unlink($_SERVER['DOCUMENT_ROOT'].'public/resto_assets/assets/img/gallery_business/'.$img_old);  
				}			
				$filename =$img->getRandomName();
				$img->move(FCPATH . 'public/resto_assets/assets/img/gallery_business', $filename);			

			}else{
				if(!empty($img_old)){
					$filename	= $img_old;
				}else{
					$filename =NULL;
				}				
			}
			

			$data = [
				'gallery_name' 		=> $gallery_name, 
				'gallery_img' 		=> $filename,
				'update_date' 		=> date('Y-m-d G:i:s'),
				'update_by' 		=> session()->get('full_name')
			];
			$this->Global_model->updateTable('gallery_business',['gb_id'=>$gb_id],$data);
			session()->setFlashdata('success', 'Gallery Business updated');
			return redirect()->to('/Master/Master_gallery');
		}
	}

	public function update_gr()
	{
		$gr_id = $this->request->getPost('gr_id');
		if (!$this->validate([
			'gallery_name' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Gallery Name Harus diisi'
				]
			],
			
			'r_id' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Restaurant Name Harus diisi'
				]
			]
		])) {
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->to('/Master/Master_gallery/edit_form_gr/'.$gr_id)->withInput();;
		} else {
			$gallery_name 	= $this->request->getPost('gallery_name');
			$type_gallery 	= $this->request->getPost('type_gallery');
			$r_id 			= $this->request->getPost('r_id');
			$img 			= $this->request->getFile('img');
			$img_old 		= $this->request->getPost('img_old');

			if($type_gallery=='detail'){

				if($img->isValid()){

							
					$filename =$img->getRandomName();
					$img->move(FCPATH . 'public/resto_assets/assets/img/gallery_detail', $filename);			

				}else{
					if(!empty($img_old)){
						$filename	= $img_old;
					}else{
						$filename =NULL;
					}				
				}
			}else{
				if($img!=''){

								
					$filename =$img->getRandomName();
					$img->move(FCPATH . 'public/resto_assets/assets/img/gallery_header', $filename);			

				}else{
					if(!empty($img_old)){
						$filename	= $img_old;
					}else{
						$filename =NULL;
					}				
				}
			}
			

			$data = [
				'gallery_name' 		=> $gallery_name, 
				'gallery_img' 		=> $filename,
				'r_id' 				=> $r_id,
				'type_gallery' 		=> $type_gallery,
				'update_date' 		=> date('Y-m-d G:i:s'),
				'update_by' 		=> session()->get('full_name')
			];
			$this->Global_model->updateTable('gallery_resto',['gr_id'=>$gr_id],$data);
			session()->setFlashdata('success', 'Gallery Business updated');
			return redirect()->to('/Master/Master_gallery');
		}
	}

}