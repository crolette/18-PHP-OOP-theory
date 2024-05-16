<?php 

class RecipeCollection {
    private $title;
    private $recipes = array();
        

    public function setCollectionTitle(string $title) {
        $this->title = $title;
    }

    public function getCollectionTitle() {
        return $this->title;
    }

    public function addCollectionRecipe($recipe) {
        $this->recipes[] = $recipe;
    }

    public function getCollectionRecipes() {
        return $this->recipes;
    }

    public function getCollectionRecipeTitles() {
        $titles = array();
        foreach($this->recipes as $recipe) {
            $titles[] = $recipe->getTitle();
        }

        return array_values($titles);
    }


    public function filterByTag(string $tag) {
        $taggedRecipes = array();
        foreach($this->recipes as $recipe) {
            if(in_array(strtolower($tag), $recipe->getTags())) {
                $taggedRecipes[] = $recipe->getTitle();
            }
        }

        return $taggedRecipes;
    }


}

?>