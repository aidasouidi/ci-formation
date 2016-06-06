<?php
/**
 * Created by PhpStorm.
 * User: AidaSouidi
 * Date: 28/12/2015
 * Time: 21:24
 */
class pages extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');//load form_validation library
        $this->load->model('pages_model');//load model
        $headdata=array();
    }


    public function dropdown(){
            $headdata['title']='dropdown';
            $this->load->view('templates/header', $headdata);
            $this->load->view('pages/dropdown');
            $this->load->view('templates/footer');
    }

            public function contact(){
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');

        if ($this->form_validation->run() == FALSE){
            echo $this->email->print_debugger();

            $headdata['title']='contact';
            $this->load->view('templates/header', $headdata);
            $this->load->view('pages/contact');
            $this->load->view('templates/footer');

        } else {
            $data= array(
                'username' =>$this->input->post('username'),
                'email' =>$this->input->post('email'),
                'password' =>$this->input->post('password'));

            $result =$this->pages_model->contact($data);
            if($result==true){
                $data['message_display'] = 'Registration Successfully !';

                $headdata['title']='contact';
                $this->load->view('templates/header', $headdata);
                $this->load->view('pages/contact', $data);
                $this->load->view('templates/footer');

            } else{
                $data['message_display'] = 'Username already exist!';

                $headdata['title']='contact';
                $this->load->view('templates/header', $headdata);
                $this->load->view('pages/contact', $data);
                $this->load->view('templates/footer');
            }
        }

        }

    public  function admin() {
        $headdata['title']='admin';
        $this->load->view('templates/header', $headdata);
        $this->load->view('pages/admin');
        $this->load->view('templates/footer');
    }





    public  function media() {
        $headdata['title']='media';
        $this->load->view('templates/header', $headdata);
        $this->load->view('pages/media');
        $this->load->view('templates/footer');
    }
    public function home()
    {
        $this->output->enable_profiler(TRUE);
        $this->load->library('email');
        $this->email->initialize(array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_user' => 'foramationci2015@gmail.com',
            'smtp_pass' => 'formation2015',
            'smtp_port' => 465,
            'charset' => 'utf-8',
            'newline' => "\r\n" ));//obligatoire dans l'envoi d'un mail

        $this->email->from('foramationci2015@gmail.com', 'Your Name');
        $this->email->to('foramationci2015@gmail.com');
        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');
        $this->email->send();
        echo $this->email->print_debugger();

        $headdata['title']='home';
        $this->load->view('templates/header', $headdata);
        $this->load->view('pages/home', array('error' => ' ' ));
       }







        public function upload(){

        $config['upload_path']          = 'public/uploads/';
        $config['allowed_types']        = 'gif|jpg|png|txt';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
            $error = array('error' => $this->upload->display_errors());

            $headdata['title']='upload';
            $this->load->view('templates/header', $headdata);
            $this->load->view('pages/upload', $error);
            $this->load->view('templates/footer');

        }
        else
        {
            $data = array('upload_data' => $this->upload->data());

            $headdata['title']='upload';
            $this->load->view('templates/header', $headdata);
            $this->load->view('pages/upload', $data);
            $this->load->view('templates/footer');

        }

    }

    public function login(){
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required');

      if($this->form_validation->run()==false){
            if(isset($this->session->userdata['logged_in'])){
                $headdata['title']='login';
                $this->load->view('templates/header', $headdata);
                $this->load->view('pages/login');
                $this->load->view('templates/footer');
            }else{
                $headdata['title']='admin';
                $this->load->view('templates/header', $headdata);
                $this->load->view('pages/admin');
                $this->load->view('templates/footer');

            }
        }else{
            $data=array(
                'username' =>$this->input->post('username'),
                'email' =>$this->input->post('email'),
            );
            $username = $this->input->post('username');
            $result = $this->pages_model->user_login($data);
            if ($result == TRUE){
                $result = $this->pages_model->read_user_information($username);
                if ($result != false){
                    $session_data = array(
                        'username' => $result[0]->username,
                        'email' => $result[0]->email,
                    );
                    // Add user data in session
                    $this->session->set_userdata('logged_in', $session_data);
                    $headdata['title']='admin';
                    $this->load->view('templates/header', $headdata);
                    $this->load->view('pages/admin');
                    $this->load->view('templates/footer');
                }
            } else{
                $data = array(
                    'error_message' => 'Invalid Username or Password'
                );
                $headdata['title']='login';
                $this->load->view('templates/header', $headdata);
                $this->load->view('pages/login', $data);
                $this->load->view('templates/footer');

            }
        }


        }

    public function logout() {

// Removing session data
        $sess_array = array(
            'username' => ''
        );
        $this->session->unset_userdata('logged_in', $sess_array);
        $data['message_display'] = 'Successfully Logout';
        $this->load->view('pages/about', $data);
    }






    public function show_user_id() {
        $id = $this->uri->segment(3);
        $data['users'] = $this->pages_model->show_users();
        $data['single_user'] = $this->pages_model->show_user_id($id);
        $this->load->view('pages/update', $data);
    }
    public function update_user_id1() {
        $id= $this->input->post('id');
        $data = array(
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),

        );
        $this->pages_model->update_user_id1($id,$data);
        //$this->show_user_id();
    }










}

?>