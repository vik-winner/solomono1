<?php

namespace Controllers;

use Models\Category;
use Models\Product;

/**
 * Class CatalogController
 */
class CatalogController {
    /**
     * @return bool
     */
    public function viewPage() {
        $categories = Category::getCategoriesList();
        $products = Product::getProductsList();

        require_once(ROOT . '/views/Catalog.php');

        return true;
    }
}
