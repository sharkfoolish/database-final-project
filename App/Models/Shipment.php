<?php
namespace App\Models;

use \PDO;

class Shipment extends Model
{
    static string $name = 'shipments';

    public static function retrieveNotDeliveredWithinThePromisedTime() {
        $sql = "SELECT `shipments`.`delivery_company`, `shipments`.`tracking_number`, `shipments`.`delivery_time`, `shipments`.`estimated_delivery_time`
                FROM `shipments`
                WHERE `delivery_time` > `estimated_delivery_time`";
        $connection = Model::connect();
        $state = $connection->prepare($sql);
        if (!$state->execute()) {
            return null;
        } else {
            return $state->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public static function retrieveContactInformationForTheCustomer() {
        $sql = "SELECT `customer_informations`.`name`, `customer_informations`.`phone`, `customer_informations`.`email`, `customer_informations`.`address`
                FROM `customer_informations`
                WHERE `customer_informations`.`customer_id` IN (
                    SELECT `orders`.`customer_id` 
                    FROM `orders`
                    WHERE `orders`.`id` IN (
                        SELECT `shipments`.`order_id` FROM `shipments` 
                        WHERE `shipments`.`delivery_company` = 'USPS' 
                        AND `shipments`.`tracking_number` = '123456'
                    )
                )";
        $connection = Model::connect();
        $state = $connection->prepare($sql);
        if (!$state->execute()) {
            return null;
        } else {
            return $state->fetch(PDO::FETCH_ASSOC);
        }
    }
}
