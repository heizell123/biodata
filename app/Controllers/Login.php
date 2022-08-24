<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Login_model;
use App\Models\Global_model;

class Login extends BaseController
{
    public function index()
    {
        echo view('login');
    }

    public function action_login(){
        if (!$this->validate([
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->to('/login');
        } else {
            $email   = $this->request->getPost('email');
            $password   = $this->request->getPost('password');
            $flag = $this->_do_login($email,$password);
            if($flag==TRUE){
                return redirect()->to('/dashboard');
            }else{
                session()->setFlashdata('error', 'Incorrect Username Or Password');
                return redirect()->to('/login');
            }

        }
    }


    public function _do_login($email, $password){
        $model = new Login_model();
        return $flag = $model->first_verify($email,$password);
        
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }

    public function view_sign_in()
    {
        
        return view('view_register');
    }

    public function signIn(){
        if (!$this->validate([
            
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'confirm_password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->to('/Login/view_sign_in');
        } else {
            $password           = $this->request->getPost('password');
            $email              = $this->request->getPost('email');
            $confirm_password   = $this->request->getPost('confirm_password');

            if($password==$confirm_password){
                $user =  $this->Global_model->getTable('user',array('email'=>$email));
                if(empty($user)){
                    $this->createAccess($password,$email);
                    session()->setFlashdata('success', 'Employee data is inserted ');
                    return redirect()->to('/login');
                }else{
                    session()->setFlashdata('error', 'Email is already exist');
                    return redirect()->to('/Login/view_sign_in');
                }
                 
            }else{
                session()->setFlashdata('error', 'Password is not the same as password confirmation');
                return redirect()->to('/Login/view_sign_in');
            }
            //session()->set('username',$this->request->getPost('username'));

        }   
    }
    function createAccess($password,$email)
    {
        $data=[
            'email'=>$email,
            'password'=>md5($password),
            'role_id'=>2
        ];
        $id=$this->Global_model->insertTable('user',$data);

        $data_bio=[
            'email'=>$email,
            'user_id'=>$id,
            'role_id'=>2
        ];
        $this->Global_model->insertTable('biodata',$data_bio);
    }

}