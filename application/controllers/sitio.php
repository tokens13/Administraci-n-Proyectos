<?php
    class Sitio extends CI_Controller{
        
       
        public function __construct()
        {
            parent::__construct();
            $this->load->model('items_model');
        }
       public function cargar($page = 'inicio')
       {
           
           if(!file_exists(APPPATH.'/views/'.$page.'.php'))
           {
               show_404();
           }
           #si no esta logueado
           /* if (!$this->tank_auth->is_logged_in()) {
                redirect('/auth/login/');
            } else {*/
           $data['notas'] = $this->items_model->get_news();
           $data['title']=  ucfirst($page);
           $this->load->view('Plantilla/header',$data);   
           $this->load->view($page,$data);
           $this->load->view('Plantilla/footer');
          // }
       }
       public function create($id = 0)
        {
            $this->load->helper('form');
            $this->load->helper('html');
            $this->load->library('form_validation');
        
            $data['title'] = 'Administrador';
        
            $this->form_validation->set_rules('titulo', 'Titulo', 'required');
            $this->form_validation->set_rules('texto', 'Texto', 'required');
        
            if ($this->form_validation->run() === FALSE)
            {
                $data['notas'] = $this->items_model->get_news();
                
                $this->load->view('Plantilla/header', $data);
                if ($id > 0){
                 $data['nota'] = $this->items_model->get_news($id);   
                }
                $this->load->view('agregar',$data);
                $this->load->view('Plantilla/footer');
        
            }
            else
            {
                if($this->input->post('id_nota')){
                    $this->items_model->entry_update();
                }else{
                    $this->items_model->set_news();
                }
                $this->cargar('exito');
            }
        }
        
        function del($id){
           $this->load->library('table');
           $this->load->helper('html'); 
           
           if((int)$id > 0){
              $this->items_model->delete($id);
              $this->create();
           }else{
               show_404();
           }
                
       }
    }
?>