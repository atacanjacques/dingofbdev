<?php

class Vote_Model extends CI_Model
{
        public function read_vote()
        {
                $this->load->model('Concours_Model');
                $current_concours = $this->Concours_Model->last_concours();

                $this->db->select('participation.*, users.prenom, COUNT(vote.id) AS votes');
                $this->db->from('participation');
                $this->db->join('users', 'users.id_fb = participation.users_id_fb', 'inner');
                $this->db->join('vote', 'vote.participation_idparticipation = participation.id', 'left');
                $this->db->where('participation.concours_id', $current_concours->id);
                $this->db->group_by('participation.id');
                return $this->db->get()->result();
        }
}