<div class="container mt-5">

<div class="row">
  <div class="col-lg-6">
    <?php Flasher::flash() ?>
  </div>
</div>

<div class="row">
    <div class="col-lg- 6">
        <h3>Inventory Barang</h3>
    <br>

    <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary tambahData" data-bs-toggle="modal" data-bs-target="#formModal">
  Add new Items
  </button>

  <br><br>

  <form action="<?= BASEURL; ?>/inventory/search" method="POST">
  <div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="cari produk" name="keyword" id="keyword" aria-label="Recipient's username" aria-describedby="button-addon2">
  <button class="btn btn-outline-secondary" type="submit" id="tombolCari">Search</button>
</div>
</form>

    <br>

<ol class="list-group list-group-numbered">
  <?php foreach ($data['inventory'] as $row) : ?>
  <li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
      <div class="fw-bold"><?= $row['produk']  ?></div>
    </div>
    <a href="<?= BASEURL; ?>/inventory/detail/<?= $row['id']; ?>" class="badge text-bg-primary rounded-pill">detail</a>
    <a href="<?= BASEURL; ?>/inventory/detail/<?= $row['id']; ?>" class="badge text-bg-success rounded-pill showEditModal" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $row['id'] ?>"</a>edit</a>
    <a href="<?= BASEURL; ?>/inventory/delete/<?= $row['id']; ?>" class="badge text-bg-danger rounded-pill" onclick="return confirm('apakah anda yakin ingin menghapus?')">delete</a>
  </li>
  <?php endforeach; ?>
</ol>
       

    </div>
</div>

</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="judulModal">Tambah Data Produk</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL; ?>/inventory/tambah" method="POST">
          <input type="hidden" name="id" id="id">
        <div class="mb-3">
    <label for="produk" class="form-label">Nama Produk</label>
    <input type="text" class="form-control" id="produk" name="produk" required> 
    <div class="mb-3">
    <label for="kategori" class="form-label">Kategori</label>
    <select class="form-control" id="kategori" name="kategori">
      <option value="Makanan & Minuman">Makanan & Minuman</option>
      <option value="Kesehatan">Kesehatan</option>
      <option value="Kecantikan">Kecantikan</option>
      <option value="Peralatan Rumah Tangga">Peralatan Rumah Tangga</option>
      <option value="Kebutuhan Pokok">Kebutuhan Pokok</option>

    </select>
    <div class="mb-3">
    <label for="harga" class="form-label">Harga</label>
    <input type="number" class="form-control" id="harga" name="harga" required>
    <div class="mb-3">
    <label for="stock" class="form-label">Stock</label>
    <input type="number" class="form-control" id="stock" name="stock" required> 
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="tambah">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</div>