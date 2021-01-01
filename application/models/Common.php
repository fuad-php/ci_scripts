<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Common extends CI_Model {
    
    public function set_data($table,$data){
        $this->db->trans_start();
        $this->db->insert($table, $data);
        $returnValue = $this->db->insert_id();
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE)
        {
            return FALSE;
        }
        else
        {
            return $returnValue;
        }
    }

    public function get_data($table){
        $query= $this->db->get($table);
        if ( $this->db->affected_rows() > 0 ) {
            return $query;
        } else {
            return FALSE;
        }
    }

    public function get_all_data_by_type($type){
        if(isset($type)){
            if($type== '1'){
                $table = 'customersalesproduct';
                $alias = 'sales';
            }else{
                $table = 'customerpurchasedproduct';
                $alias = 'purchase';
            }

            $query = $this->db->select('*')
            ->select("DATE_FORMAT($table.created_at,'%M-%Y') as time")
            ->select_sum("product.price")
            ->from($table)
            ->join("product","$table.product_id=product.id","left")
            ->group_by("DATE_FORMAT($table.created_at,'%M-%Y')")
            ->order_by('created_at','asc')
            ->get();

            if ( $this->db->affected_rows() > 0 ) {
                return $query;
            } else {
                return FALSE;
            }
        }else{
            return FALSE;
        }
    }

    public function get_customer_info($customer_id){
 
           $query = $this->db->query("(SELECT customersalesproduct.*,customer.name as cust_name,product.name, product.price, 1 as ttype FROM customersalesproduct LEFT JOIN product ON customersalesproduct.product_id=product.id LEFT JOIN customer ON customersalesproduct.customer_id=customer.id  WHERE customersalesproduct.customer_id = $customer_id) UNION (SELECT customerpurchasedproduct.*,customer.name as cust_name, product.name,product.price, 2 as ttype FROM customerpurchasedproduct LEFT JOIN product ON customerpurchasedproduct.product_id=product.id LEFT JOIN customer ON customerpurchasedproduct.customer_id=customer.id WHERE customerpurchasedproduct.customer_id = $customer_id) ORDER BY created_at DESC");

            if ( $this->db->affected_rows() > 0 ) {
                return $query;
            } else {
                return FALSE;
            }
    }
    
    public function get_all_customer_info(){
 
           $query = $this->db->query("(SELECT customersalesproduct.*,customer.name as cust_name,product.name, product.price, 1 as ttype FROM customersalesproduct LEFT JOIN product ON customersalesproduct.product_id=product.id LEFT JOIN customer ON customersalesproduct.customer_id=customer.id) UNION (SELECT customerpurchasedproduct.*,customer.name as cust_name, product.name,product.price, 2 as ttype FROM customerpurchasedproduct LEFT JOIN product ON customerpurchasedproduct.product_id=product.id LEFT JOIN customer ON customerpurchasedproduct.customer_id=customer.id) ORDER BY created_at DESC");

            if ( $this->db->affected_rows() > 0 ) {
                return $query;
            } else {
                return FALSE;
            }
    }

}


