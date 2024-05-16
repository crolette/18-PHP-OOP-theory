<?php 
    require('classes/recipes.php');
    require('./classes/Cocktail.php');
    require('classes/render.php');
    include('inc/cookbook.php');
    include "classes/recipecollection.php";

    $recipe1 = new Recipe("My first recipe");
    // echo $recipe1->getTitle();
    // echo '<br>';
    // echo $recipe1->getSource();
    // echo '<br>';
    // echo '<br>';
    $recipe1->setTitle("Boulets liégeois");
    $recipe1->addIngredient("Tomato", 2 , "pc(s)");
    $recipe1->addIngredient("Basil", 2 , "g");
    $recipe1->addIngredient("Milk", 200 , "ml");
    echo '<br>';
    
    // foreach($recipe1->getIngredients() as $ingredient) {
        //     echo $ingredient["amount"] . " " . $ingredient["measure"] . " " . $ingredient["item"] . "<br>" ;
        // }
        // var_dump($recipe1);
        
        echo Render::displayRecipe($recipe1);
        echo '<br>';
        echo $recipe1;
        echo '<br>';
        echo Render::displayMethods($recipe1);
        echo '<br>';
        echo Render::displayRecipe($belgian_waffles);
        echo '<br>';
        echo Render::displayRecipe($dried_mushroom_ragout);
        echo '<br>';
        echo Render::displayIngredients($lasagna);
        echo '<br>';
        echo '<br>';
        echo '<br>';
        $cookbook = new RecipeCollection("Becode Recipe");
        $cookbook->addCollectionRecipe($lemon_chicken);
        $cookbook->addCollectionRecipe($granola_muffins);
        $cookbook->addCollectionRecipe($belgian_waffles);
        $cookbook->addCollectionRecipe($pepper_casserole);
        $cookbook->addCollectionRecipe($lasagna);
        $cookbook->addCollectionRecipe($dried_mushroom_ragout);

        // var_dump($cookbook);
        echo '<br><strong>Recipe collection</strong><br>';
        echo Render::displayCollectionRecipes($cookbook->getCollectionRecipeTitles());
        echo '<br>';
        $tag = "dinner";
        echo '<br><strong>Filter by tag "' . $tag . '"</strong><br>';
        echo Render::displayCollectionRecipes($cookbook->filterByTag($tag));
        
        $piscosour = new Cocktail("Pisco Sour", 7.8);
        $piscosour->addIngredient("Pisco", 2, "ml");
        $piscosour->addIngredient("Lime juice", 1, "ml");
        $piscosour->addIngredient("Egg white", 1);
        echo '<br>';
        // echo Render::displayRecipe($piscosour);
        echo Render::displayIngredients($piscosour);
        
?>

