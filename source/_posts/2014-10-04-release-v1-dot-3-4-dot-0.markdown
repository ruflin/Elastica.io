---
layout: post
title: "Release v1.3.4.0"
date: 2014-10-04 22:18:24 +0200
comments: true
categories: 
---



[Elastica v1.3.4.0](https://github.com/ruflin/Elastica/tree/v1.3.4.0) ([download](https://github.com/ruflin/Elastica/releases/tag/v1.3.4.0)). This release is compatible with elasticsearch 1.3.0.

## Dependencies

| Project | Version | Required |
|---------|---------|----------|
|[Elasticsearch](https://github.com/elasticsearch/elasticsearch/tree/v1.3.4)| 1.3.4 | yes
|[Elasticsearch mapper attachments plugin](https://github.com/elasticsearch/elasticsearch-mapper-attachments/tree/v2.0.0.RC1)|2.0.0.RC1|no
|[Elasticsearch thrift transport plugin](https://github.com/elasticsearch/elasticsearch-transport-thrift/tree/v2.0.0.RC2)|2.0.0.RC2|no
|[Elasticsearch geocluster facet plugin](https://github.com/zenobase/geocluster-facet/tree/0.0.10)|0.0.10|no



## Release Notes (changes.txt)


- Update to elasticsearch 1.3.4 #691
- Update the branch alias in composer.json to match the library version #683
- Update license in composer.json to match project #681
- Delete execution permission from non-executable files #677
- Top-level filter parameter in search has been renamed to post_filter #669 #670
- Deprecated: Elastica\Query::setFilter() is deprecated. Use Elastica\Query::setPostFilter() instead. #669
- Deprecated: Elastica\Query::setPostFilter() passing filter as array is deprecated. Pass instance of AbstractFilter instead. #669
- Fixed escaping of / character in Elastica\Util::escapeTerm(), removed usage of JSON_UNESCAPED_SLASHES in Elastica\JSON #660
- Add connection pool and connection strategy #661