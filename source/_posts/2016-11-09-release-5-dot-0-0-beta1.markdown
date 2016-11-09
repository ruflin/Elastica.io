---
layout: post
title: "Release 5.0.0-beta1"
date: 2016-11-09 22:11:31 +0100
comments: true
categories:
---

[Elastica 5.0.0-beta1](https://github.com/ruflin/Elastica/tree/5.0.0-beta1) ([download](https://github.com/ruflin/Elastica/releases/tag/5.0.0-beta1)).

This is the first major release of the Elastica 5.x series. Elastica is now compatible with [Elasticsearch 5.0]((https://www.elastic.co/guide/en/elasticsearch/reference/5.0/release-notes-5.0.0.html)). For all the major changes in Elasticsearch 5.0 check this [blog post](https://www.elastic.co/blog/elasticsearch-5-0-0-released).

Lots of major changes and breaking changes have gone into this release. Please test this release with Elasticsearch 5.0 and report any issues on Github. A special thank you goes to [@p365labs](https://github.com/p365labs) and [@Zyqsempai](https://github.com/Zyqsempai) that helped to make this release possible.


## Backward Compatibility Breaks
- Update elasticsearch dependency to 5.0
- Replace flush refresh param with a options array
- Rename Mapping::setFields to Mapping::setStoredFields
- Removing all deprecated filters including tests. Use queries instead.
- Remove deprecated Elastica\Script*.php classes. Use Elastica\Script\* instead.
- Remove Elastica/Query/Image.php and test/Elastica/Query/ImageTest.php, no more support for image-plugin.
- Remove Elastica/Query/Filtered.php and test/Elastica/Query/FilteredTest.php and all uses from code.
- Remove index.merge.policy.merge_factor, and set/get MergePolicy as it looks deprecated from ES 1.6
- Add new "Percolate query" functionality and tests
- Remove in Elastica\AbstractUpdateAction Option "percolate", getter and setter as deprecated as of ES 1.3. Use Percolator instead.
- Remove in Elastica\Aggregation\DateHistogram Option "pre_zone" is deprecated as of ES 1.5. Use "time_zone" instead
- Remove in Elastica\Aggregation\DateHistogram Option "post_zone" is deprecated as of ES 1.5. Use "time_zone" instead.
- Remove in Elastica\Aggregation\DateHistogram Option "pre_zone_adjust_large_interval" is deprecated as of ES 1.5. Use "time_zone" instead.
- Remove in Elastica\Aggregation\DateHistogram Option "pre_offset" is deprecated as of ES 1.5. Use "offset" instead.
- Remove in Elastica\Aggregation\DateHistogram Option "post_offset" is deprecated as of ES 1.5. Use "offset" instead.
- Remove Elastica\Document::set as deprecated. Use Elastica\Document::set instead
- Remove Elastica\Document::setScript() is no longer available as of 0.90.2. See http://elastica.io/migration/0.90.2/upsert.html to migrate.
- Remove Elastica\Document::getScript() is no longer available as of 0.90.2. See http://elastica.io/migration/0.90.2/upsert.html to migrate.
- Remove Elastica\Document::hasScript() is no longer available as of 0.90.2. See http://elastica.io/migration/0.90.2/upsert.html to migrate.
- Remove Elastica/Query::setLimit as deprecated. Use the Elastica/Query::setSize() method
- Remove Elastica\Query\Builder
- Remove Elastica\Query\Fuzzy::addField as deprecated. Use Elastica\Query\Fuzzy::setField and Elastica\Query\FuzzysetFieldOption instead.
- Remove Elastica\Query::setIds as deprecated. Use Elastica\Query::like instead.
- Remove Elastica\Query::setLikeText as deprecated. Use Elastica\Query::like instead.
- Remove Elastica\Query Option "percent_terms_to_match" is deprecated as of ES 1.5. Use "minimum_should_match" instead.
- Remove Elastica\QueryBuilder\DSL\Query "More Like This Field" query is deprecated as of ES 1.4. Use MoreLikeThis query instead.
- Changed visibility from protected to private Elastica\ResultSet::$_position as accessing this property in an extended class is deprecated.
- Changed visibility from protected to private Elastica\ResultSet::$_response as accessing this property in an extended class is deprecated.
- Changed visibility from protected to private Elastica\ResultSet::$_query as accessing this property in an extended class is deprecated.
- Changed visibility from protected to private Elastica\ResultSet::$_results as accessing this property in an extended class is deprecated.
- Removed Elastica\ResultSet::$_timedOut as deprecated. Use ResultSet->hasTimedOut() instead.
- Removed Elastica\ResultSet::$_took as deprecated. Use ResultSet->hasTimedOut() instead.
- Removed Elastica\ResultSet::$_totalHits as deprecated. Use ResultSet->hasTimedOut() instead.
- Removed Elastica\Type::delete() It is no longer possible to delete the mapping for a type. Instead you should delete the index and recreate it with the new mappings.
- Removed Elastica\Query\Builder as deprecated. Use new Elastica\QueryBuilder instead.
- Removed Elastica\Percolator as deprecated. Use new Elastica\Query\Percolate instead.
- Changed Elastica\Index::deleteByQuery() to use new API https://www.elastic.co/guide/en/elasticsearch/reference/5.0/docs-delete-by-query.html
- Remove Elastica\ScanAndScroll and test, Scan search type is removed from ElasticSearch 5.0.
- Remove support for PHP 5.4 and 5.5. Require at least PHP 5.6 #1202
- Remove groovy as default scripting language
- Remove search_type=count as it is removed in Elasticsearch 5.0
- Remove fielddata_fields as it has been deprecated in ES5, use parameter docvalue_fields instead

## Added
- Elastica\QueryBuilder\DSL\Query::exists
- Elastica\QueryBuilder\DSL\Query::type

## Improvements
- Add a constant for the expression language.
- `Health::getIndices` returns key=>value result, where key === $indexName.
```
$cluster->getHealth()->getIndices()[$indexName]
// or
$indices = $cluster->getHealth()->getIndices();
$indices[$indexName]
```
- Added a `Query::setTrackScores` method
- Implemented painless as default scripting language in tests
- Updated Dockerfile and elasticsearch.yml to allow inline.script: true
- Updated some Script function to use groovy as now default scripting is painless
    - Elastica\Test\Aggregation\ScriptTest::testAggregationScript
    - Elastica\Test\Aggregation\ScriptTest::testAggregationScriptAsString
    - Elastica\Test\Query\FunctionScoreTest::testScriptScore
    - Elastica\Test\BulkTest::testUpdate
    - Elastica\Test\ClientTest::testUpdateDocumentByScript
    - Elastica\Test\ClientTest::testUpdateDocumentByScriptWithUpsert
    - Elastica\Test\ClientTest::testUpdateDocumentPopulateFields
    - Elastica\Test\ClientTest::testUpdateDocumentPopulateFields
    - Elastica\Test\TypeTest::testUpdateDocument
    - Elastica\Test\TypeTest::testUpdateDocumentWithIdForwardSlashes
    - Elastica\Test\TypeTest::testUpdateDocumentWithParameter
    - Elastica\Test\TypeTest::testUpdateDocumentWithFieldsSource
  - Composer installations will no longer include tests and other development files.
