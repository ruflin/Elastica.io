---
layout: post
title: "Release v0.90.7.0"
date: 2013-11-23 22:37
comments: true
categories: 
---


Elastica v0.90.7.0 [download](https://github.com/ruflin/Elastica/tree/v0.90.7.0). This release is compatible with elasticsearch 0.90.7

## Dependencies

| Project | Version | Required |
|---------|---------|----------|
|[Elasticsearch](https://github.com/elasticsearch/elasticsearch/tree/v0.90.7)|0.90.7|yes
|[Elasticsearch mapper attachments plugin](https://github.com/elasticsearch/elasticsearch-mapper-attachments/tree/v1.9.0)|1.9.0|no
|[Elasticsearch thrift transport plugin](https://github.com/elasticsearch/elasticsearch-transport-thrift/tree/v1.4.0)|1.4.0|no
|[Elasticsearch geocluster facet plugin](https://github.com/zenobase/geocluster-facet/tree/0.0.9)|0.0.9|no


## Release Notes (changes.txt)

* Updated geocluster-facet to 0.0.9
* Added \Elastica\Filter\Regexp
* Remove wrong documentation for "no limit" #496
* Update to elasticsearch 0.90.7
* Issue #490: Set Elastica\Query\FunctionScore::DECAY_EXPONENTIAL to "exp" instead of "exponential"
* Elastica_Type::exists() added. See http://www.elasticsearch.org/guide/en/elasticsearch/reference/current/indices-types-exists.html#indices-types-exists
* Adapted possible values (not only in) for minimum_should_match param based on elasticsearch documetnation  http://www.elasticsearch.org/guide/en/elasticsearch/reference/current/query-dsl-minimum-should-match.html