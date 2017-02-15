<?php

class Participation_Model extends CI_Model
{
        protected $limit = 6;

        public function add_participation($participation, $user)
        {
                $this->load->model('Concours_Model');
                $current_concours = $this->Concours_Model->date_concours();

                $data = array(
                        'source_photo' => $participation['images']['0']['source'],
                        'concours_id' => $current_concours->id,
                        'users_id_fb' => $user['id']
                        );

                $this->db->insert('participation', $data);
        }

        public function get_participation($fb_user)
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

        public function liste_participation($orderby, $page)
        {
                $offset = $this->limit * ($page - 1);

                $this->load->model('Concours_Model');
                $current_concours = $this->Concours_Model->date_concours();

                $this->db->select('participation.*, users.prenom, COUNT(vote.id) AS votes');
                $this->db->from('participation');
                $this->db->join('users', 'users.id_fb = participation.users_id_fb', 'inner');
                $this->db->join('vote', 'vote.participation_idparticipation = participation.id', 'left');
                $this->db->where('participation.concours_id', $current_concours->id);
                $this->db->group_by('participation.id');
                if($orderby == "top"){ $this->db->order_by('votes', 'DESC'); }
                else{ $this->db->order_by('RAND(697)'); }
                $this->db->limit($this->limit, $offset);
                return $this->db->get()->result();
        }

        public function nb_participation()
        {
                $this->load->model('Concours_Model');
                $current_concours = $this->Concours_Model->date_concours();

                $this->db->select('COUNT(*) as nb_participation');
                $this->db->from('participation');
                $this->db->join('users', 'users.id_fb = participation.users_id_fb', 'inner');
                $this->db->where('participation.concours_id', $current_concours->id);
                $nb_participation = $this->db->get()->row()->nb_participation / $this->limit;
                $nb_participation = ceil($nb_participation);

                return $nb_participation;
        }

        public function add_signalement($id_participation)
        {
                $data = array(
                        'signalement' => '1'
                        );

                $this->db->where('id', $id_participation);
                $this->db->update('participation', $data);
        }
}