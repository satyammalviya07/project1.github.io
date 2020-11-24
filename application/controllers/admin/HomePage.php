<?php

class HomePage extends CI_Controller
{
    public function adminDashboard()
    {
        $this->load->view('admin/index');
    }
}