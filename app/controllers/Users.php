<?php
  class Users extends Controller{
    public function __construct(){
      $this->userModel = $this->model('User');
    }

    public function index(){
      redirect('welcome');
    }

    public function register(){
      // Check if logged in
      if($this->isLoggedIn()){
        redirect('posts');
      }

      // Check if POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        print_r($_POST);
        $data = [
          'FirstName' => trim($_POST['first_name']),
          'LastName' => trim($_POST['last_name']),
          'Department_id' => trim($_POST['department_id']),
          'Email' => trim($_POST['email']),
          'Password' => trim($_POST['password']),
          'confirm_password' => trim($_POST['confirm_password']),
          'PhoneNumber' => trim($_POST['phone_number']),

          'FirstName_err' => '',
          'LastName_err' => '',
          'Department_id_err' => '',
          'confirm_password_err' => '',
          'Email_err' => '',
          'Password_err' => '',
          'PhoneNumber_err' => '',
        ];


        // Validate email
        if(empty($data['Email'])){
            $data['Email_err'] = 'Please enter an email';
        } else{
          // Check Email
          if($this->userModel->findUserByEmail($data['Email'])){
            $data['email_err'] = 'Email is already taken.';
          }
        }
        // Validate first name
        if(empty($data['FirstName'])){
        $data['FirstName_err'] = 'Please enter a first name';
      }

      // Validate last name
      if(empty($data['LastName'])){
        $data['LastName_err'] = 'Please enter a last name';
      }
      
      // Validate Department
      if(empty($data['Department_id'])){
        $data['Department_id_err'] = 'Please enter a Department ';
      }
      // Validate PhoneNumber
      if(empty($data['PhoneNumber'])){
        $data['PhoneNumber_err'] = 'Please enter a PhoneNumber';
      }       

        // Validate password
        if(empty($data['password'])){
          $password_err = 'Please enter a password.';     
        } elseif(strlen($data['password']) < 6){
          $data['password_err'] = 'Password must have atleast 6 characters.';
        }

        // Validate confirm password
        if(empty($data['confirm_password'])){
          $data['confirm_password_err'] = 'Please confirm password.';     
        } else{
            if($data['Password'] != $data['confirm_password']){
                $data['confirm_password_err'] = 'Password do not match.';
            }
        }
         
        // Make sure errors are empty
        if(empty($data['FirstName_err']) && empty($data['Email_err']) && empty($data['Password_err']) &&
         empty($data['confirm_password_err'])&& empty($data['LastName_err']) && 
         empty($data['Department_id_err']) &&  empty($data['PhoneNumber_err'])){
          // SUCCESS - Proceed to insert

          // Hash Password
          $data['Password'] = password_hash($data['Password'], PASSWORD_DEFAULT);

          //Execute
          if($this->userModel->register($data)){       
            // Redirect to login
            flash('register_success', 'You are now registered and can log in');
            redirect('users/login');
          } else {
            die('Something went wrong');
          }
           
        } else {
          // Load View
          $data['Department_id'] = $this->userModel->getDepartment();
          $this->view('users/register', $data);
        }
      } else {
        // IF NOT A POST REQUEST

        // Init data
        $data = [
          'FirstName' => '',
          'LastName' => '',
          'Department_id' => $this->userModel->getDepartment(),
          'Email' => '',
          'Password' => '',
          'confirm_password' => '',
          'PhoneNumber' => ''
        ];

        // Load View
        $this->view('users/register', $data);
      }
    }

    public function login(){
      // Check if logged in
      if($this->isLoggedIn()){
        redirect('Employees');
      }

      // Check if POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $data = [       
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),        
          'email_err' => '',
          'password_err' => '',       
        ];

        // Check for email
        if(empty($data['email'])){
          $data['email_err'] = 'Please enter email.';
        }

        // Check for name
        if(empty($data['name'])){
          $data['name_err'] = 'Please enter name.';
        }

        // Check for user
        if($this->userModel->findUserByEmail($data['email'])){
          // User Found
        } else {
          // No User
          $data['email_err'] = 'This email is not registered.';
        }

        // Make sure errors are empty
        if(empty($data['email_err']) && empty($data['password_err'])){

          // Check and set logged in user
          $loggedInUser = $this->userModel->login($data['email'], $data['password']);

          if($loggedInUser){
            // User Authenticated!
            $this->createUserSession($loggedInUser);
           
          } else {
            $data['password_err'] = 'Password incorrect.';
            // Load View
            $this->view('users/login', $data);
          }
           
        } else {
          // Load View
          $this->view('users/login', $data);
        }

      } else {
        // If NOT a POST

        // Init data
        $data = [
          'email' => '',
          'password' => '',
          'email_err' => '',
          'password_err' => '',
        ];

        // Load View
        $this->view('users/login', $data);
      }
    }

    // Create Session With User Info
    public function createUserSession($user){
      $_SESSION['user_id'] = $user->id;
      $_SESSION['user_email'] = $user->email; 
      $_SESSION['user_name'] = $user->name;
      redirect('posts');
    }

    // Logout & Destroy Session
    public function logout(){
      unset($_SESSION['user_id']);
      unset($_SESSION['user_email']);
      unset($_SESSION['user_name']);
      session_destroy();
      redirect('users/login');
    }

    // Check Logged In
    public function isLoggedIn(){
      if(isset($_SESSION['user_id'])){
        return true;
      } else {
        return false;
      }
    }
  }