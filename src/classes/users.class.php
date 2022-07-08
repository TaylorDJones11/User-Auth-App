<?php

    class Users {
      private $mysqli;

      public function __construct($mysqli){
        $this->mysqli = $mysqli;
      }

      //Registration Submission
      public function register(){


        //Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          //Sanitize POST data
          $_POST= filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

          $data = $_POST;
          $errors = [];

          // echo "<pre>";
          // print_r($data);
          // exit();


          //Validate Email
          if(empty($data['email'])){
            $errors['email_err'] = 'Please enter email';
          }

          //Validate Name
          if(empty($data['name'])){
            $errors['name_err'] = 'Please enter name';
          }

          //Validate Password
          if(empty($data['password'])){
            $errors['password_err'] = 'Please enter password';
          }elseif (strlen($data['password']) < 6) {
            $errors['password_err'] = 'Please must be at least 6 characters';
          }

          //Validate Confirm Password
          if(empty($data['confirm_password'])){
            $errors['confirm_password_err'] = 'Please confirm password';
          }else {
            if($data['password'] != $data['confirm_password']){
              $errors['confirm_password_err'] = 'Passwords do not match';
            }
          }


          if(count($errors) == 0){

            // validate that email doesnt already exist
            $sql = "select * from users_loginsystem where users_email = '{$data['email']}'";
            $result = $this->mysqli->query($sql);


            if($result->num_rows == 0){
              //Process Form
              $form_data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password'])
              ];

              $sql = "INSERT INTO users_loginsystem (users_name, users_password, users_email) VALUES ('{$form_data['name']}', '{$form_data['password']}', '{$form_data['email']}')";

              if ($this->mysqli->query($sql) === TRUE) {
                $errors['success'] = 'Thank you for registering';
                $_SESSION['valid'] = 1;
                $_SESSION['user'] = $form_data;

              } else {
                $errors['success'] = 'Failed to register';
              }
            }
            else{
              $errors['success'] = 'Failed to register, email already exists';
            }

            return $errors;

          }
          else{
            return $errors;
          }


        }
      }






      public function login(){
        //Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          //Process Form
          $_POST= filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

          $data = $_POST;
          $errors = [];


          //Validate Email
          if(empty($data['email'])){
            $errors['email_err'] = 'Please enter email';
          }

          //Validate Password
          if(empty($data['password'])){
            $errors['password_err'] = 'Please enter password';
          }

          if(count($errors) == 0){

            // Checking Email/Password submission across "Library" database
            if($data['login_type'] == 'user'){
              $sql = "select * from users_loginsystem where users_email = '{$data['email']}' and users_password = '{$data['password']}'";
            }
            else{
              $sql = "select * from librarians_loginsystem where lib_email = '{$data['email']}' and lib_password = '{$data['password']}'";
            }


            $result = $this->mysqli->query($sql);

            $row = $result->fetch_assoc();

            if($result->num_rows == 1){

              if($data['login_type'] == 'user'){
                $form_data = [
                  'name' => trim($row['users_name']),
                  'email' => trim($row['users_email'])
                ];
              }
              else{
                $form_data = [
                  'name' => 'librarian',
                  'email' => trim($row['lib_email'])
                ];
              }

              $_SESSION['valid'] = 1;
              $_SESSION['user_type'] = $data['login_type'];
              $_SESSION['user'] = $form_data;
            }
            else{
              $errors['success'] = 'Failed to login';
            }

            return $errors;

          }
          else{
            return $errors;
          }


      }

    }
  }

 ?>
