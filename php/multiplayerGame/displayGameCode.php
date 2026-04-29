<?php if (isset($_SESSION['gameCode'])) { ?>
      <div class="alert alert-info alert-dismissible fade show text-center mt-3" role="alert">
        <?php 
          echo "Hi, " . $_SESSION['username'] . ". Your game code is ".$_SESSION['gameCode'];
          echo ". Share it with your friend!!";
          unset($_SESSION['gameCode']);
        ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
      <?php } ?>