<!DOCTYPE html>
<html>
<head>
    <title>Show category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h3>Show category</h3>
        <form method="POST" action="index.php?action=edit&id=<?php echo $category['id']; ?>">
            <div class="form-group mb-3">
                <label for="exampleInputEmail1" class="mb-2">Category name</label>
                <input type="text" class="form-control" name="name" placeholder="" value="<?php echo $category['name']; ?>">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group mb-3">
                <label for="example" class="mb-2">Parent category</label><br>
                <select class="form-select" name="parent_id" value="<?php echo $category['name']; ?>">
                    <option value="">Choose parent category</option>
                    <?php foreach ($categories as $item) : ?>
                        <option value="<?php echo $item['id']; ?>" <?php if($category['parent_id'] == $item['id']): echo "selected"; endif;?>><?php echo $item['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Back</button>
        </form>
    </div>
   
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</html>