<?php

class Task extends CI_Model {

        public $task;
        public $date;
        public $time;
        public $id;

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                date_default_timezone_set('Asia/Jakarta');
        }

        public function get_all()
        {
                $query = $this->db->get('tbl_edoward');
                return $query->result();
        }

        public function last_id()
        {
                $this->db->order_by("id", "desc");
                $query = $this->db->get('tbl_edoward', 1); 
                return $query->result();
        }

        public function last(){
                $this->db->where('id', $this->id);
                $query = $this->db->get('tbl_edoward', 1); 
                return $query->result();
        }

        public function insert_entry()
        {
                $this->task     = $_POST['task']; // please read the below note
                $this->date     = date('Y-m-d');
                $this->time     = date('H:i:s');

                if($this->db->insert('tbl_edoward', $this))
                {
                        return 'success';
                }
                else{
                        return 'error';
                }

        }

        public function update_entry()
        {
                $this->id       = $_POST['id'];
                $this->task     = $_POST['task'];
                $this->date     = date('Y-m-d');
                $this->time     = date('H:i:s');

                if($this->db->update('tbl_edoward', $this, array('id' => $_POST['id'])))
                {
                        return 'success';
                }
                else{
                        return 'error';
                }
        }

        public function delete_entry()
        {
                $this->db->where('id', $_POST['id']);

                if($this->db->delete('tbl_edoward'))
                {
                        return 'success';
                }
                else{
                        return 'error';
                }
                
        }

}