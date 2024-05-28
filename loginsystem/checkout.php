<section class="section">
  <div class="container">
    <form class="checkout-form" method="POST" action="https://www.sandbox.paypal.com/cgi-bin/webscr" enctype="multipart/form-data">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <h5 class="mb-3">Products:</h5>
          <ul class="list-group rounded-0 mb-4">
            <?php
            require('db.php');
            $sql = "SELECT *  FROM cart";
            $result = mysqli_query($con, $sql);
            $totalPrice = 0;

            if (mysqli_num_rows($result) > 0) {
              // Initialize index for item naming
              $index = 1;
              while ($data = mysqli_fetch_assoc($result)) {
                $subtotal = $data['qty'] * $data['product_price'];
                $totalPrice += $subtotal
            ?>
                <li class="list-group-item d-flex justify-content-between list-item">
                  <span><?php echo $data['product_title']; ?> </span>
                  <span>
                    <span><?php echo $data['qty']; ?> </span> x
                    <span><?php echo $data['product_price']; ?> </span>
                  </span>
                  <strong> $<?php echo $subtotal; ?></strong>
                </li>
                <!-- Include hidden input fields for each item -->
                <input type="hidden" name="item_name_<?php echo $index; ?>" value="<?php echo $data['product_title']; ?>">
                <input type="hidden" name="item_number_<?php echo $index; ?>" value="<?php echo $data['product_id']; ?>">
                <input type="hidden" name="amount_<?php echo $index; ?>" value="<?php echo $data['product_price']; ?>">
                <input type="hidden" name="quantity_<?php echo $index; ?>" value="<?php echo $data['qty']; ?>">
            <?php
                // Increment index for the next item
                $index++;
              }
            } ?>

            <li class="list-group-item d-flex justify-content-between list-item-total">
              <h5>Total Price: </h5>
              <h5>$<?php echo $totalPrice; ?></h5>
            </li>
          </ul>

          <!-- PayPal form fields -->
          <input type="hidden" name="business" value="sb-sbfqo29531482@business.example.com">
          <input type="hidden" name="cmd" value="_cart">
          <input type="hidden" name="upload" value="1">
          <input type="hidden" name="currency_code" value="USD">
          <input type="hidden" name="return" value="http://localhost/mis/success.php">
          <input type="hidden" name="cancel_return" value="http://localhost/mis/cancel.php">

          <!-- Include the total price as a hidden input field -->
          <input type="hidden" name="total_price" value="<?php echo $totalPrice; ?>">

          <!-- Submit button -->
          <button class="btn btn-lg btn-block btn-paypal text-right" type="submit" name="paypal_checkout">
            <img style="width: 100px; padding: 0px 20px;" src="../image/payapl.png" alt="paypal">
          </button>
        </div>
      </div>
    </form>
  </div>
</section> 