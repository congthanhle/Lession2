<?php

require_once 'Connection.php';

class Category
{
    private $conn;

    public function __construct()
    {
        $connection = new Connection();
        $this->conn = $connection->getConnection();
    }

    public function addCategory($name, $parentId)
    {
        $query = "INSERT INTO category (name, parent_id) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$name, $parentId]);
        return $this->conn->lastInsertId();
    }

    public function deleteCategory($categoryId)
    {
        $query = "DELETE FROM category WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$categoryId]);
        return $stmt->rowCount() > 0;
    }

    public function updateCategory($categoryId, $name, $parentId)
    {
        $query = "UPDATE category SET name = ?, parent_id = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$name, $parentId, $categoryId]);
        return $stmt->rowCount() > 0;
    }

    public function getCategoryById($categoryId)
    {
        $query = "SELECT * FROM category WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$categoryId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getAllCategories()
    {
        $query = "SELECT * FROM category";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $categories;
    }

    public function getTotalCategories()
    {
        $query = "SELECT COUNT(*) AS total FROM category";
        $statement = $this->conn->prepare($query);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }

    public function searchCategories($keyword)
    {
        $query = "SELECT * FROM category WHERE name LIKE :keyword";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':keyword', '%' . $keyword . '%');
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function showCategories($categories, $parent_id = 0,  $depth = 0, $startIndex, $perPage, &$count)
    {
        foreach ($categories as $key => $item) {
            if ($item['parent_id'] == $parent_id) {
                if ($count >= $startIndex && $count < ($startIndex + $perPage)) {
                    echo '<tr>';
                    echo '<td>' . ($count + 1) . '</td>';
                    echo '<td>'.($depth > 0 ? str_repeat('&emsp;', $depth - 1).'L &ensp;' : '').$item['name'].'</td>'; 
                    echo '<td>';
                    echo "<a href='index.php?action=edit&id={$item['id']}'><i class='far fa-edit mx-2'></i></i></a>";
                    echo "<a href='index.php?action=show&id={$item['id']}'><i class='far fa-copy mx-2'></i></a>";
                    echo "<a href='index.php?action=delete&id={$item['id']}'><i class='far fa-trash-alt mx-2'></i></a>";
                    echo '</td>';
                    echo '</tr>';
                }
                $count++;
                unset($categories[$key]);
              
                $this->showCategories($categories, $item['id'], $depth + 1, $startIndex, $perPage, $count);
                if ($count >= ($startIndex + $perPage)) {
                    break;
                }
            }
        }
    }
}
