---
layout: page
title: "Upsert migration"
comments: true
sharing: true
footer: true
---
Prior to 0.90.2, upsert is done in the following manner:
```php
$document = new Elastica\Document();
$document->setId(1);
$document->add('counter', 1);
$script = new Elastica\Script('ctx._source.counter += count', array('count' => 4));
$document->setScript($script);

$type->updateDocument($document);
```

In the above, the `Elastica\Document` is used as the upsert if the document does not exist. If it does, the script is used to update the document.

While the above is quite elegant and doesn't break backwards compatibility, it doesn't support other types of upsert scenarios.

In Elasticsearch, we can perform these type of updates with upsert support:

* Update the document with a script and provide an optional document to use as the upsert.
* Update the document with a partial document and provide an optional document to use as the upsert.
* Update the document with a partial document and set `doc_as_upsert` to use the document as the upsert if it does not exist.

In light of the above requirements, we need to change the way upsert is done and this results in a backwards-compatibility break.

Now, Elastica\Script and Elastica\Document are both first class citizens. To include upsert data, we would do the following:

```php
$upsert = new Document();
$upsert->setData(array('myfield' => 'myvalue'));
$script = new Script('ctx._source.field2 += count; ctx._source.remove("field3")');
$script->setUpsert($upsert);
$script->setId(1); //Will use script to update document 1
$type->updateDocument($script); //Will try to update the document with the script. If it does not exist, upsert using the upsert document.
```

In the above example, we tell Elasticsearch to attempt to update the document using the update script. If the document does not exist, upsert (insert) the provided document instead.

```php
$upsert = new Document();
$upsert->setData(array('myfield' => 'value'));
$doc = new Document(1, array('myfield' => 'updatedvalue'));
$doc->setUpsert($upsert);
$type->updateDocument($doc); //Will try to update the document with the partial document. If it does not exist, upsert using the upsert document.
```

In this example, we ask Elasticsearch to try and update the document using a partial document (`$doc`). If it does not exist, we then upsert the document provided (`$upsert`).

Finally, there are cases where we want to update a document using a partial document, but if it does not exist, we would like to use it as the upsert.
This feature was introduced in Elasticsearch 0.90.2 and helps cut down on the about of data sent over the wire:

```php
$doc = new Document();
$doc->setData(array('myfield' => 'myvalue'));
$doc->setId(1);
$doc->setUpsertAsDoc(true);
$type->updateDocument($doc); //If the document does not exist, treat the document as an upsert.
```
