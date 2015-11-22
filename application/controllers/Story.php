<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Story extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        parent::__construct();

        // Load the model
        $this->load->model('Event_model');
        $this->load->model('Story_model');
        $this->load->library('parser');
    }

    public function index() {
        $this->show(1);
    }

    public function show($id) {
        $story = $this->Story_model->select($id);
        $events = $this->Event_model->selectByStory($story->id);
        
        // Get CI instance to load body view
        $CI = & get_instance();
        $data['story'] = $story;
        $data['events'] = $events;
        $body = $CI->load->view('story_view', $data, TRUE);
        $data = array(
            'title' => 'Story',
            'pageTitle' => 'History story',            
            'content' => $body
        );

        $this->parser->parse('master_layout_view', $data);
    }
    
    public function saveEvent($storyId) {											 
            // assign values to the model variable
            $this->Event_model->title = $this->input->post('title');			
            $this->Event_model->body = $this->input->post('description');		
            $this->Event_model->storyId = $storyId;
            
            //add the information to the database
            $this->Event_model->insert();
            
            redirect(base_url()."story/show/".$storyId);	
	}

}
