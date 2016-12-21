<?php
class TweetsController {
  public function __construct() {
    $this->tweets = new Tweets();
  }

  public function index() {
    $feed = $this->tweets->get_tweets();
    require_once('views/tweets.php');
  }

  public function edit() {
    $this->tweets->user = $_POST['user'];
    $this->index();
  }

  public function error() {
    require_once('views/error.php');
  }
}
