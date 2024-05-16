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

# The project

From our cookbook, we'll be able to perfom some actions.

- display the recipe titles.
- display an shopping list of ingredients
- display an individual recipe

Let's begin.

![crazy cooker](http://giphygifs.s3.amazonaws.com/media/LVBH3rg1BUROw/giphy.gif)

# Classes and Objects

## Class

**A class contains all the functions and variables that define an object.**

- **Functions are called methods**
- **Variables are called properties**

We declare a class using the `class` keyword, followed by the name of the class and a set of curly braces. Although PHP doesn't really care about spacing, the standard is to start the curly braces on the next line down. Although class names are NOT case sensitive, changing case within your program can get extremely confusing.

Let's go to the folder `classes` in your PHP's environment system and go to the file called `recipes.php`. Inside of it, we are declaring the class "Recipe".

```php
declare(strict_types=1);

class Recipe
{
}
```

The standard for naming classes is StudlyCaps, which means the first letter should be capitalized, as well as the first letter of any subsequent word, all other letters should be lower case. For example: in a class named _MyRecipe_.

## Instantiating an Object

After creating the class, a new object can be instantiated and stored in a variable using the “new” keyword:

```php
$recipe1 = new Recipe();
```

## Properties

Variables within a class are called **properties**.
The naming convention for properties is camelCase. For example, `$ingredients` or `$dryIngredients`.

We can create a property with or without default value or initializing it.

```php
class Recipe
{
	public $title;
	public $ingredients = array();
	public $instructions = array();
	public $yield;
	public $tags = array();
	public $source = "The crazy cooker";
}
```

For now, we we'll give access to our properties `public`. We'll talk about _access modifiers_ later.

### Object-Operators

Object-Operators allow us to access the properties and methods of a class. We reference the object name `$recipe1`, the object-operator `->`, and finally the property name `source`. The object-operator consists of the characters dash and greater than, which together make a single arrow (->).

```php
$recipe1 = new Recipe();
echo $recipe1->source;
```

_output: "The crazy cooker"_

_Note that the property name does not start with the $ sign; only the object name starts with a $, because this entire reference is one variable._

## Methods

Functions within a class are called **methods**.

### Referencing Objects

OOP allows objects to reference themselves using the keyword variable `$this`. When working within the scope of a method, use the keyword `$this` in the same way you would use the object name outside the class. The `$this` keyword indicates that we want to use the object’s own properties or methods, and allows us to have access to them within the class scope.

```php
public function displayRecipe()
{
	return $this->title . " by " . $this->source;
}

```

_Note: Just like accessing the property outside the class, only the keyword `$this` starts with the dollar sign, we don’t use the dollar sign again for the properties and methods. Together `$this`, with the property name, make up a single variable._

### Accessing Methods

To use the displayRecipe method, we call it just like a regular function. The only difference is that we first reference the object it belongs to, with the object-operator `->`, just like we did when accessing a property.

```php
echo $recipe1->displayRecipe();
```

---

[Next: Access modifiers](02-access-modifiers.md)
