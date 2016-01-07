---
layout: page
title: "Elastica"
description: "Elastica - PHP client for elasticsearch"
comments: true
sharing: true
footer: true
---
[![Latest Stable Version](https://poser.pugx.org/ruflin/Elastica/v/stable.png)](https://packagist.org/packages/ruflin/elastica)
[![codecov.io](http://codecov.io/github/ruflin/Elastica/coverage.svg?branch=master)](http://codecov.io/github/ruflin/Elastica?branch=master)
[![Total Downloads](https://poser.pugx.org/ruflin/Elastica/downloads.png)](https://packagist.org/packages/ruflin/elastica)
[![Join the chat at https://gitter.im/ruflin/Elastica](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/ruflin/Elastica?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)



Elastica.io is the documentation for [Elastica](http://github.com/ruflin/Elastica), a PHP client for [elasticsearch](http://elasticsearch.org). Elastica is open source and you can download or clone the source code on Github from [ruflin/Elastica](http://github.com/ruflin/Elastica).

These pages gives an overview of how to use Elastica. You can find the complete [API here](/api/index.html). Any contributions to the documentations are highly welcome. Elastica.io is based on [Octopress](http://octopress.org/) and is hosted on Github. Fork your copy from [ruflin/Elastica.io](https://github.com/ruflin/Elastica.io) and open a pull request.

* [Getting Started](/getting-started/)
* [Examples](/examples/)
* [How to Contribute](/contribute/)
* [Releases](/releases/)
* [Migrations](/migrations/)
* [References](/references/)
* [Elastica vs elasticsearch-php](/elastica-vs-elasticsearch-php)

Compatibility
--------------
Elastica is tested with PHP 5.4 and later. Most functionality still works with PHP 5.3 but future support is not guaranteed. It Versions prior and equal to v0.19.8.0 are compatible with PHP 5.2


File indexing
-------------

File upload is supported but the mapper attachement plugin has to be installed

```
./bin/plugin -install elasticsearch/elasticsearch-mapper-attachments/1.9.0
```

Credits
-------
Credits go to <a href="https://github.com/ruflin/Elastica/network/members">all users that gave feedback and committed code</a>.
