# AboutYou Recruiting Coding Task
This is a test project within our technical recruiting process.

Please provide as discussed the following coding task in 7 calendar days.
In doubt of technical issues you can send an email with your questions.

## Preconditions

### Technical
You need at least:

* PHP 5.6 or higher
* A text editor (vim, nano, sublime text, atom, notepad++) or IDE (PHPStorm, Eclipse PDT, Netbeans) of your choice
* Some kind of shell, if you want to write unit tests.
* Composer for class autoloading and running tests.

### Knowledge
You will be tested within the following areas of PHP development:

* Basic understanding of PHP's OOP implementation, including interfaces and design patterns.
* Namespaces, Closures/Anonymous functions
* Reading resources from a local file system location
* Coping with JSON as data format

## Goals
With this code you will receive a number of tasks to solve. Each task should
not take more then 30 minutes pure working time.

Be aware that the code intentionally contains some design mistakes.
You are allowed to refactor it in any way you want.

### Goal 1. Implement a basic CategoryService

Implement the interface for the Category Service.
The entities encapsulate each other:

(Product) -[hasMany]-> (Variant) -[hasOne]-> (Price)

The JSON file has a similar but not equal structure. Please take a deep look at both structures.

#### Acceptance Criteria

* Use the JSON file in the data directory as your data source.
* Your implementation must read the result set from the data source
  and pass the values from the json file into the corresponding
  classes from the Entity namespace.

### Goal 2. Build a basic validator for the Variant Entity

Your tasks is to build a validation mechanism for the Variant Entity's
properties. It is up to you how you implement it and when to call it within the application's flow.

#### Acceptance Criteria

* Place the validation class in a proper position within the given architecture.
* Ensure the values are valid.

### Goal 3. Implement a way to get different implementations of the ProductServiceInterface

#### Acceptance Criteria

* Use simple factory, abstract factory or dependency injection pattern.
* Optional: Write a second implementation for ProductServiceInterface
  (PriceOrderedProductService or SizeOrderedProductService)
