<div class="tweet">
  <form action="index.php?controller=tweets&action=edit" method="post">
    <input type="text" name="user" placeholder="Username...">
    <input type="submit" value="Change User">
  </form>
</div>
<?php
foreach($feed as $feed_item) {
  echo "<div class=\"tweet\"><strong>{$feed_item['user']['name']}</strong> @{$feed_item['user']['screen_name']}<br>{$feed_item['text']}</div>";
}
?>
