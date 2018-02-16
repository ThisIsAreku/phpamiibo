# phpamiibo
Parse amiibo dumps in PHP

## Installation
```
composer require thisisareku/phpamiibo
```
## Usage
```php
<?php
require 'vendor/autoload.php';

use ThisIsAreku\PhpAmiibo\AmiiboDump;

$filePath = '/path/to/dump.bin';
$amiibo = new AmiiboDump($filePath);

var_dump([
    $amiibo->getHexGameSerie(),
    $amiibo->getHexVariation(),
    $amiibo->getHexType(),
    $amiibo->getHexAmiibo(),
    $amiibo->getHexAmiiboSerie(),
    $amiibo->getHex02(),
]);
```