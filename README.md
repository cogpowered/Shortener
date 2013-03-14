Shortener
=========

Currently this is a port of [jakoubek/php-recordlocator](https://github.com/jakoubek/php-recordlocator). 

It has been tidied up, namespaced and proper [Composer](http://getcomposer.org/) support added.

Usage
-----

```php
$shortener = new cogpowered\Shortener\Shortener;
echo $shortener->encode(81906);
echo $shortener->decode('4IZL');
```
