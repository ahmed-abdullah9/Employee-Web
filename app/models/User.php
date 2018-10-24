<?php
  class User {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    // Add User / Register
    public function register($data){
      // Prepare Query
      $this->db->query('INSERT INTO Employees (FirstName , LastName, Department_id, Email, Password, PhoneNumber) 
      VALUES (:FirstName, :LastName, :Department_id, :Email, :Password, :PhoneNumber)');

      // Bind Values
      $this->db->bind(':FirstName', $data['FirstName']);
      $this->db->bind(':LastName', $data['LastName']);
      // $this->db->bind(':DateOfBirth', $data['DateOfBirth']);
      // $this->db->bind(':ResignDate', $data['ResignDate']);
      $this->db->bind(':Department_id', $data['Department_id']);
      $this->db->bind(':Email', $data['Email']);
      $this->db->bind(':Password', $data['Password']);
      $this->db->bind(':PhoneNumber', $data['PhoneNumber']);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    // Find User BY Email
    public function findUserByEmail($email){
      $this->db->query("SELECT * FROM Employees WHERE Email = :email");
      $this->db->bind(':email', $email);

      $row = $this->db->single();

      //Check Rows
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }

    // Login / Authenticate User
    public function login($email, $password){
      $this->db->query("SELECT * FROM Employees WHERE Email = :email");
      $this->db->bind(':email', $email);

      $row = $this->db->single();
      
      $hashed_password = $row->Password;
      if(password_verify($password, $hashed_password)){
        return $row;
      } else {
        return false;
      }
    }

    // Find User By ID
    public function getUserById($id){
      $this->db->query("SELECT * FROM users WHERE id = :id");
      $this->db->bind(':id', $id);

      $row = $this->db->single();

      return $row;
    }

        // Find Department Name BY Id
        public function findDepartmentById($Id){
          $this->db->query("SELECT * FROM Department WHERE id = :id");
          $this->db->bind(':id', $Id);
    
          $row = $this->db->single();
    
          //Check Rows
          if($this->db->rowCount() > 0){
            return true;
          } else {
            return false;
          }
        }

        // Find All Department 
        public function getDepartment(){
          $this->db->query("SELECT * FROM Department");
    
          $results = $this->db->resultset();
          
          return $results;
        }
  }