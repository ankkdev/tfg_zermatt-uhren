<?php
class Product
{
    private $pdo;
    public $id;
    public $name;
    public $description;
    public $price;
    public $image1;
    public $image2;
    public $image3;
    public $stock;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function create() //funcion para crear productos
    {
        $smt = $this->pdo->prepare("INSERT INTO products(name,description,price,image1,image2,image3) VALUES (:name,:description,:price,:image1,:image2,:image3)");
        return $smt->execute([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'image1' => $this->image1,
            'image2' => $this->image2,
            'image3' => $this->image3
        ]);
    }
    public function update() //modificar productos
    {
        $smt = $this->pdo->prepare("
        UPDATE products
        SET name = :name,
        description = :description,
        price = :price,
        stock=:stock,
        image1= :image1,
        image2= :image2,
        image3= :image3
        WHERE id = :id
        ");
        return $smt->execute([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'stock' => $this->stock,
            'image1' => $this->image1,
            'image2' => $this->image2,
            'image3' => $this->image3,
            'id' => $this->id
        ]);
    }
    public function delete() //eliminar producto
    {
        $smt = $this->pdo->prepare("DELETE FROM products WHERE id = :id");
        return $smt->execute(['id' => $this->id]);
    }
}
