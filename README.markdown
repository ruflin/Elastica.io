xBoilerplate
==================================

xBoilerplate was built to kickstart the development of small dynamic webpages. It can also be used to design
websites or web applications directly in CSS3. xBoilerplate is inspired by [HTML5 Boilerplate](http://html5boilerplate.com/)
and lots of code is copied from HTML5 Boilerplate. The main difference is that xBoilerplate allows dynamic pages
with PHP and includes dynamic libraries like lessphp.

The goal of xBoilerplate is to be simple and to keep it simple. Even though it could be enhanced with more objects
and functionality, this is not the goal. It should offer a simple solution to start with a dynamic project.


Getting Started
---------------
To get you started as fast as possible, xBoilerplate uses Vagrant so be sure to
[install vagrant](http://vagrantup.com/docs/getting-started/index.html) first. Having done that, there are two ways forward:

1) Composer (recommended)

[Composer](http://getcomposer.org/doc/00-intro.md) is a dependency management tool for PHP, and xBoilerplate is a
Composed package. Download [composer.phar](http://getcomposer.org/composer.phar) and put it into the directory that
will be the root of your project. Then create a file called composer.json and insert the following:

{
    "name": "COMPANY/APPLICATION",
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/centralway/xBoilerplate"
        }
    ],
    "require": {
        "centralway/xBoilerplate": ">=1.2"
    }
}

Within the directory you created, run the following command to cause Composer to obtain the dependencies (xBoilerplate):

php composer.phar install

Next, run the auto-deploy script that will create a skeleton xBoilerplate application:

php vendor/centralway/xBoilerplate/deploy.php

2) Direct check-out (not recommended)

You can, if you wish, simply download the xBoilerplate zip file and run vagrant from within there, however you will not
benefit from having dependency management built-in.


Documentation
-------------
xBoilerplate allows a maximum navigation level is 2. All urls are in the form `/category/page`. All content for the
pages is stored in `httpdocs/page`. The default category and page is index, so if you access `/`, the file
`httpdocs/page/index/index.php` is opened. If you call the url `/contact`, the file `httpdocs/page/contact.php`
is opened. For the page `/about/team`, it's `httpdocs/page/about/team.php`.

The basic template around every page is in `httpdocs/layout/template.php`. This file loads the default `header.php` and
`footer.php` which already has the basic content needed. To create your own template, overwrite the code in template.php
but keep the loadLayout for header and footer and the loadPage command.



Changes
-------
For changes in the API please check the file [changes.txt](https://github.com/ruflin/xBoilerplate/blob/master/changes.txt)
