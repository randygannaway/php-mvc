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
     * @param Databasing $databasing
     */
    public function __construct(Databasing $databasing)
    {
        $this->databasing = $databasing;
    }

    public function create($data)
    {
        
    }
    
    public function read($data)
    {
        $db = $this->databasing->getDb();

        $stmt = $db->query('SELECT num_stars FROM stars WHERE user_id = :user_id');
        $stmt->bindParam(':token', $user_id);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $results;
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