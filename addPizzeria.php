<?php include 'database/dbconnect.php' ?>
<?php require_once 'header.php' ?>
<div class="container" style="allign:centre; max-width:40%;">
<h2 style="allign:centre;padding-left:25%">Add a Pizzeria</h2>
<br><br>
<form action="backend.php" method="post">
  <fieldset>
  <div class="form-group">
      <label for="pizername">Name</label>
      <input type="text" name="newpizzerianame" class="form-control" placeholder="Enter New Pizzeria Name">
  </div>
  <div class="form-group">
      <label for="pizercity">City</label>
      <select id="disabledSelect-country" name="selectedcityforpizer" class="form-control">
      <option value="false">Select A City</option>
    <?php
        $sql2 = "SELECT *  FROM city";
        $resultset = mysqli_query($conn, $sql2) or die("database error:". mysqli_error($conn));
        while( $cities = mysqli_fetch_assoc($resultset) ) { 
        ?>
      <option value="<?php 
      echo $cities["cityname"]; ?>"><?php echo $cities["cityname"].",".$cities["region"]; ?></option>
      <?php }	?>
    </select>
    </div>


    <!--here is script for dependant dropdown -->
    <script>
      $(document).ready(function(){
        $("#disabledSelect-country").change(function(){
        var country_name=this.value;

        $.ajax({
          url:'backendajax.php',
          type:'POST',
          data:{
            ajax_country_name:country_name
          },
          success: function(result){
            console.log(result);
            $("#disabledSelect-worker").html(result);
          }


        });
        
      });
    });
  </script>
  <!--End of script for dependant dropdown -->


    <div class="form-group">
      <label for="pizerworker">Worker</label>
      <select id="disabledSelect-worker" name="selectedworkerpizer" class="form-control">
        <option select disabled >Select a Worker</option>
      </select>
    </div>

    <div class="container" style="padding-left:44%;">
        <input type="submit"  name="addpizzeria" value="Submit" class="btn btn-primary"/>
    </div>

  </fieldset>
</form>
</div>
<br><br>



<?php require_once 'footer.php'; ?>