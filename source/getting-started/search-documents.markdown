---
layout: page
title: "search-documents"
comments: true
sharing: true
footer: true
---

 * <a href="#section-search">Search</a>
 * <a href="#section-query">Query</a>
 * <a href="#section-retrieve">Retrieve results</a>

<h2>Search documents</h2>

With some documents in the index we can start searching. A basic search is executing a query against elasticsearch. The result of a query then can be filtered by defining some filters. Additionally you can aggregate Documents to create metadata or graphs based on filters. For further information check out the <a href="http://www.elasticsearch.org/guide/reference/query-dsl/">Query DSL</a> and the <a href="http://www.elasticsearch.org/guide/en/elasticsearch/reference/current/search-aggregations.html">Aggregations</a> reference. In this example we don't use all possible options to keep it simple.


<h3 id="section-search">Search</h3>
The [`Search`](http://elastica.io/api/classes/Elastica.Search.html) class is one of most flexible entry points in Elastica to query elasticsearch form your PHP application. Other classes which can execute queries are: [`Index`](http://elastica.io/api/classes/Elastica.Index.html), [`Type`](http://elastica.io/api/classes/Elastica.Type.html), [`Bulk`](http://elastica.io/api/classes/Elastica.Bulk.html) and even [`Client`](http://elastica.io/api/classes/Elastica.Client.html) for raw queries.

`Search` class provides useful methods and constants to configure your search query.

```php
$search = new Elastica\Search($client);
```

Add indices and types 

```php
$search
    ->addIndex('GB')
    ->addIndex($indexUS) // $indexUS instanceof Elastica\Index

    ->addType('user')
    ->addType($typeTweet); // $typeTweet instanceof Elastica\Type
```

Add [search options](http://www.elasticsearch.org/guide/en/elasticsearch/guide/current/_search_options.html)

```php
$search
    ->setOption(Search::OPTION_TIMEOUT, '100ms')
    ->setOption(Search::OPTION_ROUTING, 'user_1,user2');
```

<h3 id="section-query">Query</h3>

You may have noticed that the most important part of a search query is actually missing: the query. Because this is the most complicated (and fun) part of elasticsearch, Elastica provides a bunch of classes to help you creating that part of your search query.

[`Query`](http://elastica.io/api/classes/Elastica.Query.html) is dedicated to the "body" of [request body search](http://www.elasticsearch.org/guide/en/elasticsearch/reference/current/search-request-body.html). It provides a method for every configuration field:

```php
$query = new Elastica\Query();

$query
    ->setFrom(50)
    ->setSize(10)
    ->setSort(['name' => 'asc'])
    ->setSource(['obj1.*', 'obj2.'])
    ->setFields(['name', 'created'])
    ->setScriptFields($scriptFields) // $scriptFields instanceof Elastica\ScriptFields
    ->setHighlight(['fields' => 'content'])
    ->setRescore($rescoreQuery) // $rescoreQuery instanceof Elastica\Rescore\AbstractRescore
    ->setExplain(true)
    ->setVersion(true)
    ->setPostFilter($filterTerm) // $$filterTerm instanceof Elastica\Filter\AbstractFilter
    ->setMinScore(0.5);
    
$search->setQuery($query);
```

Also it's possible to provide an array to create a new search. This array
follows Elasticsearch request structure, e.g.:

```php
$query = new \Elastica\Query([
    'query' => [
        'term' => ['_all' => 'search term'],
    ],
]);

$search->setQuery($query);
```

For further information check out the [official documentation](https://www.elastic.co/guide/en/elasticsearch/reference/5.0/search-request-body.html).

And for very basic searches it's also possible to just search for a term:

```php
$term = new \Elastica\Query\Term(['_all' => 'search term']);

$query = new \Elastica\Query($term);

$search->setQuery($query);
```

<h4>QueryBuilder</h4>

In order to set `query`, `aggregation`, `suggest` and `facet` query parts, you can create the corresponding classes like

```php
$query->setQuery(new \Elastica\Query\MatchAll());

$query->addAggregation(new \Elastica\Aggregation\Range('name'));

$query->setSuggest(new \Elastica\Suggest(new \Elastica\Suggest\Term('name', 'field')));

$query->setFacets([new \Elastica\Facet\Range('name')]);
```

to create more complex queries use [QueryBuilder](http://elastica.io/api/classes/Elastica.Query.Builder.html) to construct all of the different parts of your query. `QueryBuilder` is going to check, whether the method you want to use is available in your current elasticsearch version or not.

```php
// version checks against latest DSL version
$qb = new \Elastica\QueryBuilder();

// version checks against 1.3 DSL version
$qb = new \Elastica\QueryBuilder(
    new \Elastica\QueryBuilder\Version\Version130()
);
```

Now just start to write your query as you would write the raw JSON. If your IDE is configured correctly you should experience a handy way to access all available methods in elasticsearch.

```php
$query->setQuery(
    $qb->query()->filtered(
        $qb->query()->match_all(),
        $qb->filter()->bool()
            ->addMust(
                $qb->filter()->term(['field' => 'term'])
            )
            ->addMustNot(
                $qb->filter()->exists('field1')
            )
    )
);
```

```php
$query->addAggregation(
    $qb->aggregation()->date_histogram('histogram', 'date_field', 'interval')
        ->addAggregation(
            $qb->aggregation()->sum('sum')
                ->setField('field')
        )
);
```

```php
$query->setSuggest(new Suggest(
    $qb->suggest()->term('name', 'field')
));
```

Facets are not supported by QueryBuilder. You should really have a look into aggregations, they are much powerful then facets!

<h3 id="section-retrieve">Retrieve results</h3>

To execute your search query just choose one of the following methods:

__count [API](http://www.elasticsearch.org/guide/en/elasticsearch/reference/current/search-count.html)__

```php
$numberOfEntries = $search->count(); // returns int 
```

__search [API](http://www.elasticsearch.org/guide/en/elasticsearch/reference/current/search-request-body.html)__

```php
$resultSet = $search->search(); // returns Elastica\ResultSet
```

__scan and scroll [API](http://www.elasticsearch.org/guide/en/elasticsearch/guide/current/scan-scroll.html)__

```php
foreach ($search->scanAndScroll() as $scrollId => $resultSet) {
    // ... handle Elastica\ResultSet
}
```

In <code>$resultSet</code> all the resulting documents are stored. You can get them together with some statistics easily.

```php
$results = $resultSet->getResults();
$totalResults = $resultSet->getTotalHits();

foreach ($results as $result) {
    // $result instanceof Elastica\Result
}
```

or process aggregation result

```php
// Get aggregations from the result of the search query
$aggregations = $resultSet->getAggregations();

// Notice, that "range" is the same name you chose
// when the aggregation was defined.
foreach ($aggregations['range']['buckets'] as $bucket) {
    // ... handle array $bucket 
}
```
