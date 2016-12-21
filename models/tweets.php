<?php
class Tweets {

  public $user = 'KarmacrewTV';
  private $twitter;

  public function __construct() {
    require_once('lib/TwitterAPIExchange.php');
    $settings = [
      'oauth_access_token'        => $_ENV['TWITTER_OAUTH_ACCESS_TOKEN'],
      'oauth_access_token_secret' => $_ENV['TWITTER_OAUTH_ACCESS_TOKEN_SECRET'],
      'consumer_key'              => $_ENV['TWITTER_CONSUMER_KEY'],
      'consumer_secret'           => $_ENV['TWITTER_CONSUMER_SECRET']
    ];
    $this->twitter = new TwitterAPIExchange($settings);
  }

  public function get_tweets() {
    return json_decode($this->twitter->setGetField("?screen_name={$this->user}&count=20")
                         ->buildOauth('https://api.twitter.com/1.1/statuses/user_timeline.json', 'GET')
                         ->performRequest(), $assoc = true);
  }

}
