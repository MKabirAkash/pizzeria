<?php include 'database/dbconnect.php' ?>
<?php require_once 'header.php' ?>
<div class="container" style="allign:centre; max-width:40%;">
<h2 style="allign:centre;padding-left:25%">Add a Pizza</h2>
<br><br>
<form action="backend.php" method="post">
  <fieldset>
  
    <div class="form-group">
      <label for="pizname">Name</label>
      <input type="text" name="pizzaname" class="form-control" placeholder="Enter a Pizza Name">
    </div>
    <div class="form-group">
      <label for="pr">Price</label>
      <input type="int" name="price" class="form-control" placeholder="Enter price per unit Pizza">
    </div>

    <div class="form-group">
      <label for="person">Person</label>
      <select id="disabledSelect-pizza" name="selectedpizzeria" class="form-control">
      <option value="false">Select A Pizzeria</option>
    <?php
        $sql2 = "SELECT *  FROM pizzerias";
        $resultset = mysqli_query($conn, $sql2) or die("database error:". mysqli_error($conn));
        while( $pizzerias = mysqli_fetch_assoc($resultset) ) { 
        ?>
        <option value="<?php 
        echo $pizzerias["pizzeriaid"]; ?>"><?php echo $pizzerias["pizzerianame"]; ?></option>
    <?php }	?>
        </select>
    </div>
    <div class="container" style="padding-left:44%;">
        <input type="submit"  name="addpizza" value="Submit" class="btn btn-primary"/>
    </div>
  </fieldset>
</form>
</div>
<br><br>

<?php require_once 'footer.php'; ?>