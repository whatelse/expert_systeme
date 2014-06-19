<?php
    class Db
    {
        private static $db;
        
        public static function connect(){
            self::$db = mysqli_connect(_DB_SERVER_, _DB_USER_, _DB_PASSWD_, _DB_NAME_);
        }
        
        public static function disconnect(){
            mysqli_close(self::$db);
        }
        
        public static function queryObject($sql){
            self::connect();
            if ($res = mysqli_query(self::$db, $sql) or die(mysqli_error())){
                $row = array();
                while($ligne = mysqli_fetch_object($res)){
                    $row[] = $ligne;					
                }
                mysqli_free_result($res);
                return $row;
            }
            self::disconnect();
        }
        
        public static function queryArray($sql){
            self::connect();
            if ($res = mysqli_query(self::$db, $sql)){
                $row = array();
                while($ligne = mysqli_fetch_assoc($res)){
                    $row[] = $ligne;					
                }
                mysqli_free_result($res); // permet de libérer les ressources rattachées à la requête
                return $row;
            }
            self::disconnect();
        }
        
        public static function querySingle($sql){
            self::connect();
            if ($res = mysqli_query(self::$db, $sql)){
                $row = mysqli_fetch_object($res);
                mysqli_free_result($res); 
                return $row;
            }
            self::disconnect();
        }
        
        public static function querySingleArray($sql){
            self::connect();
            if ($res = mysqli_query(self::$db, $sql)){
                $row = mysqli_fetch_assoc($res);
                mysqli_free_result($res); 
                return $row;
            }
            self::disconnect();
        }
        
        public static function query($sql){
            self::connect();
            return mysqli_query(self::$db, $sql) or die(mysqli_error(self::$db));
        }
                
        public static function queryGetId($sql){
            self::connect();
            mysqli_query(self::$db, $sql) or die(mysqli_error(self::$db));
            $var = mysqli_insert_id(self::$db);
            return $var != 0 ? $var : false;
        }
    }
