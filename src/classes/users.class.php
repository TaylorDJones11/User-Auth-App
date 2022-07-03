<?php
    class Users {
      public function __construct(){

      }

      //Registration Submission
      public function register(){
        //Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          //Process Form

        } else {
          // Load Form
          echo 'load form';
        }
      }
    }


 ?>
