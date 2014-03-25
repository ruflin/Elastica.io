---
layout: post
title: "Release v1.0.1.2"
date: 2014-03-25 20:37:06 +0100
comments: true
categories: 
---

[Elastica v1.0.1.2](https://github.com/ruflin/Elastica/tree/v1.0.1.2) ([download](https://github.com/ruflin/Elastica/releases/tag/v1.0.1.2)). This release is compatible with elasticsearch 1.0.1.

## Dependencies

| Project | Version | Required |
|---------|---------|----------|
|[Elasticsearch](https://github.com/elasticsearch/elasticsearch/tree/v1.0.1)| 1.0.1 | yes
|[Elasticsearch mapper attachments plugin](https://github.com/elasticsearch/elasticsearch-mapper-attachments/tree/v2.0.0.RC1)|2.0.0.RC1|no
|[Elasticsearch thrift transport plugin](https://github.com/elasticsearch/elasticsearch-transport-thrift/tree/v2.0.0.RC2)|2.0.0.RC2|no
|[Elasticsearch geocluster facet plugin](https://github.com/zenobase/geocluster-facet/tree/0.0.10)|0.0.10|no



## Release Notes (changes.txt)

- Added Filter\Indices #574
- Allow json string as data srouce for Bulk\Action on update #575
- Allow for request params in delete by query calls #573
- Added filters: AbstractGeoShape, GeoShapePreIndexed, GeoShapeProvided #568
- Percolate existing documents and add percolate options (#570)
- Added Query\Rescore #441
- Added missing query options for MultiMatch (operator, minimum_should_match, zero_terms_query, cutoff_frequency, type, fuzziness, prefix_length, max_expansions, analyzer) #569
- Added missing query options for Match (zero_terms_query, cutoff_frequency) #569
- Fixed request body reuse in http transport #567
