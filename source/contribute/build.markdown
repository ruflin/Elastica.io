---
layout: page
title: "Build Elastica Project"
comments: true
sharing: true
footer: true
---

To build the complete project (running tests, creating documentation and other metrics) just run ant inside the top directory:
```sh
ant
```

# gource
To run the gource visualization, first the [gource](http://code.google.com/p/gource/) package has to be installed. Then the following command can be run inside the Elastica project directory:
```sh
ant gource
```

After a few seconds, the visualization should start.


To build the complete project (running tests, creating documentation and other metrics) just run ant inside the top directory:
```sh
ant
```

## gource
To run the gource visualization, first the [gource](http://code.google.com/p/gource/) package has to be installed. Then the following command can be run inside the Elastica project directory:
```sh
ant gource
```

After a few seconds, the visualization should start.


To run the tests, all you need is PHPUnit and the newest version of elasticsearch. More details on installing PHPUnit you can find here: [[http://www.phpunit.de/manual/3.5/en/index.html]]

Be sure to get all PHPUnit dependencies installed:

```sh
sudo pear install --alldeps --force phpunit/phpunit
```

If you have ant installed, you can also run `sudo ant setup` inside the Elastica folder. This installs all necessary libraries like phpunit and codesniffer.

To run the tests, you have to have running one or multiple instances of elasticsearch.

To run the test you have two options:
```sh
cd test
phpunit
```
or
```sh
ant phpunit
```

To run the codesniffer you can use the command `ant codesniffer`. This will show you more details on where your code does not follow the coding guidelines.

To successfully pass all tests the attachment plugin has to be installed. To install the plugin run the follwing command inside your elasticsearch folder:
```sh
./bin/plugin install mapper-attachments
```

I hope that in feature versions of elasticsearch a check for the plugin can be implemented to just skip the test if the plugin is not installed.


# Build Documentation
To create the documentation without running all the tests and so on run the following in the project folder:
```sh
phpdoc
```