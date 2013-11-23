---
layout: page
title: "Raw JSON Query"
comments: true
sharing: true
footer: true
---

Elasticsearch is evolving fast and not all queries and new features which are added to elasticsearch can be immediately added to Elastica. Still it is important that the developers can use all the new functionality. On the one side Elastica tries to map all request with objects which are then mapped to arrays and converted to a JSON string. Because of this it is possible to modify every requets with [raw arrays](/example/raw-array-query.html) or directly a JSON string from the elasticsearch examples. The basic of all this is the following function. 

```php
\Elastica\Client::request($path, $method = Request::GET, $data = array()|string, array $query = array())
```

The function has for params. The first one is the path that should be called, then the type of the Request, the data array which is normally the JSON string and additional query params which should be added to the url. Here is a simple example for a string query in a raw array.

```php
$client = new Client();

$index = $client->getIndex('test');
$index->create(array(), true);
$type = $index->getType('test');
$type->addDocument(new Document(1, array('username' => 'ruflin')));
$index->refresh();

$query = '{"query":{"query_string":{"query":"ruflin"}}}';

$path = $index->getName() . '/' . $type->getName() . '/_search';

$response = $client->request($path, Request::GET, $query);
$responseArray = $response->getData();
```

The content of the responseArray will be as following:

```php
Array
(
    [took] => 2
    [timed_out] => 
    [_shards] => Array
        (
            [total] => 5
            [successful] => 5
            [failed] => 0
        )

    [hits] => Array
        (
            [total] => 1
            [max_score] => 0.30685282
            [hits] => Array
                (
                    [0] => Array
                        (
                            [_index] => test
                            [_type] => test
                            [_id] => 1
                            [_score] => 0.30685282
                            [_source] => Array
                                (
                                    [username] => ruflin
                                )

                        )

                )

        )

)
```

To access the total number of hits, the following code is needed:

```php
$totalHits = $responseArray['hits']['total']);
```

As it was a "raw" query Elastica didn't know it was a query. That is also the reason the basic response object was returned instead of a ResultsSet. This array mapping can be used for every single elasticsearch request.