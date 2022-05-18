<div class="container" style="margin: 2% 2% 2% 2%">
<h2 style="">Fatturato</h2>

<form action="op6.php" method="POST"  enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Anno</label>
      <input type="numeric" class="form-control" name="anno" required placeHolder="Inserire l'anno di cui si vuole calcolare il fatturato">
    </div>
  </div>
    <a href="amministratore.php" role="button" class="btn btn-secondary" style="margin-top: 1%">Indietro</a>
    <button type="submit" class="btn btn-primary" style="margin-top: 1%">Calcola</button>
</form>
<br>

<?php if(isSet($_POST["anno"])): ?>
<h2><?php echo($templateParams["fatturato"][0]["SUM(CostoTotale)"]."€") ?></h2>
<?php endif; ?>
</div>


<?php if(isSet($_GET["formmsg"])): ?>
  <div class="error">
      <h5 class="text-center">Attenzione!</h5>
      <p class="text-center"><?php echo $_GET["formmsg"]; ?></p>
  </div>
<?php endif; ?>