<?php 
   class News extends Controller {
    public function __construct(){
        
        if(!isset($_SESSION['user_id'])){
            redirect('users/login');
          }
          // Load Models
          
          $this->newsModel = $this->model('New');

    }

    // Load All News
    public function index(){
    //   $News = $this->newsModel->getNews();

    //   $data = [
    //     'News' => $News
    //   ];

      $this->view('News/index');
    }
}