<!-- Views/categories/show.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Thông tin danh mục</title>
</head>

<body>
    <table border="1" cellspacing="0" cellpadding="5">
        <tr>
            <td><strong>Chuyên mục</strong></td>
        </tr>
        <?php $this->categoryModel->showCategories($categories); ?>
    </table>
</body>

</html>