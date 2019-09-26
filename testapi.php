<?php
//import library dari REST_Controller
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

//extends class dari REST_Controller
class testapi extends REST_Controller{

//constructor
public function __construct(){
parent::__construct();
$this->load->database();
}

//tarik data
function index_get()
{
	$id=$this->get('id');
	if($id=='')
		{
			$getdata=$this->db->get('datas_komik')->result();
		}
	else
		{
			$this->db->where('id',$id);
			$getdata=$this->db->get('datas_komik')->result();
		}
	$this->response($getdata,200);
}




//input data
function index_post()
{
	$data=array('id'=>$this->post('id'),'fld1'=>$this->post('fld1'),'fld2'=>$this->post('fld2'),'cat'=>$this->post('cat'));
	$insert=$this->db->insert('datas_komik',$data);
	if($insert)
		{
			$this->response($data,200);
		}
	else
	{
		$this->response(array('status'=>'fail',502));
	}
}





//update data
function index_put()
{
	$id=$this->put('id');
	$data=array('id'=>$this->put('id'),'fld1'=>$this->put('fld1'),'fld2'=>$this->put('fld2'),'cat'=>$this->put('cat'));
	$this->db->where('id',$id);
	$update=$this->db->update('datas_komik',$data);
	if($update)
		{
			$this->response($data,200);
		}
	else
		{
		$this->response(array('status'=>'fail',502));
		}
}




//hapus data
function index_delete()
{
	$id=$this->delete('id');
	$this->db->where('id',$id);
	$delete=$this->db->delete('datas_komik');
	if($delete)
		{
			$this->response(array('status'=>'sukses delete '.$id),201);
		}
	else
		{
		$this->response(array('status'=>'fail',502));
		}
}





public function user_get(){
//testing response
$response['status']=200;
$response['error']=false;
$response['message']='USER GET';
$this->response($response);

}


}


?>
