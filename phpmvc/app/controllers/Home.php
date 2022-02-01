<?php

class Home extends Controller
{
    public function index()
    {
        $data['judul'] = 'Home Page';
        $data['nama'] = $this->model('User_model')->getUser();
        // use view method on Controller
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}
