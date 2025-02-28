<?php

namespace App\Models;

use CodeIgniter\Model;

class ApiModel extends Model
{
	function __construct()
	{
		$this->db = db_connect();
	}
	public function LoginMdl($data)
	{
		$builder = $this->db->table('tbl_login');
		$builder->where('username',$data['username']);
		$builder->where('password',$data['password']);
		$builder->where('user_type',$data['user_type']);

		$query=$builder->get();
		if (count($query->getResultArray()) ==1 ){
			return $query->getRowArray();
		}else{
			return false;
		}
	}
	public function DeliverynoteSplitMdl($id)
	{
		$builder = $this->db->table('tbl_deliverynotedetails');
		$builder->select('*');
		$builder->where('deliveryNoteMasterId', $id);
		return  $builder->get()->getResult();
	}
	
	
}