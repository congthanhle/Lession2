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

        $searchKeyword = isset($_GET['search']) ? $_GET['search'] : ''; // Lấy từ khóa tìm kiếm từ biến $_GET

        $categoriesPerPage = 10;

        // Xác định trang hiện tại
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

        // Xác định chỉ số bắt đầu của danh mục trong trang hiện tại
        $startIndex = ($currentPage - 1) * $categoriesPerPage;

        if($searchKeyword){
            $categories = $this->categoryModel->searchCategories($searchKeyword);
            $totalResults = count($categories);
        }
            
        else
            $categories = $this->categoryModel->getCategories($startIndex, $categoriesPerPage);

        // Tổng số danh mục
        $totalCategories = $this->categoryModel->getTotalCategories();

        // Tính tổng số trang
        $totalPages = ceil($totalCategories / $categoriesPerPage);

        // Hiển thị danh sách danh mục
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
            // Hiển thị form thêm mới danh mục
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
            // Hiển thị form sửa danh mục
            require_once __DIR__ . '/../Views/categories/edit.php';
        }
    }

    public function show($id)
    {
        $category = $this->categoryModel->getCategoryById($id);
        // Hiển thị chi tiết danh mục
        require_once __DIR__ . '/../Views/categories/show.php';
    }
}
