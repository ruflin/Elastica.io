---
layout: page
title: "Coding Guideliens"
comments: true
sharing: true
footer: true
---

Help is very welcomed, but code contributions must be done in respect of [PSR-2](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md).

## Automatic fixer — PHP-CS-Fixer
https://github.com/fabpot/PHP-CS-Fixer
```bash
php-cs-fixer fix --level=all /path/to/project`
```
`--level=all` is used even though it is not part of a standard simply because we like the code to be consistent.

To validate new code added to Elastica run the following command in the top directory. It will show you if your code follows the coding guidelines.

## Validator — PHP_CodeSniffer
http://pear.php.net/package/PHP_CodeSniffer
```bash
phpcs --standard=PSR2 lib
```

## Namespaces
* Since [#300](https://github.com/ruflin/Elastica/pull/300), all classes MUST be defined using namespaces.
* When using classes outside the namespace, you MUST use the `use` statement.
* When referencing classes not in a namespace like `stdClass` or `Exception`, you MUST NOT use a `use` statement, simply add a backslash: `\stdClass`.
* When class names are used in strings, they MUST be fully qualified, but SHOULD not use a leading backslash. Example: `$this->assertInstanceOf('Elastica\Connection', $connection);`
* When documenting, classes MUST be fully qualified with a leading backslash. See [#301](https://github.com/ruflin/Elastica/issues/301).