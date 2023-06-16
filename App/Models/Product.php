<?php
namespace App\Models;

use \PDO;

class Product extends Model
{
    static string $name = 'products';

    public static function retrieveTopTwoProductsByDollarAmountSoldInThePastYear() {
        $sql = "SELECT `products`.`name`, SUM(`goods`.`price`) as dollarAmountSold
                FROM
                    (
                        (
                            `products`
                        INNER JOIN `goods` ON `products`.`good_id` = `goods`.`id`
                        )
                    INNER JOIN `order_items` ON `order_items`.`good_id` = `goods`.`id`
                    )
                INNER JOIN `orders` ON `orders`.`id` = `order_items`.`order_id`
                WHERE YEAR(`orders`.`created_at`) = YEAR(CURDATE()) - 1
                GROUP BY `products`.`id`
                ORDER BY SUM(`goods`.`price`)
                DESC
                LIMIT 2";
        $connection = Model::connect();
        $state = $connection->prepare($sql);
        if (!$state->execute()) {
            return null;
        } else {
            return $state->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public static function retrieveProductsOutOfStockAtEveryStoreInKaohsiung() {
        $sql = "SELECT `products`.`name`
                FROM
                    (
                        `stores`
                    INNER JOIN `inventories_of_store` ON `inventories_of_store`.`store_id` = `stores`.`id`
                    )
                    INNER JOIN `products` ON `products`.`id` = `inventories_of_store`.`product_id`
                WHERE `stores`.`address` LIKE '%高雄%'
                GROUP BY `products`.`name`
                HAVING SUM(`inventories_of_store`.`quantity`) = 0";
        $connection = Model::connect();
        $state = $connection->prepare($sql);
        if (!$state->execute()) {
            return null;
        } else {
            return $state->fetchAll(PDO::FETCH_ASSOC);
        }
    }
}