<?php include 'database/dbconnect.php' ?>
<?php
    if(isset($_POST['ajax_country_name'])){
    $selected_country = $_POST['ajax_country_name'];
    $ajaxsql1="SELECT * FROM persons inner join workers on persons.personid=workers.personid where country='$selected_country';";
    $run1=mysqli_query($conn,$ajaxsql1);
    $output= '<option value="">select a Worker</option>';
    while($result_row=mysqli_fetch_assoc($run1)){
        $output .= '<option value="'.$result_row['workerid'].'">'.$result_row['name'].'</option>';
    }
    echo $output;
}

?>