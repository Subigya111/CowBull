<?php
$code = $_SESSION['gameCode'];
$game = json_decode(file_get_contents("../../games/$code.json"), true);
?>
<?php if (isset($game['code'])) { ?>
      <div class="alert alert-info alert-dismissible fade show text-center mt-3" role="alert">
        <?php 
          echo "Hi, " . $game['player1']['nameP1'] . ". Your game code is ".$game['code'];
          echo ". Share it with your friend!!";
        ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
      <?php } ?>