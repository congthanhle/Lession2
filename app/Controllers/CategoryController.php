<?php

require_once __DIR__ . '/../Models/Category.php';

class CategoryController
{
    private $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new Category();
    }

    public function index()
    {
        $perPage = 10;
        $searchKeyword = isset($_GET['search']) ? $_GET['search'] : ''; 
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
        $startIndex = ($currentPage - 1) * $perPage;

        if($searchKeyword){
            $categories = $this->categoryModel->searchCategories($searchKeyword);
            $totalCategories = count($categories);
        }
            
        else{         
            // $categories = $this->categoryModel->getCategories($startIndex, $perPage);
            $categories = $this->categoryModel->getAllCategories();
            $totalCategories = $this->categoryModel->getTotalCategories();
        }
            
        $totalPages = ceil($totalCategories / $perPage);

        require_once __DIR__ . '/../Views/categories/index.php';
    }

    public function create()
    {
        $categories = $this->categoryModel->getAllCategories();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $parentId = $_POST['parent_id'];

            $categoryId = $this->categoryModel->addCategory($name, $parentId);
            return $this->index();
        } else {
            require_once __DIR__ . '/../Views/categories/create.php';
        }
    }

    public function edit($id)
    {
        $categories = $this->categoryModel->getAllCategories();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $parentId = $_POST['parent_id'];

            $result = $this->categoryModel->updateCategory($id, $name, $parentId);
            return $this->index();
        } else {
            $category = $this->categoryModel->getCategoryById($id);
            require_once __DIR__ . '/../Views/categories/edit.php';
        }
    }

    public function show($id)
    {
         $categories = $this->categoryModel->getAllCategories();
        $category = $this->categoryModel->getCategoryById($id);
        require_once __DIR__ . '/../Views/categories/show.php';
    }
}
