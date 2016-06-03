<?php 

namespace App\Models;

use PDO;

class Home extends \Core\Model
{

    // Get all entries from events table in mvc database 

    public static function getAll()
    {
        try {
            
            // Get static connection from base model
            $db = static::getDB();

            // Form query
            $stmt = $db->query('SELECT * FROM events');

            // Fetch results
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $results;
    
        } catch (PDOException $e) {
    
            // Display error messages from query
            echo $e->getMessage();

        }
    }    
}
