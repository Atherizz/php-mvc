
<!-- Cashier Page -->
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-6">
            <h3>Cashier</h3>
            <br>

            <?php if (isset($data['error'])) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= $data['error']; ?>
                </div>
            <?php endif; ?>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Discount Percentage</th>
                        <th scope="col">Minimum Order</th>
                        <th scope="col">Validity Period</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['discount'] as $row) : ?>
                    <tr>
                        <th scope="row"><?= $row["id"] ?></th>
                        <td><?= $row["persentase"] ?>%</td>
                        <td><?= $row["minimum_order"] ?></td>
                        <td><?= $row["masa_berlaku"] ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            

            <form action="<?= BASEURL; ?>/cashier/addToCart"  method="POST">
                <div class="mb-3">
                    <label for="productName" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" id="productName" name="produk" required>
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="qty" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Add to Cart</button>
            </form>
            <br>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data["cashier"] as $row) : ?>
                    <tr>
                        <th scope="row"><?= $row["id"] ?></th>
                        <td><?= $row["barang"] ?></td>
                        <td><?= $row["qty"] ?></td>
                        <td><?= $row["harga"] ?></td>
                        <td><?= $row["subtotal"] ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
                <form action="<?= BASEURL;?>/cashier/checkoutProduct" method="POST">
                <div class="mb-3">
                    <label for="customerID" class="form-label">Customer ID</label>
                    <input type="text" class="form-control" id="customerID" name="customerID" required>
                </div>
                <div class="mb-3">
                    <label for="discountID" class="form-label">Discount ID</label>
                    <input type="text" class="form-control" id="discountID" name="discountID" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Checkout</button>
            </form>
            
            
            <ul class="list-group list-group-flush">
            <li class="list-group-item"></li>
            <li class="list-group-item">A second item</li>
            <li class="list-group-item">A third item</li>
            <li class="list-group-item">A fourth item</li>
            <li class="list-group-item">And a fifth one</li>
            </ul>

        </div>
    </div>
</div>