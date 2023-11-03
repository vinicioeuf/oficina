<?php
session_start();
class Conexao{
    public static $instance;
    
    private function __construct() {
        
    }
    
    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new PDO('mysql:host=bntocbesetwryajamvft-mysql.services.clever-cloud.com;
           dbname=bntocbesetwryajamvft',
                'uki57199bcxapacs', 'OAx1sVs7K76wKMnSkqMy');
            self::$instance->setAttribute(PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION);
            self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS,
                PDO::NULL_EMPTY_STRING);
        }
        
        return self::$instance;
    }
    
}
?>
