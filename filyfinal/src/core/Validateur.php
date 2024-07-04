<?php 

namespace GAC\Core;

    class Validateur{
        public static array $error=[];


        public static function isValide():bool{
            return count(self::$error)==0;
        }

        public static function add(string $nameField,string $message){
            self::$error[$nameField]=$message;
        }
        public static function isEmpty(string $valueField,string $nameField,string $message="ce champ est obligatoire"):bool{
            if (empty($valueField) or trim($valueField) =='') {
                self::$error[$nameField]=$message;
                return true;
            }
                return false;
        }
        public static function isEmail(string $valueField,string $nameField,string $message="Email incorrecte"){
            if (!filter_var($valueField, FILTER_VALIDATE_EMAIL)) {
                self::$error[$nameField]=$message;
            }
        }
        public static function isExist(array $arrayField, string $nameField,string $valueField ,string $message="ce nom existe dejà"){
            foreach ($arrayField as $value) {
                if ($value[$nameField]==$valueField) {
                    self::$error[$nameField]=$message;
                }
            }
        }
        public static function isNumber(string $valueField,string $nameField,string $message="ce n'est pas une valeur numérique"){
            if (!is_numeric($valueField)) {
                self::$error[$nameField]=$message;
            }
        }
    }