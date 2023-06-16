<?php

namespace App\Controllers;

use App\Models\Product;

class ProductController extends Controller {

    public static function retrieveTopTwoProductsByDollarAmountSoldInThePastYear() {
        ProductController::response(Product::retrieveTopTwoProductsByDollarAmountSoldInThePastYear());
    }

    public static function retrieveProductsOutOfStockAtEveryStoreInKaohsiung() {
        ProductController::response(Product::retrieveProductsOutOfStockAtEveryStoreInKaohsiung());
    }
}
