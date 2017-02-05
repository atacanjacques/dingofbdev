<?php

class Users_Model extends CI_Model
{
        public function create_users($fb_user, $token)
        {
                $data = array(
                        'id_fb' => $fb_user['id'],
                        'nom' => $fb_user['last_name'],
                        'prenom' => $fb_user['first_name'],
                        'mail' => $fb_user['email'],
                        'token' => $token
                        );

                $this->db->insert('users', $data);
        }

        public function read_users($fb_user)
        {
                $this->db->select('*');
                $this->db->where('id_fb', $fb_user['id']);
                return $this->db->get('users')->row();
        }

        public function update_users($fb_user, $token)
        {
                $data = array(
                        'id_fb' => $fb_user['id'],
                        'nom' => $fb_user['last_name'],
                        'prenom' => $fb_user['first_name'],
                        'mail' => $fb_user['email'],
                        'token' => $token
                        );

                $this->db->where('id_fb', $fb_user['id']);
                $this->db->replace('users', $data);
        }
}