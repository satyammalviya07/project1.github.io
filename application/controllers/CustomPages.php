<?php

class CustomPages extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function error404()
    {
        $this->output->set_status_header('404');
        $this->data['content'] = 'custom404view'; // View name
        $this->load->view('errors/error_404');
    }

    public function error403()
    {
        $this->load->view('errors/error_403');
    }

    public function error500()
    {
        $this->load->view('errors/error_500');
    }
}