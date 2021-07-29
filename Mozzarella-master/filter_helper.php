<?php

function filterData($filterParameters){


if(!empty($filterParameters['type_filter'])){

    $_SESSION['type_filter'] = 1;
  
  }else{

    unset($_SESSION['type_filter']);
    $msg = "No filter options were selected!";
  }
}

function prepareFilterQueries($filterParameters, $i, $j){

 if(isset($_SESSION['type_filter'])){
    $sql = "select emp_name, emp_username, emp_phone_number, emp_email,emp_type from employee
    where emp_type = '".$filterParameters['type_filter']."' LIMIT $i, $j;";

  
  }else{
    $sql = "select emp_name, emp_username, emp_phone_number, emp_email,emp_type from employee LIMIT $i, $j;";
  }

  return $sql;
}

function prepareCountFilterQueries($filterParameters){



if(isset($_SESSION['type_filter'])){

    $sqlTotalRows = "select count(*) as total_rows from employee
    where emp_type = '".$filterParameters['type_filter']."';";


  }else{
    $sqlTotalRows = "select count(*) as total_rows from employee;";
  }

  return $sqlTotalRows;
}

?>
