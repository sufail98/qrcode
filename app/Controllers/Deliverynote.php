<?php 
namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use App\Models\DeliverynoteModel;

class Deliverynote extends BaseController
{
	
    function __construct()
	{
		$this->deliverynoteModel = new DeliverynoteModel();
	}
	public function index()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

			$data['notes'] = $this->deliverynoteModel->AllNotes();
			return view('deliverynotelist',$data);
		} else {
			return view('adminlogin');
		}
	}
	public function DeliverynoteFrm()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$data['maxdlno'] = $this->deliverynoteModel->MaxDlNo();
			return view('deliverynote',$data);
		} else {
			return view('adminlogin');
		}
	}
	public function AddDeliverynote()
	{
		$session = session();
		if(!empty($_SESSION['user'])){

			// $data['dl_no'] = $this->deliverynoteModel->MaxDlNo();
			$data['dl_no'] = $this->request->getPost('dlno');
			$data['ProjectName'] = $this->request->getPost('pname');
			$data['ProjectCode'] = $this->request->getPost('pcode');
			$data['DriverName'] = $this->request->getPost('dname');
			$data['DriverMobile'] = $this->request->getPost('dmobile');
			$data['VehicleNo'] = $this->request->getPost('vehicleno');
			$data['DepartureTime'] = !empty($this->request->getPost('deptime')) ? $this->request->getPost('deptime') : NULL;
			$data['WONumber'] = $this->request->getPost('wonumber');
			$data['RequestNumber'] = $this->request->getPost('requestnumber');
			$data['type'] = $this->request->getPost('type');
			$data['Date'] = !empty($this->request->getPost('date')) ? $this->request->getPost('date') : NULL;
			$data['ImportedFileName'] = !empty($this->request->getPost('excelfilename')) ? $this->request->getPost('excelfilename') : NULL;
			$data['CreatedDate'] = date('Y-m-d H:i:s');

			$slno = $this->request->getPost('slno');
			$itemcode = $this->request->getPost('itemcode');
			$desc = $this->request->getPost('desc');
			$unit = $this->request->getPost('unit');
			$width = $this->request->getPost('width');
			$height = $this->request->getPost('height');
			$qty = $this->request->getPost('qty');
			$notes = $this->request->getPost('notes');

			$insertid = $this->deliverynoteModel->InsertDeliveryMaster($data);

			for($i=0; $i<count($itemcode); $i++){
				$data1[]=[
					'deliveryNoteMasterId' => $insertid,
					'LineIndex' => $slno[$i],
					'ItemCode' => $itemcode[$i],
					'Description' => $desc[$i],
					'Unit' => $unit[$i],
					'Width' => $width[$i],
					'Height' => $height[$i],
					'Qty' => $qty[$i],
					'Notes' => $notes[$i],
					'CreatedDate' => date('Y-m-d H:i:s')
				];
			}

			if($insertid){
				if (count($itemcode) > 0) {
					$insertsplit = $this->deliverynoteModel->InsertDeliverysplitMdl($data1);
					if($insertsplit){
						echo "<script>alert('Added Successfully');window.location.href='index';</script>";
					}else{
						echo "<script>alert('Try Again');window.history.back();</script>";
					}	
				}
				echo "<script>alert('Added Successfully');window.location.href='index';</script>";
			}else{
				echo "<script>alert('Try Again');window.history.back();</script>";
			}
			
		} else {
			return view('adminlogin');
		}
		
	}
	public function DeliverynoteEdit($id)
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$data['editdata'] = $this->deliverynoteModel->DeliverynoteEditMdl($id);
			$data['editsplitdata'] = $this->deliverynoteModel->DeliverynoteSplitEditMdl($id);
			return view('editdeliverynote',$data);
		} else {
			return view('adminlogin');
		}
	}
	public function UpdateDeliverynote()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$data['dl_no'] = $this->request->getPost('dlno');
			$data['ProjectName'] = $this->request->getPost('pname');
			$data['ProjectCode'] = $this->request->getPost('pcode');
			$data['DriverName'] = $this->request->getPost('dname');
			$data['DriverMobile'] = $this->request->getPost('dmobile');
			$data['VehicleNo'] = $this->request->getPost('vehicleno');
			$data['DepartureTime'] = !empty($this->request->getPost('deptime')) ? $this->request->getPost('deptime') : NULL;
			$data['WONumber'] = $this->request->getPost('wonumber');
			$data['RequestNumber'] = $this->request->getPost('requestnumber');
			$data['type'] = $this->request->getPost('type');
			$data['Date'] = !empty($this->request->getPost('date')) ? $this->request->getPost('date') : NULL;
			$data['CreatedDate'] = date('Y-m-d H:i:s');

			$slno = $this->request->getPost('slno');
			$itemcode = $this->request->getPost('itemcode');
			$desc = $this->request->getPost('desc');
			$unit = $this->request->getPost('unit');
			$width = $this->request->getPost('width');
			$height = $this->request->getPost('height');
			$qty = $this->request->getPost('qty');
			$notes = $this->request->getPost('notes');
			$data['deliveryNoteMasterId'] = $this->request->getPost('did');

			$update = $this->deliverynoteModel->UpdateDeliveryMaster($data);

			for($i=0; $i<count($itemcode); $i++){
				$data1[]=[
					'deliveryNoteMasterId' => $this->request->getPost('did'),
					'LineIndex' => $slno[$i],
					'ItemCode' => $itemcode[$i],
					'Description' => $desc[$i],
					'Unit' => $unit[$i],
					'Width' => $width[$i],
					'Height' => $height[$i],
					'Qty' => $qty[$i],
					'Notes' => $notes[$i],
					'CreatedDate' => date('Y-m-d H:i:s')
				];
			}

			if($update){
				$insertsplit = $this->deliverynoteModel->UpdateDeliverysplitMdl($data1,$this->request->getPost('did'));
				if($insertsplit){
					echo "<script>alert('Updated Successfully');window.location.href='index';</script>";
				}	
			}else{
				echo "<script>alert('Try Again');window.history.back();</script>";
			}
		} else {
			return view('adminlogin');
		}
	}

	public function DeliverynoteDelete($id)
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$query = $this->deliverynoteModel->DeliverynoteDeleteMdl($id);
			if($query){
				echo "<script>alert('Data Deleted');window.history.back();</script>";
			}
		} else {
			return view('adminlogin');
		}
	}
	public function QRPrint($id, $scanresult='')
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$data['editdata'] = $this->deliverynoteModel->DeliverynoteEditMdl($id);
			$data['editsplitdata'] = $this->deliverynoteModel->DeliverynoteSplitEditMdl($id);
			$data['scanresult'] = $scanresult;
			return view('qrprint',$data);
		} else {
			return view('adminlogin');
		}
	}

	public function BillQRPrint($id)
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$data['editdata'] = $this->deliverynoteModel->DeliverynoteEditMdl($id);
			$data['editsplitdata'] = $this->deliverynoteModel->DeliverynoteSplitEditMdl($id);
			return view('bill_qrprint',$data);
		} else {
			return view('adminlogin');
		}
	}

	public function BillQRPrintAll($id)
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$data['editdata'] = $this->deliverynoteModel->DeliverynoteEditMdl($id);
			$data['editsplitdata'] = $this->deliverynoteModel->DeliverynoteSplitEditMdl($id);
			return view('bill_qrprint_all',$data);
		} else {
			return view('adminlogin');
		}
	}

	public function Qrscanner()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			return view('qrscanner');
		} else {
			return view('adminlogin');
		}
	}

	public function getDetails() {
		$session = session();
		if(!empty($_SESSION['user'])){
			$input = json_decode(file_get_contents('php://input'), true);
			$qrid = $input['id'];

			$data = $this->deliverynoteModel->getDetailsByQRCode($qrid);
			return $this->response->setJSON($data);

		} else {
			return view('adminlogin');
		}
	}

	public function ExcelUpload()
    {
		$session = session();
		if(!empty($_SESSION['user'])){

			$file = $this->request->getFile('excelfile');

			if ($file && $file->isValid()) {

				// Check if the file is an Excel file based on its extension
				$fileExtension = $file->getClientExtension();
				if (!in_array($fileExtension, ['xlsx', 'xls'])) {
					// Invalid file format
					return json_encode(['error' => 'Invalid file format. Please upload a valid Excel file.']);
				}
				try {
					// Get the uploaded file name
					$fileName = $file->getClientName();
					// Load the uploaded Excel file without moving it
					$reader = new Xlsx();
					$spreadsheet = $reader->load($file->getTempName());
				
					// Get the first worksheet
					$sheet = $spreadsheet->getActiveSheet();
					$highestRow = $sheet->getHighestRow(); // Get the total number of rows
					$highestColumn = $sheet->getHighestColumn(); // Get the total number of columns
					
					// Validate if the necessary columns (A to I) exist
					$requiredColumns = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I'];
					foreach ($requiredColumns as $column) {
						// Check if the highest column is greater or equal to the required columns
						if ($highestColumn < $column) {
							return json_encode(['error' => 'Invalid file format. Missing required columns in the Excel file.']);
						}
					}

					// Arrays to store the extracted data
					$projectData = [];
					$itemData = [];
				
					// Extract project data from the first row
					$projectData = [
						'project_name'   => $sheet->getCell("A2")->getValue(),
						'project_code'   => $sheet->getCell("B2")->getValue(),
						'date'           => $sheet->getCell("C2")->getValue(),
						'driver_name'    => $sheet->getCell("D2")->getValue(),
						'driver_mobile'  => $sheet->getCell("E2")->getValue(),
						'vehicle_number' => $sheet->getCell("F2")->getValue(),
						'departure_time' => $sheet->getCell("G2")->getValue(),
						'wo_number'      => $sheet->getCell("H2")->getValue(),
						'request_number' => $sheet->getCell("I2")->getValue(),
					];
				
					// Extract item data starting from the second row onwards
					for ($row = 4; $row <= $highestRow; $row++) {
						$itemCode = $sheet->getCell("A" . $row)->getValue();
						if (!empty($itemCode)) { // Skip rows with empty 'Item Code' (if necessary)
							$itemData[] = [
								'item_code'    => $sheet->getCell("A" . $row)->getValue(),
								'description'  => $sheet->getCell("B" . $row)->getValue(),
								'unit'         => $sheet->getCell("C" . $row)->getValue(),
								'width'        => $sheet->getCell("D" . $row)->getValue(),
								'height'       => $sheet->getCell("E" . $row)->getValue(),
								'quantity'     => $sheet->getCell("F" . $row)->getValue(),
								'notes'        => $sheet->getCell("G" . $row)->getValue(),
							];
						}
					}
				
					// Return both project and item data as a JSON response
					$response = [
						'file_name'    => $fileName,
						'project_data' => $projectData,
						'item_data'    => $itemData
					];
				
					echo json_encode($response);
					exit();
				} catch (\PhpOffice\PhpSpreadsheet\Reader\Exception $e) {
					return json_encode(['error' => 'Error loading file: ' . $e->getMessage()]);
				}
			}
			
		} else {
			return view('adminlogin');
		}
    }
	public function DeliverynoteSummary()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			return view('deliverynote_summary');
		} else {
			return view('adminlogin');
		}
	}
	public function DeliverynoteSummaryByfiltered()
	{
		$session = session();
		if(!empty($_SESSION['user'])){
			$projectcode = $this->request->getPost('projectcode');
		    $projectname = $this->request->getPost('projectname');
		    $requestno = $this->request->getPost('requestno');
			$wono = $this->request->getPost('wono');
		    $desc = $this->request->getPost('desc');

		    $report = $this->deliverynoteModel->DeliverynoteSummaryByfilteredMdl($projectcode, $projectname, $requestno, $wono, $desc);
		    return $this->response->setJSON($report);

		} else {
			return view('adminlogin');
		}
	}
	
	
}