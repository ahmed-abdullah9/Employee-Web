<?php
  class Employee {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }
    // Get All Posts
    public function getEmployee(){
        $this->db->query("SELECT *, 
                          Employees.id as employeesId, 
                          Department.id as departmentId
                          FROM Employees INNER JOIN Department ON Employees.Department_id = Department.id ");

        $results = $this->db->resultset();

        return $results;
    }

    public function getEmployeeById($id){
        $this->db->query("SELECT *,
                          Employees.id as employeesId, 
                          Department.id as departmentId
                          FROM Employees INNER JOIN Department ON Employees.Department_id = Department.id 
                          WHERE Employees.id = :id ");

        $this->db->bind(':id', $id);
        
        $row = $this->db->single();
  
        return $row;
      }
  
}
