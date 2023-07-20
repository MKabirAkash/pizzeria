<?php include 'database/dbconnect.php' ?>
<?php require_once 'header.php' ?>
<div class="container" style="allign:centre; max-width:40%;">
<h2 style="allign:centre;padding-left:25%">Add a Pizzmaker</h2>
<br><br>
<form action="backend.php" method="post">
  <fieldset>
  <div class="form-group">
      <label for="person">Person</label>
      <select id="disabledSelect" name="selectedperson2" class="form-control">
      <option value="false">Select A Worker</option>
    <?php
        $sql2 = "SELECT *  FROM workers";
        $resultset = mysqli_query($conn, $sql2) or die("database error:". mysqli_error($conn));
        while( $persons = mysqli_fetch_assoc($resultset) ) { 
        ?>
      <option value="<?php 
      echo $persons["personid"]; ?>"><?php echo $persons["workername"]; ?></option>
      <?php }	?>
    </select>
    </div>
    <div class="form-group">
      <label for="worker">Maker Id</label>
      <input type="text" name="makerid" class="form-control" placeholder="Enter Unique Pizzamaker Id">
    </div>
    <div class="container" style="padding-left:44%;">
        <input type="submit"  name="addmaker" value="Submit" class="btn btn-primary"/>
    </div>

  </fieldset>
</form>
</div>
<br><br>

<?php require_once 'footer.php'; ?>
