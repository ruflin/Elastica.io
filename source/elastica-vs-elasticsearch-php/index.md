---
layout: page
title: "Elastica vs elasticsearch-php"
comments: true
sharing: true
footer: true
---

One of the more frequent question is how do [Elastica](https://github.com/ruflin/Elastica) and the official [elasticsearch-php](https://github.com/elastic/elasticsearch-php) client compare. This page is here to give some insights about the differences of the two clients and should support you in which one to pick.

For more details also have a look at the linked blog posts and discussions below.

# Comparison Table

The following table should give a brief overview how Elastica and elasticsearch-php compare.

| 							| **Elastica** 		| **elasticsearch-php** |
|---------------------------|-------------------|-----------------------|
| **Active Development** 	| yes 				| yes 					|
| **Documentation**		 	| low 				| good 					|
| **IDE Autocomplete**		| yes 				| no 					|
| **Performance**			| good 				| good 					|
| **Code size**				| medium 			| low 					|
| **Paid Developers**		| no	 			| yes 					|
| **Http Client**			| Selectable		| guzzle3 				|


# History
Elastica was in 2010 one of the first PHP clients for elasticsearch and was initially built for elasticsearch v0.16.0 and before. Since then a lot of things have changed in the elasticsearch API. Filter, facets, aggregations and more were added which also added complexity on the client side.

In 2013 elasticsearch decided to unify all its elasticsearch client to have a common base and started to build elasticsearch-php. Since then, both clients are developen in parallel.


# Elastica

As this is the Elastica page, here also some points that are specific to Elastica. 

## DSL Mapping
Elastica maps the Elasticsearch DSL to objects. The advantage of this is that in an IDE autocomplete can be used to write the queries. This makes it possible that the engineers has to less think about how many open arrays and what the exact syntax of elasticsearch is. In addition, it makes it possible the Elastica can notify engineers by marking specific functions deprecated, that these functions will disappear with a future elasticsearch release or even map the changes, so the code stays the same. But this also adds complexity to the code of Elastica and means the code has to changed and adapted with every release of elasticsearch.

## Raw Queries
Is Elastica used with raw queries, then the usage is very similar to the elasticsearch-php client and allows all flexibility. More details can be found here: http://elastica.io/example/raw-array-query.html

# Links
* [Zachary Tong explaining the difference](https://groups.google.com/forum/#!searchin/elasticsearch/ruflin/elasticsearch/kDWc8lOHV7s/NgmrtChmkrMJ)

# Thoughts
Potentially Elastica could be a layer on top of the elasticsearch-php client to offer the extensive API. Like this Elastica would profit from the development of the elasticsearch-php client and the speed improvements, but could offer the layer on top.
