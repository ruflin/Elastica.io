<?php
	$this->title = 'Storing and Indexing Documents - Elastica.io';
?>

<ul>
	<li>
		<a href="#section-analysis">Define Analysis</a>
	</li>
	<li>
		<a href="#section-mapping">Define Mapping</a>
	</li>
	<li>
		<a href="#section-add">Add documents</a>
	</li>
</ul>


	<h2 id="section-storing">Storing and indexing documents</h2>
		<p>
			To add data to the index you can just drop some documents in and it will be indexed directly. But in most cases you want to specify how your data is indexed. There are a lot of possibilities in elasticsearch to do so. You can decide how each field is mapped and how your data is analyzed to provide the full text search.
		</p>
		<p>
			For more information and all the possibilities elasticsearch provides, take a look at the <a href="http://www.elasticsearch.org/guide/reference/index-modules/analysis/">Analysis</a> and the <a href="http://www.elasticsearch.org/guide/reference/mapping/">Mapping</a> reference.
		</p>
		<p>
			The documents in elasticsearch are organized in indexes. Each index contains one or more types which contains the documents. So to put our data in elasticsearch, we first have to define how the index and the type will look like.
		</p>
		<h3 id="section-analysis">Define Analysis</h3>
			<p>
				In elasticsearch, when you create an index, you define the number of shards and number of replicas. A shard is a part of your data and a replica is like an backup of that data. So when you have one node, all the shards and all the replicas will be on that node. When you have more nodes, your data will be balanced to these nodes. How it is balanced depends on your configuration. More on this topic can be found <a href="http://www.elasticsearch.org/videos/2010/02/08/es-distributed-diagram.html"> here</a>.

			</p>
			<p>
				Data in elasticsearch is analyzed at two different times. Once, when you index a document it's analyzed and this information is put in the index. The other time is when do a search. Elasticsearch analyzes the search query and looks up the gained information in the index. To see all possible analyzers and filter check out the <a href="http://www.elasticsearch.org/guide/reference/index-modules/analysis/">Analysis</a> reference.
			</p>
			<p>
				Let's create an index called twitter! So in the <code>indexAnalyzer</code> we define how the data will be analyzed when it's indexed and then we define how elasticsearch will analyze the search query in the <code>searchAnalyzer</code>. In this example we'll also use a custom snowball filter for the data.
			</p>
			<p>
			    The second argument of <code>\Elastica\Index</code> is an OPTIONAL bool=> (true) Deletes index first if already exists (default = false)
			</p>
<pre class="prettyprint">
// Load index
$elasticaIndex = $elasticaClient->getIndex('twitter');

// Create the index new
$elasticaIndex->create(
    array(
        'number_of_shards' => 4,
        'number_of_replicas' => 1,
        'analysis' => array(
            'analyzer' => array(
                'indexAnalyzer' => array(
                    'type' => 'custom',
                    'tokenizer' => 'standard',
                    'filter' => array('lowercase', 'mySnowball')
                ),
                'searchAnalyzer' => array(
                    'type' => 'custom',
                    'tokenizer' => 'standard',
                    'filter' => array('standard', 'lowercase', 'mySnowball')
                )
            ),
            'filter' => array(
                'mySnowball' => array(
                    'type' => 'snowball',
                    'language' => 'German'
                )
            )
        )
    ),
    true
);</pre>
		<h3 id="section-mapping">Define Mapping</h3>
			<p>
				The Mapping defines what kind of data is in which field. If no mapping is defined, elasticsearch will guess the kind of the data and map it. To see all possibilities, check out the <a href="http://www.elasticsearch.org/guide/reference/mapping/">Mapping</a> reference.
			</p>
			<p>
				In our example, we will create an type called tweet which is in our index twitter. So first we create that type and afterwards we define the mapping. Note that it is possible to boost data in elasticsearch. You can either boost a specific field or you can boost a complete document. To boost a document, we'll use the field <code>_boost</code>. If we boost a field it's defined just like the kind of the field.
			</p>
<pre class="prettyprint">
//Create a type
$elasticaType = $elasticaIndex->getType('tweet');

// Define mapping
$mapping = new \Elastica\Type\Mapping();
$mapping->setType($elasticaType);
$mapping->setParam('index_analyzer', 'indexAnalyzer');
$mapping->setParam('search_analyzer', 'searchAnalyzer');

// Define boost field
$mapping->setParam('_boost', array('name' => '_boost', 'null_value' => 1.0));

// Set mapping
$mapping->setProperties(array(
    'id'      => array('type' => 'integer', 'include_in_all' => FALSE),
    'user'    => array(
        'type' => 'object',
        'properties' => array(
            'name'      => array('type' => 'string', 'include_in_all' => TRUE),
            'fullName'  => array('type' => 'string', 'include_in_all' => TRUE)
        ),
    ),
    'msg'     => array('type' => 'string', 'include_in_all' => TRUE),
    'tstamp'  => array('type' => 'date', 'include_in_all' => FALSE),
    'location'=> array('type' => 'geo_point', 'include_in_all' => FALSE),
    '_boost'  => array('type' => 'float', 'include_in_all' => FALSE)
));

// Send mapping to type
$mapping->send();</pre>
		<h3 id="section-add">Add documents</h3>
			<p>
				Now that we have our index ready for the data, we just need to go ahead an put some data in there!
			</p>
			<p>
				First we put together our document. In our example it's a tweet. This tweet is going to be a <code>\Elastica\Document</code> which is then added to our type tweet in the index twitter.
			</p>
<pre class="prettyprint">
// The Id of the document
$id = 1;

// Create a document
$tweet = array(
    'id'      => $id,
    'user'    => array(
        'name'      => 'mewantcookie',
        'fullName'  => 'Cookie Monster'
    ),
    'msg'     => 'Me wish there were expression for cookies like there is for apples. "A cookie a day make the doctor diagnose you with diabetes" not catchy.',
    'tstamp'  => '1238081389',
    'location'=> '41.12,-71.34',
    '_boost'  => 1.0
);
// First parameter is the id of document.
$tweetDocument = new \Elastica\Document($id, $tweet);

// Add tweet to type
$elasticaType->addDocument($tweetDocument);

// Refresh Index
$elasticaType->getIndex()->refresh();</pre>
			<p>
				Now the index contains a document. But that's not enough! Add more documents to the index, so a search makes sense!
			</p>
    <h3 id="section-bulk">Bulk indexing</h3>
        <p>
            Of course you can add one document after another. But what if you want to put the content of a large database this can be slow. It's better to create an array of documents and add them all at once:
<pre class="prettyprint">
$documents = array();
while ( ... ) { // Fetching content from the database
    $documents[] = new \Elastica\Document(
        $id,
        array(
            ...
        );
    );
}
// \Elastica\Type::addDocuments(array \Elastica\Document);
$elasticaType->addDocuments($tweetDocument);
$elasticaType->getIndex()->refresh();
</pre>
            A good start are 500 documents per bulk operation. Depending on the size of your documents you've to play around a little how many documents are a good number for your application.
        </p>
