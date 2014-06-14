---
layout: post
title: "Release v1.2.1.0"
date: 2014-06-14 10:47:11 +0200
comments: true
categories: 
---

[Elastica v1.2.1.0](https://github.com/ruflin/Elastica/tree/v1.2.1.0) ([download](https://github.com/ruflin/Elastica/releases/tag/v1.2.1.0)). This release is compatible with elasticsearch 1.2.1.

## Dependencies

| Project | Version | Required |
|---------|---------|----------|
|[Elasticsearch](https://github.com/elasticsearch/elasticsearch/tree/v1.2.1)| 1.2.1 | yes
|[Elasticsearch mapper attachments plugin](https://github.com/elasticsearch/elasticsearch-mapper-attachments/tree/v2.0.0.RC1)|2.0.0.RC1|no
|[Elasticsearch thrift transport plugin](https://github.com/elasticsearch/elasticsearch-transport-thrift/tree/v2.0.0.RC2)|2.0.0.RC2|no
|[Elasticsearch geocluster facet plugin](https://github.com/zenobase/geocluster-facet/tree/0.0.10)|0.0.10|no



## Release Notes (changes.txt)


- Removed the requirement to set arguments filter and/or query in Filtered, according to the documentation: http://www.elasticsearch.org/guide/en/elasticsearch/reference/current/query-dsl-filtered-query.html #616
- Stop ClientTest->testDeleteIdsIdxStringTypeString from failing 1/3 of the time #634
- Stop ScanAndScrollTest->testQuerySizeOverride from failing frequently for no reason #635
- rework Document and Script so they can share some infrastructure allowing scripts to specify things like _retry_on_conflict and _routing #629
- Allow bulk API deletes to be routed #631
- Update travis to elasticsearch 1.2.1, disable Thrift plugin as not compatible and fix incompatible tests
- Implement Boosting Query (http://www.elasticsearch.org/guide/en/elasticsearch/reference/current/query-dsl-boosting-query.html) #625
- add retry_on_conflict support to bulk #623
- toString updated to consider doc_as_upsert if sent an array source #622
- Fix Aggragations/Filter to work with es v1.2.0 #619
- Added Guzzle transport as an alternative to the default Http transport #618
- Added Elastica\ScanAndScroll Iterator (http://www.elasticsearch.org/guide/en/elasticsearch/guide/current/scan-scroll.html) #617
- Add JSON compat library; Elasticsearch JSON flags and nicer error handling #614
- Update dev builds to phpunit 4.1.*
- Set processIsolation and backupGlobals to false to speed up tests. processIsolation was very slow with phpunit 4.0.19.
- Fix get settings on alaised index #608
- Added named function for source filtering #605
- Scroll type constant to Elastica\Search added #607
- Added setAnalyzer method to Query\FuzzyLikeThis Class and fixed issue with params not being merged #611
- Typo fixes #600, #602
- Remove unreachable return statement #598