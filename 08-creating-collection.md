## Menu

- [Intro](./README.md)
- [Cookbook : Classes & objects](./01-classes.md)
- [Cookbook : Access Modifiers](./02-access-modifiers.md)
- [Cookbook : Associative arrays](./03-associative-arrays.md)
- [Cookbook : Adding Getters & setters](./04-adding-getters-setters.md)
- [Cookbook : Static Methods](./05-static-methods.md)
- [Cookbook : Magic Methods](./06-magic-methods.md)
- [Cookbook : Magic Constants](./07-magic-constants.md)
- [Cookbook : Collection](./08-creating-collection.md)
- [Cookbook : Inheritance](./09-inheritance.md)
- [Conclusion](./10-conclusion.md)

---

# Collection

Organization helps us to use things more effectively. The first step in organization is grouping things. A collection object can hold a group of objects and allow us to perform actions on these objects (like filters, specifics list, remove an object...). A collection object allows you to have more control on the objects.

For this project, we're going to create a simple collection class with the specific methods we want to use.

## Creating collection

To start with, we're going to create a new class. So we need to create a new file in our classes folder. We'll name this `recipecollection.php`.

We open our php tag, and then we create a new class called RecipeCollection.

We're going to use two properties, a title to name our collection and a recipes array to store our recipes.

```php
class RecipeCollection
{
	private $title;
	private $recipes = array();
}
```

I let you add the getters and setters. You can grab the setter and the constructor function from Recipe class for the title.

After that, in your `index.php` file you can create your collection by adding some recipes.

```php
include "classes/recipes.php";
include "classes/render.php";
include "classes/recipecollection.php";
include "inc/cookbook.php";

$cookbook = new RecipeCollection("Becode recipe");
$cookbook->addRecipe($lemon_chicken);
$cookbook->addRecipe($granola_muffins);
$cookbook->addRecipe($belgian_waffles);
$cookbook->addRecipe($pepper_casserole);
$cookbook->addRecipe($lasagna);
$cookbook->addRecipe($dried_mushroom_ragout);

var_dump($cookbook);
```

`$cookbook` is our collection objetcs which contains 6 recipes. It's a lot of informations, we will to add methods to our RecipeCollection class to manage our collection.

## Enhancing collection

### grab the titles

First, we want to be able to get a list of the recipe titles. There are actually two parts to this action, grabbing the titles and displaying the list.

For displaying, we have our Render class, but for grabbing the titles, we were using the RecipeCollection class.

We'll start by initializing our title's array. Then we'll loop through each of the recipes in the collection and grab the title.

```php
public function getRecipeTitles()
{
	$titles = array();
	foreach ($this->recipes as $recipe) {
		$titles[] = $recipe->getTitle();
	}
	return array_values($titles);
}
```

### render titles in a list

Now, move to the Render class. We will display a title list of our collection.

Create a function `listRecipes()` with one argument, the titles.

```php
public static function listRecipes($titles)
{
	asort($titles);
	return implode(", <br/>", $titles);
}
```

> _NOTE: `asort()` function sort an array in alphabetic order_

Now, go to the `index.php` file to use this function and display a list of titles.

```php
echo Render::listRecipes($cookbook->getRecipeTitles());
```

### Filtering

Sometimes we only want SOME of the objects in the collection. Enter filters. This is another piece of functionality or method to add to our collection class.

We will try to retrieve recipes with a particular tag.

Let's go back to our RecipeCollection. We create a new method called `filterByTag($tag)`.

- The user should pass a tag he wants to look for as an argument.
- Then, we initialize a new $taggedRecipes array.
- Then, we can loop through the recipes and look for the tag.
- We check with `in_array()` native method if the tag is in the recipe.
- After, we return the new array of taggedRecipes.

```php
public function filterByTag($tag)
{
	$taggedRecipes = array();
	foreach($this->recipes as $recipe) {
		if(in_array(strtolower($tag), $recipe->getTags()) ) {
			$taggedRecipes[] = $recipe;
		}
	}
	return $taggedRecipes;
}
```
---

Other example of how implement a collection in this blog : https://odan.github.io/2022/10/25/collections-php.html

---

Next: [Inheritance](./09-inheritance.md)
