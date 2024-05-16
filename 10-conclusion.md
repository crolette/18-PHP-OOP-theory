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
- [Conclusion](./09-conclusion.md)

---

## Conclusion 

You have learned the main concepts of OOP. 

Know OOP is nice, implemented this principle in a real project is _super nice_. 

Build a project requires organisation & OOP can help you.

When you build a project you should split it into different files with a clear responsibility for each. 

For example, separate the visual with the connexion to the DB. Make your request to the DB in a specific part. Build your logics in an other files. 

For the next step, we propose you to learn about an architectural pattern called **MVC** => Model-View-Controller. 
The MVC pattern use all the power of OOP, for build organised, robust & safe applications. 

- **Models** are classes that contain data. They usually correspond to a table from your database.
- **Views** are files that will mostly contain HTML. Any user facing end result will be made here.
- **Controllers** are classes responsible to control the handling of a request: they will load the right models and provide them to the correct view.

![MVC architecture](mvc.jpg)

For helping your to learn the MVC architecture, you can follow this course : [Adoptez une architecture MVC en PHP
](https://openclassrooms.com/fr/courses/4670706-adoptez-une-architecture-mvc-en-php)

