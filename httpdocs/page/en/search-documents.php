<?php
	$this->title = 'Search Documents - Elastica.io';
?>

<ul>
	<li>
		<a href="#section-query">Search query</a>
	</li>
	<li>
		<a href="#section-retrieve">Retrieve results</a>
	</li>
	<li>
		<a href="#section-filter">Add filter</a>
	</li>
	<li>
		<a href="#section-facets">Facets</a>
	</li>
</ul>

	<h2 id="section-search">Search documents</h2>
		<p>
			With some documents in the index we can start searching. A basic search is executing a query against elasticsearch. The result of a query then can be filtered by defining some filters. Additionally you can retrieve facets to create a search navigation based on filters. For further information check out the <a href="http://www.elasticsearch.org/guide/reference/query-dsl/">Query DSL</a> and the <a href="http://www.elasticsearch.org/guide/reference/api/search/facets/">Facets</a> reference. In this example we don't use all possible options to keep it simple. Take a look in the <a href="api/index.html">Elastica API</a> for more options.
		</p>

		<h3 id="section-query">Search query</h3>
			<p>
				A query retrieves a set of results matching a query. So if you search with a <code>match_all</code> query you would get all the documents in that index or type, depending on where you search. The way elasticsearch finds the documents depends also on which analyzers you defined when creating the index.
			</p>
			<p>
				So how do you define a query in Elastica? Just create a Query object and give it some data. It's a simple as that.
			</p>
<pre class="prettyprint">
// Define a Query. We want a string query.
$elasticaQueryString 	= new Elastica\Query\QueryString();

//'And' or 'Or' default : 'Or'
$elasticaQueryString->setDefaultOperator('AND');
$elasticaQueryString->setQuery('sesam street');

// Create the actual search object with some data.
$elasticaQuery 		= new Elastica\Query();
$elasticaQuery->setQuery($elasticaQueryString);

//Search on the index.
$elasticaResultSet 	= $elasticaIndex->search($elasticaQuery);</pre>
			<p>I know, at first it seems a bit complicated with the nesting of all the arrays. But it really isn't. The <code>$elasticaQuery</code> contains all the information regarding our query. We will add filter and facets later. Your search can always consist of only one query but as-much-as-you-like filters and facets.</p>
            <p>If you want a pagination in your application you can use the following commands:
<pre class="prettyprint">
$elasticaQuery->setFrom(50);    // Where to start?
$elasticaQuery->setLimit(25);   // How many?
</pre>
            </p>

		<h3 id="section-retrieve">Retrieve results</h3>
			<p>In the <code>$elasticaResultSet</code> all the resulting documents are stored. You can get them together with some statistics easily.</p>
<pre class="prettyprint">
$elasticaResults 	= $elasticaResultSet->getResults();
$totalResults 		= $elasticaResultSet->getTotalHits();

foreach ($elasticaResults as $elasticaResult) {
    var_dump($elasticaResult->getData());
}</pre>

		<h3 id="section-filter">Add filter</h3>
			<p>
				Adding and nesting filter can get a bit complex but I try to keep it simple. Filters are added to the search query object (<code>$elasticaQuery</code>). Let's assume we already have a query searching for sesam street. We now can define some filters on the resulting data. So if we want to find all muppets that like cookies and are either blue or green, our filters would look something like that:
			</p>
<pre class="prettyprint">
// Filter for being of color blue
$elasticaFilterColorBlue	= new \Elastica\Filter\Term();
//search 'color' = 'blue'
$elasticaFilterColorBlue->setTerm('color', 'blue');

// Filter for being of color green
$elasticaFilterColorGreen	= new \Elastica\Filter\Term();
$elasticaFilterColorGreen->setTerm('color', 'green');


<!--// Or can be write like that : 
$elasticaFilterColorBlue->setTerm('color', array('blue','green')); -->

// Filter for liking cookies
$elasticaFilterLikesCookies	= new \Elastica\Filter\Term();
$elasticaFilterLikesCookies->setTerm('likes', 'cookies');


// Filter 'or' for the color, adding the color filters
$elasticaFilterOr 	= new \Elastica\Filter\BoolOr();
$elasticaFilterOr->addFilter($elasticaFilterColorBlue);
$elasticaFilterOr->addFilter($elasticaFilterColorGreen);

// Filter 'and' for the colors and likes
$elasticaFilterAnd 	= new \Elastica\Filter\BoolAnd();
$elasticaFilterAnd->addFilter($elasticaFilterOr);
$elasticaFilterAnd->addFilter($elasticaFilterLikesCookies);

// Add filter to the search object.
$elasticaQuery->setFilter($elasticaFilterAnd);</pre>

			<p>
				With the filters added, the search is ready to be executed. Probably this would return the cookie monster. But that depends on the data you added to your index, of course.
			</p>

		<h3 id="section-facets">Facets</h3>
			<p>
				A facet returns some information on the data in your database, depending on your search query. So let's say there is a field <code>tag</code> in our documents. In the results of our query we want to know, which tags are used by the results and how many documents have a certain tag. Read more in the <a href="http://www.elasticsearch.org/guide/reference/api/search/facets/">facets API</a>.
			</p>
			<p>
				Here is a quick example on how to define a facet for your query:
			</p>
<pre class="prettyprint">
// Define a new facet.
$elasticaFacet 	= new \Elastica\Facet\Terms('myFacetName');
$elasticaFacet->setField('tags');
$elasticaFacet->setSize(10);
$elasticaFacet->setOrder('reverse_count');

// Add that facet to the search query object.
$elasticaQuery->addFacet($elasticaFacet);</pre>

			<p>
				This will return 10 tags together with a count of the documents in your current filtered search query. Retrieving the facets works similar to the retrieval of the documents.
			</p>
<pre class="prettyprint">
// Get facets from the result of the search query
$elasticaFacets = $elasticaResultSet->getFacets();

// Notice, that myFacetName is the same as above
// when the facet was defined.
foreach ($elasticaFacets['myFacetName']['terms'] as $elasticaFacet) {
    var_dump($elasticaFacet);
}</pre>
            <p>A good use case is using the different types in your index as a facet. To get this you've to define the facet like this:
<pre class="prettyprint">
$elasticaFacet = new \Elastica\Facet\Terms('Facettes');
    $elasticaFacet->setField('_type');
}</pre>
            </p>
