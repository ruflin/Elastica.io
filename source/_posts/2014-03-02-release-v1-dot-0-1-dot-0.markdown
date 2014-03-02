---
layout: post
title: "Release v1.0.1.0"
date: 2014-03-02 12:12:34 +0100
comments: true
categories: 
---


Elastica v1.0.1.0 [download](https://github.com/ruflin/Elastica/tree/v1.0.1.0). This release is compatible with elasticsearch 1.0.1.

## Dependencies

| Project | Version | Required |
|---------|---------|----------|
|[Elasticsearch](https://github.com/elasticsearch/elasticsearch/tree/v1.0.1)|1.0.1|yes|
|[Elasticsearch mapper attachments plugin](https://github.com/elasticsearch/elasticsearch-mapper-attachments/tree/v2.0.0.RC1)|2.0.0.RC1|no|
|[Elasticsearch thrift transport plugin](https://github.com/elasticsearch/elasticsearch-transport-thrift/tree/v2.0.0.RC2)|2.0.0.RC2|no|
|[Elasticsearch geocluster facet plugin](https://github.com/zenobase/geocluster-facet/tree/0.0.10)|0.0.10|no|



## Release Notes (changes.txt)


* Issue #554: Fixed Type->deleteByQuery() not working with Query objects
* Update to elasticsearch 1.0.1. Update Thrift and Geocluster plugin.
* Issue #559: add JSON_UNESCAPED_UNICODE and JSON_UNESCAPED_SLASHES options in Elastica/Transport/Http, Elastica/Bulk/Action
* Issue #558: fixed unregister percolator (still used _percolator instead of .percolator). removed duplicate slash from register percolator route.
* Throw PartialShardFailureException if response has failed shards
* Issue #555: Elastica/Aggregations/GlobalAggragation not allowed as sub aggragation
* Add methods setSize, setShardSize to Elastica/Aggregation/Terms
* Elastica/Aggregation/GlobalAggregationTest fixed bug where JSON returned [] instead of {}
* Elastica/ResultSet added method hasAggregations
* Moved from Apache License to MIT license