<?php include 'database/dbconnect.php' ?>
<?php require_once 'header.php' ?>
<div class="container" style="allign:centre; max-width:40%;">
<h2 style="allign:centre;padding-left:25%">Add a Worker</h2>
<br><br>
<form action="backend.php" method="post">
  <fieldset>
  <div class="form-group">
      <label for="person">Person</label>
      <select id="disabledSelect" name="selectedperson" class="form-control">
      <option value="false">Select A Person</option>
    <?php
        $sql2 = "SELECT *  FROM persons";
        $resultset = mysqli_query($conn, $sql2) or die("database error:". mysqli_error($conn));
        while( $persons = mysqli_fetch_assoc($resultset) ) { 
        ?>
      <option value="<?php 
      echo $persons["personid"]; ?>"><?php echo $persons["name"].$persons["surename"]; ?></option>
      <?php }	?>
    </select>
    </div>
    <div class="form-group">
      <label for="worker">Worker Id</label>
      <input type="int" name="workerid" class="form-control" placeholder="Enter Unique Worker Id">
    </div>
    <div class="form-group">
      <label for="seniority">Enter Experience level</label>
      <input type="int" name="experience" class="form-control" placeholder="Enter Experience level">
    </div>
    <div class="container" style="padding-left:44%;">
        <input type="submit"  name="addworker" value="Submit" class="btn btn-primary"/>
    </div>

  </fieldset>
</form>
</div>
<br><br>

<?php require_once 'footer.php'; ?>