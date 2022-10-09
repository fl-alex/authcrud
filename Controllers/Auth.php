<?php
session_start();

class Auth
{
        public $db_ob;
        public  $db_connection;
        
        public function __construct()
        {
            include_once '../../Db_connect.php';
            $this->db_ob = New Db_connect();
            $this->db_connection = $this->db_ob->MakeConnection();

        }

        public function get_user(){
            $user=array();
            $user['name']=$_SESSION['user'];
            $user['email']=$_SESSION['email'];
            return $user;
        }
        
        // ==========================================================
        // ============== Get ALL data from table ===================
        // ==========================================================
        
        public function display_rec()
        {
            $query = "SELECT `id`, `name`, email, `password`, `is_active` 
                        FROM users";
            
            $result = $this->db_connection->query($query);
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                   $data[] = $row;
            }
             return $data;// return array to client
            }else{
             echo "No records";
            }
        }
        
        
        
        // ==========================================================
        // ============== Adding new data to table==================
        // ==========================================================
        public function insert_rec()
        {
            $titul = $this->db_connection->real_escape_string($_POST['titul']);
            $status = $this->db_connection->real_escape_string($_POST['status']);
            $category = $this->db_connection->real_escape_string($_POST['category']);
            $opis = $this->db_connection->real_escape_string($_POST['opis']);
            $body = $this->db_connection->real_escape_string($_POST['body']);
            $query="INSERT INTO articles(titul, opis, status, category, body) "
                    . "VALUES('$titul','$opis',$status,$category, '$body')";
            $sql = $this->db_connection->query($query);
            if ($sql==true) {
                header("Location:index.php?msg=insert");//make related ok message
            }else{
                echo "Inserting error!";
            }
        }
        
        // ==========================================================
        // ============== Get data from table by id =================
        // ==========================================================
        public function displayRecordById($id)
        {
            $query = "SELECT * FROM users WHERE id = '$id'";
            $result = $this->db_connection->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
            }else{
            echo "No records";
            }
        }

        // ==========================================================
        // ============== Check user and password ===================
        // ==========================================================
        public function checkUser()
        {
            $login = $_SESSION['login'];
            $password = $_SESSION['password'];
            $query = "SELECT * FROM users WHERE `name` = '$login' and `password` ='$password'";
            $result = $this->db_connection->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['username']=$row['name'];
            $_SESSION['password']=$row['password'];
            $_SESSION['is_logged']=true;
            header ('Location: index.php');
            }else{
            echo "No records";
            }
        }
        
        // ==========================================================
        // ============== Update (edit) current data ================
        // ==========================================================
        
        public function updateRecord($postData)
        {
            $name = $this->db_connection->real_escape_string($_POST['name']);
            $email = $this->db_connection->real_escape_string($_POST['email']);
            $password = $this->db_connection->real_escape_string($_POST['password']);
            $is_active = $this->db_connection->real_escape_string($_POST['is_active']);
            $id = $this->db_connection->real_escape_string($_POST['id']);
        if (!empty($id) && !empty($postData)) {
            $query = "UPDATE users "
                    . "SET `name` = '$name', email = '$email', is_active = '$is_active', password = '$password' "                    
                    . "WHERE id = '$id'";
           // print_r($query);
           // exit();
            $sql = $this->db_connection->query($query);
            if ($sql==true) {
                header("Location:index.php?msg=update");
            }else{
                echo "Update error!";
            }
            }
            
        }
        // ==========================================================
        // ============== Delete data by id =========================
        // ==========================================================
        public function deleteRecord($id)
        {
            $query = "DELETE FROM articles WHERE id = '$id'";
            $sql = $this->db_connection->query($query);
        if ($sql==true) {
            header("Location:index.php?msg=delete");
        }else{
            echo "Delete error";
            }
        }
    }
    
    