<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/ImplementJwt.php';
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method,Authorization");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

class Users extends REST_Controller{
    public function __construct() {
        parent::__construct();
        // Load these helper to create JWT tokens
        $this->tokenJWT = new ImplementJwt();

    }
    public function index_options(){
        $this->response(NULL, REST_Controller::HTTP_OK);
    }
    public function index_get(){
        $this->verify_request();
        $this->load->model('Users_model');
        $users = $this->Users_model->get_all();
        if($users)
        {
            $this->response($users, 200);
        }else
        {
            $this->response(NULL, 500);
        }
    }
    public function create_post(){
        $this->verify_request();
        $this->response($json, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
    }
    public function list_get(){
        $this->verify_request();
        $this->response($json, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
    }
    public function update_post(){
        $this->verify_request();
        $this->response($json, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
    }
    public function delete_get($idusers){
        $this->verify_request();
        $this->response($json, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
    }

}
