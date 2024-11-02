
<!-- Cashier Page -->
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-6">
            <h3>Cashier</h3>
            <br>

            <form>
                <div class="mb-3">
                    <label for="productName" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" id="productName" name="productName" required>
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" required>
                </div>
                <button type="submit" class="btn btn-primary">Add to Cart</button>
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
                    <tr>
                        <th scope="row">1</th>
                        <td>Product 1</td>
                        <td>2</td>
                        <td>$10</td>
                        <td>$20</td>
                    </tr>
                </tbody>
            </table>
            <form>
                <div class="mb-3">
                    <label for="customerID" class="form-label">Customer ID</label>
                    <input type="text" class="form-control" id="customerID" name="customerID" required>
                </div>
                <button type="submit" class="btn btn-primary">Checkout</button>
            </form>

        </div>
    </div>
</div>