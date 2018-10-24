<?php 

class Employees extends Controller {
    
    public function __construct(){
        if(!isset($_SESSION['user_id'])){
          redirect('users/login');
        }
        // Load Models
        $this->EmployeeModel = $this->model('Employee');
  
      }
  
    // Load All Employee Info
    public function index(){
        $employees = $this->EmployeeModel->getEmployee();
                
        $data = [
            'employees' => $employees
        ];
        
        $this->view('Employees/index', $data);
    }

    // Show Single Post
    public function show($id){
      $employees = $this->EmployeeModel->getEmployeeById($id);
      
      $data = [
        'Employees' => $employees
      ];

      $this->view('Employees/show', $data);
    }

}
