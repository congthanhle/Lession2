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
    // ...

    public function getAllCategories()
    {
        $query = "SELECT * FROM category";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $categories;
    }

    public function getCategories($startIndex, $limit)
    {
        $query = "SELECT * FROM category LIMIT :start, :limit";
        $statement = $this->conn->prepare($query);
        $statement->bindValue(':start', $startIndex, PDO::PARAM_INT);
        $statement->bindValue(':limit', $limit, PDO::PARAM_INT);
        $statement->execute();
        $categories = $statement->fetchAll(PDO::FETCH_ASSOC);
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
    public function getChildCategories($parentId)
    {
        $query = "SELECT * FROM category WHERE parent_id = :parentId";
        $statement = $this->conn->prepare($query);
        $statement->bindValue(':parentId', $parentId, PDO::PARAM_INT);
        $statement->execute();
        $childCategories = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $childCategories;
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
    // public function showCategories($categories, $parent_id = 0, $char = '',$idx = 1)
    // {   

    //     foreach ($categories as $key => $item) {
    //         // Nếu là chuyên mục con thì hiển thị
    //         if ($item['parent_id'] == $parent_id) {
    //             echo '<tr>';
    //             echo '<td>'.$idx.'</td>';
    //             echo '<td>';
    //             echo $char . $item['name'];
    //             echo '</td>';
    //             echo "<td>";
    //             echo "<a href='index.php?action=edit&id={$item['id']}'><i class='far fa-edit mx-2'></i></i></a>";
    //             echo "<a href='index.php?action=show&id={$item['id']}'><i class='far fa-copy mx-2'></i></a>";
    //             echo "<a href='index.php?action=delete&id={$item['id']}'><i class='far fa-trash-alt mx-2'></i></a>";
    //             echo "</td>";
    //             echo '</tr>';
    //             // Xóa chuyên mục đã lặp
    //             unset($categories[$key]);
    //             $idx++;
    //             // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
    //             $this->showCategories($categories, $item['id'], $char . '|---', $idx);
    //         }
    //     }
    // }
    
}
