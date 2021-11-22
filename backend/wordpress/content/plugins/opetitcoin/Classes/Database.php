<?php
namespace OpetitCoin\Classes;

use OpetitCoin\Taxonomy\DepartmentTaxonomy;

class Database 
{
    const TABLE_NAME = 'user_department_relashionships';

    /**
     * Create pooper_department_relashionships table
     *
     */
    static public function generateLocalizationUserTable()
    {
        // We get the connector to the WordPress database 
        global $wpdb;

        // we get the actual charset
        $charsetCollate = $wpdb->get_charset_collate();

        $tableName = self::TABLE_NAME;

        // We write our SQL query which creates the table
        $sql = "CREATE TABLE IF NOT EXISTS `{$tableName}`
                (
                    `user_id` BIGINT(20) UNSIGNED NOT NULL,
                    `department_id` BIGINT(20) UNSIGNED NOT NULL,
                    `status` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
                    PRIMARY KEY(`user_id`,`department_id`)
                ) {$charsetCollate};";

       
        // run the query
        $wpdb->query($sql);
    }
//     /**
//      * create a new relationship between a user and a location
//      *
//      * @param int $UserId
//      * @param int $departmentId
//      * @param int $postalCode
//      * @return void
//      */
//     static public function addLocationByUser($userId, $departmentId, $postalCode)
//     {
//         global $wpdb;

//         $tableName = self::TABLE_NAME;

//         $sql = "INSERT INTO `{$tableName}`
//                 (`user_id`, `department_id`, `postal_code`)
//                 VALUES
//                 (%d, %d, %d";

//         // the $sql string contains variable parts (% d)
//         $preparedQuery = $wpdb->prepare(
//             $sql,
//             [
//                 $userId,
//                 $departmentId,
//                 $postalCode
//             ]
//             );
//             $wpdb->query($preparedQuery);
//     }
// /**
//  * Delete a Location / User relation
//  *
//  * @param int $userId
//  * @param int $departmentId
//  * @return void
//  */
//     static public function deleteLocationFromUser ($userId, $departmentId)
//     {
//         global $wpdb;
        
//         $tableName = self::TABLE_NAME;

//     $sql = "DELETE FROM `{$tableName}`
//             WHERE `user_id`=%d
//             AND `department_id`=%d";

//             $preparedQuery = $wpdb->prepare(
//                 $sql,
//                 [
//                     $userId,
//                     $departmentId
//                 ]
//                 );

//                 $wpdb->query($preparedQuery);
//     }
//     /**
//      * get the location for a user
//      *
//      * @param int $userId
//      * @return void
//      */
//     static public function getLocationForUser($userId)
//     {
//         global $wpdb;

//         $tableNamem = self::TABLE_NAME;

//         $sql = "SELECT * FROM `{$tableNamem}` WHERE `user_id`={$userId}";

//         $locationUserRelationship = $wpdb->get_results($sql);

//         $departmentList = array_map(function ($element){
//             $departmentTerm = get_term(
//                 $element->department_id,
//                 DepartmentTaxonomy::TAXONOMY_KEY                
//             );
//             return [
//                 'departmentId' => $departmentTerm->term_id,
//                 'departmentName' => $departmentTerm->name,
//                 'postalCode' => $element->postal_code
//             ];
//         }, $locationUserRelationship);

//         return $departmentList;
//     }
}