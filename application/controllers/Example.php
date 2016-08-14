<?php
class Example extends Core_Controller {
	
public function index()
    {

        //$this->load->library('customer');
        //$this->customer->success();
        $data['title'] = 'hello world';
        $this->view('example/index',$data);
        
    }
}
