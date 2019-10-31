---
layout: post
title: "Release 7.0.0-beta1"
date: 2019-10-31 10:30:38 +0100
comments: true
categories:
---

[Elastica 7.0.0-beta1](https://github.com/ruflin/Elastica/tree/7.0.0-beta1) ([download](https://github.com/ruflin/Elastica/releases/tag/7.0.0-beta1)).

This is our first release in the 7.x cycle. It is compatible with Elasticsearch 7.x. Please review the breaking changes carefully. Most of them are related to the [type removal in Elasticsearch](https://www.elastic.co/guide/en/elasticsearch/reference/master/removal-of-types.html).

This release is compatible with Elasticsearch 7.x and was tested with [elasticsearch 7.3.0](https://www.elastic.co/guide/en/elasticsearch/reference/7.3/release-notes-7.3.0.html).



### Backward Compatibility Breaks

* The `\Elastica\Query::$_suggest` property has been renamed to `$hasSuggest` and is now private, it should not be used from extending classes [#1679](https://github.com/ruflin/Elastica/pull/1679)
* `\Elastica\Document` expects a string as ID, not an int [#1672](https://github.com/ruflin/Elastica/pull/1672).
* Removed `\Elastica\Query\GeohashCell` query, use `\Elastica\Query\GeoBoundingBox` instead [#1672](https://github.com/ruflin/Elastica/pull/1672).
* Deprecated usage of `\Elastica\Type` class, `\Elastica\Index` class must be used instead [#1666](https://github.com/ruflin/Elastica/pull/1666)
* Removed `\Elastica\Type` class, `\Elastica\Index` class must be used instead [#1666](https://github.com/ruflin/Elastica/pull/1666)
* Forced index names to string in `\Elastica\Index::__construct()` [#1666](https://github.com/ruflin/Elastica/pull/1666)
* Removed Type query `\Elastica\Query\Type` [#1666](https://github.com/ruflin/Elastica/pull/1666)
* Removed `Elastica\Type` class, `Elastica\Index` class must be used instead [#1666](https://github.com/ruflin/Elastica/pull/1666)
* Removed `type` handling from `Elastica\Search` class [#1666](https://github.com/ruflin/Elastica/pull/1666)
* Removed `type` handling from `Elastica\Bulk` and `Elastica\Bulk\Action` classes [#1666](https://github.com/ruflin/Elastica/pull/1666)
* Forced index names to string in `Elastica\Index::__construct()` [#1666](https://github.com/ruflin/Elastica/pull/1666)
* Removed Type query `Elastica\Query\Type` [#1666](https://github.com/ruflin/Elastica/pull/1666)
* Dropped support for PHP 7.0
* \Elastica\AbstractUpdateAction::getOptions( $fields ) no longer supports the $underscore parameter, option names must match what elasticsearch expects.
* Removed no longer supported \Elastica\Query\QueryString::setAutoGeneratePhraseQueries( $bool ) [#1622](https://github.com/ruflin/Elastica/pull/1622)
* Replaced [params._agg](https://www.elastic.co/guide/en/elasticsearch/reference/master/breaking-changes-7.0.html#_replaced_literal_params__agg_literal_with_literal_state_literal_context_variable_in_scripted_metric_aggregations) with state context variable in scripted metric aggregations
* [Camel Case](https://www.elastic.co/guide/en/elasticsearch/reference/master/breaking-changes-7.0.html#_camel_case_and_underscore_parameters_deprecated_in_6_x_have_been_removed) and underscore parameters deprecated in 6.x have been removed
* The parameter [fields](https://www.elastic.co/guide/en/elasticsearch/reference/master/breaking-changes-7.0.html#_the_parameter_literal_fields_literal_deprecated_in_6_x_has_been_removed_from_bulk_request) deprecated in 6.x has been removed from Bulk requestedit and Update request.
* The [_parent](https://www.elastic.co/guide/en/elasticsearch/reference/current/mapping-parent-field.html) field has been removed in favour of the join field.
* hits.total is now an object in the search response [hits.total](https://www.elastic.co/guide/en/elasticsearch/reference/master/breaking-changes-7.0.html#_literal_hits_total_literal_is_now_an_object_in_the_search_response)
* Elastica\Reindex does not return an Index anymore but a Response.
* Elastica\Reindex->run() does not refresh the new Index after completion anymore. Use `$reindex->setParam(Reindex::REFRESH, 'wait_for')` instead.
* `Elastica\Search->search()` and `Elastica\Search->count()` use request method `POST` by default. Same for `Elastica\Index`, `Elastica\Type\AbstractType`, `Elastica\Type`.
* Elastica\Client `$_config` field is now a `ClientConfiguration` instead of an array
* Removed `\Elastica\Client::_log`, `\Elastica\Log` and the `log` configuration option. Use the `Psr\Log\LoggerInterface $logger` client argument to customize logging.
* Changed all factory methods to make use of [late static bindings](http://docs.php.net/manual/en/language.oop5.late-static-bindings.php) by using `static` instead of `self` keyword. This is to increase extendability for classes with factory methods.


### Bugfixes

* Always set the Guzzle `base_uri` to support connecting to multiple ES hosts. [#1618](https://github.com/ruflin/Elastica/pull/1618)
* Properly handle underscore prefixes in options and bulk request metadata ([cf upstream](https://github.com/elastic/elasticsearch/issues/26886). [#1621](https://github.com/ruflin/Elastica/pull/1621)
* Preserve zeros while doing float serialization to JSON. [#1635](https://github.com/ruflin/Elastica/pull/1635)
* Add ```settings``` level on json to create an Index in all tests (it worked till 6.x but it shouldn't work)


### Added

* support for elasticsearch-php ^7.0
* Added `ParentAggregation` [#1616](https://github.com/ruflin/Elastica/pull/1616)
* Elastica\Reindex missing options (script, remote, wait_for_completion, scroll...)
* Added `AdjacencyMatrix` aggregation [#1642](https://github.com/ruflin/Elastica/pull/1642)
* Added request method parameter to `Elastica\SearchableInterface->search()` and `Elastica\SearchableInterface->count()`. Same for `Elastica\Search`[#1441](https://github.com/ruflin/Elastica/issues/1441)
* Added support for Field Collapsing (Issue: [#1392](https://github.com/ruflin/Elastica/issues/1392); PR: [#1653](https://github.com/ruflin/Elastica/pull/1653))
* Support string DSN in `\Elastica\Client` constructor for config argument [#1640](https://github.com/ruflin/Elastica/issues/1640)
* Move Client configuration in a dedicated class
* Added `callable` type hinting to `$callback` in `Client` constructor. [#1659](https://github.com/ruflin/Elastica/pull/1659)
* Added `setTrackTotalHits` method to `Elastica\Query`[#1663](https://github.com/ruflin/Elastica/issues/1663)
* Allow metadata to be set on Aggregations (via `AbstractAggregation::setMeta(array)`). [#1677](https://github.com/ruflin/Elastica/issues/1677)


### Improvements

* Added `native_function_invocation` CS rule [#1606](https://github.com/ruflin/Elastica/pull/1606)
* Elasticsearch test version changed from 6.5.2 to 6.6.1 [#1620](https://github.com/ruflin/Elastica/pull/1620)
* Clear scroll context also when empty page was received [#1660](https://github.com/ruflin/Elastica/pull/1660)
