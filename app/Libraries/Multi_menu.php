<?php

namespace App\Libraries;

class Multi_menu {

	

	public function fetch_menu($data){

			$menu1 = "";
		foreach($data as $menu){
			$menu1 .= "<li><a href='".base_url().'/'.$menu['slug']."'> 
					<i class='".$menu['icon']."'></i><span>".$menu['name']."</span></a>";

			if(!empty($menu['sub'])){

				$menu1 .= "<ul>";

				$menu1 .= $this->fetch_sub_menu($menu['sub']);

				$menu1 .= "</ul>";
			}
			$menu1 .= '</li>';
		}
		return $menu1;

	}

	public function fetch_sub_menu($sub_menu){
		$sub = "";
		foreach($sub_menu as $menu){

			$sub .= "<li><a href='".base_url().'/'.$menu['slug']."'> 
					<i class='".$menu['icon']."'></i><span>".$menu['name']."</span></a>";
			
			if(!empty($menu['sub'])){

				$sub .= "<ul>";

				$sub .= $this->fetch_sub_menu($menu['sub']);

				$sub .= "</ul>";
			}		
			$sub .= '</li>';
		}
		return $sub;
	}


}