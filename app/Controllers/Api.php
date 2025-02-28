<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\ApiModel;
use App\Models\DeliverynoteModel;

class Api extends ResourceController
{
	function __construct()
	{
		$this->apiModel = new ApiModel();
		$this->deliverynoteModel = new DeliverynoteModel();
	}
	public function Login()
	{
        $jsonData = $this->request->getJSON();
	    $data['username'] = $jsonData->username;
	    $data['password'] = $jsonData->password;
	    $data['user_type'] = 'user';

        $data = $this->apiModel->LoginMdl($data);

		if($data){
			$response = [
				'status' => 200,
				'error' => false,
				'messages' => 'Success',
				'data' => $data,	
			];
		}else{
			$response = [
				'status' => 500,
				"error" => true,
				'messages' => 'Try Again',
				'data' => []
			];
		}
		return $this->respond($response);
		
	}
    public function BillDetails() 
    {
        $jsonData = $this->request->getJSON();
		$qrid = $jsonData->qrid;
		$data = $this->deliverynoteModel->getDetailsByQRCode($qrid);
		$mid = $data['deliveryNoteMasterId'];
		$products = $this->apiModel->DeliverynoteSplitMdl($mid);

        if($data){

            if (isset($data['ProjectName']) && !empty($data['ProjectName'])) {
                $data['product'] = 'Bill';
            } else {
                $data['product'] = 'Product';
            }
            
			$response = [
				'status' => 200,
				'error' => false,
				'messages' => 'Success',
				'details' => $data,	
				'products' => $products
			];
		}else{
			$response = [
				'status' => 500,
				"error" => true,
				'messages' => 'No Data Found',
				'details' => []
			];
		}
		return $this->respond($response);

	}
	public function ProductDetails() 
    {
        $jsonData = $this->request->getJSON();
		$qrid = $jsonData->qrid;
		$data = $this->deliverynoteModel->getDetailsByQRCode($qrid);
		
        if($data){

            if (isset($data['ProjectName']) && !empty($data['ProjectName'])) {
                $data['product'] = 'Bill';
            } else {
                $data['product'] = 'Product';
            }
            
			$response = [
				'status' => 200,
				'error' => false,
				'messages' => 'Success',
				'details' => $data,	
			];
		}else{
			$response = [
				'status' => 500,
				"error" => true,
				'messages' => 'No Data Found',
				'details' => []
			];
		}
		return $this->respond($response);

	}


}