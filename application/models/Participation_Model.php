<?php

class Participation_Model extends CI_Model {

        public function insert_participation($photo_id, $user_id)
        {
                $photo_id = intval($photo_id);
                $user_id = intval($user_id);

                $this->db->select('id');
                $this->db->limit(1);
                $this->db->order_by('id', 'DESC');

                $current_concours = $this->db->get('concours')->row()->id;

                $data = array(
                        'id_photo' => $photo_id,
                        'users_id' => $user_id,
                        'concours_id' => $current_concours
                        );

                $this->db->insert('participation', $data);
        } 
}