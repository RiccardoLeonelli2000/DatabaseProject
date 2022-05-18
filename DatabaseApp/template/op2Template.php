<h2 style="margin: 2%">Inserimento Ordine</h2>

<form action="process-op2.php" method="POST" style="margin: 2%" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nome Cliente</label>
      <input type="text" class="form-control" name="Nome" required placeHolder="Inserire la partita iva del cliente che effetua l'ordine">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Numero Ordine</label>
      <input type="number" class="form-control" name="NumeroOrdine" required placeHolder="">
    </div>
  </div>
  <div class="form-group col-md-6">
    <label for="inputAddress">Descrizione</label>
    <input type="text" class="form-control" name="Descrizione" required>
  </div>
  <div class="form-group col-md-4">
    <label for="inputAddress2">Stato</label>
    <input type="text" class="form-control" name="Stato" required>
  </div>
  <a href="amministratore.php" role="button" class="btn btn-secondary" style="margin-top: 1%">Indietro</a>

    <button type="submit" class="btn btn-primary" style="margin-top: 1%">Aggiungi Ordine</button>
</form>

<?php if(isSet($_GET["formmsg"])): ?>
  <div class="error">
      <h5 class="text-center">Attenzione!</h5>
      <p class="text-center"><?php echo $_GET["formmsg"]; ?></p>
  </div>
<?php endif; ?>