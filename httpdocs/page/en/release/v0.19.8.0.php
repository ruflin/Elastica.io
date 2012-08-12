<?php
	$this->title = 'Elastica Release v0.19.8.0';
?>
<h1>Release <a href="https://github.com/ruflin/Elastica/tree/v0.19.8.0">v0.19.8.0</a></h1>
<p>This release breaks backward compatibility!</p>
Date: 2012-08-12
<h2>Release Notes</h2>
<p>All changes can be found in the <a href="https://github.com/ruflin/Elastica/blob/v0.19.8.0/changes.txt">changes.txt</a></p>

<h3>BC Breaks</h3>
<ul>
	<li>Change Elastica_Filter_GeoDistance::__construct(), accepts geohash parameter (BC break, before: ($key, $latitude, $longitude, $distance), after: ($key, $location, $distance) where $location is array('lat' => $latitude, 'lon' => $longitude) or a geohash)</li>
</ul>

<h3>Changes</h3>
<ul>
	<li>Remove old style path creation through params in Elastica_Index::create and Elastica_Search::search</li>
	<li>PSR1/PSR2 Style enforced</li>
</ul>

<h3>Additions</h3>
<ul>
	<li>Elastica_Query_Prefix added</li>
	<li>Added Elastica_ScriptFields</li>
	<li>Added Elastica_Filter_Limit</li>
	<li>Facet scope added</li>
	<li>Added Elastica_Filter_MatchAll</li>
	<li>Added Elastica_Filter_Limit</li>
</ul>

