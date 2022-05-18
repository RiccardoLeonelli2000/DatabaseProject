<h2 style="margin: 2%">Inserimento Cliente</h2>

<form action="process-op1.php" method="POST" style="margin: 2%" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Partita Iva</label>
      <input type="text" class="form-control" name="PartitaIva" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Nome</label>
      <input type="text" class="form-control" name="Nome" required>
    </div>
  </div>
  <div class="form-group col-md-6">
    <label for="inputAddress">Telefono</label>
    <input type="number" class="form-control" name="Telefono" required>
  </div>
  <div class="form-group col-md-4">
    <label for="inputAddress2">Città</label>
    <input type="text" class="form-control" name="Città" required>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputCity">Via</label>
      <input type="text" class="form-control" name="Via" required>
    </div>
    <div class="form-group col-md-1">
      <label for="inputZip">Numero civico</label>
      <input type="number" class="form-control" name="NumeroCivico" required>
    </div>
    </div>
    <a href="amministratore.php" role="button" class="btn btn-secondary" style="margin-top: 1%">Indietro</a>

    <button type="submit" class="btn btn-primary" style="margin-top: 1%">Aggiungi Cliente</button>
</form>
<?php if(isSet($_GET["formmsg"])): ?>
  <div class="error">
      <h5 class="text-center">Attenzione!</h5>
      <p class="text-center"><?php echo $_GET["formmsg"]; ?></p>
  </div>
<?php endif; ?>