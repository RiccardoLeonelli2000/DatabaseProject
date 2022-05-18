<div class="container" style="margin: 2% 2% 2% 2%">
<h2 style="">Cost Materiali</h2>

<form action="op11.php" method="POST"  enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-4">
      <label>anno</label>
      <input type="text" class="form-control" name="anno" required placeHolder="inserisci anno di riferimento">
    </div>
  </div>
    <a href="amministratore.php" role="button" class="btn btn-secondary" style="margin-top: 1%">Indietro</a>
    <button type="submit" class="btn btn-primary" style="margin-top: 1%">Mostra Costi</button>
</form>
</div>


<?php if(isSet($_GET["formmsg"])): ?>
  <div class="error">
      <h5 class="text-center">Attenzione!</h5>
      <p class="text-center"><?php echo $_GET["formmsg"]; ?></p>
  </div>
<?php endif; ?>



<?php if(isset($_POST["anno"])):?>

<div class="container">
        <h2><?php echo($_POST["anno"]); ?></h2>
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">Partita Iva Fornitore</th>
                <th scope="col">Nome Fornitore</th>
                <th scope="col">Costo Totale</th>
                </tr>
            </thead>

            <tbody>
                <?php for($i = 0; $i < count($templateParams["costo"]); $i++): ?>
                <tr>
                    <th scope="row"><?php echo $templateParams["costo"][$i]["PartitaIva"]?></th>
                    <td><?php echo $templateParams["costo"][$i]["Nome"]?></td>
                    <td><?php echo $templateParams["costo"][$i]["SUM(fo.Prezzo)"]?>€</td>
                </tr>
                <?php endfor; ?>
            </tbody>

        </table>
</div>
<?php endif; ?>


