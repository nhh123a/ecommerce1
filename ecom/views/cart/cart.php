<div class="container">
	<div class="check-out">
		<h1>Checkout</h1>
    	    <table >
		  <tr>
			<th>Item</th>
			<th>Qty</th>		
			<th>Prices</th>
			<th>Delery Detials</th>
			<th>Subtotal</th>
			<th>Delete</th>
		  </tr>
          <?php
		 	$total = 0; 
		  foreach ($data['datacart'] as $row) {  ?> 
		  <tr>
			<td class="ring-in"><a href="single.html" class="at-in"><img src="http://localhost/ecom1/ecom/public/images/<?php echo $row['product_image']?>" class="img-responsive" alt=""></a>
			<div class="sed">
				<h5><?php echo $row['product_title']?></h5>
				<p>(<?php echo $row['product_desc']?>) </p>
			
			</div>
			<div class="clearfix"> </div></td>
			<td class="check"><input type="text" value="1" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='';}"></td>		
			<td>$<?php echo $row['product_price']?></td>
			<td>FREE SHIPPING</td>
			<td>$<?php echo $row['product_price']?></td>
			<td><a href="http://localhost/ecom1/cart/delete/<?php echo $row['id']?>">Delete</a></td>
		  </tr>
          <?php 
			$total = $total + $row['product_price'];
		}?>
	</table>
	<div>
	<a href="#" class=" to-buy">PROCEED TO BUY</a>
	<p style="float: right;margin-right:20px;">TOTAL: $<?php echo $total ?></p>
	</div>
	<div class="clearfix"> </div>
    </div>
</div>