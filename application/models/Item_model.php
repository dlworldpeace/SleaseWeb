<?php
    class Item_model extends CI_Model {
        public function __construct() {
            $this->load->database();
        }

        public function get_items($item_id = FALSE) {
            if($item_id === FALSE) {
                $query = $this->db->query('SELECT * FROM Items;');
                return $query->result_array();
            }

            $query = $this->db->query("SELECT * FROM Items WHERE Item_id = '".$item_id."';");
            return $query->result_array();
        }
        
        public function create_item() {
            // $image = file_get_contents($this->input->file['image']['tmp_name']);

            // // Add some filters
            // imagefilter($image, IMG_FILTER_PIXELATE, 1, true);
            // imagefilter($image, IMG_FILTER_MEAN_REMOVAL);

            // ob_start(); // Let's start output buffering.
            // imagejpeg($image); //This will normally output the image, but because of ob_start(), it won't.
            // $contents = ob_get_contents(); //Instead, output above is saved to $contents
            // ob_end_clean(); //End the output buffer.

            // $imageUri = "data:image/jpeg;base64," . base64_encode($contents);
            
            $data= array(
                'item_name' => $this->input->post('item_name'),
                'owner' => $this->input->post('owner'),
                'description' => $this->input->post('description'),
                'user_file' => '', //$imageUri,
                'pickup_location' => $this->input->post('pickup_location'),                
                'pickup_region' => $this->input->post('pickup_region'),
                'return_location' => $this->input->post('return_location'),
                'minbid' => (int)$this->input->post('minbid'),
                'fromdate' => $this->input->post('fromdate'),
                'todate' => $this->input->post('todate'),
                'category' => (int)$this->input->post('category')
            );
            print_r($data);
            $sql = "INSERT INTO Items VALUES(?,DEFAULT,?,?,?,?,?,?,?,?,?,?)";
            if($this->db->query($sql, $data)){
                return true;
            }
            return false;
        }

        public function delete_item($item_id) {
            $this->db->query("DELETE FROM Items WHERE Item_id = '".$item_id."';");
            return true;
        }
    }