<?php include('header.php');


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<?php

if(isset($_POST["add_to_cart"])){


    $item= array(
        "id"=> $_GET['id'], 
        'item_name'			=>	$_POST["hidden_name"],
		'item_price'		=>	$_POST["hidden_price"],
	    'item_quantity'		=>	$_POST["quantity"]
    
    
    );

  

    $_SESSION["shopping_cart"][0] = $item;





}


?>

  
<div class="container px-4">
<div class="row gy-5">
    
<?php  


if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{

        foreach($_SESSION["shopping_cart"] as $keys => $values){

            if($values["item_id"] == $_GET["id"])
			{

                unset($_SESSION["shopping_cart"][$keys]);
                echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="order.php"</script>';

            }


        }


    }

}

$query = "SELECT * FROM `itemshow`";
$sql = mysqli_query($con,$query);

if(mysqli_num_rows($sql)>0){
  

    while($row = mysqli_fetch_assoc($sql)){

       ?>


     <div class="col-md-4">

  <form action="order.php?action=add&id=<?php echo $row["id"]; ?>" method="post">
  <div class="card" class="" style="width:200px;height:300px">
 
    <img class="card-img-top" style="width:100px;height:100px; " src="images/<?php echo $row['image'];  ?>" alt="Card image" style="width:100%">
    
    <div class="card-body">
      <h4 class="card-title"><?php echo $row['name'];  ?></h4>
      <p class="card-text">Rs <span><?php echo $row['price'];  ?></span></p>

        <div class="input-group quantity">
            <div class="input-group-prepend decrement-btn" style="cursor: pointer">
                <span class="input-group-text">-</span>
            </div>
            <input type="text" class="qty-input form-control"  name="quantity"  maxlength="2" max="10" value="1">
            <div class="input-group-append increment-btn" style="cursor: pointer">
                <span class="input-group-text">+</span>
            </div>
            <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />

        <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
        </div>
        <input type="submit" name="add_to_cart" class="btn btn-primary" value="Add to Cart">
  
    </div>
  </div>
  </form>
  <br>
  <br>
  <br>
  <br>


     </div>
     <?php

      
}

}




?>

 </div>
</div>


<div class="container">
<table width="100%" border="1">
    <tr>
        <th>Name</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Total</th>
        <th>Action</th>
    </tr>

  <?php

if(!empty($_SESSION["shopping_cart"])){

    $total = 0;

    foreach($_SESSION["shopping_cart"] as $key => $values){

    ?>

<tr class="font">
						<td><?php echo $values["item_name"]; ?></td>
						<td><?php echo $values["item_quantity"]; ?></td>
						<td>Rs. <?php echo $values["item_price"]; ?></td>
						<td>Rs. <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
						<td><a href="order.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
					</tr>


<?php
$total = $total + ($values["item_quantity"] * $values["item_price"]);
   }


?>

<tr>
						<td colspan="3" align="right">Total</td>
						<td align="right">Rs. <?php echo number_format($total, 2); ?></td>
						<td></td>
					</tr>

<?php


 



}


?>

    
</table>
</div>

</body>
</html>
<script>
    
    $(document).ready(function () {

$('.increment-btn').click(function (e) {
    e.preventDefault();
    var incre_value = $(this).parents('.quantity').find('.qty-input').val();
    var value = parseInt(incre_value, 10);
    value = isNaN(value) ? 0 : value;
    if(value<10){
        value++;
        $(this).parents('.quantity').find('.qty-input').val(value);
    }

});

$('.decrement-btn').click(function (e) {
    e.preventDefault();
    var decre_value = $(this).parents('.quantity').find('.qty-input').val();
    var value = parseInt(decre_value, 10);
    value = isNaN(value) ? 0 : value;
    if(value>1){
        value--;
        $(this).parents('.quantity').find('.qty-input').val(value);
    }
});

});
</script>