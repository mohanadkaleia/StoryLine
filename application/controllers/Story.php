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
        $this->load->library('session');           
    }

    public function index($id = "") {
//        if (!$this->tank_auth->is_logged_in()) {
//            redirect('/auth/login/');
//        } else {
//            //$data['user_id']	= $this->tank_auth->get_user_id();
//            //$data['username']	= $this->tank_auth->get_username();
//            $user_data = $this->users->get_user_by_id($this->tank_auth->get_user_id(),1);
//            $data['firstname'] = $user_data->firstname;
//            $data['lastname'] = $user_data->lastname;
//
//            if( !$this->session->userdata('image') == '' ){
//            $data['image'] = $this->session->userdata('image');
//            }else{
//            $data['image'] = 'assets/images/blank_man.gif';
//            }
//
//            $this->load->view('welcome', $data);
//            //echo $this->session->userdata('user_id');
//        }
        
        
        if ($id != "") {
            $this->show($id);
        } else {
            $this->showStories();
        }
        
    }

    public function show($id) {
        $story = $this->Story_model->select($id);
        $events = $this->Event_model->selectByStory($story->id);
        
        // Get CI instance to load body view
        $CI = & get_instance();
        $data['story'] = $story;
        $data['events'] = $events;
        $body = $CI->load->view('story_view', $data, TRUE);
        $addEventView = $CI->load->view('addEvent_view', $data, TRUE);
        $data = array(
            'title' => 'Story',
            'pageTitle' => 'History story',
            'content' => $body,
            'addEvent' => $addEventView
        );

        $this->parser->parse('masterLayout_view', $data);
    }

       
    public function showStories() {
        $this->load->helper('text');
        
        $stories = $this->Story_model->select();
        foreach ($stories as $story) {
            $events = $this->Event_model->selectByStory($story->id);
            $storyEvents[$story->id] = $events;
        }
        // Get CI instance to load body view
        $CI = & get_instance();
        $data['stories'] = $stories;
        $data['storyEvents'] = $storyEvents;
        
        $body = $CI->load->view('stories_view', $data, TRUE); 
        $addStoryView = $CI->load->view('addStory_view', $data, TRUE);
        $body .= $addStoryView;
        $data = array(
            'title' => 'Histeller | home',
            'pageTitle' => 'LarkTalk',
            'content' => $body            
        );

        $this->parser->parse('storiesLayout_view', $data);
    } 
    
    public function save() {
        $this->Story_model->title = $this->input->post("title");
        $this->Story_model->description = $this->input->post("description");
        $storyid = $this->Story_model->insert(); 
        
        // Redirect to Story page
        $this->show($storyid);
    }

}
