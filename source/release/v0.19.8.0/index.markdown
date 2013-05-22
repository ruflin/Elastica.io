---
layout: page
title: "Release v0.19.8.0"
date: 2013-05-20 22:18
comments: true
sharing: true
footer: true
---

Release [v0.19.8.0](https://github.com/ruflin/Elastica/tree/v0.19.8.0)
======================================================================

This release breaks backward compatibility!

Date: 2012-08-12


Release Notes
-------------

All changes can be found in the [changes.txt](https://github.com/ruflin/Elastica/blob/v0.19.8.0/changes.txt)

### BC Breaks

* Change Elastica_Filter_GeoDistance::__construct(), accepts geohash parameter (BC break, before: ($key, $latitude, $longitude, $distance), after: ($key, $location, $distance) where $location is array('lat' => $latitude, 'lon' => $longitude) or a geohash)


### Changes
* Remove old style path creation through params in Elastica_Index::create and Elastica_Search::search</li>
* PSR1/PSR2 Style enforced</li>


### Additions
* Elastica_Query_Prefix added</li>
* Added Elastica_ScriptFields</li>
* Added Elastica_Filter_Limit</li>
* Facet scope added</li>
* Added Elastica_Filter_MatchAll</li>
* Added Elastica_Filter_Limit</li>
