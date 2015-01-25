---
layout: post
title: "Release v1.4.2.0"
date: 2015-01-25 14:11:25 +0100
comments: true
categories: 
---


[Elastica v1.4.2.0](https://github.com/ruflin/Elastica/tree/v1.4.2.0) ([download](https://github.com/ruflin/Elastica/releases/tag/v1.4.2.0)). This release is compatible with elasticsearch 1.4.2.

## Dependencies

| Project | Version | Required |
|---------|---------|----------|
|[Elasticsearch](https://github.com/elasticsearch/elasticsearch/tree/v1.4.2)| 1.4.2 | yes
|[Elasticsearch mapper attachments plugin](https://github.com/elasticsearch/elasticsearch-mapper-attachments/tree/v2.4.1)|2.4.1|no
|[Elasticsearch thrift transport plugin](https://github.com/elasticsearch/elasticsearch-transport-thrift/tree/v2.4.1)|2.4.1|no
|[Elasticsearch geocluster facet plugin](https://github.com/zenobase/geocluster-facet/tree/0.0.12)|0.0.12|no



## Release Notes (changes.txt)


- Added Elastica\Query\Regexp #757
- Update to elasticsearch 1.4.2 #378
- Remove support for PHP 5.3
- added @return annotation to top_hits aggregation DSL method #752
- Added Elastica\Aggregation\TopHits #718
- Vagrantfile updated #742
- Plugins updated to ES 1.3.4
- Since new version of thrift plugin is compatible with ES 1.3.4, plugin added back to test environment
- Added: Filter\Range::setExecution, Filter\Terms::setExecution, Filter\Missing::setExistence, Filter\Missing::setNullValue, Filter\HasChild::setMinumumChildrenCount, Filter\HasChild::Filter\HasChild::setMaximumChildrenCount, Filter\Indices::addIndex
- Filter\HasChild::setType, Filter\HasParent::setType now support Type instance as argument
- Filter\Indices::setIndices, Filter\Indices::addIndex now support Index instance as argument
- (BC break) Removed as added by mistake: Filter\HasChild::setScope, Filter\HasParent::setScope, Filter\Nested::setScoreMode, Filter\Bool::setBoost
- Additional Request Body Options for Percolator #737
- making sure id is urlencoded when using updateDocument #734
- Implement the `weight` in the function score query #735
- Changed setRealWorldErrorLikelihood to setRealWordErrorLikelihood #729
- allow to customize the key on a range aggregation #728
- Added fluent interface to Elastica\Query::setRescore #733
- Added transport to support egeloen/http-adapter #727
- add cache control parameters support to Elastica\Filter\Bool #725
- Avoid remove previously added params when adding a suggest to the query #726
- Added Elastica\QueryBuilder #724
- Update to elasticsearch 1.4.0
- Disable official support for PHP 5.3
- fixed reserved words in queries which composed of upper case letters (Util::replaceBooleanWords) #722
- Adding PSR-4 autoloading support #714
- Updated Type::getDocument() exception handling. \Elastica\Exception\ResponseException will be thrown instead of \Elastica\Exception\NotFoundException if the ES response contains any error (i.e: Missing index) (BC break) #687
- Added Util::convertDateTimeObject to Util class to easily convert \DateTime objects to required format #709
- Remove ResponseException catch in Type::getDocument() #704
- Fixed Response::isOk() to work better with bulk update api #702
- Adding magic __call() #700
- ResultSet creation moved to static ResultSet::create() method #690
- Accept an options array at Type::updateDocument() #686
- Improve exception handling in Type::getDocument() #693