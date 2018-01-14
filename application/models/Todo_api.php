<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User_model class.
 *
 * @extends CI_Model
 */
class Todo_api extends CI_Model {
  /**
   * __construct function.
   *
   * @access public
   * @return void
   */
  public function __construct() {

    parent::__construct();
    $this->load->database();

  }

  public function get_user_valid_request($token,$user_id){
    $query = $this->db->query('SELECT * FROM users where token = "'.$token.'" and id = '.$user_id);
    return $query->num_rows();
  }
  /**
   * get_user function.
   *
   * @access public
   * @param mixed $user_id
   * @return object the user object
   */
  public function get_todo($user_id) {
    $query = $this->db->query('SELECT * FROM to_do_data where user_id = "'.$user_id.'" ');
    return $query->result_array();
  }

  public function post($data){
    $this->db->insert('to_do_data', $data);
  }
  public function delete($data){

    $this->db->where('id', $data["text_todo_id"]);
    $this->db->delete('to_do_data');

  }

  public function update($data){

    $this->db->set('text_todo', $data["text_todo"]);
    $this->db->where('id', $data["text_todo_id"]);
    $this->db->update('to_do_data');

  }

  public function done($data){

    $this->db->set('is_done', $data["is_done"]);
    $this->db->where('id', $data["text_todo_id"]);
    $this->db->update('to_do_data');

  }

  public function remove_token($data){
    $this->db->set('token', "a");
    $this->db->where('id', $data["user_id"]);
    $this->db->update('users');
  }
}

?>
