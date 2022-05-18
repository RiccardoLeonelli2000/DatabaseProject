<div class="container" style="margin: 2% 2% 2% 2%">
<h2 style="">Lavorazioni Ordini Cliente</h2>

<form action="op9.php" method="POST"  enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-4">
      <label>Nome Cliente</label>
      <input type="text" class="form-control" name="Nome" required placeHolder="">
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

<?php if(isset($_POST["Nome"])):?>
<div class="container">
        <h2><?php echo($_POST["Nome"]); ?></h2>
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">NumeroOrdine</th>
                <th scope="col">LottoProdotto</th>
                <th scope="col">LottoLavorazione</th>
                <th scope="col">Ora Lavorazione</th>
                <th scope="col">Data Lavorazione</th>
                <th scope="col">Targa Macchinario</th>
                <th scope="col">Tipo Lavorazione</th>
                <th scope="col">Descrizione</th>
                </tr>
            </thead>

            <tbody id="dynamicOrders">
                <?php for($i = 0; $i < count($templateParams["Lavorazioni"]); $i++): ?>
                <tr>
                    <th scope="row"><?php echo $templateParams["Lavorazioni"][$i]["NumeroOrdine"]?></th>
                    <td><?php echo $templateParams["Lavorazioni"][$i]["LottoProdotto"]?></td>
                    <td><?php echo $templateParams["Lavorazioni"][$i]["LottoLavorazione"]?></td>
                    <td><?php echo $templateParams["Lavorazioni"][$i]["Ora"]?></td>
                    <td><?php echo $templateParams["Lavorazioni"][$i]["Data"]?></td>
                    <td><?php echo $templateParams["Lavorazioni"][$i]["Targa"]?></td>
                    <td><?php echo $templateParams["Lavorazioni"][$i]["Tipo"]?></td>     
                    <td><?php echo $templateParams["Lavorazioni"][$i]["Descrizione"]?></td>     

                </tr>
                <?php endfor; ?>
            </tbody>

        </table>
</div>
<?php endif; ?>


