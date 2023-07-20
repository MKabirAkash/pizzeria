<?php include 'database/dbconnect.php' ?>
<?php require_once 'header.php' ?>
<div class="container" style="allign:centre; max-width:40%;">
<h2 style="allign:centre;padding-left:25%">Add a City</h2>
<br><br>
<form action="backend.php" method="post">
  <fieldset>
  <div class="form-group">
      <label for="city">City</label>
      <input type="text" name="cityname" class="form-control" placeholder="Enter City Name">
    </div>
    <div class="form-group">
      <label for="worker">Region</label>
      <input type="text" name="region" class="form-control" placeholder="Enter Region Name">
    </div>
    <div class="container" style="padding-left:44%;">
        <input type="submit"  name="addcity" value="Submit" class="btn btn-primary"/>
    </div>

  </fieldset>
</form>
</div>
<br><br>
<?php require_once 'footer.php'; ?>

