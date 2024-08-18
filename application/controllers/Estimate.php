<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estimate extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('user_id') == '')
		{
			redirect('login');
		}
	}

	public function index()
	{
		$this->load->view('estimate/estimatelist');
	}

	public function calculate_total()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') 
        {
            $post = file_get_contents('php://input');
            $postdata = json_decode($post, true);
            
            $car_id = $postdata['car_id'];
			
            // The request is using the POST method
            if($car_id)
            {
                $success = $this->db->query('SELECT price FROM cars WHERE id = '.$car_id)->row_array();
                $price = $success['price'];
				$from = new DateTime($postdata['from_date']);
				$to = new DateTime($postdata['to_date']);

				// Calculate the difference
				$interval = $from->diff($to);

				// Get the difference in days
				$days = $interval->days;

				$amount = $days * $price;

				$cgst_amt = (($amount * 6)/100);
				$sgst_amt = (($amount * 6)/100);

				$final_total = $amount + $cgst_amt + $sgst_amt;
            }
            
            if(!empty($success))
            {
                echo json_encode(['status' => 1, 'price' => $price, 'amount' => $amount, 'cgst_amt' => $cgst_amt, 'sgst_amt' => $sgst_amt, 'final_total' => $final_total, 'days' => $days]);
            }
        }		
	}

	public function fetch_records()
	{  
		
		$table = "estimate as a";  
	  	$select_column = array("a.id", "b.name", "DATE_FORMAT(a.pickup_date, '%d %M %Y') as from_date", "DATE_FORMAT(a.drop_off_date, '%d %M %Y') as to_date", "a.price", "a.amount", "a.final_total", "a.days");  
	  	$order_column = array(null, "a.price", "b.name",  "a.amount", "a.final_total");  
	  	$search_column = array("a.price", "b.name", "a.amount", "a.final_total");  
	  	$join =  array("cars as b", "a.car_id = b.id", "LEFT");
             
           $fetch_data = $this->api_model->make_datatables($select_column, $table, $order_column, $search_column, $join);  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
            
                $sub_array = array();  
                $sub_array[] = '<label class="checkboxs">
								<input type="checkbox" id="select-'.$row->id.'">
								<span class="checkmarks"></span>
								</label>';  
                $sub_array[] = $row->name; 
                $sub_array[] = $row->from_date;                 
                $sub_array[] = $row->to_date; 
                $sub_array[] = $row->price;
                $sub_array[] = $row->days;
                $sub_total = $row->amount;
                $sub_array[] = $sub_total;  
                
                // $sub_array[] = $this->db->select('CONCAT(first_name, " ", last_name) AS username')->get_where('users', ['id' => $this->session->userdata('user_id')])->result_array()[0]['username'];  

                $sub_array[] = '<a class="me-3" href="'.base_url().'sale/editsale/'.$row->id.'">
					<img src="'.base_url().'assets/img/icons/edit.svg" alt="img">
					</a>
					<a class="me-3 confirm-text" href="javascript:void(0);" onclick="remove_record('.$row->id.');">
					<img src="'.base_url().'assets/img/icons/delete.svg" alt="img">
					</a><a class="me-3" href="'.base_url().'sale/view_sale_pdf/'.$row->id.'" target="_balnk">
					<img src="'.base_url().'assets/img/icons/pdf.svg" alt="img">
					</a>';

         //        <li>
					    // <a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#showpayment"><img src="'.base_url().'assets/img/icons/dollar-square.svg" class="me-2" alt="img">Show Payments</a>
					    // </li>
					    // <li>
					    // <a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#createpayment"><img src="'.base_url().'assets/img/icons/plus-circle.svg" class="me-2" alt="img">Create Payment</a>
					    // </li>

			// $sub_array[] = '<a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
			// 		    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
			// 		    </a>
			// 		    <ul class="dropdown-menu">
			// 		    <li>
			// 		    <a href="sales-details.html" class="dropdown-item"><img src="'.base_url().'assets/img/icons/eye1.svg" class="me-2" alt="img">View Detail</a>
			// 		    </li>
			// 		    <li>
			// 		    <a href="'.base_url().'sale/editsale/'.$row->id.'" class="dropdown-item"><img src="'.base_url().'assets/img/icons/edit.svg" class="me-2" alt="img">Edit</a>
			// 		    </li>
					    
			// 		    <li>
			// 		    <a href="javascript:void(0);" class="dropdown-item"><img src="'.base_url().'assets/img/icons/download.svg" class="me-2" alt="img">Download pdf</a>
			// 		    </li>
			// 		    <li>
			// 		    <a href="javascript:void(0);" class="dropdown-item confirm-text" onclick="remove_record('.$row->id.');"><img src="'.base_url().'assets/img/icons/delete1.svg" class="me-2" alt="img">Delete</a>
			// 		    </li>
			// 		    </ul>';
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"              => intval($_POST["draw"]),  
                "recordsTotal"      => $this->api_model->get_all_data($table),  
                "recordsFiltered"   => $this->api_model->get_filtered_data($select_column, $table, $order_column, $search_column, $join),  
                "data"              => $data  
           );  
           echo json_encode($output);  
      } 

	
	public function addestimate()
	{
		$this->load->view('estimate/addestimate');
	}

	public function get_product_detail()
	{
		$html = '';
		$message = '';
		$data = $this->api_model->get_one_detail('products', $_REQUEST['prod_id']);
		$quantity = $this->db->select('quantity')->get_where('product_stock', ['product_id' => $_REQUEST['prod_id']])->row_array()['quantity'];
		if($quantity >= 1)
		{
			$status = 1;
			$counter = $_REQUEST['counter'];
			$image = !empty($data[0]['image']) ? '<a class="product-img">
					    <img src="'.base_url().$this->config->item('upload_url').'/'.$this->config->item('product_upload_url').'/'.$data[0]['image'].'" alt="product">
					    </a>' : '';
			
			$html .= '<tr class="product_row" id="'.$counter.'">
					    <td>'.$counter.'</td>
					    <td class="productimgname">
					    <input type="hidden" name="product_id[]" value="'.$data[0]['id'].'">
					    '.$image.'
					    <a href="javascript:void(0);">'.$data[0]['product_name'].'</a>
					    </td>
						<td><input type="text" name="hsn_code[]" class="form-control hsn_code" value="'.$data[0]['hsn_code'].'" readonly></td>
					    <td><input type="hidden" class="hidden_xQty" value="'.$quantity.'">
					    <input type="text" name="pQty[]" class="form-control xQty" value="1" style="width:50px"></td>
					    <td><input type="text" name="pPrice[]" class="form-control xPrice" value="'.$data[0]['price'].'" readonly></td>
						<td><input type="text" name="pUnit[]" class="form-control xPrice" value="'.$data[0]['unit'].'" readonly></td>
					    <td><input type="text" name="item_cgst[]" class="form-control item_cgst" value="0">
	                            <input type="hidden" name="item_cgst_amt[]" class="form-control item_cgst_amt" value="0"></td>
	                    <td><input type="text" name="item_sgst[]" class="form-control item_sgst" value="0">
	                            <input type="hidden" name="item_sgst_amt[]" class="form-control item_sgst_amt" value="0"></td>
					    <td><input type="text" name="pAmount[]" class="form-control xAmount" readonly = "readonly"></td>
					    <td>
					    <a href="javascript:void(0);" class="delete_item"><img src="'.base_url().'assets/img/icons/delete.svg" alt="svg"></a>
					    </td>
					</tr>';
		}
		else
		{
			$status = 0;
			$message = 'Product Out Of Stock!';
		}	

		echo json_encode(['status' => $status, 'message' => $message, 'html' => $html]);	
	}

	public function form_action($id = '')
	{

	
		$postdata = array(
			'car_id' => $this->input->post("car_id"),
			'pickup_date' => date('Y-m-d', strtotime($this->input->post("from_date"))),
			'drop_off_date' => date('Y-m-d', strtotime($this->input->post("to_date"))),
			'price'	=> $this->input->post("price"),
			'amount'	=> $this->input->post("amount"),
			'cgst_amt'	=> $this->input->post("cgst_amt"),
			'sgst_amt'	=> $this->input->post("sgst_amt"),
			'final_total'	=> $this->input->post("final_total"),
			'days'	=> $this->input->post("days")
			
			
		);

		if($id)
		{
			$postdata['updated_by'] = $this->session->userdata('user_id');
			$this->db->where('id',$id);
			$this->db->update('estimate',$postdata);
			$this->session->set_flashdata('message', 'Estimate Updated Successfully!');
		}
		else
		{
			$voucher_no = $this->db->query('SELECT MAX(`voucher_no`) AS voucher_no FROM `estimate`')->result_array()[0]['voucher_no'] + 1; 

			$bill_no = strtoupper(date('M', strtotime($this->input->post("sale_date")))).'-'.date('Y', strtotime($this->input->post("sale_date"))).'-'.$voucher_no;

			$postdata['created_by'] = $this->session->userdata('user_id');
			$postdata['voucher_no'] = $voucher_no;
			
			$this->db->insert('estimate',$postdata);
			$id = $this->db->insert_id();
			$this->session->set_flashdata('message', 'Estimate Added Successfully!');
		}

		$this->session->set_flashdata('message', 'Submitted Successfully!');
		redirect('estimate');
	
	}

	public function editsale($id = '')
	{
		$data['edit_data'] = $this->api_model->get_one_detail('sale', $id);
		$data['sale_items'] = $this->api_model->fetch_related_data('sale_items', $id, 'sale_id');
		$this->load->view('sale/addsale', $data);
	}

	
	public function removesale()
	{
		$id = $_POST['id'];
		$this->db->where('sale_id', $id)->delete('sale_items');
		$success = $this->db->where('id', $id)->delete('sale');
		
	
		if($success)
		{
			echo json_encode(['status' => 1, 'message' => 'Removed Successfully!']);
		}
	}

	
	public function view_sale($id = '')
	{		
		// $this->load->view('sale/sale_pdf_view', ['sale_id' => $id]);
		$this->load->view('sale/sale_details_view', ['sale_id' => $id]);
	}

	public function view_sale_pdf($id = '')
	{		
		$this->load->view('sale/sale_pdf_view', ['sale_id' => $id]);
		
	}



}
?>
