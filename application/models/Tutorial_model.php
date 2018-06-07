<?php

class Tutorial_model extends CI_Model {

	public function ativa($user_id) {
        $this->db->set('nivel', '1'); 
        $this->db->where("id", $user_id); 
        $this->db->update("usuarios"); 
 	}

}