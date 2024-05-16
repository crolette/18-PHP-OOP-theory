<?php 
    class Measurements {
        public static $measurements = array(
            "liter",
            "g",
            "kg",
            "cup",
            "soup spoon",
            "coffee spoon",
            "ml",
            "pc(s)"
        );
        
                
        
        

        
        /**
         * This PHP function checks if a given measurement is in a predefined list of measurements and
         * returns a boolean value accordingly.
         * 
         * Args:
         *   measure (string): The `getMeasurement` function is a static method that takes a string
         * parameter `` and checks if it exists in the static property ``. If the
         * lowercase version of the input measure is found in the array ``, the function
         * returns `true`, indicating that the measurement is valid
         * 
         * Returns:
         *   A boolean value is being returned.
         */
        public static function getMeasurement(string $measure) :bool {
            if(in_array(strtolower($measure), self::$measurements)) {
                return true;
            } else {
                return false;
            }
        }
    }

?>
