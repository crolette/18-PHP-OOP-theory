# Menu

- [Intro](./README.md)

* [Cookbook : Classes & objects](./01-classes.md)
* [Cookbook : Access Modifiers](./02-access-modifiers.md)
* [Cookbook : Associative arrays](./03-associative-arrays.md)
* [Cookbook : Adding Getters & setters](./04-adding-getters-setters.md)
* [Cookbook : Static Methods](./05-static-methods.md)
* [Cookbook : Magic Methods](./06-magic-methods.md)
* [Cookbook : Magic Constants](./07-magic-constants.md)
* [Cookbook : Collection](./08-creating-collection.md)
* [Cookbook : Inheritance](./09-inheritance.md)
* [Conclusion](./10-conclusion.md)

---

# Magic Methods

[Documentation : Magic Methods](https://www.php.net/manual/en/language.oop5.magic.php)

Object Oriented PHP offers several "magic methods". **The "magic" comes from the fact that they are triggered by an action instead of called directly.**

All magic methods start with a double underscore.

## `__construct()` method

We will add a construct method to the Recipe class because we want to set the title at the same time as we create an object.

```php
public function __construct($title)
{
	$this->setTitle($title);
}
```

Now, you can give a title to your object directly at the creation

```php
$recipe1 = new Recipe("Pasta bolognese");
```

## `__toString()` method

We would like to know simply which recipe we have in our cookbook by a simple `echo recipe1`.

**The `__toString()` method allow to specify to convert to a string.**

```php
public function __toString()
{
	return $this->getTitle();
}
```

## others methods

I let you discover the others magic methods in the documentation in order to improve your Recipe class.

---

Next: [Magic Constants](./07-magic-constants.md)
