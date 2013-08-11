---
layout: page
title: "FAQ"
comments: true
sharing: true
footer: true
---
You will find here frequently asked questions, and their answers. Please do not hesitate to contribute to this page.

##Call to undefined function curl_init()

If you get this error, then cURL is not installed properly. To make sure that cURL is correctly up and running, please follow these steps:

 * remove ';' from ```extension=php_curl.dll``` in ```php.ini```
 * make sure that the following lines exist and are properly configured in your php.ini file
  ```; Directory in which the loadable extensions (modules) reside.
  extension_dir = *some value*```
 * if this line does not exist in your php.ini, add it
 * make sure cURL is properly installed. You should have a cURL file in your PHP extensions folder.
    * For Windows users on Wamp, that will be ```\Your folder\wamp\bin\php\php.(your PHP version number)\ext ;``` and the file will be called ```php_curl.dll```
    * Linux users should know how to install an extension. Here is an example for Ubuntu:
        ```sudo apt-get install curl libcurl3 libcurl3-dev php5-curl```
        After installing libcurl you should restart the web server with one of the following commands,
        ```sudo /etc/init.d/apache2 restart OR sudo service apache2 restart```
        (taken from StackOverflow)
 * run ```phpinfo()``` and check if cURL is enabled (you should have a cURL section)
 * if you still have some problems on Windows, try this:
   * download a fixed version of cURL corresponding to your PHP version and replace it in the \ext folder
    http://www.anindya.com/php-5-4-3-and-php-5-3-13-x64-64-bit-for-windows/

Make sure to restart your server each time you modify something in its configuration.
