<?php 
namespace App\Controllers;

use App\Models\FrontpageModel;

class Frontpage extends BaseController
{
	
    function __construct()
	{
		$this->frontModel = new FrontpageModel();
	}
	public function index()
	{
		return view('adminlogin');
	}
	public function AdminLogin()
	{
		if(!isset($_SESSION['user']))
        {
			$myModel=new FrontpageModel();
			$data['username'] = $this->request->getPost('uname');
			$data['password'] = $this->request->getPost('password');
			$query = $this->frontModel->AdminLoginMdl($data);
			if($query)
			{
				$session = session();
				$session->set('user',$data['username']);
				$session->set('user_type',$query['user_type']);		

		    	return view('dashboard');
			}
			else{
				return view('adminlogin');
			}
		}else{
			return view('dashboard');
		}
	}
	public function Dashboard()
	{
		$session = session();
		if(isset($_SESSION['user']))
        {
	    	return view('dashboard');
	    }
	    else{
			return view('adminlogin');
	    }
	}
	public function AdminLogout() 
	{
		$session = session();
		$session->destroy();
		return view('adminlogin');
	}
	
	
	
}