<?php 
    declare(strict_types=1);

    require('Measurements.php');

    class Recipe
    {
        private string $title;
        private array $ingredients = array();
        private array $instructions = array();
        private string $yield;
        private array $tags = array();
        private string $source = "The crazy cooker";
        

        public function __construct(string $title = null) {
            $this->title = $title;
        }

        public function __toString() {
            $output = "Your are calling a " . __CLASS__ . " object with the title \"";
            $output .= $this->getTitle() . "\".";
            $output .= " It is stored in " . basename(__FILE__) . " at " . __DIR__ . ".";
            $output .= " This display from line " . __LINE__ . " in method " . __METHOD__ ."<br/>";
            return $output;
        }

        public function getTitle() {
            return $this->title;
        }

        public function setTitle(string $title) {
            $this->title = $title;
        }
      
        public function addInstruction(string $instruction) {
            $this->instructions[] = $instruction;
        }

        public function getInstructions() {
            return $this->instructions;
        }

        public function setYield(string $yield) :void {
            $this->yield = $yield;
        }

        public function getYield() :string {
            return $this->yield;
        }

        public function addTag(string $tag) {
            $this->tags[] = strtolower($tag);
        }

        public function getTags() {
            return $this->tags;
        }

        public function setSource(string $source) {
            $this->source = $source;
        }

        public function getSource() {
            return $this->source;
        }
        
        public function addIngredient(string $item, float|int $amount = null, string $measure = null) {
            if($amount != null && !is_float($amount) && !is_int($amount)) {
                exit("The amount must be a float or integer " . gettype($amount) . " $amount given");
            }

            if($measure != null && !Measurements::getMeasurement($measure)) {
                exit("Please enter a valid measurement : " . implode(", ", Measurements::$measurements));
            }

            $this->ingredients[] = array (
                "item"      => ucwords($item),
                "amount"    => $amount,
                "measure"   => $measure
            );
        }

        public function getIngredients() {
            return $this->ingredients;
        }
        
    }


?>