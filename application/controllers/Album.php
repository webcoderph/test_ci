<?php
class Album extends CI_Controller {

  public function index() {
    $status = 420;
    $data = file_get_contents('php://input');

    if(!empty($data)) {
      $jsonArray = json_decode($data,true);

      if($this->input->server('REQUEST_METHOD') == 'PUT' && !$this->is_duplicate($jsonArray)) {
        $status = 200;
      }

    }

    header('Content-Type: application/json');
    header("X-PHP-Response-Code: $status", true, $status);
  }

  public function form() {
   $this->load->view("layout/header");
   $this->load->view("album/form");
   $this->load->view("layout/footer");
  }

  public function get_reward_level() {
    $level = '';

    $total = $this->input->post('history_spent') + $this->input->post('recent_transaction');

    if($total < 125) {
      $level = 'White Member';
    } else if($total >= 125 && $total < 1000) {
      $level = 'Blue Member';
    } else if($total >= 1000 && $total < 2000) {
      $level = 'Silver Member';
    } else {
      $level = 'Gold Member';
    }

   $this->load->view("layout/header");
   $this->load->view("album/rewards_display", ["level" => $level]);
   $this->load->view("layout/footer");
  }

  public function is_duplicate($array)
  {
    return count($array) != count(array_unique($array));
  }

}
