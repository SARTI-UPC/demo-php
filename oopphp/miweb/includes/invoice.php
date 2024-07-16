
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        table{
            font-size: x-small;
        }
        tfoot tr td{
            font-weight: bold;
            font-size: x-small;
        }

        .gray {
            background-color: lightgray
        }
    </style>
</head>
<body>

  <table width="100%">
    <tr>
        <td valign="top"><img src="./150x150.png"/></td>
        <td align="right">
            <h3>Shinra Electric power company</h3>
            <pre>
                Company representative name
                Company address
                Tax ID
                phone
                fax
            </pre>
        </td>
    </tr>

  </table>
  <?php ?>
  <table width="100%">
    <tr>
        <td><strong>From:</strong> <?php echo $res[0]['nom_empleat'];?></td>
        <td><strong>To:</strong> <?php echo $res[0]['nom_client'];?></td>
    </tr>

  </table>

  <br/>

  <table width="100%">
    <thead style="background-color: lightgray;">
      <tr>
        <th>#</th>
        <th>Description</th>
        <th>Quantity</th>
        <th>Unit Price $</th>
        <th>Total $</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      $preu_subtotal = 0;
      foreach ($res as $linComanda){
        $preu_subtotal += $linComanda['preu_total'];
        ?>
      <tr>
        <th scope="row"><?= $linComanda['lin_com'];?></th>
        <td><?= $linComanda['descr'];?></td>
        <td align="right"><?= $linComanda['quant'];?></td>
        <td align="right"><?= $linComanda['preu'];?></td>
        <td align="right"><?= $linComanda['preu_total'];?></td>
      </tr>
      <?php }?>
    </tbody>

    <tfoot>
        <tr>
            <td colspan="3"></td>
            <td align="right">Subtotal $</td>
            <td align="right"><?= $preu_subtotal;?></td>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td align="right">Tax $</td>
            <td align="right"><?= $preu_subtotal*0.21;?></td>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td align="right">Total $</td>
            <td align="right" class="gray"><?= $preu_subtotal+($preu_subtotal*0.21);  ?></td>
        </tr>
    </tfoot>
  </table>

</body>
</html>