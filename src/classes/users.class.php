<?php
    class Users {
      public function __construct(){

      }

      //Registration Submission
      public function register(){
        //Check for POST
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
          //Process Form
        } else {
          // Init data
          $data = [
            'name' => '',
            'email' => '',
            'password' => '',
            'confirm_password' => '',
            'name_err' => '',
            'email_err' => '',
            'password_err' => '',
            'confirm_password_err' => ''
          ];
            //Load View
          $this->view('pages/register', $data);
        }
      }

      public function login(){
        //Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          //Process Form
        } else {
          // Init data
          $data = [

            'email' => '',
            'password' => '',


            'email_err' => '',
            'password_err' => '',

          ];
            //Load View
          $this->view('pages/login', $data);
        }
      }

    }


 ?>
