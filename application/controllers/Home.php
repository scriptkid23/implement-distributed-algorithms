<?php

    defined('BASEPATH') OR exit('No direct script access allowed');
    

    class Home extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
    
        }
        public function index(){
            $this->load->view('index');
        }
        public function contact(){

            
            $this->load->view('contact');  
            $name    =  $this->input->post('name');
            $email   =  $this->input->post('email');
            $subject =  $this->input->post('subject');
            $message =  $this->input->post('message');
    
        }
        public function administrator(){
            $data['title'] = 'From with session';
            $this->load->view('adminLogin',$data);
        }
        public function login_validation(){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('email','Username','required');
            $this->form_validation->set_rules('pass','Password','required');

            if($this->form_validation->run()){
                $username = $this->input->post('email');
                $password = $this->input->post('pass');

                $this->load->model('Main_model');
                if($this->Main_model->can_login($username,$password))
                {
                    $session_data = array(
                        'username' =>$username,
                    );
                    $this->session->set_userdata($session_data);
                    
                    redirect('http://localhost:8888/hoando/quangcaoxaydung.vn/index.php/home/enter');
                    
                }
                else{
                    $this->session->set_flashdata('error', 'Invalid Username and Password');
                    redirect('http://localhost:8888/hoando/quangcaoxaydung.vn/index.php/home/administrator');
                };
                
            }else{
               $this->administrator();
            }

        }
        public function enter(){
                if ($this->session->userdata('username') != '') {
                    echo '<h2>welcome</h2>';
                    echo '<label><a href="http://localhost:8888/hoando/quangcaoxaydung.vn/index.php/home/logout">Logout</a></label>';
                }else{
                    echo '<h1>Access Denial</h1>';
                }
        }
        public function logout(){
            $this->session->unset_userdata('username');  
            redirect('http://localhost:8888/hoando/quangcaoxaydung.vn/index.php/home');
        }
        

        
    }
    
    
    /* End of file filename.php */
    