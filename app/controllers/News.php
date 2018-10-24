<?php 
   class News extends Controller {
    public function __construct(){
        
        if(!isset($_SESSION['user_id'])){
            redirect('users/login');
          }
          // Load Models
          $this->newsModel = $this->model('TheNew');

    }

    // Load All News
    public function index(){
      $News = $this->newsModel->getNews();

      $data = [
        'News' => $News
      ];

      $this->view('News/index', $data);
    }

        // Add News
        public function add(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
              // Sanitize POST
              $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
              
              $data = [
                'title' => trim($_POST['title']),
                'description' => trim($_POST['description']),
                'summary' => trim($_POST['summary']),   
                'title_err' => '',
                'description_err' => '',
                'summary_err' => ''
              ];
      
               // Validate title
               if(empty($data['title'])){
                $data['title_err'] = 'Please enter name';
               }
                // Validate description
                if(empty($data['description'])){
                  $data['description_err'] = 'Please enter the News body !';
              }

                // Validate summary
                if(empty($data['summary'])){
                    $data['summary_err'] = 'Please enter the summary !';
                }

              // Make sure there are no errors
              if(empty($data['title_err']) && empty($data['description_err']) && empty($data['summary_err'])){
                // Validation passed
                //Execute
                if($this->newsModel->addNews($data)){
                  // Redirect to login
                  flash('News_added', 'News Added');
                  redirect('TheNew');
                } else {
                  die('Something went wrong');
                }
              } else {
                // Load view with errors
                $this->view('News/add', $data);
              }
      
            } else {
              $data = [
                'title' => '',
                'description' => '',
                'summary' => ''
              ];
      
              $this->view('News/add', $data);
            }
          }
}