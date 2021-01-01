<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    public function index()
    {
        $data['main_content'] = "exam";
        $data['main_content'] = $this->load->view('exam', $data, TRUE);
        $this->load->view('master', $data);
    }

    

    public function shop()
    {
        $data['products'] = $this->Common->get_data('product');
        $data['customer'] = $this->Common->get_data('customer');
        $data['main_content'] = $this->load->view('shop', $data, TRUE);
        $this->load->view('master', $data);
    }

    public function store_shop(){
        $storeUpdate = array(
            'customer_id' =>$this->input->post('customer_id') , 
            'product_id' => $this->input->post('product_id'), 
        );
        if($this->input->post('type')=='1'){
            for ($i=0; $i < $this->input->post('quantity'); $i++) { 
                $this->Common->set_data('customersalesproduct',$storeUpdate);
            }
        }
        else{
            for ($i=0; $i < $this->input->post('quantity'); $i++) { 
                $this->Common->set_data('customerpurchasedproduct',$storeUpdate);
            }  
        }
        redirect('shop','refresh');  
    }

    public function dashboard()
    {
        $data['total_products_purchase'] = $this->Common->get_all_data_by_type(2);
        $data['total_products_sale'] = $this->Common->get_all_data_by_type(1);
        $data['main_content'] = $this->load->view('dashboard', $data, TRUE);
        $this->load->view('master', $data);
    }
    
    public function customer_info(){
        $data['customer'] = $this->Common->get_data('customer');
        $data['main_content'] = $this->load->view('customer_info', $data, TRUE);
        $this->load->view('master', $data);
    }

    public function customer_result(){
        $data['customer_id'] = $this->input->post('customer_id');
        $data['customer_info'] = $this->Common->get_customer_info($data['customer_id']);
        $data['customer'] = $this->Common->get_data('customer');
        $data['main_content'] = $this->load->view('customer_info', $data, TRUE);
        $this->load->view('master', $data);
    }

    public function sale_report(){
        $data['customer_info'] = $this->Common->get_all_customer_info();
        $data['main_content'] = $this->load->view('sale_report', $data, TRUE);
        $this->load->view('master', $data);
    }


    
}
