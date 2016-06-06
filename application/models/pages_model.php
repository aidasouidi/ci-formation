<?php
/**
 * Created by PhpStorm.
 * User: AidaSouidi
 * Date: 28/12/2015
 * Time: 21:29
 */
class pages_model extends CI_Model{

    public function __construct(){
        parent::__construct();}

    public function contact($data) {
        $this->db->insert('users', $data);}

    public function user_login($data) {

    /* $condition = "username =" . "'" . $data['username'] . "' AND " . "password =" . "'" . $data['password'] . "'";*/
    $this->db->select('*');
    $this->db->from('users');
    /* $this->db->where($condition);
     $this->db->limit(1);*/
    $query = $this->db->get();

    if ($query->num_rows() == 1) {
        return true;
    } else {
        return false;
    }


        }




// Read data from database to show data in admin page
    public function read_user_information($username) {

    /* $condition = "username =" . "'" . $username . "'";*/
    $this->db->select('*');
    $this->db->from('users');
    /* $this->db->where($condition);
     /*this->db->limit(1);*/
    $query = $this->db->get();

    if ($query->num_rows() == 1) {
        return $query->result();
    } else {
        return false;


        }


        }


        public function show_users(){
            $query = $this->db->get('users');
            $query_result = $query->result();
            return $query_result;
        }
// Function To Fetch Selected Student Record
       public function show_user_id($data){
            $this->db->select('*');
            $this->db->from('users');
            $this->db->where('id', $data);
            $query = $this->db->get();
            $result = $query->result();
            return $result;
        }
// Update Query For Selected Student
        public function update_user_id1($id,$data){
            $this->db->where('id', $id);
            $this->db->update('users', $data);
        }







    }

?>