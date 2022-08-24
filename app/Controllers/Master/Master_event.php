<?php 

namespace App\Controllers\Master;

use App\Controllers\BaseController;
use App\Models\Global_model;

class Master_event extends BaseController
{
	public function index()
	{
		$menu 			= $this->Global_model->get_menu(session()->get('idrole'));
		$sidebar 		= $this->Multi_menu->fetch_menu($menu);
		$list_whats_on	= $this->Global_model->table('whats_on');
		$data = [
			'title'			=>'List Whats On',
			'whats_on' 		=>$list_whats_on, 	
			'sidebar'		=>$sidebar
		];
		return view('master/master_event/view_list',$data);
		
	}

	public function add_form()
	{
		$menu 		= $this->Global_model->get_menu(session()->get('idrole'));
		$sidebar 	= $this->Multi_menu->fetch_menu($menu);
		$data = [
			'title'			=>'Add Whats on', 	
			'sidebar'		=>$sidebar
		];
		return view('master/master_event/add_form',$data);
		
	}

	public function edit_form($id)
	{
		$menu 		= $this->Global_model->get_menu(session()->get('idrole'));
		$sidebar 	= $this->Multi_menu->fetch_menu($menu);
		$whatson 	= $this->Global_model->getTable('whats_on',['w_id'=>$id]);
		$data = [
			'title'			=>'Edit whats on',
			'whatson' 		=>$whatson, 		
			'sidebar'		=>$sidebar
		];
		return view('master/master_event/edit_form',$data);
		
	}
	public function delete($id)
	{
		
		$this->Global_model->updateTable('whats_on',['w_id'=>$id],['active'=>0]);
        echo json_encode(array('message'=>'success'));	
	}

	public function active($id)
	{
		
		$this->Global_model->updateTable('whats_on',['w_id'=>$id],['active'=>1]);
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
			'num_order' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'order Harus diisi'
				]
			],
			'start_date' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Start Date Harus diisi'
				]
			],
			'end_date' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'End Date Harus diisi'
				]
			],
			'content' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'content Harus diisi'
				]
			]
		])) {
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->to('/Master/Master_event/add_form')->withInput();;
		} else {
			$name 			= $this->request->getPost('name');
			$num_order 		= $this->request->getPost('num_order');
			$content 		= $this->request->getPost('content');
			$img 			= $this->request->getFile('img');
			$thumbnail 		= $this->request->getFile('thumbnail');


			$start_date	 	= $this->request->getPost('start_date');
			$start_date 	= str_replace('/', '-', $start_date);
			$start_date	= date('Y-m-d',strtotime($start_date));
			$end_date	 	= $this->request->getPost('end_date');
			$end_date 	= str_replace('/', '-', $end_date);
			$end_date	= date('Y-m-d',strtotime($end_date));

			$filename =$img->getRandomName();
			$img->move(FCPATH . 'public/resto_assets/assets/img/whatson', $filename);


			$filename_t =$thumbnail->getRandomName();
			$thumbnail->move(FCPATH . 'public/resto_assets/assets/img/thumbnail', $filename_t);			

			$data = [
				'name' 				=> $name,
				'num_order' 		=> $num_order,
				'content' 			=> $content,
				'start_date' 		=> $start_date,
				'end_date' 			=> $end_date, 
				'img' 				=> $filename,
				'thumbnail' 		=> $filename_t,
				'create_by' 		=> session()->get('full_name')
			];
			$this->Global_model->insertTable('whats_on',$data);
			session()->setFlashdata('success', 'Whats On Added');
			return redirect()->to('/Master/Master_event');
		}
	}

	public function update()
	{
		$w_id = $this->request->getPost('w_id');
		if (!$this->validate([
			'name' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Harus diisi'
				]
			],
			'num_order' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'order Harus diisi'
				]
			],
			'start_date' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Start Date Harus diisi'
				]
			],
			'end_date' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'End Date Harus diisi'
				]
			],
			'content' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'content Harus diisi'
				]
			]
		])) {
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->to('/Master/Master_event/edit_form/'.$w_id)->withInput();;
		} else {
			$name 			= $this->request->getPost('name');
			$num_order 		= $this->request->getPost('num_order');
			$content 		= $this->request->getPost('content');
			$img_old 		= $this->request->getPost('img_old');
			$thumbnail_old 	= $this->request->getPost('thumbnail_old');
			$img 			= $this->request->getFile('img');
			$thumbnail 		= $this->request->getFile('thumbnail');

			$start_date	 	= $this->request->getPost('start_date');
			$start_date 	= str_replace('/', '-', $start_date);
			$start_date	= date('Y-m-d',strtotime($start_date));
			$end_date	 	= $this->request->getPost('end_date');
			$end_date 	= str_replace('/', '-', $end_date);
			$end_date	= date('Y-m-d',strtotime($end_date));

			if($img->isValid()){

				if(!empty($img_old)){
					unlink($_SERVER['DOCUMENT_ROOT'].'public/resto_assets/assets/img/whatson/'.$img_old);  
				}			
				$filename =$img->getRandomName();
				$img->move(FCPATH . 'public/resto_assets/assets/img/whatson', $filename);			

			}else{
				if(!empty($img_old)){
					$filename	= $img_old;
				}else{
					$filename =NULL;
				}				
			}

			if($thumbnail->isValid()){

				if(!empty($thumbnail_old)){
					unlink($_SERVER['DOCUMENT_ROOT'].'public/resto_assets/assets/img/thumbnail/'.$thumbnail_old);  
				}			
				$filename_t =$thumbnail->getRandomName();
				$thumbnail->move(FCPATH . 'public/resto_assets/assets/img/thumbnail', $filename_t);			

			}else{
				if(!empty($thumbnail_old)){
					$filename_t	= $thumbnail_old;
				}else{
					$filename_t =NULL;
				}				
			}			

			$data = [
				'name' 				=> $name,
				'num_order' 		=> $num_order,
				'content' 			=> $content,
				'start_date' 		=> $start_date,
				'end_date' 			=> $end_date, 
				'img' 				=> $filename,
				'thumbnail' 		=> $filename_t,
				'update_date' 		=> date('Y-m-d G:i:s'),
				'update_by' 		=> session()->get('full_name')
			];
			$this->Global_model->updateTable('whats_on',['w_id'=>$w_id],$data);
			session()->setFlashdata('success', 'Whats On updated');
			return redirect()->to('/Master/Master_event');
		}
	}
}