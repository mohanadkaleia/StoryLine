<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Station
 *
 * @author mohanad
 */
class Story_model extends CI_Model {
    
    var $id = '';
    
    var $title= '';
    
    var $description = '';
    
    var $created_date= '';
     
    var $userId= 0;
    
    function __construct() {
        parent::__construct();
    }
      
    function insert() {
        $data = array(
            'title' => $this->title,           
            'user_id' => $this->userId,
            'description' => $this->description,
            'created_date' => date(TIME_FORMAT)     
        );
        
        // Insert into db
        $this->db->insert(STORY_TABLE, $data);
        return $this->db->insert_id();
    }
    
    function update() {
        $data = array(
            'title' => $this->title,
            'created_date' => date(),            
            'user_id' => $this->userId,
            'description' => $this->description,
            'created_date' => date(TIME_FORMAT)
        );
        
        // Update by id  
        $this->db->where('id', $this->id);
        $this->db->update(STORY_TABLE, $data); 
    }
    
    function select($id = "") {
        if ($id !== "") {
            $where = array("id" => $id);
            $query = $this->db->get_where(STORY_TABLE, $where);
            if (count($query->result()) > 0) {
                return $query->result()[0];
            } else {
                return null;
            }            
        } else {
            $query = $this->db->get(STORY_TABLE);
            return $query->result();             
        }     
    }
    
    function selectByTitle($title) {        
        $where = array("title" => $title);
        $query = $this->db->get_where(STORY_TABLE, $where);
        if (count($query->result()) > 0) {
            return $query->result()[0];      
        } else {
            return NULL;
        }           
    }
    
    
    function delete($id) {
        $where = array("id" => $titleId);
        $this->db->delete(STORY_TABLE, $where);
    }
}

