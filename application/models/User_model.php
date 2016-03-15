<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of the class
 *
 * @author mohanad
 */
class User_model extends CI_Model {
    
    var $id = '';      
    var $firstName = '';
    var $lastName = '';
    var $email = '';
    var $createdDate = '';
    var $isDeleted = '';      
    
    function __construct() {
        parent::__construct();
    }
      
    function insert() {
        $data = array(                  
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'email' => $this->email,
            'created_date' => date(TIME_FORMAT)            
        );
        
        // Insert into db
        $this->db->insert(USER_TABLE, $data);
        return $this->db->insert_id();
    }
    
    function update() {
       $data = array(       
            'first_name' => $this->firstName,
            'last_name' => $this->lasttName,
            'email' => $this->email                      
        );
        
        // Update by id  
        $this->db->where('id', $this->id);
        $this->db->update(USER_TABLE, $data); 
    }
    
    function select($id = "") {
        if ($id !== "") {
            $where = array("id" => $id);
            $query = $this->db->get_where(USER_TABLE, $where);
            if (count($query->result()) > 0) {
                return $query->result()[0];
            } else {
                return null;
            }            
        } else {
            $query = $this->db->get(USER_TABLE);
            return $query->result();             
        }     
    }
    
    function selectBy($email ='', $firstName ='', $lastName = '') {        
        if ($email <> '') {$where['email'] = $email;}
        if ($firstName <> '') {$where['first_name'] = $firstName;}
        if ($lastName <> '') {$where['last_name'] = $lastName;}
                
        $query = $this->db->get_where(USER_TABLE, $where);
        if (count($query->result()) > 0) {
            return $query->result()[0];      
        } else {
            return NULL;
        }           
    }
        
    function delete($id) {
        $where = array("id" => $id);
        $this->db->delete(USER_TABLE, $where);
    }
}

