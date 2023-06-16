<?php

namespace App\Controllers;

use App\Models\Shipment;

class ShipmentController extends Controller {

    public static function retrieveNotDeliveredWithinThePromisedTime() {
        ShipmentController::response(Shipment::retrieveNotDeliveredWithinThePromisedTime());
    }

    public static function retrieveContactInformationForTheCustomer() {
        ShipmentController::response(Shipment::retrieveContactInformationForTheCustomer());
    }
}
