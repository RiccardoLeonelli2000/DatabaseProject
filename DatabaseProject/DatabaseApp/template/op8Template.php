<h2 style="margin: 2%">Inserimento Lavorazione</h2>

<form action="process-op8.php" method="POST" style="margin: 2%" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-3">
      <label>Lotto Lavorazione</label>
      <input type="text" class="form-control" name="LottoLavorazione" required>
    </div>
    <div class="form-group col-md-3">
      <label>LottoProdotto</label>
      <input type="text" class="form-control" name="LottoProdotto" required>
      <a href="op8-2.php" role="button" class="btn btn-outline-dark btn-sm" style="margin-top: 1%">Aggiungi Prodotto</a>
      <a href="op8-3.php" role="button" class="btn btn-outline-dark btn-sm" style="margin-top: 1%">Aggiorna Prodotto</a>

    </div>
  </div>
  <div class="form-group col-md-3">
    <label for="inputAddress">Targa</label>
    <input type="text" class="form-control" name="Targa" required>
  </div>
  <div class="form-group col-md-3">
    <label for="inputAddress2">Tipo</label>
    <select class="form-select" name="Tipo">
        <option value="accoppiamento">Accoppiamento</option>
        <option value="stampa">Stampa</option>
        <option value="taglio">Taglio</option>
        <option value="saldatura">Saldatura</option>
    </select>
  </div>
  
  <div class="form-row">
    <div class="form-group col-md-5">
      <label for="inputCity">Descrizione</label>
      <input type="text" class="form-control" name="Descrizione" required>
    </div>
    <h3 style="margin: 2%" >Materiale Utilizzato</h3>
    <div class="form-group col-md-5">
      <label for="inputCity">Lotto Materiale</label>
      <input type="text" class="form-control" name="LottoMateriale">
    </div>
    <div class="form-group col-md-5">
      <label for="inputCity">Quantità</label>
      <input type="text" class="form-control" name="Quantità">
    </div>
    <a href="amministratore.php" role="button" class="btn btn-secondary" style="margin-top: 1%">Indietro</a>
    <button type="submit" class="btn btn-primary" style="margin-top: 1%">Esegui</button>
</div>

</form>
<?php if(isSet($_GET["formmsg"])): ?>
  <div class="error">
      <h5 class="text-center">Attenzione!</h5>
      <p class="text-center"><?php echo $_GET["formmsg"]; ?></p>
  </div>
<?php endif; ?>