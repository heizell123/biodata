<?php

namespace App\Libraries;

class Whatsapp_lib {

	public function content_kpi($title="",$sc_id="",$subject=""){
		$content="\r\n";
		$content.="Nomor Recana Kerja : ".$sc_id."\r\n";
		$content.="subject : ".$subject."\r\n";
		$template = $this->template($title,$content);
		return $template;
	}

	public function content_regis($title="",$username="",$password=""){
		$content="\r\n";
		$content.="Username : ".$username."\r\n";
		$content.="Password : ".$password."\r\n";
		$template = $this->template($title,$content);
		return $template;
	}
	public function template($title="",$content=""){
		$template ="";
		$template .= "==================================\r\n";
		$template .= "* Notifikasi Sistem (PT VCI Tbk) *\r\n";
		$template .= "==================================\r\n";

		$template .= $title.", berikut : \r\n";
		$template .= $content."\r\n \r\n";
		$template .= "Akses dengan cara Klik link berikut: \r\n";
		$template .= "https://kpi.vci.co.id/ \r\n \r\n";
		$template .= "==================================";
		return $template;
	}

	public function getMessageApi($number="",$message="")
    {
        $url = 'http://192.168.0.56:3000/sendmessage';
        $data = array("number" => $number,"message" => $message);

        $postdata = json_encode($data);

        $ch = curl_init($url); 
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_exec($ch);
        curl_close($ch);
        
        
    }



}