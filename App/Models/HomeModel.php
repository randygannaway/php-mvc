<?php

namespace App\Models;

use PDO;

class HomeModel extends \Core\Model
{
    public static function getStars()
    {
        $db = static::getDb();

        $stmt = $db->query('SELECT num_stars FROM stars WHERE user_id = 1');

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }
}
