---
layout: page
title: "How to create an Elastica Release"
date: 2014-03-08 13:07
comments: true
sharing: true
footer: true
---
The following steps have to be followed to create a new Elastica Release

* Open a pull request with the release planned in in changes.txt on top
* Verify that all the builds on [Travis](https://travis-ci.org/ruflin/Elastica) are green for the current version
* Merge pull request
* Go to [Github Release page](https://github.com/ruflin/Elastica/releases) and "Draft a new release"
* Set the proper tag and title (Release vX.X.X.X) for the release based on the elasticsearch version and the minor version. The first 3 numbers are the elasticsearch release, the last on is the minor release between elasticsearch releases.
* Copy all the changes since the last release from [changes.txt](https://github.com/ruflin/Elastica/blob/master/changes.txt) and format them properly (remove dates)
* Publish the release
* Update [Elastica.io](http://elastica.io)
  * Create a release post on Elastica.io with the changes and download link (``rake new_post['Release vX.X.X.X']``)
  * Update the Releases page with the newest release: http://elastica.io/releases/
* Announce the release on the [Elastica Google Group](https://groups.google.com/forum/#!forum/elastica-php-client)
* Announce the release on Twitter
