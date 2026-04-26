    <?php if (isset($_SESSION['error'])) { ?>
      <div class="alert alert-danger alert-dismissible fade show text-center mt-3" role="alert">
        <?php 
          echo $_SESSION['error'];
          unset($_SESSION['error']);
        ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
      <?php } ?>