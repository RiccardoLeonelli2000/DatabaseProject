<h2 style="margin: 2%">Inserimento Spedizione</h2>

<form action="process-op3.php" method="POST" style="margin: 2% 2% 2% 2%" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">Numero Ordine</label>
      <input type="numeric" class="form-control" name="NumeroOrdine" required placeHolder="">
    </div>
  </div>
  <div class="form-group col-md-4">
    <label for="inputAddress">Matricola Camionista</label>
    <input type="numeric" class="form-control" name="Matricola" required>
  </div>
  <a href="amministratore.php" role="button" class="btn btn-secondary" style="margin-top: 1%">Indietro</a>
    <button type="submit" class="btn btn-primary" style="margin-top: 1%">Aggiungi Spedizione</button>
</form>

<?php if(isSet($_GET["formmsg"])): ?>
  <div class="error">
      <h5 class="text-center">Attenzione!</h5>
      <p class="text-center"><?php echo $_GET["formmsg"]; ?></p>
  </div>
<?php endif; ?>