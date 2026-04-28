<?php
session_start();
require "generateNumber.php";
if (!isset($_SESSION['history'])) {
    $_SESSION['history'] = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>🔢 CowBull: Number Game</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

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

<div class="d-flex justify-content-center ">


  <div class="d-flex  flex-column  align-items-center"
       style="width:50%; height:100vh; background:#DBDFFF; box-shadow: 0px 4px 10px 2px gray;">

    
    
    <?php if (isset($_SESSION['won'])): ?>
    <div class="alert alert-success mt-5 mb-5 text-center">
        🎉 You guessed it! The number was <strong><?= $_SESSION['secret'] ?></strong>
    </div>
    
    <button  form="newgame" type="submit" class="btn btn-success">🔄 Play Again</button>
  <form  id="newgame"action="newgame.php" method="POST"> </form>
<?php else: ?>
  
<h4 class="p-3"><strong>🐮 CowBull 🐂</strong></h4>

    <h6 class="mt-4 mb-4 text-center">
      Enter guesses and find the 4 digit number earlier than your friend.
      </h6>
      <h6 class=" text-center mb-4">
      Set a secret number for your friend to guess. Your friend will do the same.</h6>
      <h6 class=" text-center mb-4">
         Try to guess each other's number. <a href="help.php">Help??</a>
          </h6>
          <div class="d-flex flex-column  align-items-center m-5 pt-3"
    style="width:40%; height:40%; box-shadow: 0px 4px 10px 1px gray; background: #A39B9B;">
      <button type="submit" form="aiForm" class="btn btn-primary w-50 mb-4 mt-4 ">Set Game Code </button>
      <form id="aiForm" action="php/aiMode.php" method="POST"></form>
      <h6> OR</h6>  
      <form id="friendForm" action="php/friendMode.php" method="POST" class="mt-4 d-flex flex-column align-items-center">
        <strong>Enter code to join a game:</strong>
        <input style="text-align:center ; width:100px;" type="text" name="code" maxlength="4" class="form-control mt-2" required></form>
      <button class="btn btn-secondary w-51 mb-3 mt-2" form="friendForm">Join</button>
      

</div>
      
    </div>      
<?php endif; ?>
  

    
        
 

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
