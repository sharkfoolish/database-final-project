<?php
namespace App\Models;

use \PDO;

class Customer extends Model
{
    static string $name = 'customers';

    public static function retrieveHasBoughtTheMostInThePastYear() {
        $sql = "SELECT `customer_informations`.`name`, SUM(`goods`.`price`) AS `totalAmountOfOrder`
                FROM
                    (
                        (
                            (
                                `orders`
                            INNER JOIN `order_items` ON `order_items`.`order_id` = `orders`.`id`
                            )
                        INNER JOIN `goods` ON `goods`.`id` = `order_items`.`good_id`
                        )
                    INNER JOIN `customers` ON `customers`.`id` = `orders`.`customer_id`
                    )
                INNER JOIN `customer_informations` ON `customer_informations`.`customer_id` = `customers`.`id`
                WHERE YEAR(`orders`.`created_at`) = YEAR(CURDATE()) - 1
                GROUP BY
                    `orders`.`id`
                ORDER BY
                    `totalAmountOfOrder`
                DESC
                LIMIT 1";
        $connection = Model::connect();
        $state = $connection->prepare($sql);
        if (!$state->execute()) {
            return null;
        } else {
            return $state->fetch(PDO::FETCH_ASSOC);
        }
    }
}