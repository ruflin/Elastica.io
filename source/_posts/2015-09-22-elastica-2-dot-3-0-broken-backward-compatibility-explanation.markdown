---
layout: post
title: "Elastica 2.3.0 broken backward compatibility explanation"
date: 2015-09-22 08:23:43 +0200
comments: true
categories: 
author: ewgRa
---

[Elastica 2.3.0](/2015/09/15/release-2-dot-3-0/) is out and introduced lazy toArray, that broke backward compatibility. Lets talk about this change in details and answer on some questions, that developers, who use Elastica can have.

## What has changed?
Lets say we have the following code:

```
$query = new Query();
$termQuery = new Term();
$termQuery->setTerm('text', 'value');
$query->setQuery($termQuery);
```

In this example we set the Term object to query. Before version 2.3.0, if you try 

```
var_dump($query->getQuery());
```

you will see, that in the result you have an array. This happens, because every objects in setters immediately will be converted to an array and stored as array:

```
    public function setQuery(AbstractQuery $query)
    {
        return $this->setParam('query', $query->toArray());
    }
```

Elastica 2.3.0 broke this behaviour and introduce lazy toArray. This means, that objects always will be stored as is and toArray will be only called when needed. In Elastica's case, this is when performing the request to Elasticsearch. You can rely on, that also after calling toArray - objects will be still be stored as objects.


## Why it was this change made?
There are a several reasons.

* In the OOP world, usually what we set is what we get. Now we set objects - and get objects.
* In the OOP world we very often extends objects one from another. Code, that is responsible for select objects by Elastica also can extend, and queries will be built step by step from common to specific logic in many places. In this case code will need access to the original query objects, and when they are converted in arrays at setters, query can't be changed without low-level tricks with arrays. After 2.3.0 Elastica changes this behaviour and you always have access to the original objects. You can change query object through the standard usage of Elastica classes.


## Is my code broken?
In most cases if you just used Elastica functions the answer is "no". If you answer at least on one of the following question with "yes", than your code could be broken:

* Did you work with Elastica objects on "low-level"?
* Did you change Elastica objects after you set it to another objects?
* Did you clone Elastica objects?

Lets discuss these question in details.

### Did you work with Elastica objects on "low-level"?
 
When we talk about low-level working with Elastica objects, we are talking about the direct work with Elastica object params, like this:

```
$termQuery = $query->getQuery();
$termQuery['term']['text']['value'] = 'another value';
$query->setParam('query', $termQuery);
```

Your code will be broken, because getQuery now will return an object instead of array. Remember, it is always bad idea, to work with Elastica params directly if not really necessary.


### Did you change Elastica objects after you set it to another objects?
 
Lets say we have the following code:

```
$termQuery = new Term();
$termQuery->setTerm('text', 'value');

$query = new Query();
$query->setQuery($termQuery);

$termQuery->setTerm('text', 'another value');

$anotherQuery = new Query();
$anotherQuery->setQuery($termQuery);
```

Before 2.3.0 `$query->toArray()` and `$anotherQuery->toArray()` will not be equal, because we call `$query->setQuery($termQuery)`, `$termQuery` will be stored as an array and changing this object later will no change the array, that is stored in `$query`.

After 2.3.0 `$query->toArray()` and `$anotherQuery->toArray()` will be equal, because `$termQuery` will be stored as object in `$query`, and if it will be changed somewhere, the result of `toArray()` will have this changes too.


### Did you clone Elastica objects?

Lets say we have the following code:

```
$termQuery = new Term();
$termQuery->setTerm('text', 'value');

$query = new Query();
$query->setQuery($termQuery);
$cloned = clone $query;
$termQuery->setTerm('text', 'another value');
```

Before 2.3.0, `$cloned->toArray()` will have a term query with the key `text` and value `value` because the `$termQuery` will be stored as an array and the array will be cloned also.

After 2.3.0 the `$termQuery` will be stored as object. When clone is called on `$query`, only the `$query` object will be cloned, but objects, that are stored will not be cloned. As a result `$cloned->toArray()` will have a term query with the value `another value`.


## Summary

That are all cases, which can be broken in your projects after the migration to [Elastica 2.3.0+](/2015/09/15/release-2-dot-3-0/). This latest change now gives you the freedom to develop more complex solutions without low-level tricks. Only a very small amount of developers should be affected by the above mentioned issues. In case you have some questions about the changes above, drop us a line on [Gitter](https://gitter.im/ruflin/Elastica) so we can help you out.
