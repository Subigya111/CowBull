<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>🔢 CowBull: Number Game </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    .box {
      width: 30px;
      height: 35px;
      text-align: center;
      font-size: 18px;
      margin: 5px;
      border: 2px solid black;
    }
  </style>
</head>
<body style="margin:0;">
  <div class="d-flex justify-content-center">
  <div class="d-flex flex-column align-items-center"
       style="width:50%; height:100vh; background:#DBDFFF; box-shadow: 0px 4px 10px 2px gray;">
    <h4 class="p-3"><strong>🐮 CowBull 🐂</h4></strong>
    <h6 class="mt-4 mb-4">Enter guesses and find the secret four-digit number in less turns than your friend. 🎯
    </h6>
   <div class="alert alert-info alert-dismissible fade show text-center mt-3" role="alert">
        <?php 
          echo "Hi, " . $_SESSION['nameP2'] ;
          echo ". Welcome to the game.";
        ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
        
    <h6 class="mt-5" >Set a secret number for <?php echo $_SESSION['nameP1']?>  to guess it. </h6>
    <?php if (isset($_SESSION['errorP2'])) { ?>
        <div class="alert alert-danger alert-dismissible fade show text-center mt-3" role="alert">
          <?php 
            echo $_SESSION['errorP2'];
            unset($_SESSION['errorP2']);
          ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      <?php } ?>
    <form action="getSecretP2.php" method="POST" class=" mb-5">
        <input class="box" type="text" name="b1" maxlength="1" required>
        <input class="box" type="text" name="b2" maxlength="1" required>
        <input class="box" type="text" name="b3" maxlength="1" required>
        <input class="box" type="text" name="b4" maxlength="1" required>
        <button type="submit" class="btn btn-sm btn-success">Set</button>
    </form>
    
  </div>
</div>
<script>
const inputs = document.querySelectorAll(".box");

inputs.forEach((input, index) => {

  input.addEventListener("input", function () {
    if (this.value.length === 1 && index < inputs.length - 1) {
      inputs[index + 1].focus();
    }
  });

  input.addEventListener("keydown", function (e) {
    if (e.key === "Backspace" && this.value === "" && index > 0) {
      inputs[index - 1].focus();
    }
  });

});
</script>
</body>
</html>

