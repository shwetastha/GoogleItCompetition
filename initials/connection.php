<?php
/*
  Document   : connection
  Created on : Dec 22, 2013, 1:22:51 PM
  Author     : Sagar Pathak
  Description:
  Purpose of the php file as follows.
 */
  $server   = 'localhost';
  $username = 'root';
  $password = 'root';
  $dbname   = 'googling_challenge';
  $con      = mysql_connect($server, $username, $password);

  if(!$con){
      die('Couldn\'t established connection to server because '.mysql_error()); 
  }else{
      if(!mysql_select_db($dbname)){
          $_SESSION['error'] = 'Required database is not installed in the system or bad username of mysql database';
      }
  }
?>
