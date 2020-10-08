<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Каталог</title>
    <link href="/css/style.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <script src="/js/catalog.js"></script>
</head>
<body>
<div class="left">
    <?php foreach ($categories as $category):?>
        <div class="category">
            <input class="category__element category-action" type="radio" id="category-<?php echo $category['id'];?>"
             name="category" value="<?php echo $category['name'];?>">
            <label class="category__element" for="category-<?php echo $category['id'];?>"><?php echo $category['name'] . ' ' . $category['count'];?></label>
        </div>
    <?php endforeach;?>
</div>
<div class="right">
    <select id="sort" onchange='fillBox2();'>
        <option value="default">Без сортування</option>
        <option value="cheapest">Cпочатку дешевші</option>
        <option value="alphabetically">По алфавіту</option>
        <option value="newest">Спочатку нові</option>
    </select>
    <ul id="products">
        <?php foreach ($products as $product):?>
            <li>
                <?php echo $product['name'] . ' ' . $product['date'] . ' ' . $product['price'];?>
                <button type="button" class="btn btn-primary product-button">
                    Купить
                </button>
            </li>
        <?php endforeach;?>
    </ul>
</div>
<!-- Modal -->
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel">Купити вибраний продукт</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>