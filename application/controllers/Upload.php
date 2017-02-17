<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

	public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
		$this->load->library('image_lib');
        }
	
	public function index()
        {
                $this->load->view('upload_form', array('error' => ' ' ));
        }

        public function do_upload()
        {
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('upload_form', $error);
                }
                else
                {
			$config['image_library'] 	= 'gd2';
			$config['source_image'] 	= '/opt/lampp/htdocs/codeIgniter3/uploads/'.$this->upload->data()['orig_name'];
			$config['create_thumb'] 	= TRUE;
			$config['maintain_ratio'] 	= TRUE;
			$config['width']         	= 75;
			$config['height']       	= 50;
			
			$this->load->library('image_lib', $config);
			
			$this->image_lib->resize();
			

                        $data = array('upload_data' => $this->upload->data());

                        $this->load->view('upload_success', $data);
                }
        }
}
