---
layout: post
title: "Release 3.0.0-beta1"
date: 2015-11-26 22:58:49 +0100
comments: true
categories:
---


[Elastica 3.0.0-beta1](https://github.com/ruflin/Elastica/tree/3.0.0-beta1) ([download](https://github.com/ruflin/Elastica/releases/tag/3.0.0-beta1)). This release is compatible with [elasticsearch 2.0.0](https://www.elastic.co/blog/elasticsearch-2-0-0-released).

Elastica 3.0.0-beta1 is a major release. It is compatible with elasticsearch 2.0 which means also bringing lots of compatibility break. Switch to Elastica 3.0.0-beta1 does not only mean you have to adapt your code but also migrate to elasticsearch 2.0. We tried to make the migration as easy as possible by adding deprecated messages and exceptions for the stuff that was or will be removed. Make sure to test your application with the newest version.

Please also take into account that this is a beta version, so don't use it in production. Test it with your application and report bugs so we can make sure to iron out bugs or potential problems.

A big thank you goes to all the contributors that made this release possible. A special thank you goes to [@im-denisenko](https://github.com/im-denisenko) and [@ewgRa](https://github.com/ewgRa), without them this release would not have been possible. Already looking at the Changelog makes the sheer amount visible which went into this release. [Here](https://github.com/ruflin/Elastica/compare/2.3.1...3.0.0-beta1) is a full overview of all 139 commits and 136 touched files.

Happy testing :-)


### Backward Compatibility Breaks
- Elastica\AbstractUpdateAction::setPercolate now throw DeprecatedException, user Percolator instead
- Elastica\AbstractUpdateAction::getPercolate now throw DeprecatedException, user Percolator instead
- Elastica\AbstractUpdateAction::hasPercolate now throw DeprecatedException, user Percolator instead
- Elastica\Type::delete now throw DeprecatedException, it is no longer possible to delete the mapping for a type. Instead you should delete the index and recreate it with the new mappings
- MoreLikeThis::setLikeText deprecated from ES 2.0, use setLike instead, but there is a difference - setLike haven't trim magic inside for strings
- Elastica\Document, methods: setScript, getScript, hasScript now throw DeprecatedException.
- MoreLikeThis, methods: setLikeText, setIds, setPercentTermsToMatch now throw DeprecatedException.
- Elastica\Aggregation\DateHistogram, methods: setPreZone, setPostZone, setPreZoneAdjustLargeInterval, setPreOffset, setPostOffset now throw DeprecatedException.
- Elastica\Query\Builder trigger E_USER_DEPRECATED error when you try use it.
- Elastica\Filter\Bool and Elastica\Query\Bool trigger E_USER_DEPRECATED error when you try use them.
- Elastica\Query\Fuzzy:addField method trigger E_USER_DEPRECATED error
- Elastica\Query\FunctionScore:addBoostFactorFunction method trigger E_USER_DEPRECATED error
- Elastica\Query:setLimit method trigger E_USER_DEPRECATED error
- Elastica\Document:add method trigger E_USER_DEPRECATED error
- Type::moreLikeThis API was removed from ES 2.0, use MoreLikeThis query instead
- Remove Thrift transport and everything related to it
- Remove Memcache transport and everything related to it
- Remove BulkUdp and everything related to it
- Remove Facets and everything related to it
- Remove ansible scripts for tests setup and Vagrantfile as not needed anymore.
  All is based on docker contaienrs now
- Support for PHP 5.3 removed
- Elastica\Reponse::getError() now returns and array instead of a string
- Move function \Elastica\Index\Status::getAliases() and hasAlias(...) to \Elastica\Index::getAliases()
- Remove \Elastica\Index\Status object and related functions
- \Elastica\Query\FuzzyLikeThis remove as not supported anymore
- Remove \Elastica\Status::getServerStatus() as the information was removed
- DeleteByQuery now requires the delete-by-query plugin isntalled
- Remove \Elastica\Filter\Nested as it is replaced by \Elastica\Query\Nested
- Require at least PHP 5.4

### Bugfixes
- Fixed GeoShapeProvided relation parameter position

### Added
- Elastica\Reponse::getErrorMessage was added as getError is now an object
- Elastica\Query\MoreLikeThis::setLike
- \Elastica\Exception\DeprecatedException
- Connection option to convert JSON bigint results to strings can now be set [#717](https://github.com/ruflin/Elastica/issues/717)

### Improvements
- Travis builds were moved to docker-compose setup. Ansible scripts and Vagrant files were removed
- trigger_error with E_USER_DEPRECATE added to deprecated places
- DeprecatedException will be thrown, if there is a call of method that not support BC

### Deprecated
- Elastica\Type::delete is deprecated
- Elastica\Filter\Bool is deprecated
- Elastica\Query\Bool is deprecated
- Elastica\Query\MoreLikeThis::setLikeText is deprecated
- Elastica\Query\MoreLikeThis::setIds is deprecated

## Dependencies

| Project | Version | Required |
|---------|---------|----------|
|[Elasticsearch](https://github.com/elasticsearch/elasticsearch/tree/v2.0.0)|2.0.0|yes|
|[Elasticsearch mapper attachments plugin](https://github.com/elasticsearch/elasticsearch-mapper-attachments/tree/v3.0.2)|3.0.2|no|
|[Elasticsearch image plugin](https://github.com/Jmoati/elasticsearch-image/releases/tag/1.7.1)|1.7.1|no|
