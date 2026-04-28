<?php if (isset($_SESSION['gameCode'])) { ?>
      <div class="alert alert-info alert-dismissible fade show text-center mt-3" role="alert">
        <?php 
          echo $_SESSION['gameCode'];
          unset($_SESSION['gameCode']);
        ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
      <?php } ?>