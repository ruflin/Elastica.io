<?php
	$this->title = 'Elastica Installation - Elastica.io';
?>

<ul>
	<li>
		<a href="#section-required">Required</a>
	</li>
	<li>
		<a href="#section-download">Download</a>
	</li>
    <li>
        <a href="#section-composer">Composer</a>
    </li>
	<li>
		<a href="#section-include">Include in your project</a>
	</li>
	<li>
		<a href="#section-connect">Connect to elasticsearch</a>
		<ul>
			<li><a href="#section-connect-single">Running a single node</a></li>
			<li><a href="#section-connect-cluster">Running a cluster</a></li>
		</ul>
	</li>
</ul>


	<h2 id="section-installation">Installation</h2>
		<h3 id="section-required">Required</h3>
			<p>
			    Elastica v.0.20.5 require <strong>PHP 5.3 >=</strong>, for using Elastica on PHP 5.2 let see <a href="https://github.com/ruflin/Elastica/tree/v0.19.8.0"> Elastica v0.19.8</a>
			</p>
		<h3 id="section-download">Download</h3>
			<p>
				You can download this project in either <a href="http://github.com/ruflin/Elastica/zipball/master">zip</a> or <a href="http://github.com/ruflin/Elastica/tarball/master">tar</a> formats.
			</p>
			<p>
				The prefered way is to clone <em>Elastica</em> with <a href="http://git-scm.com">Git</a> by running:
				<pre class="prettyprint">$ git clone git://github.com/ruflin/Elastica</pre>
			</p>
        <h3 id="section-composer">Composer</h3>
            <p>
                You can also install Elastica by using composer:
                <pre class="prettyprint">
{
    "require": {
        "ruflin/Elastica": "dev-master"
    }
}
                </pre>
            </p>
		<h3 id="section-include">Include in your project</h3>
            <p>If you've used composer to install Elastica it's very easy. Assuming your document root index file is in
                /htdocs/myproject/web/ and composer installed the vendor file in /htdocs/myproject/vendor your index.php
                has to look like this:
                <pre class="prettyprint">
require_once '../vendor/autoload.php';
                </pre>
            </p>
			<p>
				If you don't use composer in your project you have to include Elastica. Best way to do this is to use PHP <a href="http://php.net/manual/en/function.spl-autoload-register.php">spl_autoload_register</a>. This function is automatically called in case you are trying to use a class/interface which hasn't been defined yet.
			</p>
			<p>
				So let's assume you installed Elastica to <code>/var/www/Elastica</code>. When you make an instance of <code>\Elastica\Client</code>, the function will check if there is a file with that class in <code>/var/www/Elastica/Client</code> and load it.
			<p>
			<pre class="prettyprint">
function __autoload_elastica ($class) {
    $path = str_replace('\\', '/', substr($class, 1));

    if (file_exists('/var/www/' . $path . '.php')) {
        require_once('/var/www/' . $path . '.php');
    }
}
spl_autoload_register('__autoload_elastica');

//Or using anonymous function PHP 5.3.0>=
spl_autoload_register(function($class){
   
   if (file_exists('/var/www/' . $class . '.php')) {
        require_once('/var/www/' . $class . '.php');
    }

});

</pre>
			<p>
				Now you are ready to use elasticsearch in your PHP project! Hurray!
			</p>
		<h3 id="section-connect">Connect to elasticsearch</h3>
				<p>
					You need at least one instance, also called node, of elasticsearch running and be able to connect to it. Luckily it's easy and you can follow this guide to <a href="http://www.elasticsearch.org/tutorials/2010/07/01/setting-up-elasticsearch.html">set up elasticsearch</a>.
				</p>
				<p>
					To start an instance of your installed elasticsearch you just need to run the following command in the elasticsearch folder:
				</p>
				<pre>$ ./bin/elasticsearch -f</pre>
                <p>If you are developing under windows just go to the bin folder and run</p>
                <pre>> elasticsearch.bat</pre>
				<p>
					<strong>You can start multiple nodes</strong> by running the command multiple times. As you will see, the first node will be started on port 9200. If you start another node it will listen on port 9201 and so on. Elasticsearch automatically discovers the other nodes and creates a cluster.
				</p>
				<h4 id="section-connect-single">Running a single node</h4>
					<p>
						When your single elasticsearch node is running on <code>localhost:9200</code>, which is the default, you can simply connect:
					</p>
					<pre class="prettyprint">$elasticaClient = new \Elastica\Client();</pre>
					<p>
						In case that your node is running on another server or a different port, you can pass these information as an array:
					</p>
					<pre class="prettyprint">
$elasticaClient = new \Elastica\Client(array(
    'host' => 'mydomain.org',
    'port' => 12345
));</pre>
				<h4 id="section-connect-cluster">Running a cluster</h4>
					<p>
						Elasticsearch was built with the cloud / multiple distributed servers in mind. It is quite easy to start a elasticsearch cluster simply by starting multiple instances of elasticsearch on one server or on multiple servers. To start multiple instances of elasticsearch on your local machine, just run the command to start an instance in the elasticsearch folder twice.
					</p>
					<p>
						One of the goals of the distributed search index is availability. If one server goes down, search results should still be served. But if the client connects to only the server that just went down, no results are returned anymore. Because of this, <code>\Elastica\Client</code> supports multiple servers which are accessed in a round robin algorithm. This is the only and also most basic option at the moment. So if we start a node on port 9200 and port 9201 above, we pass the following arguments to <code>\Elastica\Client</code> to access both servers:
					</p>
					<pre class="prettyprint">
$elasticaClient = new \Elastica\Client(array(
    'servers' => array(
        array('host' => 'localhost', 'port' => 9200)
        array('host' => 'localhost', 'port' => 9201)
    )
));</pre>
					<p>
						This client implementation also allows to distribute the load on multiple nodes. As far as I know, Elasticsearch already does this quite well on its own. But it helps if more than one node can answer http requests. Therefore, the method above is really useful if you use more than one elasticsearch node in a cluster to send your request to all servers.
					</p>