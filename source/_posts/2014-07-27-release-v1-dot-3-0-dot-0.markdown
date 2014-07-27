---
layout: post
title: "Release v1.3.0.0"
date: 2014-07-27 15:39:20 +0200
comments: true
categories: 
---



[Elastica v1.3.0.0](https://github.com/ruflin/Elastica/tree/v1.3.0.0) ([download](https://github.com/ruflin/Elastica/releases/tag/v1.3.0.0)). This release is compatible with elasticsearch 1.3.0.

## Dependencies

| Project | Version | Required |
|---------|---------|----------|
|[Elasticsearch](https://github.com/elasticsearch/elasticsearch/tree/v1.3.0)| 1.3.0 | yes
|[Elasticsearch mapper attachments plugin](https://github.com/elasticsearch/elasticsearch-mapper-attachments/tree/v2.0.0.RC1)|2.0.0.RC1|no
|[Elasticsearch thrift transport plugin](https://github.com/elasticsearch/elasticsearch-transport-thrift/tree/v2.0.0.RC2)|2.0.0.RC2|no
|[Elasticsearch geocluster facet plugin](https://github.com/zenobase/geocluster-facet/tree/0.0.10)|0.0.10|no



## Release Notes (changes.txt)


* Update to elasticsearch version 1.3.0 http://www.elasticsearch.org/downloads/1-3-0/
* Add setQuery() method to Elastica\Query\ConstantScore #653
* Be able to configure ES host/port via ENV var in test env #652
* Fix FunstionScore Query random_score without seed bug. #647
* Add setPostFilter method to Elastica\Query (http://www.elasticsearch.org/guide/en/elasticsearch/guide/current/_filtering_queries_and_aggregations.html#_post_filter) #645
* Add Reverse Nested aggregation (http://www.elasticsearch.org/guide/en/elasticsearch/reference/current/search-aggregations-bucket-reverse-nested-aggregation.html). #642