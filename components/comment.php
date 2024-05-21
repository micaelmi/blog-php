<?php
function comment($user, $date, $comment)
{
  $seed = random_int(1, 99999999);
  return <<<HTML
  <div class="comment-card">
    <img src="https://api.dicebear.com/8.x/fun-emoji/svg?seed=$seed" alt="Avatar Icon">
    <div class="text">
        <p class="user">$user - $date</p>
        <p class="comment">$comment</p>
    </div>
  </div>
HTML;
}
