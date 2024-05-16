<?php 
class Render {

      public static function displayRecipe($recipe) {
            $output = "";
            $output .= $recipe->getTitle() . " by " . $recipe->getSource();
            $output .= "<br/>";
            $output .= implode( ", ", $recipe->getTags());
            $output .= "<br/>";
            $output .= self::displayIngredients($recipe);
            return $output;
        }

        public static function displayIngredients($recipe) {
            $ingredients = $recipe->getIngredients();
            $ingredientList = "";
            foreach ($ingredients as $ing ) {
                $ingredientList .= $ing["amount"] . " " . $ing["measure"] . " " . $ing["item"] . "</br>";
            }   
            return $ingredientList;
        }

        public static function displayMethods($class) {
            $output = "";
            $output .= " The following methods are available for objects in this class: ";
            $output .= implode("<br/>", get_class_methods($class));
            return $output;
        }


        public static function displayCollectionRecipes($titles) {
            asort($titles);
            return implode(", <br>", $titles);
        }

}

?>