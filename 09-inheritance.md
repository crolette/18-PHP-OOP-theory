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

## Inheritance

You'll not reinventing the wheel. 

Imagine that you want to create specific recipes for making cocktails. The cocktails generator should have all the properties & methods from the Recipe class & its own features. 

Inheritance can help you. It allows a class to reuse the code from another class without duplicating it.

### Parent & child

To define a class inherits from another class, you use the `extends` keyword.

For example: 

```php
class Cocktail extends Recipe
{
	
}
```

In this example, `Cocktail` is the child of the parent `Recipe`. `Cocktail` will inherit all properties & methods from its parent.

That's mean you can allways do this: 

```php
$piscosour = new Cocktail("Pisco Sour");
$piscosour->addIngredient("Pisco", 2, "ounce");
$piscosour->addIngredient("Lime juice", 1, "ounce");
$piscosour->addIngredient("Egg white", 1);
$piscosour->getIngredients();
```

You can also add specific properties or methods in this **subclass**. 

For example:

```php
class Cocktail extends Recipe
{
	private $alcoholPercentage;

	public function setAlcoholPercentage($alcoholPercentage) 
	{
		return $this->$alcoholpercentage= $alcoholPercentage;
	}
	
	public function getAlcoholPercentage()
	{
		return $this->$alcoholPercentage;
	}
}
```

In this case, `$alcoholpercentage` is a property from `Cocktail` subclass. This property is only available for the the instances of `Cocktail`, not form the parent class `Recipe`. 

## __construct()

If you want to add a property to the `__construct()` method, you have to re-use the reference constructor from the parent, like this : 

```php
public function __construct($title, $alcoholPercentage)
    {
        parent::__construct($title);
        $this->alcoholPercentage = $alcoholPercentage;
    }
```

---

Next: [Conclusion](./10-conclusion.md)
