<h2 style="margin: 2%">Inserimento Prodotto</h2>

<form action="process-op8-2.php" method="POST" style="margin: 2%" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-3">
      <label>LottoProdotto</label>
      <input type="text" class="form-control" name="LottoProdotto" required>
    </div>
  </div>
  <div class="form-group col-md-3">
    <label for="inputAddress">Numero Ordine</label>
    <input type="text" class="form-control" name="NumeroOrdine" required>
  </div>
  <div class="form-group col-md-3">
    <label for="inputAddress2">Tipo</label>
    <select class="form-select" name="Tipo">
        <option value="accoppiamento">Accoppiato</option>
        <option value="stampa">Stampato</option>
        <option value="taglio">Tagliato</option>
        <option value="saldatura">Saldato</option>
    </select>
  </div>
  <div class="form-row">
  <div class="form-group col-md-3">
    <label for="inputAddress">Peso Complessivo</label>
    <input type="number" class="form-control" name="PesoComplessivo" required placeholder='Kg'>
  </div>
    <div class="form-group col-md-3">
      <label for="inputCity">Peso per Elemento</label>
      <input type="number" class="form-control" name="PesoPerElemento" required placeholder='Kg'>
    </div>
    <div class="form-group col-md-3">
    <label for="inputAddress">Numero Elementi</label>
    <input type="number" class="form-control" name="NumeroElementi" required>
  </div>
    <div class="form-group col-md-3">
    <label for="inputAddress">Lunghezza</label>
    <input type="number" class="form-control" name="Lunghezza" placeholder='opzionale in metri'>
  </div>
    <a href="op8.php" role="button" class="btn btn-secondary" style="margin-top: 1%">Indietro</a>
    <button type="submit" class="btn btn-primary" style="margin-top: 1%">Esegui</button>
</form>
<?php if(isSet($_GET["formmsg"])): ?>
  <div class="error">
      <h5 class="text-center">Attenzione!</h5>
      <p class="text-center"><?php echo $_GET["formmsg"]; ?></p>
  </div>
<?php endif; ?>