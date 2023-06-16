<?php

namespace App\Controllers;

use App\Models\Customer;

class CustomerController extends Controller {

    public static function retrieveHasBoughtTheMostInThePastYear() {
        CustomerController::response(Customer::retrieveHasBoughtTheMostInThePastYear());
    }
}
