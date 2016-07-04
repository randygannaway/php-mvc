<?php
/**
 * Created by PhpStorm.
 * User: randy
 * Date: 6/29/16
 * Time: 3:37 PM
 */

namespace App\Models;

use PDO;
use App\Interfaces\Modelling;
use App\Interfaces\Databasing;

class StarModel implements Modelling
{
    protected $databasing;


    /**
     * StarModel constructor.
     * @param Databasing $database
     */
    public function __construct(Databasing $database)
    {
        $this->databasing = $database;
    }

    public function create($data)
    {
        
    }
    
    public function read($data)
    {
        $db = $this->databasing->getDb();
        $user_id = $data['id'];

        $stmt = $db->prepare('SELECT num_stars FROM stars WHERE user_id = :user_id');
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        $results = $stmt->fetchAll();

        return $results[0];
    }

    public function update($data)
    {
        
    }

    public function delete($data)
    {
        
    }
}
{
}