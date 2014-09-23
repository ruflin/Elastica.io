---
layout: page
title: "Terms Aggregation"
comments: true
sharing: true
footer: true
---

In JSON form, a [terms aggregation](http://www.elasticsearch.org/guide/en/elasticsearch/reference/master/search-aggregations-bucket-terms-aggregation.html) looks like so:
```json
{
    "aggs" : {
        "genders" : {
            "terms" : { "field" : "gender" },
            "size": 10
        }
    }
}
```

The same aggregation can be performed using Elastica:
```php
use Elastica\Aggregation\Terms;
use Elastica\Query;

// set up the aggregation
$termsAgg = new Terms("genders");
$termsAgg->setField("gender");
$termsAgg->setSize(10);

// add the aggregation to a Query object
$query = new Query();
$query->addAggregation($termsAgg);

// retrieve the results
$index = $elasticaClient->getIndex('someindex');
$buckets = $index->search($query)->getAggregation("genders");
```

Sub-aggregations are also supported:
```json
{
    "aggs" : {
        "genders" : {
            "terms" : {
                "field" : "gender",
                "order" : { "height_stats.avg" : "desc" }
            },
            "aggs" : {
                "height_stats" : { "stats" : { "field" : "height" } }
            }
        }
    }
}
```

```php
use Elastica\Aggregation\Terms;
use Elastica\Aggregation\Stats;
use Elastica\Query;

$termsAgg = new Terms("genders");
$termsAgg->setField("gender");
$termsAgg->setOrder("height_stats.avg", "desc");

$statsAgg = new Stats("height_stats");
$statsAgg->setField("height");

$termsAgg->addAggregation($statsAgg);

$index = $elasticaClient->getIndex('someindex');
$buckets = $index->search($query)->getAggregation("genders");

foreach($buckets as $bucket){
    $statsAggResult = $bucket["height_stats"];
    // do something with the result of the stats agg
}
```