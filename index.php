<?php include 'database/dbconnect.php' ?>
<?php include 'header.php' ?>
<div class="bg-dark" style="width:100%;border-box:5px;">
<br>
<table class="table">
  <h5 style="color:white;"> Find all the Pizzas</h5>
  <thead>
    <tr class="bg-dark">
      <th scope="col" style="color:white;">Name</th>
      <th scope="col" style="color:white;">Price</th>
    </tr>
  </thead>
  <tbody>
  </tbody>
</table>
<br><br>
<table class="table" id="ordertable">
  <h5 style="color:white;"> Find all relevant data of recent orders</h5>
  <thead>
    <tr class="bg-dark">
      <th scope="col" style="color:white;">Order No</th>
      <th scope="col" style="color:white;">Name</th>
      <th scope="col" style="color:white;">Surename</th>
      <th scope="col" style="color:white;">Pizza</th>
      <th scope="col" style="color:white;">Number of Pizza</th>
      <th scope="col" style="color:white;">Pizzeria Name</th>
    </tr>
  </thead>
  <tbody>
  </tbody>
</table>
<br><br>

<table class="table" id="pizzeriatable">
    <h5 style="color:white;"> Find all employees of a Pizzeria</h5>
    <select class="bg-white" id="selectedPizzeria" style="border: 1px solid; background-color:white; padding-left:10px;;">
      <option value="false">Select A Pizzeria</option>
      <option value="waterfall">Waterfall</option>
      <option value="sea">Sea Beach</option>
      <option value="campsite">Campsite</option>
      <option value="trail">Hidden Trails</option>
    </select>
    <br><br>
    <thead>
      <tr class="bg-dark">
        <th scope="col" style="color:white;">Pizzeria Name</th>
        <th scope="col" style="color:white;">Worker Name</th>
        <th scope="col" style="color:white;">Surename</th>
        <th scope="col" style="color:white;">SSN</th>
        <th scope="col" style="color:white;">Worker Id</th>
        <th scope="col" style="color:white;">Residence</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
</table>
<br><br>
<table class="table" id="citytable">
    <h5 style="color:white; padding-left:10px"> Find all Pizzerias in a city</h5>
    <select class="bg-white" id="selectedCity" style="border: 1px solid; background-color:transparent; padding-left:10px;">
      <option value="false">Select your city</option>
      <?php
        $sql = "SELECT cityid,cityname  FROM city LIMIT 10";
        $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
        while( $cities = mysqli_fetch_assoc($resultset) ) { 
        ?>
      <option value="<?php 
      echo $cities["cityid"]; ?>"><?php echo $cities["cityname"]; ?></option>
      <?php }	?>
    </select>
    <br><br>
    <thead>
      <tr class="bg-dark">
        <th scope="col" style="color:white;">City</th>
        <th scope="col" style="color:white;">Pizzeria Name</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>

  <br><br>
  <table class="table" id="bestworkertable">
    <h5 style="color:white;">Best workers  of Pizzeria (Based on Seniority)</h5>
    <thead>
      <tr class="bg-dark">
        <th scope="col" style="color:white;">Position</th>
        <th scope="col" style="color:white;">Worker</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
</div>
<?php require_once 'footer.php'?>