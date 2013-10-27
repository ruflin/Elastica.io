---
layout: post
title: "Release v0.90.5.0"
date: 2013-10-27 13:56
comments: true
categories: 
---

Elastica v0.90.5.0 [download](https://github.com/ruflin/Elastica/tree/v0.90.5.0). This release is compatible with elasticsearch 0.90.5



## Release Notes (changes.txt)

* Update to elasticsearch [0.90.5](http://www.elasticsearch.org/downloads/0-90-5/)
* Fix \Elastica\Filter\HasParent usage of \Elastica\Query as to not collide with \Elastica\Filter\Query, bring \Elasitca\Filter\HasChild into line
* Also pass the current client object to the failure callback in \Elastica\Client.
* Update to geocluster-facet 0.0.8
* Add support for term suggest API. See http://www.elasticsearch.org/guide/reference/api/search/term-suggest/
* Fix \Elastica\Filter\HasChild usage of \Elastica\Query as to not collide with \Elastica\Filter\Query namespace
* Update to elasticsearch 0.90.4
* Add support for function_score query
* Skip geocluster-facet test if the plugin is not installed
* Correct \Elastica\Test\ClientTest to catch the proper exception type on connection failure
* Fix unit test errors
* Nested filter supports now the setFilter method
* Support isset() calls on Result objects
* Add \ArrayAccess on the ResultSet object
* Update to elasticsearch 0.90.3
