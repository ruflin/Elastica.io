---
layout: post
title: "Release v1.0.0.0"
date: 2014-02-12 20:13:31 +0100
comments: true
categories: 
---



Elastica v1.0.0.0 [download](https://github.com/ruflin/Elastica/tree/v1.0.0.0). This release is compatible with elasticsearch 1.0.0. There is a larger list of breaking changes in this release on the elasticsearch site. This will mean you have to adapt some code in your app but perhaps also on the configuration of elasticsearch. All changes can be found here: http://www.elasticsearch.org/guide/en/elasticsearch/reference/1.x/breaking-changes.html


## Dependencies

| Project | Version | Required |
|---------|---------|----------|
|[Elasticsearch](https://github.com/elasticsearch/elasticsearch/tree/v1.0.0)|1.0.0|yes|
|[Elasticsearch mapper attachments plugin](https://github.com/elasticsearch/elasticsearch-mapper-attachments/tree/v2.0.0.RC1)|2.0.0.RC1|no|
|[Elasticsearch thrift transport plugin](https://github.com/elasticsearch/elasticsearch-transport-thrift/tree/v2.0.0.RC1)|2.0.0.RC1|no|
|[Elasticsearch geocluster facet plugin](https://github.com/zenobase/geocluster-facet/tree/0.0.9)|0.0.9|no|



## Release Notes (changes.txt)


* Updated to elasticsearch 1.0: http://www.elasticsearch.org/blog/1-0-0-released/
* Add aggregations
* Setting shard timeout doesn't work #547
* Remove Elastica\Query\Field and Elastica\Query\Text, which are not supported in ES 1.0.0.RC1
* Minor tweaking of request and result handling classes to adjust for changes in ES 1.0.0.RC1
* Update mapper-attachments plugin to version 2.0.0.RC1 in .travis.yml
* Adjust tests to account for changes in ES 1.0.0.RC1
* Prevent the geocluster-facet plugin from being installed in test/bin/run_elasticsearch.sh as the plugin has not yet been updated for ES 1.0.0.RC1
* Added Elastica\Query\DisMax
