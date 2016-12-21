<?php
function call($controller, $action) {
  require_once("controllers/{$controller}.php");

  switch($controller) {
    case 'tweets':
      require_once('models/tweets.php');
      $controller = new TweetsController();
    break;
  }

  $controller->{$action}();
}

$permitted_controllers = ['tweets' => ['index', 'edit']];

if(array_key_exists($controller, $permitted_controllers)) {
  if(in_array($action, $permitted_controllers[$controller])) {
    call($controller, $action);
  } else {
    call('tweets', 'error');
  }
} else {
  call('tweets', 'error');
}
