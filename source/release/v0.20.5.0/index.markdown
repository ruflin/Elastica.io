---
layout: page
title: "Elastica Release v0.20.5.0"
date: 2013-05-20 22:18
comments: true
sharing: true
footer: true
---
<h1>Release <a href="https://github.com/ruflin/Elastica/tree/v0.20.5.0">v0.20.5.0</a></h1>


<h2 id="section-migration">Migration Guide From  0.19 to 0.20</h2>

First you had to meet the <a href="#section-required">conditions</a> <a href="#">and install Elastica 0.20 version which work with elasticsearch 0.20.</a> 

Elastica 0.20 uses namespace that's why PHP5.3 is required , and each class belongs of a namespace.

For understanding namespace , and how use it let see <a href="http://php.net/manual/en/language.namespaces.php">php.net</a>


Each class which call with an underscore , is include in a namespace.

Example : 

```php
//Before
$Document=new Elastica_Document($id,$documentArray);
//Now
$Document=new \Elastica\Document($id,$documentArray);

//Before
$BoolOr=new Elastica_Filter_BoolOr();
//Now
$BoolOr=new Elastica\Filter\BoolOr();
```


<h3>Migration on class</h3>
<h2>List of Deleted class</h2>
* Elastica_Filter_Or
* Elastica_Filter_And

<h2>List of Deprecated class</h2>
<table>
<tr>
<th>Ex method</th>
<th>New method</th>
<th>Comments</th>
</tr>
<tr>
<td>Elastica_Filter_Or</td>
<td>Elastica\Filter\BoolOr</td>
<td></td>
</tr>
<tr>
<td>Elastica_Filter_And</td>
<td>Elastica\Filter\BoolAnd</td>
<td></td>
</tr>
</table>

<h2>List of new class</h2>
* Elastica\Connection()

<h3>Migration on methods</h3>
<h2>List of Deleted methods</h2>

* \Elastica\Type::getType()
* \Elastica\Filter\Script::setQuery()
* \Elastica\Query\QueryString::setQueryString()
* \Elastica\Query\Builder::minimumShouldMatch()
* \Elastica\Query\Builder::tieBreaker()


<h2>List of Deprecated methods</h2>
<table>
<tr>
<th>Ex method</th>
<th>New method</th>
<th>Comments</th>
</tr>
<tr>
<td>Elastica_Document::add($key,$value)</td>
<td>Elastica\Document::set($key,$value)</td>
<td></td>
</tr>
</table>

<h2>List of new methods</h2>
* \Elastica\Facet\Terms::setScript()
* \Elastica\Document::set() && get() && has() && remove()
