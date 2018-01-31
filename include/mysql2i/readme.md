## The problem

PHP has deprecated the mysql extension which will be removed in PHP 7. Even though it was recommended to use the improved extension, mysqli, many developers continued to use mysql.

## The effect

Once PHP 7 is released in mid November of this year, 2015, many hosted servers will upgrade and scripts still relying on the old mysql extension will fail.

There are lot of web sites using legacy packages that are no longer supported by the developer and not all developers have had time to update their current packages to the improved mysqli extension.

## The solution

The PHP mysql to mysqli package was developed to be the stop gap to keep everything working smoothly.

It can be placed in any PHP script, at anytime, and when the mysql extension disappears, it will take over. It works by defining functions using the old mysql function names and passing the arguments to the class methods that will use the improved mysqli extension.