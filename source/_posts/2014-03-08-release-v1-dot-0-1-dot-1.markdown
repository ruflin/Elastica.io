---
layout: post
title: "Release v1.0.1.1"
date: 2014-03-08 13:06:47 +0100
comments: true
categories: 
---
[Elastica v1.0.1.1](https://github.com/ruflin/Elastica/tree/v1.0.1.1) ([download](https://github.com/ruflin/Elastica/releases/tag/v1.0.1.1)). This release is compatible with elasticsearch 1.0.1.

## Dependencies

| Project | Version | Required |
|---------|---------|----------|
|[Elasticsearch](https://github.com/elasticsearch/elasticsearch/tree/v1.0.1)| 1.0.1 | yes
|[Elasticsearch mapper attachments plugin](https://github.com/elasticsearch/elasticsearch-mapper-attachments/tree/v2.0.0.RC1)|2.0.0.RC1|no
|[Elasticsearch thrift transport plugin](https://github.com/elasticsearch/elasticsearch-transport-thrift/tree/v2.0.0.RC2)|2.0.0.RC2|no
|[Elasticsearch geocluster facet plugin](https://github.com/zenobase/geocluster-facet/tree/0.0.10)|0.0.10|no



## Release Notes (changes.txt)


- Issue #566: Add snapshot / restore functionality (Elastica\Snapshot) 
- Issue #563: Improve performance of Elastica/Status->getIndicesWithAlias and aliasExists on clusters with many indices- Enable goecluster-facet again as now compatible with elasticsearch 1.0 on travis
- Changes for Travis 
  - Add PHP 5.6 to travis test environment
  - Run elasticsearch in the background to not have log output in travis build
  - Set memache php version as environment variable
  - Update to memcache 3.0.8 for travis