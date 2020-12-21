<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/emental/server/core/init.php';
function insert($table,$dataStructure,$values,$data){

  $sql = "INSERT INTO $table ($dataStructure) VALUES 
  ($values)";
   $statement= $GLOBALS['dbConnection'] ->prepare($sql);
   $statement->execute($data);
   return'data inserted';

    // insert() will insert data in db

  } 


function countAffectedRows($table,$condition){
  
  $statement = $GLOBALS['dbConnection'];
  $count = $statement->query("SELECT count(*) FROM $table where $condition ")->fetchColumn();
  return $count;

  //count affected  rows

  }

function select($data, $table, $condition){

  $statement = $GLOBALS['dbConnection'];
  $row = $statement->query("SELECT $data FROM $table Where $condition  ")->fetchall(PDO::FETCH_ASSOC);
  return $row;


  }

function update($table,$columns,$condition,$data){
    
  $sql = "UPDATE $table SET $columns WHERE $condition ";
  $statement= $GLOBALS['dbConnection']->prepare($sql);
  $statement->execute($data);
      return'data updated';
      
      // update() will update data 
      
      }

function remove($table,$column){
    $sql = "DELETE FROM $table WHERE $column";
    $statement= $GLOBALS['dbConnection']->prepare($sql);
    $statement->execute();
      return'data deleted';
  } 





  ?>





