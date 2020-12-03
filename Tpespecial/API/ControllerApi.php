<?php 
require_once 'ViewApi.php';

abstract class ControllerApi {
    protected $model; // lo instancia el hijo
    protected $view;

    private $data; 

    public function __construct() {
        $this->view = new ViewApi;
        $this->data = file_get_contents("php://input"); 
    }

    function getData(){ 
        return json_decode($this->data); 
    }  
}
