<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cars extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('user_id') == '')
		{
			redirect('login');
		}
		$config = array();
		$config['upload_path']          = 'uploads/car';
        $config['allowed_types']    	= 'jpeg|png|jpg';
		$config['max_size']             = 0; //2048000;
		$config['max_width']            = 0; //1024;
		$config['max_height']           = 0; //768;
		$config['remove_spaces'] 		= true;
		if (!is_dir($config['upload_path'])) {
			mkdir($config['upload_path'], 0777, true);
		}
		$this->load->library('upload', $config);
	}

	public function index()
	{
		$this->load->view('cars/carlist');
	}

	public function fetch_records()
	{  
		
		$table = "cars as a";  
	  	$select_column = array("a.id", "a.name", "a.price", "a.image");  
	  	$order_column = array(null, "a.name", "a.price"); 
	  	$search_column = array("a.name", "a.price");  

	  	// $join =  array("category as b", "a.category_id = b.id", "LEFT");
		  $join = '';
             
           $fetch_data = $this->api_model->make_datatables($select_column, $table, $order_column, $search_column, $join);  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = '<label class="checkboxs">
								<input type="checkbox" id="select-'.$row->id.'">
								<span class="checkmarks"></span>
								</label>';  
			$image = $row->image != '' ? '<a href="javascript:void(0);" class="product-img">
					        <img src="'.base_url().'uploads/car/'.$row->image.'" alt="product">
					        </a>' : '';
				$sub_array[] = $image;  
                $sub_array[] = $row->name;  
              
        
                $sub_array[] = $row->price;  
                  
				 

                $sub_array[] = '<a class="me-3" href="'.base_url().'cars/editcar/'.$row->id.'">
					<img src="'.base_url().'assets/img/icons/edit.svg" alt="img">
					</a>
					<a class="me-3 confirm-text" href="javascript:void(0);" onclick="remove_record('.$row->id.');">
					<img src="'.base_url().'assets/img/icons/delete.svg" alt="img">
					</a>
				
					';
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"              => intval($_POST["draw"]),  
                "recordsTotal"      => $this->api_model->get_all_data($table, $join),  
                "recordsFiltered"   => $this->api_model->get_filtered_data($select_column, $table, $order_column, $search_column, $join),  
                "data"              => $data  
           );  
           echo json_encode($output);  
      } 


	
	public function addcar()
	{
		$this->load->view('cars/addcar');
	}

	
	public function form_action($id = '')
	{
		$postdata = array(
			
			'name' => $this->input->post("name"),
			'price' => $this->input->post("price")
		);
		if(isset($_FILES) && !empty($_FILES['image']['name']))
		{
			if($this->input->post('saved_image') != '')
			{
				unlink('uploads/car/'.$this->input->post('saved_image'));
			}
			if($this->upload->do_upload('image'))
			{
	      		$upload_data = $this->upload->data();
				// pre($upload_data);
	    		$postdata['image'] = $upload_data["file_name"];
	    		if($id)
				{
					$postdata['updated_by'] = $this->session->userdata('user_id');
					$this->db->where('id',$id);
					$this->db->update('cars',$postdata);
					$this->session->set_flashdata('message', 'Car Updated Successfully!');
				}
				else
				{
					$postdata['created_by'] = $this->session->userdata('user_id');
					$this->db->insert('cars',$postdata);
					$id = $this->db->insert_id();
					$this->session->set_flashdata('message', 'Car Added Successfully!');
				}

				$this->session->set_flashdata('message', 'Submitted Successfully!');
						
			}
			else{
				pre($this->upload->display_errors());
				$this->session->set_flashdata('message', $this->upload->display_errors());
				
			}
		}
	
		
		redirect('cars');
	
	}

	public function editcar($id = '')
	{
		$data['edit_data'] = $this->api_model->get_one_detail('cars', $id);
		
		$this->load->view('cars/addcar', $data);
	}

	

	public function removecar()
	{
		$id = $_POST['id'];
		$image = $this->db->select('image')->get_where('cars', ['id' => $id])->result_array()[0]['image'];
	
		$success = $this->db->where('id', $id)->delete('cars');
		if($image != '')
		{
			unlink('uploads/cars/'.$image);
		}
		
		if($success)
		{
			echo json_encode(['status' => 1, 'message' => 'Removed Successfully!']);
		}
	}

}
?>
