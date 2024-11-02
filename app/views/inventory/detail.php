<div class="container mt-5">

<div class="row">
    <div class="col-6">
        <h3>Detail Produk</h3>

        <br>

<ul class="list-group">
  <li class="list-group-item"><?= $data['inventory']['produk'] ?></li>
  <li class="list-group-item">ID : <?= $data['inventory']['id'] ?></li>
  <li class="list-group-item">Kategori : <?= $data['inventory']['kategori'] ?></li>
  <li class="list-group-item">Harga : <?= $data['inventory']['harga'] ?></li>
  <li class="list-group-item">Stock : <?= $data['inventory']['stock'] ?></li>
  <a href="<?=BASEURL?>/inventory" class="btn btn-primary position-relative">Kembali</a>
</ul>

</div>
</div>

</div>