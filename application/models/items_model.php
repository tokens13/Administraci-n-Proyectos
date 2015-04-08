<?php
class Items_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    public function get_news($slug = FALSE)
    {
        if ($slug === FALSE)
        {
            $query = $this->db->get('nota');
            return $query->result_array();
        }
    
        $query = $this->db->get_where('nota', array('id_nota' => $slug));
        return $query->row_array();
    }
    
    function getTressUltimas()
    {
        $query = $this->db->get('diseños', 3);
        return $query->result();
        
    }
    public function set_news()
    {
        $this->load->helper('url');
    
        $slug = url_title($this->input->post('titulo'), 'dash', TRUE);
    
        $data = array(
            'titulo' => $this->input->post('titulo'),
            'texto' => $this->input->post('texto')
        );
        return $this->db->insert('nota', $data);
    }
    
    function entry_update(){
       
       $data = array(
                 'titulo'=>$this->input->post('titulo'),
                 'texto'=>$this->input->post('texto'),
                 
               );
       $this->db->where('id_nota',$this->input->post('id_nota'));
       $this->db->update('nota',$data); 
     }
        
    function delete($id){
     
      $this->db->delete('nota', array('id_nota' => $id));
    }
    
}
?>