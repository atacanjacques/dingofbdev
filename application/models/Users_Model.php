<?php

class Users_Model extends CI_Model
{
        public function create_users($user, $token)
        {
                $data = array(
                        'id_fb' => $user['id'],
                        'nom' => $user['last_name'],
                        'prenom' => $user['first_name'],
                        'mail' => $user['email'],
                        'token' => $token
                        );

                $this->db->insert('users', $data);
        }

        public function read_users($user)
        {
                $this->db->select('id_fb');
                $this->db->where('id_fb', $user['id']);
                return $this->db->get('users');
        }
}