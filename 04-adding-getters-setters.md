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

# Adding Getters & Setters

Do you have to add getters and setters for all the properties?

What if you don't care about doing anything with the property before it gets set?

Can't we just leave those properties public?

You could.

However, there are two big reasons why that's probably not the best option.

First of all, **consistency** :

Since some of our properties are accessed through getters and setters, it's a good idea to access all properties the same way.

Second :

just because there isn't anything we want to do with the incoming data right now, that doesn't mean there won't be something we want to do in the future.

By setting up the getters and setters now, if we want to do something with that incoming data in the future, we won't have to change the way we interact with the object.

Let's get started.

Back in our recipe class, we'll start by changing the visibility of the rest of the properties from public to private.

```php
private $title;
private $ingredients = array();
private $instructions = array();
private $yield;
private $tags = array();
private $source = "The crazy cooker";
private $measurements = [
	"liter",
	"g",
	"kg",
	"cup",
	"soup spoon",
	"coffee spoon",
    "ounce"
];

...

public function getIngredients()
{
    return $this->ingredients;
}

public function addInstruction($string)
{
    $this->instructions[] = $string;
}

public function getInstructions()
{
    return $this->instructions;
}

public function addTag($tag)
{
    $this->tags[] = strtolower($tag);
}

public function getTags()
{
    return $this->tags;
}

public function setYield($yield)
{
    $this->yield = $yield;
}

public function getYield()
{
    return $this->yield;
}

public function setSource($source)
{
    $this->source = ucwords($source);
}

public function getSource()
{
    return $this->source;
}
```

_previously, we had already add the addIgredient method_

You note when you want to set value to an array, you use `add` instead of `set` (`addIngredient`, `addInstruction` ... )

## Why Getters and Setters

Some of these are concepts we won't be covering in this course, but here are a few ides:

- Controlling the of behavior associated with getting or setting the property - this allows additional functionality (like validation) to be added more easily later.

- Hiding the internal representation of the property while exposing a property using an alternative representation.

- Allowing the getter/setter to be passed around as lambda expressions rather than values.

- Getters and setters can allow different access levels - for example the get may be public, but the set could be protected.

- Insulating your public interface from change - allowing the public interface to remain constant while the implementation changes without affecting existing consumers.

- Providing a debugging interception point for when a property changes at runtime.

- Improved interoperability with libraries that are designed to operate against property getter/setters - Mocking, Serialization, etc.

- Allowing inheritors to change the semantics of how the property behaves and is exposed by overriding the getter/setter methods.

---

Next: [Static Methods](./05-static-methods.md)
