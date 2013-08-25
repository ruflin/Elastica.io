---
layout: post
title: "Release v0.90.2.0"
date: 2013-08-25 10:47
comments: true
categories: 
---
This release is compatible with [elasticsearch 0.90.2](http://www.elasticsearch.org/downloads/0-90-2/). The only BC break in this release is that now Scripts is a frist class citizens in upsert. The migration guide can be found [here](/migration/0.90.2/upsert.html).


[Download](https://github.com/ruflin/Elastica/tree/v0.90.2.0)

## Release Notes (changes.txt)
* Support for "proxy" param for http connections
* Add support for fields parameter in Elastica_Type::getDocument()
* Add a getQuery method on the FilteredQuery object
* Second param to \Elastica\Search.php:count($query = '', $fullResult = false) added. If second param is set to true, full ResultSet is returned including facets.
* Plugin geocluster-facet support added
* Add Query\Common
* Can now create a query by passing an array to Type::search()
* Add Filter\GeohashCell
* Revamped upsert so that Scripts are now first class citizens. (BC break)
See http://elastica.io/migration/0.90.2/upsert.html
* Implemented doc_as_upsert.
* Update to elasticsearch 0.90.2
* Enabled ES_WAIT_ON_MAPPING_CHANGE for travis builds
* Added upsert support when updating a document with a partial document or a script.
* Add filtered queries to the percolator API.
* Correct class name for TermTest unit test
* Implement terms lookup feature for terms filter
* Fix support for making scroll queries once the scroll has been started.