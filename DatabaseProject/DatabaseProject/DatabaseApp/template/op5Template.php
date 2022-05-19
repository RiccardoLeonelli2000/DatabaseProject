<div class="container" style="margin: 2% 2% 2% 2%">
<h2 style="">Prodotti lavorati</h2>

<form action="op5.php" method="POST"  enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Lotto Prodotto</label>
      <input type="text" class="form-control" name="LottoProdotto" required placeHolder="">
    </div>
  </div>
    <a href="amministratore.php" role="button" class="btn btn-secondary" style="margin-top: 1%">Indietro</a>
    <button type="submit" class="btn btn-primary" style="margin-top: 1%">Mostra Prodotti</button>
</form>
</div>


<?php if(isSet($_GET["formmsg"])): ?>
  <div class="error">
      <h5 class="text-center">Attenzione!</h5>
      <p class="text-center"><?php echo $_GET["formmsg"]; ?></p>
  </div>
<?php endif; ?>

<div class="container">
    <h2>Elenco Prodotti</h2>
        <table class="table table-hover">
            <thead>
                <tr> 
                <th scope="col">Lotto Prodotto</th>
                <th scope="col">NumeroOrdine</th>
                <th scope="col">Tipo Prodotto</th>
                </tr>
            </thead>

            <tbody id="dynamicOrders">
                <?php for($i = 0; $i < count($templateParams["Prodotti"]); $i++): ?>
                <tr>
                    <td><?php echo $templateParams["Prodotti"][$i]["NumeroOrdine"]?></th>
                    <td><?php echo $templateParams["Prodotti"][$i]["LottoProdotto"]?></td>
                    <th scope="row"><?php echo $templateParams["Prodotti"][$i]["Tipo"]?></th>
                </tr>
                <?php endfor; ?>
            </tbody>

        </table>
</div>