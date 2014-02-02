---
layout: post
title: "Release v0.90.10.0"
date: 2014-02-02 09:50
comments: true
categories: 
---

Elastica v0.90.10.0 [download](https://github.com/ruflin/Elastica/tree/v0.90.10.0). This release is compatible with elasticsearch 0.90.10

## Dependencies

| Project | Version | Required |
|---------|---------|----------|
|[Elasticsearch](https://github.com/elasticsearch/elasticsearch/tree/v0.90.10)|0.90.10|yes|
|[Elasticsearch mapper attachments plugin](https://github.com/elasticsearch/elasticsearch-mapper-attachments/tree/v1.9.0)|1.9.0|no|
|[Elasticsearch thrift transport plugin](https://github.com/elasticsearch/elasticsearch-transport-thrift/tree/v1.7.0)|1.7.0|no|
|[Elasticsearch geocluster facet plugin](https://github.com/zenobase/geocluster-facet/tree/0.0.9)|0.0.9|no|


## Release Notes (changes.txt)

* Updates for release v0.90.10.0
* Fix _bulk delete proxy methods if type or index not explicitly defined.
* Add _bulk delete proxy methods to Index and Type for consistency.
* Use the HTTP response code of GET requests (getDocument), instead of extists/found json property.
* Add getParam & getProperties methods to Elastica\Type\Mapping
* Code coverage generation for coveralls.io added: https://coveralls.io/r/ruflin/Elastica
* Add support for shard timeout to the Bulk api.
* Fix typo in constant name: Elastica\Query\FunctionScore::DECAY_GUASS becomes DECAY_GAUSS
* Add support for _bulk update
* added \Elastica\Exception\ResponseException::getElasticsearchException()
* Changed logger default log level to debug from info
* Update to elasticsearch 0.90.10
* Add Elastica\Facet\TermsStats::setOrder()
* Adding analyze function to Index to expose the _analyze API
* Document::setDocAsUpsert() now returns the Document
* Update to Elasticsearch 0.90.8
* Add support for simple_query_string query
* Add support for filter inside HasChild filter
* Add support for filter inside HasParent filter
* Always send scroll_id via HTTP body instead of as a query param
* Fix the manner in which suggestion results are returned in \Elastica\ResultSet and adjust associated tests to account for the fix.
* Add \Elastica\Resultset::hasSuggests()
* Pass arguments to optimize as query
* Add refreshAll on Client
* Added Result::hasFields() and Result::hasParam() methods for consistency with Document
* Escape slash in Util::escapeTerm, as it is used for regexp from Elastic 0.90
* Add *.iml to .gitignore
* Refactor suggest implementation (\Elastica\Suggest, \Elastica\Suggest\AbstractSuggest, and \Elastica\Suggest\Term) to more closely resemble query implementation. (BC break)
* \Elastica\Search::addSuggest() has been renamed to \Elastica\Search::setSuggest()
* \Elastica\Query::addSuggest() has been renamed to \Elastica\Query::setSuggest()
* Add \Elastica\Suggest\Phrase, \Elastica\Suggest\CandidateGenerator\AbstractCandidateGenerator, and \Elastica\Suggest\CandidateGenerator\DirectGenerator
* (see http://www.elasticsearch.org/guide/en/elasticsearch/reference/current/search-suggesters-phrase.html)
* Remove boost from FunctionScore::addFunction because this is not supported by elasticsearch
* Issue #491 resolved
* Issue #501 resolved
* satooshi/php-coveralls package added for coverall.io
* Multiple badges for downloads and latest stable release added
* Remove facets param from query if is empty array
* Add size param to API for TermsStats