<?php 

class Cocktail extends Recipe
{
        private $alcoholPercentage;

        public function __construct($title, $alcoholPercentage)
        {
            parent::__construct($title);
            $this->alcoholPercentage = $alcoholPercentage;
        }

        public function setAlcoholPercentage($percentage) {
            $this->alcoholPercentage = $percentage;
        }

        public function getAlcoholPercentage() {
            return $this->alcoholPercentage;
        }


}


?>