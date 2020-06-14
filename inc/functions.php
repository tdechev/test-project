<?php

require_once "db_conf.php";

$db = new DbConfig();

class Functions extends DbConfig
{
    public $files;

    public function listXmlFiles(){

        $dirs = array_filter(glob('*'), 'is_dir');

        $i = 1;
        foreach ($dirs as $key => $value) {
            foreach(glob($value.'/*.xml') as $this->files){
                return $this->files;
            }
            $i++;
        }
    }

    public function readData()
    {
        $xml = simplexml_load_file($this->listXmlFiles());
        $data = $xml->children();
        return $data;
    }

    public function readFromDb(){
        global $db;
        $sql = "SELECT * FROM books";
        $query = $db->conn->query($sql);
        $result = $query->fetchAll();
        return $result;
    }

    public function saveAllToDb(){
        global $db;

        if(isset($_POST['saveAll'])){
            $xml = simplexml_load_file($this->listXmlFiles());

            foreach ($xml->children() as $row) {
                $id = $this->secureData(intval($row->id));
                $author = $this->secureData($row->author);
                $name = $this->secureData($row->name);
                $date = $this->dateNow();

                $sql = "SELECT id FROM books WHERE id='$id'";
                $query = $db->conn->query($sql);
                $check = $query->fetch();
                if($check > 0){
                    $sql = "UPDATE books SET date='$date' WHERE id='$id'";
                    $db->conn->query($sql);
                } else {

                    $sql = "INSERT INTO books (id, book_author, book_name, date) VALUES ('$id', LOWER('$author'), '$name', '$date')";
                    $db->conn->query($sql);
                }
            }
        }
    }

    public function searchByAuthor(){
        global $db;

        if(isset($_POST['search'])){

            $author = $this->secureData($_POST['author']);

            if(empty($author)){
                echo "<div class='alert alert-danger'>Please fill the field and try again</div>";
            }

            $sql = "SELECT * FROM books WHERE book_author LIKE LOWER('%$author%')";
            $result = $db->conn->query($sql);
            $count = $result->rowCount();
            if($count > 0){
                return $result;
            } else {
                echo "<div class='alert alert-danger'>No results are found in the DB by this search criteria</div>";
            }

        }
    }

    public function secureData($value){
        $cleanData = trim(htmlspecialchars($value));
        return $cleanData;
    }

    public function dateNow(){
        $date = date("F j, Y, g:i a");
        return $date;
    }
}


$obj = new Functions();

?>