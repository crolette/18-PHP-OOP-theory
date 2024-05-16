# Menu

- [Intro](./README.md)
- [Cookbook : Classes & objects](./01-classes.md)
- [Cookbook : Access Modifiers](./02-access-modifiers.md)
- [Cookbook : Associative arrays](./03-associative-arrays.md)
- [Cookbook : Adding Getters & setters](./04-adding-getters-setters.md)
- [Cookbook : Static Methods](./05-static-methods.md)
- [Cookbook : Magic Methods](./06-magic-methods.md)
- [Cookbook : Magic Constants](./07-magic-constants.md)
- [Cookbook : Inheritance](./09-inheritance.md)
- [Conclusion](./10-conclusion.md)

---

# Associative Arrays

The next property in the class is an array of ingredients. The strings would be the full ingredients, but instead of using a single string for each ingredient, we're going to set up our ingredients as an associative array. This will allow us to break ou igredients up into parts and better control the formatting and merging of items.

Look the example :

```php
array(
	"item" => "flour",
	"amount" => 2.5,
	"measure" => "cup"
),
array(
	"item" => "milk",
	"amount" => .75,
	"measure" => "liter"
)
```

Let's create the `addIngredient` method.

The only first value is required, so we add a default value of null to the both others.

```php
public function addIngredient($item, $amount = null, $measure = null)
{
	$this->ingredients[] = array(
		"item" 		=> ucwords($item),
		"amount" 	=> $amount,
		"measure" 	=> $measure
	);
}
```

We have our function but we must control the data we can accept in our ingredient.

- For the item, just transform to capitalized letters.
- For the amount, we will require a float or an integer and exit the function with an error message to tell the user what's wrong.
- For the measure, we will require a value defined in an array which could access only inside the class. We add also an exit with an error message.
  - We add also a private variable to limit the measurements possibilities.

The complete code should be like this :

```php
private $measurements = array(
	"liter",
	"g",
	"kg",
	"cup",
	"soup spoon",
	"coffee spoon",
	"ounce"
);

public function addIngredient($item, $amount = null, $measure = null)
{
	if( $amount != null && !is_float($amount) && !is_int($amount) ) {
		exit("The amount must be a float: " . gettype($amount) . " $amount given.")
	}

	if( $measure!= null && !in_array(strtolower($measure), $this->measurements) ) {
		exit("Please enter a valid measurement: " .implode(", ", $this->measurements ));
	}

	$this->ingredients[] = array(
		"item" 		=> ucwords($item),
		"amount" 	=> $amount,
		"measure" 	=> strtolower($measure)
	);
}
```

Now, we will add a method to retrieve the ingredients. And which method we have to create for that ?  
Yes, a getter !

```php
public function getIngredients() {
	return $this->ingredients;
}
```

Now, let's loop through our ingredients :

```php
foreach ($recipe1->getIngredients() as $ing ) {
	echo $ing["amount"] . " " . $ing["measure"] . " " . $ing["item"] . "</br>";
}
```

## cookbook.php

In your file `recipes.php` which contains your class Recipe, we instantiated some objects like :

```php
$recipe1 = new Recipe();
```

In fact, we should not do like that. It's much better to instantie objects outside this file.

In the root of your project, create a file named `cookbook.php`. It will contains all the recipes for our project.

To link this file to our class file, write :

```php
include "classes/recipes.php";
```

Now, your are ready to create recipes in a cookbook...

---

Next : [Adding Getters & setters](./04-adding-getters-setters.md)
