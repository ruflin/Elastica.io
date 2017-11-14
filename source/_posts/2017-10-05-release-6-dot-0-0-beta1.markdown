---
layout: post
title: "Release 6.0.0-beta1"
date: 2017-10-05 12:56:41 +0200
comments: true
categories:
---


[Elastica 6.0.0-beta1](https://github.com/ruflin/Elastica/tree/6.0.0-beta1) ([download](https://github.com/ruflin/Elastica/releases/tag/6.0.0-beta1)).

This is the first pre release of the 6.x release cycle. The release is compatible with Elasticsearch 6.x and was tested with [Elasticsearch 6.0.0-rc1](https://www.elastic.co/guide/en/elasticsearch/reference/6.0/release-notes-6.0.0-rc1.html).


## Backward Compatibility Breaks

- Numeric to and from parameters in [date_range aggregation](https://www.elastic.co/guide/en/elasticsearch/reference/6.0/breaking_60_aggregations_changes.html#_numeric_literal_to_literal_and_literal_from_literal_parameters_in_literal_date_range_literal_aggregation_are_interpreted_according_to_literal_format_literal_now) are interpreted according to format of the target field
- In ES6 only [strict type boolean](https://github.com/elastic/elasticsearch/pull/22200) are accepted. [On ES6 docs](https://www.elastic.co/guide/en/elasticsearch/reference/6.0/boolean.html)
- removed analyzed/not_analyzed on [indices mapping](https://www.elastic.co/guide/en/elasticsearch/reference/6.0/mapping-index.html)
- [store](https://www.elastic.co/guide/en/elasticsearch/reference/6.0/mapping-store.html) field only accepts boolean
- Replace IndexAlreadyExistsException with [ResourceAlreadyExistsException](https://github.com/elastic/elasticsearch/pull/21494) [#1350](https://github.com/ruflin/Elastica/pull/1350)
- in order to delete an index you should not delete by its alias now you should delete using the [concrete index name](https://github.com/elastic/elasticsearch/blob/6.0/core/src/test/java/org/elasticsearch/aliases/IndexAliasesIT.java#L445) [#1348](https://github.com/ruflin/Elastica/pull/1348)
- Removed ```optimize``` from Index class as it has been deprecated in ES 2.1 and removed in [ES 5.x+](https://www.elastic.co/guide/en/elasticsearch/reference/2.4/indices-optimize.html) use forcemerge [#1351](https://github.com/ruflin/Elastica/pull/1350)
- In QueryString is not allowed to use fields parameters in conjunction with default_field parameter. This is not well documented, it's possibile to understand from [Elasticsearch tests :  QueryStringQueryBuilderTests.java](https://github.com/elastic/elasticsearch/blob/6.0/core/src/test/java/org/elasticsearch/index/query/QueryStringQueryBuilderTests.java#L917) [#1352](https://github.com/ruflin/Elastica/pull/1352)
- Index mapping field of type [*'string'*](https://www.elastic.co/guide/en/elasticsearch/reference/5.5/string.html) has been removed from Elasticsearch 6.0 codebase [#1353](https://github.com/ruflin/Elastica/pull/1353)
- The [created and found](https://github.com/elastic/elasticsearch/pull/25516) fields in index and delete responses became obsolete after the introduction of the result field in index, update and delete responses [#1354](https://github.com/ruflin/Elastica/pull/1354)
- Removed file scripts [#24627](https://github.com/elastic/elasticsearch/pull/24627) [#1364](https://github.com/ruflin/Elastica/pull/1364)
- Removed [groovy script](https://github.com/elastic/elasticsearch/pull/21607) [#1364](https://github.com/ruflin/Elastica/pull/1364)
- Removed [native script](https://github.com/elastic/elasticsearch/pull/24726) [#1364](https://github.com/ruflin/Elastica/pull/1364)
- Removed old / removed script language support : javascript, python, mvel [#1364](https://github.com/ruflin/Elastica/pull/1364)
- Disable [_all](https://github.com/elastic/elasticsearch/pull/22144) by default, disallow configuring _all on 6.0+ indices [#1365](https://github.com/ruflin/Elastica/pull/1365)
- [Unfiltered nested source](https://github.com/elastic/elasticsearch/pull/26102) should keep its full path [#1366](https://github.com/ruflin/Elastica/pull/1366)
- The deprecated minimum_number_should_match parameter in the bool query has been removed, use minimum_should_match instead. [#1369](https://github.com/ruflin/Elastica/pull/1369)
- For geo_distance queries, sorting, and aggregations the sloppy_arc option has been removed from the distance_type parameter. [#1369](https://github.com/ruflin/Elastica/pull/1369)
- The geo_distance_range query, which was deprecated in 5.0, has been removed. [#1369](https://github.com/ruflin/Elastica/pull/1369)
- The optimize_bbox parameter has been removed from geo_distance queries. [#1369](https://github.com/ruflin/Elastica/pull/1369)
- The disable_coord parameter of the bool and common_terms queries has been removed. If provided, it will be ignored and issue a deprecation warning. [#1369](https://github.com/ruflin/Elastica/pull/1369)
- [Unfiltered nested source](https://github.com/elastic/elasticsearch/pull/26102) should keep its full path [#1366](https://github.com/ruflin/Elastica/pull/1366)
- [Analyze Explain](https://www.elastic.co/guide/en/elasticsearch/reference/6.0/_explain_analyze.html) no more support [request parameters](https://www.elastic.co/guide/en/elasticsearch/reference/5.5/indices-analyze.html), use request body instead. [#1370](https://github.com/ruflin/Elastica/pull/1370)
- [Mapper Attachment plugin has been removed](https://github.com/elastic/elasticsearch/pull/20416) Use Ingest-attachment plugin and attachment processors with pipeline to ingest new documents. [#1375](https://github.com/ruflin/Elastica/pull/1375)
- [Indices](https://github.com/elastic/elasticsearch/pull/21837) Query has been removed in Elasticsearch 6.0 [#1376](https://github.com/ruflin/Elastica/pull/1376)
- Remove deprecated [type and slop](https://github.com/elastic/elasticsearch/pull/26720) field in match query [#1382](https://github.com/ruflin/Elastica/pull/1382)
- Remove [several parse field](https://github.com/elastic/elasticsearch/pull/26711) deprecations in query builders [#1382](https://github.com/ruflin/Elastica/pull/1382)
- Remove [deprecated parameters](https://github.com/elastic/elasticsearch/pull/26508) from ids_query [#1382](https://github.com/ruflin/Elastica/pull/1382)
- Implemented [join-datatype](https://www.elastic.co/guide/en/elasticsearch/reference/current/parent-join.html) is a special field that creates parent/child relation within documents of the same index. [#1383](https://github.com/ruflin/Elastica/pull/1383)

## Bugfixes
- Enforce [Content-Type requirement on the layer Rest](https://github.com/elastic/elasticsearch/pull/23146), a [PR on Elastica #1301](https://github.com/ruflin/Elastica/issues/1301) solved it (it has been implemented only in the HTTP Transport), but it was not implemented in the Guzzle Transport. [#1349](https://github.com/ruflin/Elastica/pull/1349)
- Scroll no longer does an extra iteration both on an empty result and on searches where the last page has a significantly smaller number of results than the pages before it.

## Added

- Added `Query\SpanContaining`, `Query\SpanWithin` and `Query\SpanNot` [#1319](https://github.com/ruflin/Elastica/pull/1319)
- Implemented [Pipeline](https://www.elastic.co/guide/en/elasticsearch/reference/current/pipeline.html) and [Processors](https://www.elastic.co/guide/en/elasticsearch/reference/current/ingest-processors.html). [#1373](https://github.com/ruflin/Elastica/pull/1373)
