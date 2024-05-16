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

# Access Modifiers

[PHP Docs: Visibility](https://www.php.net/manual/en/language.oop5.visibility.php)

Access modifiers allows us to control the access, or visibility, of our properties and methods. When declaring a property, the visibility MUST be defined by an access modifier.

- **Public**: Publicly accessible from anywhere, even from outside the scope of the class.

- **Private**: Accessed within the class itself. It protects properties and methods from being accessed from outside the class.

- **Protected**: Same as private, except by allowing child (sub) classes to access protected parent (super) properties and methods.

For this moment all our methods and properties are public, that means that any object can access those properties and methods directly.

While this does work, it doesn't give us any control over how the data is stored or retrieved. Often, we may want to **sanitize** or format the data before it's stored in the object.

## Setters

For example, if we're setting the title of our recipe directly, we're at the mercy of whatever data is passed to our property. This data could contain anything, especially if we're accepting user input.

So instead of setting the property directly, we create another method called a **setter**, whose job it is to format the incoming data before setting the property.

So change the property `$title`'s access from `public` to `private`.

```php
private $title;

public function setTitle($title)
{
	$this->title = ucwords($title);
}
```

_the keyword `this` gives us access to the object's property, and the title, without the keyword `this` give us the passed argument_

Now we can do something with the title before actually setting the value. Here, we uppercase the first letter of the title with `ucwords()` function.

```php
$recipe1->setTitle("Boulets liégeois");
echo $recipe1->title;
```

_output: "... cannot access private property..."_

:cold_sweat: Oh no, but what's going on ?

## Getters

Setting the title property to `private` means that we **can't read** this title directly either.

We need to set up an other method called a `getter`.

**Getters and Setters work together to access private properties.**

```php
public function getTitle()
{
	return $this->title;
}

$recipe1->setTitle("Boulets liégeois");
echo $recipe1->getTitle();
```

_output: "Boulets liégeois"_ :tada:

## Private Methods

You can create private methods that can only be used by other methods within the class, but cannot be accessed directly by outside the class.

---

Next : [Associative arrays](./03-associative-arrays.md)
