<br><br>

<table class="table columns">
<thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Customer ID</th>
      <th scope="col">Date</th>
      <th scope="col">Total Transaction</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data['transaction'] as $row) : ?>
    <tr>
      <th scope="row"><?= $row['id']  ?></th>
      <td><?= $row['customer_id']  ?></td>
      <td><?= $row['date']  ?></td>
      <td><?= $row['total']  ?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>    
