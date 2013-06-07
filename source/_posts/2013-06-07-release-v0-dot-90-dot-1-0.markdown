---
layout: post
title: "Release v0.90.1.0"
date: 2013-06-07 21:14
comments: true
categories: 
---
This release is a consists of several bigger refactoring steps in Elastica to make it compatible with the newest elasticsearch versions and allow to use the newest features. The release v0.90.1.0 is compatible with [elasticsearch 0.90.1](http://www.elasticsearch.org/2013/05/30/0-90-1-released/). 

There are quite a few changes which break BC since the last official release [v0.19.8.0](/2012/08/12/release-v0-dot-19-dot-8-0/). For more details on the BC breaks follow the changes below and also check the [v0.20.5.0](/2013/02/20/release-v0-dot-20-dot-5-0/) release candidate changes for more details.

There are still some open pull requests pending with larger changes which could break BC. The goal is to get these changes in before release 1.0 of elasticsearch.

# Changes

* Changed package name to lowercase to prevent potential issues with case sensitive file systems and to refelect the package name from packagist.org.
  If you are requiring elastica in your project you might want to change the name in the require to lowercase, although it will still work if written in uppercase.
  The composer autoloader will handle the package correctly and you will not notice any difference.
  If you are requiring or including a file by hand with require() or include() from the composer vendor folder, pay attention that the package name in
  the path will change to lowercase.
* Add Bulk\Action\UpdateDocument.
* Update Bulk\Action\AbstractDocument and Bulk\Action to enable use of OP_TYPE_UPDATE.
* Update .travis.yml to use Elasticsearch version 0.9.1, as bulk update is a new feature in 0.9.1.
* Elastica\Client::_configureParams() changed to _prepareConnectionParams(), which now takes the config array as an argument
* Add getPlugins and hasPlugin methods to Node\Info
* Update Index\Status::getAliases() to use new API
* Update Index\Status::getSettings() to use new API
* Add _meta to mapping. #330
* Added parameters to implement scroll
* add support PSR-3(https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-3-logger-interface.md)
* Elastica\Log implement LoggerInterface(extends Psr\Log\AbstractLogger)
  if you want use logging need install https://github.com/php-fig/log for example (composer require psr/log:dev-master)
  if use Elastica\Log inside Elastica\Client nothing more is needed
  if use Elastica\Log outside we need use as(https://github.com/php-fig/log) for example Elastica\Log::info($message) or Elastica\Log::log(LogLevel::INFO,$message)
* Elastica\Client add setLogger for setting custom Logger for example Monolog(https://github.com/Seldaek/monolog)
* Elastica\Index::exists fixed for 0.90.0. HEAD request method introduced
* Elastica\Filter\AbstractMulti::getFilters() added
* Implement Elastica\Type\Mapping::enableAllField
* Refresh for Elastica\Index::flush implemented #316
* Added optional parameter to filter result while percolate #384
* Added EXPERIMENTAL DocumentObjectInterface to be used with Type::addObject()/addObjects()
* Removed Elastica\Exception\AbstractException
* All Exceptions now implement Elastica\Exception\ExceptionInterface
* Query\Fuzzy to comply with DSL spec. Multi-field queries now throw an exception. Implemented: Query\Fuzzy::setField, Query\Fuzzy::setFieldOption.
* Query\Fuzzy::addField has been deprecated.
* Adding max score information in ResultSet
* Adding test for the ResultSet class
* Removal of unsupported minimum_number_should_match for Boolean Filter
* Added Elastica\Bulk class responsible for performing bulk requests. New bulk requests implemented: Client::deleteDocuments(), Bulk::sendUdp()