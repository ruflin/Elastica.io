---
layout: page
title: "Sorting hits"
comments: true
sharing: true
footer: true
---

<a id="distance"><h1>Sort By Distance</h1></a>

Assuming your indexed data includes a [geo-point](http://www.elasticsearch.org/guide/reference/mapping/geo-point-type/) named pin.location you can implement a sort by distance using the following

Direct JSON request to elastic search
```json
{
    "sort" : [
        {
            "_geo_distance" : {
                "pin.location" : [-70, 40],
                "order" : "asc",
                "unit" : "km"
            }
        }
    ]
}
```
Equivalent implementation in Elastica
```php
$index = $elasticaClient->getIndex('someindex');
$elasticaQuery = new \Elastica\Query();

$elasticaQuery->addSort( 
    ['_geo_distance' => [
      'pin.location' => [-70, 40], 
      'order' => 'asc',
      'unit' => 'km'] 
    ] 
);

$elasticaResultSet = $index->search($elasticaQuery);
$hits = $elasticaResultSet->getResults();
```