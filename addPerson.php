<?php include 'database/dbconnect.php';  ?>
<?php require_once 'header.php' ; ?>
<div class="container" style="allign:centre; max-width:40%;">
<h2 style="allign:centre;padding-left:25%">Add a Person</h2>
<br><br>
<form action="backend.php" method="post">
  <fieldset enabled>
    <div class="form-group">
      <label for="SSN">SSN</label>
      <input type="text" name="ssn" class="form-control" placeholder="Enter your unique SSN number">
    </div>
    <div class="form-group">
      <label for="Firstname">First Name</label>
      <input type="text" name="firstname" class="form-control" placeholder="Enter your Firstname">
    </div>
    <div class="form-group">
      <label for="Surename">Surename</label>
      <input type="text" name="surename" class="form-control" placeholder="Enter your Surename">
    </div>
    <div class="form-group">
      <label for="DB">Date of Birth</label>
      <input type="date" name="dateofbirth" class="form-control" placeholder="Enter your Date of Birth">
    </div>
    <div class="form-group">
      <label for="Phone">Phone Number</label>
      <input type="text" name="number" class="form-control" placeholder="Enter your Phone number">
    </div>
    <div class="form-group">
      <label for="Email">Email</label>
      <input type="email" name="email" class="form-control" placeholder="Enter your Valid Email">
    </div>
    <div class="form-group">
      <label for="city">City</label>
      <select name="selectedcity" class="form-control">
      <option value="false">Select your city</option>
    <?php
        $sql = "SELECT cityid,cityname  FROM city LIMIT 10";
        $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
        while( $cities = mysqli_fetch_assoc($resultset) ) { 
        ?>
      <option value="<?php 
      echo $cities["cityname"]; ?>"><?php echo $cities["cityname"]; ?></option>
      <?php }	?>
    </select>
    </div>
    <div class="container" style="padding-left:44%;">
        <input type="submit"  name="addperson" value="Submit" class="btn btn-primary" />
    </div>
  </fieldset>
</form>
</div>
<br><br>
<?php require_once 'footer.php' ; ?>