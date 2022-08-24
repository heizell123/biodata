<?php 
namespace App\Libraries;
 
 
class Check
{
    public function cobain(){
        // jika user belum login
        if(! session()->get('username')){
            // maka redirct ke halaman login
            return redirect()->to('/login'); 
        }
    }
}