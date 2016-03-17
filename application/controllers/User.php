<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require __DIR__ . '/../third_party/vendor/autoload.php';

class User extends CI_Controller {
    
    public function __construct() {
        parent::__construct();

        // Load the model
        $this->load->model('User_model');        
    }        
    
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
    public function index() {
        $fb = new Facebook\Facebook([
            'app_id' => '592740737545404',
            'app_secret' => 'd87d1004d23f3338729d908a2e736e9a',
            'default_graph_version' => 'v2.5',
        ]);

        $helper = $fb->getRedirectLoginHelper();

        $permissions = ['email', 'public_profile']; // Optional permissions
        $loginUrl = $helper->getLoginUrl(base_url() . 'user/getUserFacebookInfo', $permissions);

        echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
    }

    public function getUserFacebookInfo() {
        $fb = new Facebook\Facebook([
            'app_id' => '592740737545404',
            'app_secret' => 'd87d1004d23f3338729d908a2e736e9a',
            'default_graph_version' => 'v2.5',
        ]);

        $helper = $fb->getRedirectLoginHelper();
        try {
            $accessToken = $helper->getAccessToken();
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        if (isset($accessToken)) {
            // Logged in!
            $_SESSION['facebook_access_token'] = (string) $accessToken;

            // Now you can redirect to another page and use the
            // access token from $_SESSION['facebook_access_token']
            // Sets the default fallback access token so we don't have to pass it to each request
            $fb->setDefaultAccessToken($accessToken);

            try {
                $response = $fb->get('/me?fields=email,name,first_name,last_name');
                $userNode = $response->getGraphUser();
            } catch (Facebook\Exceptions\FacebookResponseException $e) {
                // When Graph returns an error
                echo 'Graph returned an error: ' . $e->getMessage();
                exit;
            } catch (Facebook\Exceptions\FacebookSDKException $e) {
                // When validation fails or other local issues
                echo 'Facebook SDK returned an error: ' . $e->getMessage();
                exit;
            }            
            $this->signInUserWithFacebook($userNode);
        }
    }
    
    private function signInUserWithFacebook($userNode) {        
        $userInformation = new stdClass();
        $userInformation->email = $userNode->getEmail();
        $userInformation->firstName = $userNode->getFirstName();
        $userInformation->lastName = $userNode->getLastName();
        $user = $this->User_model->selectBy('', $userNode->getEmail(), $userNode->getFirstName(), $userNode->getLastName());
        
        if (!isset($user)) {
            // We should add the user into the database
            $this->User_model->email = $userNode->getEmail();
            $this->User_model->firstName = $userNode->getFirstName();
            $this->User_model->lastName = $userNode->getLastName();
            $this->User_model->insert();
            
        }
        // Save user information in the session
        $this->session->set_userdata(array('user'=> $userInformation));    
        
        // Redirect to the previous page
        
    }
    
    public function login() {        
        $userInformation = new stdClass();
        $userInformation->email = $this->input->post('email');
        $userInformation->password = md5($this->input->post('password'));
        
        // Get user information to login
        $user = $this->User_model->selectBy($userInformation->email, '', '', $userInformation->password);
        
        // Register the user if not exist
        if (!isset($user)) {
            $this->User_model->email = $userInformation->email;
            $this->User_model->password = $userInformation->password;            
            $this->User_model->insert();
        }
        
    }

}
