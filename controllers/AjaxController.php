<?php

namespace Controllers;

use Models\Product;

/**
 * Class AjaxController
 */
class AjaxController {
    /**
     * @return array
     */
    private static function getParams() {
        $params = [];
        if (isset($_POST['category_id'])) {
            $params['category_id'] = str_replace('category-', '', $_POST['category_id']);
        }
        if (isset($_POST['sort'])) {
            $params['sort'] = $_POST['sort'];
        }

        return $params;
    }

    /**
     * Return JSON with products
     */
    public static function ajaxResponse() {
        $products = Product::getSortProductsByCategory(self::getParams());
        echo json_encode($products);
    }
}
