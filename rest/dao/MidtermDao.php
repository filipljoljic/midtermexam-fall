<?php

class MidtermDao {

    private $conn;

    /**
    * constructor of dao class
    */
    public function __construct(){
        try {
          $servername = "localhost";
          $username = "root";
          $password = "864950sa";
          $schema = "midterm_2023";
          //$options = "";
  
        $this->conn = new PDO("mysql:host=$servername;dbname=$schema", $username, $password /*, $options*/);
        /** TODO
        * List parameters such as servername, username, password, schema. Make sure to use appropriate port
        */

        /** TODO
        * Create new connection
        * Use $options array as last parameter to new PDO call after the password
        */


     /*   $options = array(
        	PDO::MYSQL_ATTR_SSL_CA => '',
        	PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false,

        );*/

        // set the PDO error mode to exception
          $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          echo "Connected successfully";
        } catch(PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
        }
    }

    /** TODO
    * Implement DAO method used to get cap table
    */
    public function cap_table(){
      $query = "SELECT * from cap_table";
      $stmt = $this->conn->prepare($query);
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $result;
    }

    /** TODO
    * Implement DAO method used to add cap table record
    */
    public function add_cap_table_record($data){
      $sql = "INSERT INTO cap_table (share_class_id, share_class_category_id, investor_id, diluted_shares) 
             VALUES (:share_class_id, :share_class_category_id, :investor_id, :diluted_shares)";

      $stmt = $this->conn->prepare($sql);
      $stmt->execute($data);
      return $this->conn->lastInsertId(); 
    }

    /** TODO
    * Implement DAO method to return list of categories with total shares amount
    */
    public function categories(){
      $query = "SELECT scc.description, sum(ct.diluted_shares)
                FROM share_class_categories scc
                JOIN cap_table ct on scc.id = ct.share_class_category_id
                GROUP BY scc.description";
      $stmt = $this->conn->prepare($query);
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $result;
    }

    /** TODO
    * Implement DAO method to delete investor
    */
    public function delete_investor($id){
      $sql = "DELETE FROM investors WHERE id = :id";

      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['id' => $id]);
      return $stmt->rowCount(); 
    }
}
?>








