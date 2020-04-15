<?php
require APPPATH . 'libraries/REST_Controller.php';
     
class Gambar extends REST_Controller {
    
	/**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->model('datakapal_model');
    }
       
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
	public function index_get($id)
    {
        $gambar     = $this->datakapal_model->detail_delete_gambar($id);
        $this->response(['gambar' => $gambar] , REST_Controller::HTTP_OK);
    }

}