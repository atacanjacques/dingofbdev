<?php

class Participation_Model extends CI_Model
{
        public function create_participation($participation, $user)
        {
                $this->load->model('Concours_Model');
                $current_concours = $this->Concours_Model->last_concours();

                $data = array(
                        'source_photo' => $participation['images']['0']['source'],
                        'concours_id' => $current_concours->id,
                        'users_id_fb' => $user['id']
                        );

                $this->db->insert('participation', $data);
        }

        public function read_participation($fb_user)
        {
                $this->db->select('*');
                $this->db->where('users_id_fb', $fb_user['id']);
                return $this->db->get('participation')->row();
        }

        public function delete_participation($fb_user)
        {
                $this->db->where('users_id_fb', $fb_user['id']);
                $this->db->delete('participation');
        }
}