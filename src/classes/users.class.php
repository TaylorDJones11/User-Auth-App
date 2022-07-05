<?php
    class Users {
      public function __construct(){

      }

      //Registration Submission
      public function register(){
        //Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          //Sanitize POST data
          $_POST= filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

          //Process Form
          $data = [
            'name' => trim($_POST['name']),
            'email' => trim($_POST['email']),
            'password' => trim($_POST['password']),
            'confirm_password' => trim($_POST['confirm_password']),
            'name_err' => '',
            'email_err' => '',
            'password_err' => '',
            'confirm_password_err' => ''
          ];

          //Validate Email
          if(empty($data['email'])){
            $data['email_err'] = 'Please enter email';
          }

          //Validate Name
          if(empty($data['name'])){
            $data['name_err'] = 'Please enter name';
          }

          //Validate Password
          if(empty($data['password'])){
            $data['password_err'] = 'Please enter password';
          }elseif (strlen($data['password']) < 6) {
            $data['password_err'] = 'Please must be at least 6 characters';
          }

          //Validate Confirm Password
          if(empty($data['confirm_password'])){
            $data['confirm_password_err'] = 'Please confirm password';
          }else {
            if($data['password'] != $data['confirm_password']){
              $data['confirm_password_err'] = 'Passwords do not match';
            }
          }


          //Make sure errors are empty
          if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
            // Validated
            die('Success');
          } else {
            $this->view('register.php', $data);
          }

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
          // $this->view('register.php', $data);
        }
      }






      public function login(){
        //Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          //Process Form
          $_POST= filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

          //Process Form
          $data = [
            'email' => trim($_POST['email']),
            'password' => trim($_POST['password']),
            'email_err' => '',
            'password_err' => '',
              ];

          //Validate Email
          if(empty($data['email'])){
            $data['email_err'] = 'Please enter email';
          }

          //Validate Password
          if(empty($data['password'])){
            $data['password_err'] = 'Please enter password';
          }

          // Make sure those are empty
          if(empty($data['email_err']) && empty($data['password_err'])){
            // Validated
            die('Success');
          } else {
            $this->view('login.php', $data);
          }


        } else {
          // Init data
          $data = [
            'email' => '',
            'password' => '',
            'email_err' => '',
            'password_err' => '',
          ];
          //   //Load View
          // $this->view('login.php', $data);
        }
      }

    }


 ?>
