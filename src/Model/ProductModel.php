<?php



namespace App\Model;

use PDO;


class ProductModel extends AbstractModel
{
    public function exist(string $sku): bool
    {
        $query = "SELECT * FROM products WHERE SKU = '$sku' ";

        $result = $this->conn->query($query);
        $count = $result->fetchAll();
        if (!$count) {
            return false; //jest id
        } else {
            return true;  //nie ma id
        }
    }

    public function create(array $data): void
    {

        $sku = $data['sku'];
        $name = $data['name'];
        $price = $data['price'];
        $category = $data['category'];
        if (!empty($data['size'])) {
            $size = $data['size'];
        } else {
            $size = NULL;
        }
        if (!empty($data['height'])) {
            $height = $data['height'];
        } else {
            $height = NULL;
        }
        if (!empty($data['width'])) {
            $width = $data['width'];
        } else {
            $width = NULL;
        }
        if (!empty($data['length'])) {
            $length = $data['length'];
        } else {
            $length = NULL;
        }
        if (!empty($data['weight'])) {
            $weight = $data['weight'];
        } else {
            $weight = NULL;
        }


        $preparedStatement = $this->conn->prepare('INSERT INTO products(sku, name, price, category, size, height, width, length, weight)
        VALUES(:sku , :name, :price, :category, :size, :height, :width, :length, :weight)');

        $preparedStatement->execute(['sku' => $sku, 'name' => $name, 'price' => $price, 'category' => $category, 'size' => $size, 'height' => $height, 'width' => $width, 'length' => $length, 'weight' => $weight]);
    }

    public function delete(int $id): void
    {
        $query = "DELETE FROM products WHERE id = $id LIMIT 1";
        $this->conn->exec($query);
    }

    public function list(): array
    {
        $query = "SELECT * FROM products";
        $result = $this->conn->query($query);
        $products = $result->fetchAll();
        return $products;
    }
}
