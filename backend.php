<?php include 'database/dbconnect.php'; ?>
<?php require_once 'header.php'; ?>

<?php 
#code for add person to database using form
  if(isset($_POST['addperson'])){
    $ssn =$_POST['ssn'];
    $firstname = $_POST['firstname'];
    $surename = $_POST['surename'];
    $dateofbirth = $_POST['dateofbirth'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $selectedcity = $_POST['selectedcity'];
    $sql3="INSERT INTO `persons` (`ssn`, `name`, `surename`, `dateofbirth`, `phonenumber`, `email`, `country`) VALUES ('$ssn', '$firstname', '$surename', '$dateofbirth', '$number', '$email', '$selectedcity')";
    $result=mysqli_query($conn,$sql3);
    if(mysqli_affected_rows($conn)==1){?>
        <script>
            swal({
                  title: "Success",
                  text: "Person Added successfully",
                  icon: "success",
                  button: "Close"
                }).then(function() {
                    window.location = "addPerson.php";
                });
        </script>
        <?php
    } 
    else{
        echo "Failed";
    }

}
#End of code for add person to database using form



#code for add worker to database using form
if(isset($_POST['addworker'])){
    $workerid =$_POST['workerid'];
    $experience = $_POST['experience'];
    $personid = $_POST['selectedperson'];
    $sql4 = "SELECT * FROM `persons` WHERE personid='$personid';";
    $result=mysqli_query($conn,$sql4);
    $rows=mysqli_fetch_assoc($result);
    $workername = $rows['name'];

    
    $sql5="INSERT INTO `workers` (`workerid`, `experience`, `workername`, `personid`) VALUES ('$workerid', '$experience', '$workername', '$personid');";
    $result=mysqli_query($conn,$sql5);
    if(mysqli_affected_rows($conn)==1){?>
        <script>
            swal({
                  title: "Success",
                  text: "Worker Added successfully",
                  icon: "success",
                  button: "Close"
                }).then(function() {
                    window.location = "addWorker.php";
                });
        </script>
        <?php
    } 
    else{
        echo "Failed";
    }

}
#End of code for add worker to database using form

#code for add customer using form
if(isset($_POST['addcustomer'])){
    $customerid =$_POST['customerid'];
    $personid = $_POST['selectedperson1'];

    $sql6="INSERT INTO `customers` (`customerid`, `personid`) VALUES ('$customerid','$personid');";
    $result=mysqli_query($conn,$sql6);
    if(mysqli_affected_rows($conn)==1){?>
        <script>
            swal({
                  title: "Success",
                  text: "Customer Added successfully",
                  icon: "success",
                  button: "Close"
                }).then(function() {
                    window.location = "addCustomer.php";
                });
        </script>
        <?php
    } 
    else{
        echo "Failed";
    }

}
#End of code for customer to database using form


#code for add maker using form
if(isset($_POST['addmaker'])){
    $makerid =$_POST['makerid'];
    $personid = $_POST['selectedperson2'];

    $sql6="INSERT INTO `pizzamakers` (`makerid`, `personid`) VALUES ('$makerid','$personid');";
    $result=mysqli_query($conn,$sql6);
    if(mysqli_affected_rows($conn)==1){?>
        <script>
            swal({
                  title: "Success",
                  text: "Pizzamaker Added successfully",
                  icon: "success",
                  button: "Close"
                }).then(function() {
                    window.location = "addMaker.php";
                });
        </script>
        <?php
    } 
    else{
        echo "Failed";
    }

}
#End of code for maker to database using form


#code for add city using form
if(isset($_POST['addcity'])){
    $cityname = $_POST['cityname'];
    $region = $_POST['region'];

    $sql7="INSERT INTO `city` (`cityname`, `region`) VALUES ('$cityname','$region');";
    $result=mysqli_query($conn,$sql7);
    if(mysqli_affected_rows($conn)==1){?>
        <script>
            swal({
                  title: "Success",
                  text: "City Added successfully",
                  icon: "success",
                  button: "Close"
                }).then(function() {
                    window.location = "addCity.php";
                });
        </script>
        <?php
    } 
    else{
        echo "Failed";
    }

}
#End of code for maker to database using form


#code for add Pizzeria using form
if(isset($_POST['addpizzeria'])){
    $newpizzerianame = $_POST['newpizzerianame'];
    $cityofpizer = $_POST['selectedcityforpizer'];
    $workeridofpizer = $_POST['selectedworkerpizer'];
    if(empty($_POST['newpizzerianame']) || empty($_POST['selectedcityforpizer']) || empty($_POST['selectedworkerpizer'])){
       ?>
            <script>
                swal({
                    title: "Failure",
                    text: "No Field Should Be empty",
                    icon: "error",
                    button: "Return"
                }).then(function() {
                    window.location = "addPizzeria.php";
                });
            </script>
        <?php
    }
    else{
        $sql4="SELECT * FROM workers WHERE workerid='$workeridofpizer';";
        $result=mysqli_query($conn,$sql4);
        $rows=mysqli_fetch_assoc($result);
        $workersname = $rows['workername'];
        $sql9="INSERT INTO `pizzerias` (`pizzerianame`, `cityname`,`workerid`,`workername`) VALUES ('$newpizzerianame','$cityofpizer','$workeridofpizer','$workersname');";
        $result=mysqli_query($conn,$sql9);
        if(mysqli_affected_rows($conn)==1){?>
            <script>
                swal({
                      title: "Success",
                      text: "Pizzeria Added successfully",
                      icon: "success",
                      button: "Close"
                    }).then(function() {
                        window.location = "addPizzeria.php";
                    });
            </script>
            <?php
        } 
        else{?>

        <script>
                swal({
                    title: "Failure",
                    text: "Set unique Name for  New Pizzeria",
                    icon: "success",
                    button: "Return"
                }).then(function() {
                    window.location = "addPizzeria.php";
                });
        </script>
        <?php
        }
    }
}

#end of code for adding pizzeria



#code for add pizza to database
if(isset($_POST['addpizza'])){
    $price =$_POST['price'];
    $pizzaname = $_POST['pizzaname'];
    $pizzastation = $_POST['selectedpizzeria'];

    $sql6="INSERT INTO `pizzaunit` (`pizzaname`, `price`,`pizzeriaid`) VALUES ('$pizzaname','$price','$pizzastation');";
    $result=mysqli_query($conn,$sql6);
    if(mysqli_affected_rows($conn)==1){?>
        <script>
            swal({
                  title: "Success",
                  text: "Pizza Added successfully",
                  icon: "success",
                  button: "Close"
                }).then(function() {
                    window.location = "addPizza.php";
                });
        </script>
        <?php
    } 
    else{
        echo "Failed";
    }

}



#code for add person to database using form
if(isset($_POST['addorder'])){
    $quantity =$_POST['quantity'];
    $ordercustomer = $_POST['ordercustomer'];
    $orderpizzeria = $_POST['orderpizzeria'];
    $orderpizza = $_POST['orderpizza'];
    $ordermaker = $_POST['ordermaker'];
    

    $sqlperosninfo="SELECT * FROM persons where personid='$ordercustomer';";
    $run10=mysqli_query($conn,$sqlperosninfo);
    $personinfo=mysqli_fetch_assoc($run10);
    $ordercustomername=$personinfo['name'];
    $ordercustomersurename=$personinfo['surename'];

    $sqlprice="SELECT * from pizzaunit where pizzaid='$orderpizza';";
    $run11=mysqli_query($conn,$sqlprice);
    $pizzainformation=mysqli_fetch_assoc($run11);
    $pizzaprice=$pizzainformation['price'];
    $orderpizzaname=$pizzainformation['pizzaname'];
    $ordertotal= $quantity * $pizzaprice;
    echo $ordertotal;

    $sqlorder="INSERT INTO orders (`orderquantity`,`ordercustomer`,`orderpizza`,`orderpizzeria`,`ordermaker`,`ordertotal`,`ordercustomersurename`) VALUES ('$quantity','$ordercustomername','$orderpizzaname','$orderpizzeria','$ordermaker','$ordertotal','$ordercustomersurename');";
    $result=mysqli_query($conn,$sqlorder);
    if(mysqli_affected_rows($conn)==1){?>
        <script>
            swal({
                  title: "Success",
                  text: "Order Added successfully.Pay bill on delivery",
                  icon: "success",
                  button: "Okay"
                }).then(function() {
                    window.location = "addOrder.php";
                });
        </script>
        <?php
    } 
    else{
        echo "Failed";
    }

}
#End of code for add order to database using form

?>