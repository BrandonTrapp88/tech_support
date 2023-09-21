<?php include '../view/header.php'; 
//require('../model/product_db.php');
?>
<main>
    <h2>Product List</h2>
    <section>
        <!-- display a table of products -->
        
        <table>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Version</th>
                <th class="right">Release Date</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($products as $product) : ?>
            <tr>
                <td><?php echo $product['productCode']; ?></td>
                <td><?php echo $product['name']; ?></td>
                <td class="right"><?php echo $product['version']; ?></td>
                <td><?php echo $product['releaseDate']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_product">
                    <input type="hidden" name="product_id"
                           value="<?php echo $product['productCode']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p class="last_paragraph">
            <a href="index.php?action=show_add_form">Add Product</a>
        </p>
    </section>
</main>
<?php include '../view/footer.php'; ?>