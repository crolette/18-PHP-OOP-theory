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

# Magic Constants

[Documentation : Magic Constants](https://www.php.net/manual/en/language.constants.predefined.php)

**"Magic Constants" provide details about our script and our environment.**

All magic constants methods start and end with a double underscore.

## Some constants

Let's modify the `__toString()` method with a few constants methods.

- `__CLASS__` gives us the name of the the class itself.
- `__FILE__` gives us the full path with the file name. (better to use with basename() method)
- `__DIR__` gives us the full path to the file without the file name.
- `__LINE__` gives us the current line number in the file.
- `__METHOD__` gives us the name of the method we are using.

```php
public function __toString()
{
	$output = "Your are calling a " . __CLASS__ . " object with the title \"";
	$output .= $this->getTitle() . "\".";
	$output .= " It is stored in " . basename(__FILE__) . " at " . __DIR__ . ".";
	$output .= " This display from line " . __LINE__ . " in method " . __METHOD__ ."<br/>";
	return $output;
}
```

Run `echo recipe1` to see the output...

## `get_class_methods()`

Finally, let's show a list of the methods in case the user is looking for something.

We will use an other function in combination with a magic constant `get_class_methods()` in order to retreive to the user all methods in the class Recipe.

```php
$output .= " The following methods are available for objects in this class: ";
$output .= implode("<br/>", get_class_methods(__CLASS__));
```

Now, you can adapt this method to our Render class.

# All Recipes

In the cookbook folder, you will find the folder `inc` (it means "include") which contains a file with all our recipes using our classes methods `cookbook.php`.

In the `ìndex.php` at the root's folder, call your classes and the `cookbook.php` file :

```php
<?php

include "classes/recipes.php";
include "classes/render.php";
include "inc/cookbook.php";

echo Render::displayRecipe($belgian_waffles);

?>
```

You have now a system to display all your recipes by calling Render class.

Try to display `$belgian_waffles` recipe.

---

Next: [Collection](./08-creating-collection.md)
