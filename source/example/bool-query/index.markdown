---
layout: page
title: "bool-query"
date: 2013-05-20 22:12
comments: true
sharing: true
footer: true
---

<h1>Query Builder</h1>


```php
$queryCmd ='{
    "query": {
        "bool": {
            "should": [
                {
                    "text": {
                    	"title": "hello"
                    }
                },
                {
                    "has_child": {
                        "type": "post",
                        "query": {
                            "text": {
                                "post_text": "hello"
                            }
                        }
                    }
                }
            ]
        }
    }
}';
```

```php
$es_text1 = new Elastica_Query_Text();
$es_text1 -> setField("title", "hello");
$es_text2 = new Elastica_Query_Text();
$es_text2 -> setField("post_text", "hello");
$es_child = new Elastica_Query_HasChild($es_text2,"post");

$es_bool = new Elastica_Query_Bool();
$es_bool ->addShould($es_text1);
$es_bool ->addShould($es_child);

$es_query = new Elastica_Query($es_bool);
$q = $es_query->toArray();
echo json_encode($q);
$es_search = new Elastica_Search($elastica_client);
$rs = $es_search->addIndex('forum')->search($es_query, 10);
```