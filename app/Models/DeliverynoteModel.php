<?php 
namespace App\Models;
use CodeIgniter\Model;

class DeliverynoteModel extends Model
{
	function __construct() {
		$this->db=db_connect();
	}
	
	// Max dlno 
	public function MaxDlNo()
	{
		$builder = $this->db->table('tbl_deliverynotemaster');
		$builder->selectMax('dl_no', 'max_dl_no');

		$query = $builder->get();

		if ($query !== false) {
			$max_dl_no = $query->getRow()->max_dl_no;
		
	
			if (!empty($max_dl_no)) {
				$next_dl_no = $max_dl_no + 1;
			} else {
				$next_dl_no = 49600;  
			}
		} else {
			$error = $this->db->error();
			$next_dl_no = 49600;
		}

		// Add leading zeros to make it 7 digits
		return str_pad($next_dl_no, 7, '0', STR_PAD_LEFT);
	}

	public function InsertDeliveryMaster($data)
	{
		$builder = $this->db->table('tbl_deliverynotemaster');
		$query = $builder->insert($data);
		$insertid = $this->db->insertID();
		if($query){
			return $insertid;
		}else{
			return false;
		}

	}

	public function InsertDeliverysplitMdl($data1)
	{
		$builder = $this->db->table('tbl_deliverynotedetails');
		$query = $builder->insertBatch($data1);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function AllNotes()
	{
		$builder = $this->db->table('tbl_deliverynotemaster');
		$builder->select('*');
		$builder->orderBy('deliveryNoteMasterId', 'DESC');
		$query = $builder->get();
		return $query->getResult();
	}
	public function DeliverynoteEditMdl($id)
	{
		$builder = $this->db->table('tbl_deliverynotemaster');
		$builder->select('*');
		$builder->where('deliveryNoteMasterId', $id);
		return $builder->get()->getResult();
	}
	public function DeliverynoteSplitEditMdl($id)
	{
		$builder = $this->db->table('tbl_deliverynotedetails d');
		$builder->select('*');
		$builder->join('tbl_deliverynotemaster m','m.deliveryNoteMasterId = d.deliveryNoteMasterId');
		$builder->where('d.deliveryNoteMasterId', $id);
		return  $builder->get()->getResult();
	}
	public function UpdateDeliveryMaster($data)
	{
		$builder = $this->db->table('tbl_deliverynotemaster');
		$builder->where('deliveryNoteMasterId',$data['deliveryNoteMasterId']);
		$query = $builder->update($data);
		if($query){
			return true;
		}else{
			return false;
		}
		
	}
	public function UpdateDeliverysplitMdl($data1,$id)
	{
		$builder = $this->db->table('tbl_deliverynotedetails');
		$builder->where('deliveryNoteMasterId',$id);
		$deleteResult = $builder->delete();

		if($deleteResult){
			$builder = $this->db->table('tbl_deliverynotedetails');
			$query = $builder->insertBatch($data1);
			if($query){
				return true;
			}else{
				return false;
			}
		}
	}
	public function DeliverynoteDeleteMdl($id)
	{
		$builder = $this->db->table('tbl_deliverynotemaster');
		$builder->where('deliveryNoteMasterId', $id);
		$query=$builder->delete();
		if($query){
			$builder = $this->db->table('tbl_deliverynotedetails');
			$builder->where('deliveryNoteMasterId',$id);
			$deleteResult = $builder->delete();
			return true;
		}
		else{
			return false;
		}
	}	
	public function getDetailsByQRCode($qrid) {

		// Check if the $qrid contains a hyphen
		if (strpos($qrid, '-') !== false) {
			// Split the $qrid into two parts: before and after the hyphen
			list($dlno, $lineIndex) = explode('-', $qrid);
			
			$builder = $this->db->table('tbl_deliverynotemaster');
			$builder->select('deliveryNoteMasterId');
			$builder->where('dl_no', $dlno);
			$query = $builder->get();
			$dmid = $query->getRowArray();
			
			if (!empty($dmid)) {
				// Get the DeliveryNoteDetailsId from tbl_deliverynotedetails
				$builder = $this->db->table('tbl_deliverynotedetails');
				$builder->select('DeliveryNoteDetailsId');
				$builder->where('deliveryNoteMasterId', $dmid['deliveryNoteMasterId']);
				$builder->where('LineIndex', $lineIndex);
				$query = $builder->get();
				$ddid = $query->getRowArray();
		
				if (!empty($ddid)) {
					// Get the data from both tbl_deliverynotemaster and tbl_deliverynotedetails
					$builder = $this->db->table('tbl_deliverynotedetails d');
					$builder->select('d.*, m.ProjectName,m.ProjectCode'); 
					$builder->join('tbl_deliverynotemaster m', 'm.deliveryNoteMasterId = d.deliveryNoteMasterId');
					$builder->where('d.DeliveryNoteDetailsId', $ddid['DeliveryNoteDetailsId']);
					$query = $builder->get();
					return $query->getRowArray();
				}
			}

		} else {
			// If no hyphen, assume it's from tbl_deliverynotemaster
			$id = $qrid;
			$table = 'tbl_deliverynotemaster';
			$field = 'dl_no';
		}

		// Build and execute the query
		$builder = $this->db->table($table);
		$builder->select('*');
		$builder->where($field, $id);
		$query = $builder->get();
		return $query->getRowArray();

	}
	public function DeliverynoteSummaryByfilteredMdl($projectcode, $projectname, $requestno, $wono, $desc)
	{
		$builder = $this->db->table('tbl_deliverynotedetails d');
		$builder->select('*');
		$builder->join('tbl_deliverynotemaster m','m.deliveryNoteMasterId = d.deliveryNoteMasterId');

		if(!empty($projectcode)){
			$builder->where('m.ProjectCode', $projectcode);
		}

		if(!empty($projectname)){
			$builder->where('m.ProjectName', $projectname);
		}

		if(!empty($requestno)){
			$builder->where('m.RequestNumber', $requestno);
		}

		if(!empty($wono)){
			$builder->where('m.WONumber', $wono);
		}

		if(!empty($desc)){
			$builder->where('d.Description', $desc);
		}
		$builder->orderBy('m.dl_no', 'ASC'); 
		$builder->orderBy('d.LineIndex', 'ASC');

		return $builder->get()->getResult();
	}
	
	
}