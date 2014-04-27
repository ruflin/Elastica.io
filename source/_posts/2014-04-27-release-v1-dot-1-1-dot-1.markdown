---
layout: post
title: "Release v1.1.1.1"
date: 2014-04-27 19:35:03 +0200
comments: true
categories: 
---

[Elastica v1.1.1.1](https://github.com/ruflin/Elastica/tree/v1.1.1.1) ([download](https://github.com/ruflin/Elastica/releases/tag/v1.1.1.1)). This release is compatible with elasticsearch 1.1.1.

## Dependencies

| Project | Version | Required |
|---------|---------|----------|
|[Elasticsearch](https://github.com/elasticsearch/elasticsearch/tree/v1.1.1)| 1.1.1 | yes
|[Elasticsearch mapper attachments plugin](https://github.com/elasticsearch/elasticsearch-mapper-attachments/tree/v2.0.0.RC1)|2.0.0.RC1|no
|[Elasticsearch thrift transport plugin](https://github.com/elasticsearch/elasticsearch-transport-thrift/tree/v2.0.0.RC2)|2.0.0.RC2|no
|[Elasticsearch geocluster facet plugin](https://github.com/zenobase/geocluster-facet/tree/0.0.10)|0.0.10|no



## Release Notes (changes.txt)


- Fix missing use in TermsStats->setOrder() #597
- Replace all instances of ElasticSearch with Elasticsearch #597
- Fixing the Bool filter with Bool filter children bug #594
- Remove useless echo in the Memcache Transport object #595
- escape \ by \\ #592
- Handling of HasChild type parsing bug #585
- Consolidate Index getMapping tests #591
- Fix Type::getMapping when using an aliased index #588