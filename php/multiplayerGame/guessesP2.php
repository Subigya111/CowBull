
<div class="d-flex justify-content-center">
  <div class="d-flex flex-column align-items-center"
       style="width:50%; height:100vh; background:#DBDFFF; box-shadow: 0px 4px 10px 2px gray;">
       <div class="alert alert-info alert-dismissible fade show text-center mt-3" role="alert">
          <?php 
            echo "You set " .$_SESSION['secretP2'] ." for your friend to guess";

          ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <h4 class="p-3"><strong>Guess History</strong></h4>

    <?php if (!empty($_SESSION['history'])): ?>
      <ul class="mt-4 list-unstyled">
        <?php foreach ($_SESSION['history'] as $index => $h): ?>
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