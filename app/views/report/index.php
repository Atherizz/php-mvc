<br><br>

<table class="table columns">
<thead>
    <tr>
      <th scope="col">Order ID</th>
      <th scope="col">Date</th>
      <th scope="col">Product ID</th>
      <th scope="col">Product</th>
      <th scope="col">Quantity</th>
      <th scope="col">Total</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data['report'] as $row) : ?>
    <tr>
      <th scope="row"><?= $row['id']  ?></th>
      <td><?= $row['date']  ?></td>
      <td><?= $row['id_barang']  ?></td>
      <td><?= $row['barang']  ?></td>
      <td><?= $row['qty']  ?></td>
      <td><?= $row['subtotal']  ?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>