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
class Event_model extends CI_Model {
    
    var $id = '';
    
    var $title = '';
    
    var $body = '';
    
    var $image = '';
    
    var $eventDate ='';
    
    var $created_date = '';
    
    var $source = '';
     
    var $storyId = '';
    
    function __construct() {
        parent::__construct();
    }
      
    function insert() {
        $data = array(
            'title' => $this->title,
            'body' => $this->body,
            'image' => $this->image,
            'event_date' => $this->eventDate,
            'story_id' => $this->storyId,   
            'source' => $this->source,
            'created_date' => date(TIME_FORMAT)     
        );
        print_r($data);
        // Insert into db
        $this->db->insert(EVENT_TABLE, $data);
        return $this->db->insert_id();
    }
    
    function update() {
        $data = array(
            'title' => $this->title,
            'body' => $this->body,           
            'image' => $this->image,
            'event_date' => $this->eventDate,
            'source' => $this->source,
            'story_id' => $this->storyId, 
            'created_date' => date(TIME_FORMAT)
        );
        
        // Update by id  
        $this->db->where('id', $this->id);
        $this->db->update(EVENT_TABLE, $data); 
    }
    
    function select($id = "") {
        if ($titleId !== "") {
            $where = array("id" => $id);
            $query = $this->db->get_where(EVENT_TABLE, $where);            
            return $query->result();
        } else {
            $query = $this->db->order_by('event_date', 'DESC');
            $query = $this->db->get(EVENT_TABLE);            
            return $query->result();             
        }     
    }
    
    function selectByStory($storyId) {        
        $where = array("story_id" => $storyId);
        $query = $this->db->order_by('event_date', 'DESC');
        $query = $this->db->get_where(EVENT_TABLE, $where);        
        return $query->result();                       
    }
    
    
    function delete($id) {
        $where = array("id" => $id);
        $this->db->delete(EVENT_TABLE, $where);
    }
}

