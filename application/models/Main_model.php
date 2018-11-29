<?php

    
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Main_model extends CI_Model {
    
        public function __construct()
        {
            parent::__construct();
        }
        public function can_login($username,$password)
        {
            $this->db->select('*');
            
            $this->db->where('email', $username);
            $this->db->where('password', $password);

            $query = $this->db->get('admin');
            
            if($query->num_rows() > 0)
            {
                return true;
            }
            else
            {
                return false;
            }
            
            
        }
    }
    
    /* End of file .php */
    
    
    /* End of file filename.php */
    