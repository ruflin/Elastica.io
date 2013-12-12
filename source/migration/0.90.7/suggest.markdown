---
layout: page
title: "Suggestion migration"
comments: true
sharing: true
footer: true
---
In version 0.90.7 and earlier, [suggest](http://www.elasticsearch.org/guide/en/elasticsearch/reference/current/search-suggesters.html) operations were performed as follows:
```php
$search = new Elastica\Search($client);
$suggest = new Elastica\Suggest\Term();
$suggest->addTerm('suggest1', array('text' => 'Foor', 'term' => array('field' => '_all', 'size' => 4)));
$suggest->addTerm('suggest2', array('text' => 'Girhub', 'term' => array('field' => '_all', 'size' => 4)));
$search->addSuggest($suggest);
$result = $search->search();
```

In releases after 0.90.7, suggestions have been refactored to more closely resemble Elastica's query implementation.

With the new suggest implementation, the term suggestion above would be executed like so:
```php
$suggest = new Elastica\Suggest();
$term1 = new Elastica\Suggest\Term('suggest1', '_all');
$term1->setText('Foor')->setSize(4);
$suggest->addSuggestion($term1);
$term2 = new Elastica\Suggest\Term('suggest2', '_all');
$term2->setText('Girhub')->setSize(4);
$suggest->addSuggestion($term2);
$result = $index->search($suggest);
```
Each term suggester is represented by a its own object, which allows for more user-friendly configuration.
Additionally, with the addition of `Elastica\Suggest\Phrase`, phrase and term suggest operations can now be performed in the same query:
```php
$suggest = new Elastica\Suggest();
$term = new Elastica\Suggest\Term('term', '_all');
$term->setText('Foor')->setSize(4);
$suggest->addSuggestion($term1);
$phrase = new Elastica\Suggest\Phrase('phrase', '_all');
$phrase->setText('Elasticsearch is bansai coor');
$suggest->addSuggestion($phrase);
$result = $index->search($suggest);
```
