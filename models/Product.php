<?php

class Product {

    private $name;
    private $description;
    private $token;
    private $stock;
    private $price;
    private $refNum;
    private $createdAt;
    private $updatedAt;

    private $connexion;
    private $table = "product";

    public function __construct($db)
    {
        $this->connexion = $db;
    }

    public function index()
    {
        // On écrit la requête
        $sql = "SELECT * FROM " . $this->table . ";";

        // On prépare la requête
        $query = $this->connexion->prepare($sql);

        // On exécute la requête
        $query->execute();

        // On retourne le résultat
        return $query;
    }

    public function create()
    {
        $sql = "INSERT INTO " . $this->table . " SET name=:name, price=:price, description=:description, stock=:stock, token=:token, refNum=:refNum, createdAt=:createdAt, updatedAt=:updatedAt";

        $query = $this->connexion->prepare($sql);

        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->stock = htmlspecialchars(strip_tags($this->stock));
        $this->token = htmlspecialchars(strip_tags($this->token));
        $this->refNum = htmlspecialchars(strip_tags($this->refNum));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->createdAt = htmlspecialchars(strip_tags($this->createdAt));
        $this->updatedAt = htmlspecialchars(strip_tags($this->updatedAt));

        $query->bindParam(":name", $this->name);
        $query->bindParam(":price", $this->price);
        $query->bindParam(":stock", $this->stock);
        $query->bindParam(":token", $this->token);
        $query->bindParam(":refNum", $this->refNum);
        $query->bindParam(":description", $this->description);
        $query->bindParam(":createdAt", $this->createdAt);
        $query->bindParam(":updatedAt", $this->updatedAt);

        if ($query->execute()) {
            return true;
        }
        return false;
    }

    public function show()
    {
        // On écrit la requête
        $sql = "SELECT * FROM " . $this->table . " WHERE p.id = ? LIMIT 0,1";

        // On prépare la requête
        $query = $this->connexion->prepare($sql);

        // On attache l'id
        $query->bindParam(1, $this->id);

        // On exécute la requête
        $query->execute();

        // on récupère la ligne
        $row = $query->fetch(PDO::FETCH_ASSOC);

        // On hydrate l'objet
        $this->name = $row['name'];
        $this->price = $row['price'];
        $this->description = $row['description'];
        $this->token = $row['token'];
        $this->stock = $row['stock'];
        $this->createdAt = $row['createdAt'];
        $this->updatedAt = $row['updatedAt'];

        return $this;
    }

    public function edit()
    {
        $sql = "UPDATE " . $this->table . "SET name=:name, price=:price, description=:description, stock=:stock, token=:token, refNum=:refNum, createdAt=:createdAt, updatedAt=:updatedAt WHERE id = :id";

        // On prépare la requête
        $query = $this->connexion->prepare($sql);

        // On sécurise les données
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->stock = htmlspecialchars(strip_tags($this->stock));
        $this->token = htmlspecialchars(strip_tags($this->token));
        $this->refNum = htmlspecialchars(strip_tags($this->refNum));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->createdAt = htmlspecialchars(strip_tags($this->createdAt));
        $this->updatedAt = htmlspecialchars(strip_tags($this->updatedAt));

        // On attache les variables
        $query->bindParam(":name", $this->name);
        $query->bindParam(":price", $this->price);
        $query->bindParam(":stock", $this->stock);
        $query->bindParam(":token", $this->token);
        $query->bindParam(":refNum", $this->refNum);
        $query->bindParam(":description", $this->description);
        $query->bindParam(":createdAt", $this->createdAt);
        $query->bindParam(":updatedAt", $this->updatedAt);

        // On exécute
        if ($query->execute()) {
            return true;
        }

        return false;
    }

    public function delete()
    {
        // On écrit la requête
        $sql = "DELETE FROM " . $this->table . " WHERE id = ?";

        // On prépare la requête
        $query = $this->connexion->prepare($sql);

        // On sécurise les données
        $this->id = htmlspecialchars(strip_tags($this->id));

        // On attache l'id
        $query->bindParam(1, $this->id);

        // On exécute la requête
        if ($query->execute()) {
            return true;
        }

        return false;
    }
}

    // // Getter
    // public function getName()
    // {
    //     return $this->name;
    // }

    // public function getDescription()
    // {
    //     return $this->description;
    // }

    // public function getPrice()
    // {
    //     return $this->price;
    // }

    // public function getStock()
    // {
    //     return $this->stock;
    // }

    // public function getRefNum()
    // {
    //     return $this->refNum;
    // }


    // // Setter
    // public function setName($name)
    // {
    //     $this->name = $name;
    // }

    // public function setDescription($description)
    // {
    //     $this->description = $description;
    // }

    // public function setPrice($price)
    // {
    //     $this->price = $price;
    // }

    // public function setStock($stock)
    // {
    //     $this->stock = $stock;
    // }

    // public function setRefNum($refNum)
    // {
    //     $this->refNum = $refNum;
    // }
}