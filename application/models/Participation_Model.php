<?php
class Participation_Model extends CI_Model
{
    public function create_participation($participation, $user)
    {
        $this->db->select('id');
        $this->db->limit(1);
        $this->db->order_by('id', 'DESC');
        $current_concours = $this->db->get('concours')->row()->id;
        $data = array(
            'source_photo' => $participation['images']['0']['source'],
            'concours_id' => $current_concours,
            'users_id_fb' => $user['id']
        );
        $this->db->insert('participation', $data);
    }
}