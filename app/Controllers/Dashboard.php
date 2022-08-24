<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Controllers\BaseController;


class Dashboard extends BaseController
{
	public function index()
	{	

		$menu  			= $this->Global_model->get_menu(session()->get('role_id'));
		$sidebar  		= $this->Multi_menu->fetch_menu($menu);
		$data=[
			'title'=>'Dashboard',
			'sidebar'=> $sidebar
		];
		return view('view_dashboard',$data);
	}

	
}