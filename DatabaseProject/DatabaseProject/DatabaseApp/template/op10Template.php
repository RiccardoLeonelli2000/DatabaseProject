<div class="container" style="margin: 2% 2% 2% 2%">
<h2 style="">Lavori Operai</h2>

<form action="op10.php" method="POST"  enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-4">
      <label>Lotto Prodotto</label>
      <input type="text" class="form-control" name="LottoProdotto" required placeHolder="">
    </div>
  </div>
    <a href="amministratore.php" role="button" class="btn btn-secondary" style="margin-top: 1%">Indietro</a>
    <button type="submit" class="btn btn-primary" style="margin-top: 1%">Mostra Lavorazioni</button>
</form>
</div>


<?php if(isSet($_GET["formmsg"])): ?>
  <div class="error">
      <h5 class="text-center">Attenzione!</h5>
      <p class="text-center"><?php echo $_GET["formmsg"]; ?></p>
  </div>
<?php endif; ?>



<?php if(isset($_POST["LottoProdotto"])):?>

<div class="container">
        <h2><?php echo($_POST["LottoProdotto"]); ?></h2>
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">LottoLavorazione</th>
                <th scope="col">Matricola</th>
                <th scope="col">Nome</th>
                <th scope="col">Cognome</th>
                <th scope="col">Data</th>
                <th scope="col">Ora Lavorazione</th>
                <th scope="col">Ora inizio Produzione</th>
                <th scope="col">Ora fine Produzione</th>
                <th scope="col">Targa Macchinario</th>
                <th scope="col">Tipo Lavorazione</th>
                <th scope="col">Descrizione</th>
                </tr>
            </thead>

            <tbody id="dynamicOrders">
                <?php for($i = 0; $i < count($templateParams["Lavorazioni"]); $i++): ?>
                <tr>
                    <th scope="row"><?php echo $templateParams["Lavorazioni"][$i]["LottoLavorazione"]?></th>
                    <td><?php echo $templateParams["Lavorazioni"][$i]["Matricola"]?></td>
                    <td><?php echo $templateParams["Lavorazioni"][$i]["Nome"]?></td>
                    <td><?php echo $templateParams["Lavorazioni"][$i]["Cognome"]?></td>
                    <td><?php echo $templateParams["Lavorazioni"][$i]["Data"]?></td>
                    <td><?php echo $templateParams["Lavorazioni"][$i]["Ora"]?></td>
                    <td><?php echo $templateParams["Lavorazioni"][$i]["OraInizio"]?></td>
                    <td><?php echo $templateParams["Lavorazioni"][$i]["OraFine"]?></td>
                    <td><?php echo $templateParams["Lavorazioni"][$i]["Targa"]?></td>
                    <td><?php echo $templateParams["Lavorazioni"][$i]["Tipo"]?></td>     
                    <td><?php echo $templateParams["Lavorazioni"][$i]["Descrizione"]?></td>     
                </tr>
                <?php endfor; ?>
            </tbody>

        </table>
</div>
<?php endif; ?>


