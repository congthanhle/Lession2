<!-- Views/categories/show.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Thông tin danh mục</title>
</head>
<body>
    <h1>Thông tin danh mục</h1>
    <p><strong>Mã:</strong> <?php echo $category['id']; ?></p>
    <p><strong>Tên:</strong> <?php echo $category['name']; ?></p>
    <p><strong>Danh mục cha:</strong> <?php echo $category['parent_id']; ?></p>
    <a href="index.php">Quay lại danh sách</a>
</body>
</html>
