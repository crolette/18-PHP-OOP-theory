# Menu

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

# Static Methods

[Static Methods documentation](https://www.php.net/manual/en/language.oop5.static.php)

Now that we have all the properties defined and methods for getting and setting those properties in a regulated manner, let’s complete the main action to display the recipe.

## The single responsability

The single responsibility principle states that every class should have responsibility over a single part of the functionality provided by the software. And that responsibility should be entirely encapsulated or contained by the class.

A class should have only one reason to change.

Remember, a class is way to organize our code and group the functionality and data in a logical manner.

Our Recipe class is in charge of describing that recipe itself and with this class we instantiate recipes objects.

But for displaying our data, we need an other class.

> :point_right: _Important: With this class we don't actually need to instantiate an object, just displaying._

## class Render

Let's create a new class named **Render**. To do that we create a new file in our classes directory called **`render.php`**.

Cut and paste your `displayRecipe()` method from class `Recipe` to the new file. like this :

```php
class Render {

	public function displayRecipe()
	{
		return $this->title . " by " . $this->source;
	}
}
```

We don't need to store any data in this class. That's all handled by our Recipe. We just want to use this method on a particular recipe.

We can pass a recipe object into this method.

```php
public function displayRecipe($recipe)
{
	return $recipe->title . " by " . $recipe->source;
}
```

Now, how do we use this method in our script ?

## Declaring static method

**By declaring a method as static, we make it accessible outside the class without needing to make an instance of the class.**

To declare a method as static, we add the keyword static.

Also, don't forget, to specify our getters because title and source are private variables from an other class.

```php
public static function displayRecipe($recipe)
{
	return $recipe->getTitle() . " by " . $recipe->getSource();
}
```

## Using a static method

Back in `cookbook.php`, we need to include our class.

```php
include "classes/render.php"
```

To use a static method, we specify the class Render, double colons, and the method.

```php
$recipe1 = new Recipe();
$recipe1->setTitle("first recipe");
$recipe1->setSource("grandma");

echo Render::displayRecipe($recipe1);
```

_output : First Recipe by Grandma_

## Displaying recipe details

You can improve our displayRecipe function to display all the recipes details.

```php
public static function displayRecipe($recipe)
{
	$output = "";
	$output .= $recipe->getTitle() . " by " . $recipe->getSource();
	$output .= "<br/>";
	$output .= implode( ", ", $recipe->getTags());
	$output .= "<br/>";
	foreach ($recipe->getIngredients() as $ing ) {
		$output .= $ing["amount"] . " " . $ing["measure"] . " " . $ing["item"] . "</br>";
	}
	return $output;
}
```

Whenever you have a loop in a method, it is a good place to evaluate if there is something that could be moved to its own method. Listing our ingredients seems like something that we could use elsewhere and would benefit from being its own method.

```php
public static function displayIngredients($ingredients) {
	...
}
```

## self::

We use **self::** to call another static method in the same class.

For example :

```php
$output .= self::displayIngredients($recipe->getIngredients());
```

---

Next: [Magic Methods](./06-magic-methods.md)
