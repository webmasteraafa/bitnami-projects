<?php
<h3>Create Product</h3>
<form action="create_product.php" method="post">
	<input type="text" name="productname" id="productname" value=""/><br>
	<input type="text" name="productprice" id="productprice" value=""/><br>
    <input type="text" name="productcode" id="productcode" value =""/><br>
    <textarea cols="20" rows="5" name="productdesc" id="productdesc"> 
    </textarea>
	<select name="productcategory" id="productcategory">
		<?php 
		$x = 0;
				do 
				{
                  echo '<option value='. $json[ListCategoriesResponse][category][categoryId] .'>'. $json[ListCategoriesResponse][category][name].'</option>';
				  $x = $x + 1;
                } while ($x <= $counter);
			 ?>
	</select>
	<input type="text" name="productshipping" id="productshipping" value=""/>
	<select name="productstatus" id="productstatus">
		<option value="inactive">Inactive</option>
		<option value="active">Active</option>	
	</select>
	<input type="submit" value="Create Product" name="create">
	
</form>
?>