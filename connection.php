<?php
class multiple
{
    public $p;
    public function __construct($dbname, $host, $root, $password)
    {
        try {
            $this->p = new PDO("mysql:host=" . $host . ";dbname=" . $dbname, $root, $password);
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }
    public function insertProduct($name, $images = array())
    {
        $add = $this->p->prepare("INSERT INTO products(id,name) VALUES(NULL,?)");
        $add->execute(array($name));
        $lastId = $this->p->lastInsertId();
        if (count($images) > 0) {
            for ($i = 0; $i < count($images); $i++) {
                $imageName = $images[$i];
                $add = $this->p->prepare("INSERT INTO images(id,imageName,idProduct	) VALUES(NULL,?,?)");
                $add->execute(array($imageName,$lastId));
               
            }
        }
        if ($add) {
            echo "Product added.";
        } else {
            echo "Product not added.";
        }
    }
    public function selectData()  {
        $select=$this->p->prepare("SELECT products.id as id,products.name,(SELECT imageName FROM images WHERE products.id=images.idProduct LIMIT 1) as image 
        FROM products,images WHERE products.id=images.idProduct GROUP BY products.id");
        $select->execute();
        if ($select->rowCount()>0) {
           $fetch=$select->fetchAll(PDO::FETCH_ASSOC);
        }else{
            $fetch=array();
            echo "No data.";
        }
        return $fetch;
    }
    public function selectDataById($id)  {
        $select=$this->p->prepare("SELECT products.id as id,products.name,(SELECT imageName FROM images WHERE products.id=images.idProduct LIMIT 1) as image 
        FROM products,images WHERE products.id=images.idProduct and products.id=? GROUP BY products.id LIMIT 1");
        $select->execute(array($id));
        if ($select->rowCount()>0) {
           $fetch=$select->fetch(PDO::FETCH_ASSOC);
        }else{
            $fetch=array();
            echo "No data.";
        }
        return $fetch;
    }
    public function selectAllImagesById($id)  {
        $select=$this->p->prepare("SELECT imageName FROM images WHERE images.idProduct=?");
        $select->execute(array($id));
        if ($select->rowCount()>0) {
           $fetch=$select->fetchAll(PDO::FETCH_ASSOC);
        }else{
            $fetch=array();
            echo "No data.";
        }
        return $fetch;
    }
}
