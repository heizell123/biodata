<?php 

namespace App\Controllers\Master;

use App\Controllers\BaseController;
use App\Models\Global_model;

class Master_news extends BaseController
{
	public function index()
	{
		$menu 			= $this->Global_model->get_menu(session()->get('idrole'));
		$sidebar 		= $this->Multi_menu->fetch_menu($menu);
		$list_news		= $this->Global_model->table('news');
		$data = [
			'title'			=>'List News',
			'news' 			=>$list_news, 	
			'sidebar'		=>$sidebar
		];
		return view('master/master_news/view_list',$data);
		
	}

	public function add_form()
	{
		$menu 		= $this->Global_model->get_menu(session()->get('idrole'));
		$sidebar 	= $this->Multi_menu->fetch_menu($menu);
		$data = [
			'title'			=>'Add News', 	
			'sidebar'		=>$sidebar
		];
		return view('master/master_news/add_form',$data);
		
	}

	public function edit_form($id)
	{
		$menu 		= $this->Global_model->get_menu(session()->get('idrole'));
		$sidebar 	= $this->Multi_menu->fetch_menu($menu);
		$news 		= $this->Global_model->getTable('news',['n_id'=>$id]);
		$data = [
			'title'			=>'Edit News',
			'news' 			=>$news, 		
			'sidebar'		=>$sidebar
		];
		return view('master/master_news/edit_form',$data);
		
	}
	public function delete($id)
	{
		
		$this->Global_model->updateTable('news',['n_id'=>$id],['active'=>0]);
        echo json_encode(array('message'=>'success'));	
	}

	public function active($id)
	{
		
		$this->Global_model->updateTable('news',['n_id'=>$id],['active'=>1]);
        echo json_encode(array('message'=>'success'));	
	}

	public function save()
	{
		if (!$this->validate([
			'title' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Harus diisi'
				]
			],
			'text_header' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Text Header Harus diisi'
				]
			],
			'img' => [
                'label' => 'Image File',
                'rules' => 'uploaded[img]'
                    . '|is_image[img]'
                    . '|mime_in[img,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                    . '|max_size[img,1000]',
            ],
			'content' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'content Harus diisi'
				]
			]
		])) {
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->to('/Master/Master_news/add_form')->withInput();;
		} else {
			$title 			= $this->request->getPost('title');
			$text_header 	= $this->request->getPost('text_header');
			$content 		= $this->request->getPost('content');
			$img 			= $this->request->getFile('img');



			$filename =$img->getRandomName();
			$img->move(FCPATH . 'public/resto_assets/assets/img/news', $filename);

	

			$data = [
				'title' 			=> $title,
				'content' 			=> $content,
				'text_header' 		=> $text_header, 
				'img' 				=> $filename,
				'create_by' 		=> session()->get('full_name')
			];
			$this->Global_model->insertTable('news',$data);
			session()->setFlashdata('success', 'News Added');
			return redirect()->to('/Master/Master_news');
		}
	}

	public function update()
	{
		$n_id = $this->request->getPost('n_id');
		if (!$this->validate([
			'title' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Harus diisi'
				]
			],
			'text_header' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Text Header Harus diisi'
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
			return redirect()->to('/Master/Master_news/edit_form/'.$n_id)->withInput();;
		} else {
			$title 			= $this->request->getPost('title');
			$text_header 	= $this->request->getPost('text_header');
			$content 		= $this->request->getPost('content');
			$img 			= $this->request->getFile('img');
			$img_old 		= $this->request->getPost('img_old');


			if($img->isValid()){

				if(!empty($img_old)){
					unlink($_SERVER['DOCUMENT_ROOT'].'public/resto_assets/assets/img/news/'.$img_old);  
				}			
				$filename =$img->getRandomName();
				$img->move(FCPATH . 'public/resto_assets/assets/img/news', $filename);			

			}else{
				if(!empty($img_old)){
					$filename	= $img_old;
				}else{
					$filename =NULL;
				}				
			}
			

			$data = [
				'title' 			=> $title,
				'content' 			=> $content,
				'text_header' 		=> $text_header, 
				'img' 				=> $filename,
				'update_date' 		=> date('Y-m-d G:i:s'),
				'update_by' 		=> session()->get('full_name')
			];
			$this->Global_model->updateTable('news',['n_id'=>$n_id],$data);
			session()->setFlashdata('success', 'News updated');
			return redirect()->to('/Master/Master_news');
		}
	}

	public function upload_image_news()
	{
		$img = $this->request->getFile('image');
		$filename =$img->getRandomName();
		$img->move(FCPATH . 'public/resto_assets/assets/img/news_note', $filename);

	}
}