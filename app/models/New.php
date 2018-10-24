<?php
  class New {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }
    // Get All News
    public function getNews(){
        $this->db->query("SELECT * FROM News");

        $results = $this->db->resultset();

        return $results;
    }

    public function getNewsById($id){
        $this->db->query("SELECT * FROM News WHERE id = :id ");

        $this->db->bind(':id', $id);
        
        $row = $this->db->single();
  
        return $row;
      }

          // Add News
    public function addNews($data){
        // Prepare Query
        $this->db->query('INSERT INTO News (title, Description, Summary) 
        VALUES (:title, :Description, :Summary)');
  
        // Bind Values
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':Description', $data['Description']);
        $this->db->bind(':Summary', $data['Summary']);
        
        //Execute
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }

          // Update News
    public function updateNews($data){
        // Prepare Query
        $this->db->query('UPDATE News SET title = :title, Description = :Description, Summary = :Summary WHERE id = :id');
  
        // Bind Values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':Description', $data['Description']);
        $this->db->bind(':Summary', $data['Summary']);
        
        //Execute
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }
  
      // Delete News
      public function deleteNews($id){
        // Prepare Query
        $this->db->query('DELETE FROM News WHERE id = :id');
  
        // Bind Values
        $this->db->bind(':id', $id);
        
        //Execute
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }
    }