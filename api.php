<?php
include 'autoload.php';

use App\Controllers\CustomerController;
use App\Controllers\ProductController;
use App\Controllers\ShipmentController;
use App\Extensions\HttpException;


session_start();
$_request_body = file_get_contents('php://input');
$request = json_decode($_request_body, true);

if ($_SERVER["REQUEST_METHOD"] == 'GET') {
    switch ($_GET['route']) {
        case '/customers/customer/has-bought-the-most-in-the-past-year':
            CustomerController::retrieveHasBoughtTheMostInThePastYear();
            break;
        case '/products/top-two-products-sold-in-the-past-year':
            ProductController::retrieveTopTwoProductsByDollarAmountSoldInThePastYear();
            break;
        case '/products/out-of-stock-at-every-store-in-kaohsiung':
            ProductController::retrieveProductsOutOfStockAtEveryStoreInKaohsiung();
            break;
        case '/shipments/not-delivered-within-the-promised-time':
            ShipmentController::retrieveNotDeliveredWithinThePromisedTime();
            break;
        case '/shipments/contact-information-for-the-customer':
            ShipmentController::retrieveContactInformationForTheCustomer();
            break;
        
    }
} else if($_SERVER["REQUEST_METHOD"] == 'POST') {
} else if($_SERVER["REQUEST_METHOD"] == 'PATCH') {
} else {
    new HttpException(405, "Method Not Allowed");
}
