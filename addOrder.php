<?php include 'database/dbconnect.php' ?>
<?php require_once 'header.php' ?>
<div class="container" style="allign:centre; max-width:40%;">
<h2 style="allign:centre;padding-left:25%">Add a Order</h2>
<br><br>
<form action="backend.php" method="post">
  <fieldset>
  
    <div class="form-group">
      <label for="Quantity">Quantity</label>
      <input type="int" name="quantity" class="form-control" placeholder="Enter Number of pizzas to order">
    </div>

    <div class="form-group">
      <label for="ordercustomer">Customer</label>
      <select id="disabledSelect-order" name="ordercustomer" class="form-control">
      <option value="false">Select A Customer</option>
    <?php
        $sql2 = "SELECT *  FROM persons INNER JOIN customers on persons.personid=customers.personid;";
        $resultset = mysqli_query($conn, $sql2) or die("database error:". mysqli_error($conn));
        while( $ordercustomers = mysqli_fetch_assoc($resultset) ) { 
        ?>
        <option value="<?php 
        echo $ordercustomers["personid"]; ?>"><?php echo $ordercustomers['name']." ".$ordercustomers['surename']; ?></option>
    <?php }	?>
        </select>
    </div>

    <div class="form-group">
      <label for="orderpizzzerias">PIzzeria</label>
      <select id="disabledSelect-order" name="orderpizzeria" class="form-control">
      <option value="false">Select A Pizzeria</option>
    <?php
        $sql2 = "SELECT *  FROM pizzerias;";
        $resultset = mysqli_query($conn, $sql2) or die("database error:". mysqli_error($conn));
        while( $orderpizzeria = mysqli_fetch_assoc($resultset) ) { 
        ?>
        <option value="<?php 
        echo $orderpizzeria["pizzerianame"]; ?>"><?php echo $orderpizzeria['pizzerianame']; ?></option>
    <?php }	?>
        </select>

    <div class="form-group">
      <label for="orderpizzas">PIzza</label>
      <select id="disabledSelect-order" name="orderpizza" class="form-control">
      <option value="false">Select A Pizza</option>
    <?php
        $sql2 = "SELECT *  FROM pizzaunit;";
        $resultset = mysqli_query($conn, $sql2) or die("database error:". mysqli_error($conn));
        while( $orderpizzas = mysqli_fetch_assoc($resultset) ) { 
        ?>
        <option value="<?php 
        echo $orderpizzas["pizzaid"]; ?>"><?php echo $orderpizzas['pizzaname']; ?></option>
    <?php }	?>
        </select>
    </div>

    <div class="form-group">
      <label for="ordermakers">Maker</label>
      <select id="disabledSelect-order" name="ordermaker" class="form-control">
      <option value="false">Select A Pizzamkaer</option>
    <?php
        $sql2 = "SELECT *  FROM persons inner join pizzamakers on persons.personid=pizzamakers.personid;";
        $resultset = mysqli_query($conn, $sql2) or die("database error:". mysqli_error($conn));
        while( $ordermakers = mysqli_fetch_assoc($resultset) ) { 
        ?>
        <option value="<?php 
        echo $ordermakers["name"]; ?>"><?php echo $ordermakers['name']." ".$ordermakers['surename']; ?></option>
    <?php }	?>
        </select>
    </div>


    <div class="container" style="padding-left:44%;">
        <input type="submit"  name="addorder" value="Submit" class="btn btn-primary"/>
    </div>
  </fieldset>
</form>
</div>
<br><br>

<?php require_once 'footer.php'; ?>