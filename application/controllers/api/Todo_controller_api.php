<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Todo_controller_api extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->library(array('session'));
    $this->load->model('todo_api');
  }

  private function valid_request($token, $user_id){
    if(isset($token) && isset($user_id)){
      $data["token"] = $this->todo_api->get_user_valid_request($token,$user_id);
      if($data["token"] == 1){
          return true;
      }else{
        return false;
      }
    }else{
      return false;
    }
  }
  public function get($token, $user_id){
    //get token
    //$data["token"] = $this->uri->segment(2);
  //  $data["user_id"] = $this->uri->segment(3);
    //var_dump($data["get"]);

    if($this->valid_request($token, $user_id)){
      $data = $this->todo_api->get_todo($user_id);
      echo json_encode( $data );
    }else{
      echo "Illegal Request";
    }
  }
  /*public function send_todo(){
    if($data["token"] == 1){
    $data = $this->todo_api->get_todo();
     echo json_encode( $data );
   }else{
     echo "Ilegal request.";
   }
 }*/
  public function delete_todo(){
    echo $_SESSION["token"];
  }

  public function post($token, $user_id){

    if($this->valid_request($token, $user_id)){
      $result["text_todo"] = $this->input->post("text_todo");
      $result["user_id"] = $this->uri->segment(4);
      $response = $this->todo_api->post($result);
      echo $response;
    }else{
      echo "Illegal Request";
    }

  }
  public function delete($token, $user_id){

    if($this->valid_request($token, $user_id)){
      $result["text_todo_id"] = $this->input->post("text_todo_id");
      $response = $this->todo_api->delete($result);
      echo $response;
    }else{
      echo "Illegal Request";
    }

  }

  public function update($token, $user_id){
    if($this->valid_request($token, $user_id)){
      $result["text_todo_id"] = $this->input->post("text_todo_id");
      $result["text_todo"] = $this->input->post("text_todo");
      $response = $this->todo_api->update($result);
      echo $response;
    }else{
      echo "Illegal Request";
    }
  }

  public function done($token, $user_id){
    if($this->valid_request($token, $user_id)){
      $result["text_todo_id"] = $this->input->post("text_todo_id");
      $result["is_done"] = $this->input->post("is_done");
      $response = $this->todo_api->done($result);
      echo $response;
    }else{
      echo "Illegal Request";
    }
  }
}

?>
