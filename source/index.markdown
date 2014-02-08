---
layout: page
title: "Elastica"
description: "Elastica - PHP client for elasticsearch"
comments: true
sharing: true
footer: true
---
[![Latest Stable Version](https://poser.pugx.org/ruflin/Elastica/v/stable.png)](https://packagist.org/packages/ruflin/elastica)
[![Coverage Status](https://coveralls.io/repos/ruflin/Elastica/badge.png)](https://coveralls.io/r/ruflin/Elastica)
[![Dependency Status](https://www.versioneye.com/php/ruflin:Elastica/master/badge.png)](https://www.versioneye.com/php/ruflin:elastica/)
[![Total Downloads](https://poser.pugx.org/ruflin/Elastica/downloads.png)](https://packagist.org/packages/ruflin/elastica)


Elastica.io is the documentation for Elastica. [Elastica](http://github.com/ruflin/Elastica) is a PHP client for the [elasticsearch](http://elasticsearch.org) search engine/database. Elasticsearch is an Open Source (Apache 2), Distributed, RESTful, Search Engine built on top of Apache Lucene. Elastica itself is also open source and you can download or clone the source code on Github from [ruflin/Elastica](http://github.com/ruflin/Elastica).

These pages should give you an overview of how to use Elastica. You can find the complete [API here](api/index.html). Any contributions to the documentations are highly welcome. Elastica.io is based on [Octopress](http://octopress.org/) and is hosted on Github. Fork your copy from [ruflin/Elastica.io](https://github.com/ruflin/Elastica.io) and open a pull request.

* [Getting Started](/getting-started/)
* [Examples](/examples/)
* [How to Contribute](/contribute/)
* [Releases](/releases/)
* [Migrations](/migrations/)
* [References](/references/)


Versions
--------

The version numbers are consistent with elasticsearch. The version number 0.16.0.0 means it is the first release for elasticsearch version 0.16.0. The next release is called 0.16.0.1. As soon as the elasticsearch is updated and the client is updated, also the next version is called 0.16.1.0. Like this it should be always clear to which versions the Elastica client is compatible.

Compatibilitiy
--------------
Elastica is tested with PHP 5.3.3 and later. Versions prior and equal to v0.19.8.0 are compatible with PHP 5.2


File indexing
-------------

File upload is supported but the mapper attachement plugin has to be installed

```
./bin/plugin -install elasticsearch/elasticsearch-mapper-attachments/1.9.0
```

Credits
-------
Credits go to <a href="https://github.com/ruflin/Elastica/network/members">all users that gave feedback and committed code</a>.
