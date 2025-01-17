<?php
require_once("database.php");

class ImageModel{
    private $db;

    public function __construct() {
        $this->db = new Database();
    }
 

public function addImage($vehiculeId, $chemin) {
    $conn = $this->db->connectDb();


        $query = "INSERT INTO imagesvehicules (idVehicule, chemin) VALUES ($vehiculeId,'$chemin')";
        $this->db->request($conn, $query);
        
        $this->db->disconnectDb($conn);

    
}  
public function addImageNews($id, $chemin) {
    $conn = $this->db->connectDb();


        $query = "INSERT INTO imagesnews (idNews, chemin) VALUES ($id,'$chemin')";
        $this->db->request($conn, $query);
        
        $this->db->disconnectDb($conn);

    
}  
public function addImagePub($id, $chemin) {
    $conn = $this->db->connectDb();


        $query = "INSERT INTO imagespublicite (idPub, chemin) VALUES ($id,'$chemin')";
        $this->db->request($conn, $query);
        
        $this->db->disconnectDb($conn);

    
}  
public function addImageMarque($chemin){
    $conn = $this->db->connectDb();
    $check="SELECT id FROM images WHERE chemin= '$chemin';";
    $result=$this->db->request($conn, $check);
    if (empty($result)) {
        
        $query = "INSERT INTO images (chemin) VALUES ('$chemin')";
    $this->db->request($conn, $query);
    $lastId=$conn->lastInsertId();

        $this->db->disconnectDb($conn);
        return $lastId;
    }else {        $this->db->disconnectDb($conn);
        return false;
   
}}
public function updateImage($vehiculeId, $chemin){
    $conn = $this->db->connectDb();

    
        $query = "UPDATE  imagesvehicules SET  chemin='$chemin' WHERE idVehicule=$vehiculeId";

        $this->db->request($conn, $query);


        $this->db->disconnectDb($conn);

    
}
public function updateImageNews($id,$chemin){
    $conn = $this->db->connectDb();
    $query = "UPDATE  imagesnews SET  chemin='$chemin' WHERE idNews=$id";
    $this->db->request($conn, $query);
    $this->db->disconnectDb($conn);
}
public function updateImagePub($id,$chemin){
    $conn = $this->db->connectDb();
    $query = "UPDATE  imagespublicite SET  chemin='$chemin' WHERE idPub=$id";
    $this->db->request($conn, $query);
    $this->db->disconnectDb($conn);
}
public function updateImageMarque($chemin,$newChemin){
    $conn = $this->db->connectDb();
    $query = "UPDATE  images SET  chemin='$newChemin' WHERE chemin='$chemin'";
    $this->db->request($conn, $query);


        $this->db->disconnectDb($conn);



}

}
    
?>