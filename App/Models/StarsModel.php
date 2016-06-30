<?php
/**
 * Created by PhpStorm.
 * User: randy
 * Date: 6/29/16
 * Time: 3:37 PM
 */

namespace App\Models;

use PDO;
use App\Interfaces\ModelInterface;
use App\Interfaces\DatabaseInterface;

class StarsModel implements ModelInterface
{
    protected $databaseInterface;
    
    
    public function create()
    {
        
    }
    
    public function read($user_id)
    {
        $db = $this->databaseInterface->getDb();

        $stmt = $db->query('SELECT num_stars FROM stars WHERE user_id = :user_id');
        $stmt->bindParam(':token', $user_id);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }

    public function update()
    {
        
    }

    public function delete()
    {
        
    }
}
{
}