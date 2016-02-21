<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

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
        $this->load->library('parser');
    }

    public function save($storyId) {
        // assign values to the model variable
        $this->Event_model->title = $this->input->post('title');
        $this->Event_model->body = $this->input->post('description');
        $this->Event_model->eventDate = $this->input->post('eventDate');
        $this->Event_model->storyId = $storyId;
        $this->Event_model->image = $this->input->post('photoName');
        $this->Event_model->sources = $this->input->post('sources');
        $this->uploadPhoto($storyId);

        //add the information to the database
        $this->Event_model->insert();

        redirect(base_url() . "story/show/" . $storyId);
    }

    private function uploadPhoto($eventId) {
        $this->load->helper(array('form', 'url'));
        // Create a folder  
        $location = './files/photo/' . $eventId;
        if (!is_dir($location)) {
            mkdir($location, 0777, true);
        }

        $config['upload_path'] = $location;
        $config['allowed_types'] = 'gif|jpg|png';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('fileUpload')) {
            $error = array('error' => $this->upload->display_errors());
            //$this->load->view('upload_form', $error);
        } else {
            $data = array('upload_data' => $this->upload->data());
            $this->upload->data();
            //$this->load->view('upload_success', $data);
        }
    }

}
