<h2 style="margin: 2%">Inserimento Produzione</h2>

<form action="process-op7.php" method="POST" style="margin: 2% 2% 2% 2%" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Matricola</label>
      <input type="numeric" class="form-control" name="Matricola" required placeHolder="Matricola dell'operaio che entra in produzione">
    </div>
  </div>
  <div class="form-group col-md-6">
    <label for="inputAddress">Targa</label>
    <input type="text" class="form-control" name="Targa" required placeHolder="Targa del macchinario in uso">
  </div>
  <a href="amministratore.php" role="button" class="btn btn-secondary" style="margin-top: 1%">Indietro</a>
    <button type="submit" class="btn btn-primary" style="margin-top: 1%">Esegui</button>
</form>

<?php if(isSet($_GET["formmsg"])): ?>
  <div class="error">
      <h5 class="text-center">Attenzione!</h5>
      <p class="text-center"><?php echo $_GET["formmsg"]; ?></p>
  </div>
<?php endif; ?>