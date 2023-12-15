# applemusic
iTunes Music Search PHP Class

A PHP class designed for searching music on iTunes and retrieving results in a structured JSON format. This class provides an easy way to integrate iTunes music search functionality into your web applications. It includes methods for initiating searches, fetching results, and rendering them in a JSON format. Ideal for PHP developers, this class facilitates seamless access to iTunes music data for songs. Easily incorporate iTunes music search into your projects with this PHP class.

## Usage Example

```php
<?php

// Include the Search class
require_once 'iTunes.php';

// Initialize with search keywords
$Search = new Search('your search keywords');

// Perform the search
$Search->SearchKeywords();

// Render and display JSON results
$Search->ResultData();

?>
