
<?php
$code = $_SESSION['gameCode'];
$game = json_decode(file_get_contents("../../games/$code.json"), true);
?>
<div class="d-flex justify-content-center">
  <div class="d-flex flex-column align-items-center"
       style="width:50%; height:100vh; background:#DBDFFF; box-shadow: 0px 4px 10px 2px gray;">
       <div class="alert alert-info alert-dismissible fade show text-center mt-3" role="alert">
          <?php 
            echo "You set " .$game['player2']['secret'] ." for ". $game['player1']['nameP1']. " to guess";

          ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <h4 class="p-3"><strong>Guess History</strong></h4>

    <?php if (!empty($game['player2']['guesses'])): ?>
      <ul class="mt-4 list-unstyled">
        <?php foreach ($game['player2']['guesses'] as $index => $h): ?>
          <li class="mb-2">
            <strong>#<?= $index + 1 ?>:</strong>
            <?= ($h['guess']) ?>
            →
            <?= $h['result'] ?>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php else: ?>
      <p class="mt-4 text-muted">No guesses yet. Start guessing! 🎯</p>
    <?php endif; ?>

  </div>
</div>