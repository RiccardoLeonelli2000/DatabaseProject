<div class="container" style="margin: 2% 2% 2% 2%">
<h2 style="">Ordini</h2>

<form action="op4.php" method="POST"  enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Data Iniziale</label>
      <input type="date" class="form-control" name="dataInizio" required placeHolder="">
    </div>
  </div>
  <div class="form-group col-md-6">
    <label>Data Finale</label>
    <input type="date" class="form-control" name="dataFine" required>
  </div>
    <a href="amministratore.php" role="button" class="btn btn-secondary" style="margin-top: 1%">Indietro</a>
    <button type="submit" class="btn btn-primary" style="margin-top: 1%">Mostra Ordini</button>
</form>
</div>


<?php if(isSet($_GET["formmsg"])): ?>
  <div class="error">
      <h5 class="text-center">Attenzione!</h5>
      <p class="text-center"><?php echo $_GET["formmsg"]; ?></p>
  </div>
<?php endif; ?>

<?php if(isSet($_POST["dataInizio"]) && isSet($_POST["dataFine"])): ?>

<div class="container">
        <h2>Ordini Consegnati</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">NumeroOrdine</th>
                <th scope="col">Data</th>
                <th scope="col">Descrizione</th>
                <th scope="col">PartitaIva Cliente</th>
                <th scope="col">Nome Cliente</th>
                <th scope="col">Costo Totale</th>
                </tr>
            </thead>

            <tbody id="dynamicOrders">
                <?php for($i = 0; $i < count($templateParams["Ordini"]); $i++): ?>
                <tr>
                    <th scope="row"><?php echo $templateParams["Ordini"][$i]["NumeroOrdine"]?></th>
                    <td><?php echo $templateParams["Ordini"][$i]["Data"]?></td>
                    <td><?php echo $templateParams["Ordini"][$i]["Descrizione"]?></td>
                    <td><?php echo $templateParams["Ordini"][$i]["PartitaIva"]?></td>
                    <td><?php echo $templateParams["Ordini"][$i]["Nome"]?></td>
                    <td><?php echo $templateParams["Ordini"][$i]["CostoTotale"]?>€</td>     
                </tr>
                <?php endfor; ?>
            </tbody>

        </table>
</div>

<?php endif; ?>


