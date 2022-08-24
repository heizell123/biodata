<?php 

namespace App\Controllers\Master;

use App\Controllers\BaseController;
use App\Models\Global_model;

class Master_review extends BaseController
{
	public function index()
	{
		$menu 			= $this->Global_model->get_menu(session()->get('idrole'));
		$sidebar 		= $this->Multi_menu->fetch_menu($menu);
		$list_review	= $this->Global_model->table('review');
		$data = [
			'title'			=>'List Review',
			'review' 		=>$list_review, 	
			'sidebar'		=>$sidebar
		];
		return view('master/master_review/view_list',$data);
		
	}

	public function add_form()
	{
		$menu 		= $this->Global_model->get_menu(session()->get('idrole'));
		$sidebar 	= $this->Multi_menu->fetch_menu($menu);
		$data = [
			'title'			=>'Add Review', 	
			'sidebar'		=>$sidebar
		];
		return view('master/master_review/add_form',$data);
		
	}

	public function edit_form($id)
	{
		$menu 		= $this->Global_model->get_menu(session()->get('idrole'));
		$sidebar 	= $this->Multi_menu->fetch_menu($menu);
		$review 	= $this->Global_model->getTable('review',['rev_id'=>$id]);
		$data = [
			'title'			=>'Edit Review',
			'review' 		=>$review, 		
			'sidebar'		=>$sidebar
		];
		return view('master/master_review/edit_form',$data);
		
	}
	public function delete($id)
	{
		
		$this->Global_model->updateTable('review',['rev_id'=>$id],['active'=>0]);
        echo json_encode(array('message'=>'success'));	
	}

	public function active($id)
	{
		
		$this->Global_model->updateTable('review',['rev_id'=>$id],['active'=>1]);
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
			'comment' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'comment Harus diisi'
				]
			]
		])) {
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->to('/Master/Master_review/add_form')->withInput();;
		} else {
			$name 			= $this->request->getPost('name');
			$comment 		= $this->request->getPost('comment');


			

			$data = [
				'name' 				=> $name,
				'comment' 			=> $comment,
				'create_by' 		=> session()->get('full_name')
			];
			$this->Global_model->insertTable('review',$data);
			session()->setFlashdata('success', 'Review Added');
			return redirect()->to('/Master/Master_review');
		}
	}

	public function update()
	{
		$rev_id = $this->request->getPost('rev_id');

		if (!$this->validate([
			'name' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Harus diisi'
				]
			],
			'comment' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'comment Harus diisi'
				]
			]
		])) {
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->to('/Master/Master_review/edit_form/'.$rev_id)->withInput();;
		} else {
			$name 			= $this->request->getPost('name');
			$comment 		= $this->request->getPost('comment');


			

			$data = [
				'name' 				=> $name,
				'comment' 			=> $comment,
				'update_date' 		=> date('Y-m-d H:i:s'),
				'update_by' 		=> session()->get('full_name')
			];
			$this->Global_model->updateTable('review',['rev_id'=>$rev_id],$data);
			session()->setFlashdata('success', 'Review updated');
			return redirect()->to('/Master/Master_review');
		}
	}
}