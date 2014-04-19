---
layout: post
title: "Release v1.1.1.0"
date: 2014-04-19 17:13:36 +0200
comments: true
categories: 
---

[Elastica v1.1.1.0](https://github.com/ruflin/Elastica/tree/v1.1.1.0) ([download](https://github.com/ruflin/Elastica/releases/tag/v1.1.1.0)). This release is compatible with elasticsearch 1.1.1.

## Dependencies

| Project | Version | Required |
|---------|---------|----------|
|[Elasticsearch](https://github.com/elasticsearch/elasticsearch/tree/v1.1.1)| 1.1.1 | yes
|[Elasticsearch mapper attachments plugin](https://github.com/elasticsearch/elasticsearch-mapper-attachments/tree/v2.0.0.RC1)|2.0.0.RC1|no
|[Elasticsearch thrift transport plugin](https://github.com/elasticsearch/elasticsearch-transport-thrift/tree/v2.0.0.RC2)|2.0.0.RC2|no
|[Elasticsearch geocluster facet plugin](https://github.com/zenobase/geocluster-facet/tree/0.0.10)|0.0.10|no



## Release Notes (changes.txt)

- Update to elasticsearch 1.1.1 http://www.elasticsearch.org/downloads/1-1-1/
- Remove CustomFiltersScore and CustomScore query as removed in elasticsearch 1.1.0 https://github.com/elasticsearch/elasticsearch/pull/5076/files
- Update Node Info to use plugins instead of plugin (https://github.com/elasticsearch/elasticsearch/pull/5072)
- Fix mapping issue for aliases #588
- Only trap real JSON parse errors in Response class #586
- Added Cardinality aggregation #581
- Support for Terms filter lookup options #579
- Update to elasticsearch 1.1.0 http://www.elasticsearch.org/downloads/1-1-0/
- Fixed Query\Match Fuzziness parameter type #576
