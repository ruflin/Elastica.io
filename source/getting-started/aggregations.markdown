---
layout: page
title: "aggregations"
comments: true
sharing: true
footer: true
---

Elasticsearch provides a way to aggregate data which is mapped by accordingly
classes that can be added to the query.

<h2>Adding aggregations to query</h2>

New aggregations can be created and added to the query afterwards:

```php
$facet = new \Elastica\Aggregation\Terms('Some label', 'fieldName');
$facet->setField('fieldName');
$query->addAggregation($facet);

$facet = new \Elastica\Aggregation\DateHistogram('Some label again', 'fieldName', 'month');
$query->addAggregation($facet);
```

For further information check out the different
[classes](/api/latest/namespaces/Elastica.Aggregation.html) and [official Documentation](https://www.elastic.co/guide/en/elasticsearch/reference/5.0/search-aggregations.html).

<h2>Accessing Aggregations in result</h2>

Returned aggregations are available at `$searchResult->getAggregations();`.
