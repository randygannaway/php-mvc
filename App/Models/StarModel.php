<?php
/**
 * Created by PhpStorm.
 * User: randy
 * Date: 6/29/16
 * Time: 3:37 PM
 */

namespace App\Models;

use Core\Database;
use PDO;
use App\Interfaces\Modelling;

class StarModel implements Modelling
{
    protected $databasing;

    /**
     * StarModel constructor.
     * @param Databasing $database
     */
    public function __construct(Database $database)
    {
        $this->databasing = $database;
    }

    public function create($data)
    {
        
    }
    
    public function read($user_id)
    {
        $db = $this->databasing->getDb();
        $stmt = $db->prepare('SELECT date_earned, SUM(num_stars) AS num_stars FROM `stars` WHERE user_id = :user_id 
                              GROUP BY DAY(date_earned) ORDER BY date_earned ASC LIMIT 7 ');
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($results)){
            return $results;
        } else {
            return null;
        }
    }

    public function update($data)
    {
        
    }

    public function delete($data)
    {
        
    }
}