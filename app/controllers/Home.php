<?php
class Home extends Controller
{
    public function index()
    {
        $data = [
            'pageTitle' => "Home",
        ];

        // call method in Controller class
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }

}