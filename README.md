# ProPublica-PHP
A simple PHP client for accessing ProPublica's API. 

_This is currently very bare bones and only supports a tiny subset of the 
available endpoints. Pull requests for expanded coverage are welcome._

# Installation
```bash
composer require adamthehutt/propublica-php
```

# Usage
```php
use AdamTheHutt\ProPublica\NonprofitExplorer\Organizations\Request;

$propublica = new Request();
$valid = $propublica->validEin("123456789"); 
\\ false because that's not real organization's EIN

$response = $propublica->get("53-0196605");
\\ $response->organization->name ... American National Red Cross
\\ $response->organization->nteeCode ... P210
```
