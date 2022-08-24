<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Login_model;
use App\Models\Global_model;

class Biodata extends BaseController
{
	public function index()
	{
		
	}
	function entryData()
	{
		$menu  			= $this->Global_model->get_menu(session()->get('role_id'));
		$sidebar  		= $this->Multi_menu->fetch_menu($menu);
		$user_id 		= session()->get('user_id');

		$data=[
			'title'=>'Entry Data',
			'sidebar'=> $sidebar
		];
		$data['bio'] = $this->Global_model->getTable('biodata',['user_id'=>$user_id]);
		if(!empty($data['bio'])){
			$data['pendidikan'] = $this->Global_model->getTable('pendidikan',['id_bio'=>$data['bio'][0]['id']]);
			$data['pelatihan'] = $this->Global_model->getTable('pelatihan',['id_bio'=>$data['bio'][0]['id']]);
			$data['pekerjaan'] = $this->Global_model->getTable('pekerjaan',['id_bio'=>$data['bio'][0]['id']]);
		}
		return view('view_entry',$data);	
	}
	function save()
	{
		$id_bio = $this->request->getPost('id_bio');
		$user_id = $this->request->getPost('user_id');
		$dob = replaceDate($this->request->getPost('dob'));
		$data_bio=[
			'posisi'=>$this->request->getPost('posisi'),
			'nama'	=>$this->request->getPost('nama'),
			'ktp'	=>$this->request->getPost('ktp'),
			'dob'=>$dob,
			'pob'=>$this->request->getPost('pob'),
			'jk'=>$this->request->getPost('jk'),
			'agama'=>$this->request->getPost('agama'),
			'gol'=>$this->request->getPost('gol'),
			'status'=>$this->request->getPost('status'),
			'alamat'=>$this->request->getPost('alamat'),
			'email'=>$this->request->getPost('email'),
			'no_tlp'=>$this->request->getPost('no_tlp'),
			'orang_dekat'=>$this->request->getPost('orang_dekat'),
			'skill'=>$this->request->getPost('skill'),
			'bersedia'=>$this->request->getPost('bersedia'),
			'expektasi_gaji'=>$this->request->getPost('expektasi_gaji')
		];
		$this->Global_model->updateTable('biodata',['id'=>$id_bio],$data_bio);

		$data_user =[
			'email'=>$this->request->getPost('email'),
			'full_name'=>$this->request->getPost('nama')
		];
		$this->Global_model->updateTable('user',['user_id'=>$user_id],$data_user);

		$where =['id_bio'=>$id_bio];
		$this->Global_model->deleteTable('pendidikan',$where);
		$this->Global_model->deleteTable('pelatihan',$where);
		$this->Global_model->deleteTable('pekerjaan',$where);

		$jenjang= $this->request->getPost('jenjang');
		$nama_institusi= $this->request->getPost('nama_institusi');
		$jurusan= $this->request->getPost('jurusan');
		$tahun_lulus= $this->request->getPost('tahun_lulus');
		$ipk= $this->request->getPost('ipk');
		foreach ($jenjang as $key=>$val) {
			$data=[
				'jenjang'=>$val,
				'nama_institusi'=>$nama_institusi[$key],
				'jurusan'=>$jurusan[$key],
				'tahun_lulus'=>$tahun_lulus[$key],
				'ipk'=>$ipk[$key],
				'id_bio'=>$id_bio
			];
			$this->Global_model->insertTable('pendidikan',$data);
		}

		$nama_kursus= $this->request->getPost('nama_kursus');
		$setifikat= $this->request->getPost('setifikat');
		$tahun_pelatihan= $this->request->getPost('tahun_pelatihan');
		foreach ($nama_kursus as $key=>$val) {
			$data=[
				'nama_kursus'=>$val,
				'setifikat'=>$setifikat[$key],
				'tahun_pelatihan'=>$tahun_pelatihan[$key],
				'id_bio'=>$id_bio
			];
			$this->Global_model->insertTable('pelatihan',$data);
		}

		$perusahaan= $this->request->getPost('perusahaan');
		$posisi_terakhir= $this->request->getPost('posisi_terakhir');
		$pendapatan= $this->request->getPost('pendapatan');
		$tahun_pekerjaan= $this->request->getPost('tahun_pekerjaan');
		foreach ($perusahaan as $key=>$val) {
			$data=[
				'perusahaan'=>$val,
				'posisi_terakhir'=>$posisi_terakhir[$key],
				'pendapatan' => $pendapatan[$key],
				'tahun_pekerjaan'=>$tahun_pekerjaan[$key],
				'id_bio'=>$id_bio
			];
			$this->Global_model->insertTable('pekerjaan',$data);
		}
		session()->setFlashdata('success', 'Biodata data is Updated ');
		return redirect()->to('/dashboard');

	}

	function allData()
	{
		$menu  			= $this->Global_model->get_menu(session()->get('role_id'));
		$sidebar  		= $this->Multi_menu->fetch_menu($menu);
		$user_id 		= session()->get('user_id');

		$data=[
			'title'=>'All Data',
			'sidebar'=> $sidebar
		];
		$data['biodata'] = $this->Global_model->table('biodata');
		
		return view('view_all_data',$data);	
	}
	function edit_form($user_id)
	{
		$menu  			= $this->Global_model->get_menu(session()->get('role_id'));
		$sidebar  		= $this->Multi_menu->fetch_menu($menu);

		$data=[
			'title'=>'Entry Data',
			'sidebar'=> $sidebar
		];
		$data['bio'] = $this->Global_model->getTable('biodata',['user_id'=>$user_id]);
		if(!empty($data['bio'])){
			$data['pendidikan'] = $this->Global_model->getTable('pendidikan',['id_bio'=>$data['bio'][0]['id']]);
			$data['pelatihan'] = $this->Global_model->getTable('pelatihan',['id_bio'=>$data['bio'][0]['id']]);
			$data['pekerjaan'] = $this->Global_model->getTable('pekerjaan',['id_bio'=>$data['bio'][0]['id']]);
		}
		return view('view_entry',$data);	
	}

	function delete($user_id)
	{
		$bio = $this->Global_model->getTable('biodata',['user_id'=>$user_id]);
		$id_bio= $bio[0]['id'];
		$where =['id_bio'=>$id_bio];
		$where1 =['id'=>$id_bio];
		$this->Global_model->deleteTable('pendidikan',$where);
		$this->Global_model->deleteTable('pelatihan',$where);
		$this->Global_model->deleteTable('pekerjaan',$where);
		$this->Global_model->deleteTable('biodata',$where1);
		echo json_encode(array('message'=>'success'));
		
	}
}