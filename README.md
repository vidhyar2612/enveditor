# Laravel 5.X - ENV Editor

[![Build Status](https://travis-ci.org/vidhyar2612/enveditor.svg?branch=master)](https://travis-ci.org/vidhyar2612/enveditor)
[![Latest Stable Version](https://poser.pugx.org/vidhyar2612/enveditor/v/stable)](https://packagist.org/packages/vidhyar2612/enveditor)
[![Total Downloads](https://poser.pugx.org/vidhyar2612/enveditor/downloads)](https://packagist.org/packages/vidhyar2612/enveditor)
[![License](https://poser.pugx.org/vidhyar2612/enveditor/license)](https://packagist.org/packages/vidhyar2612/enveditor)

## Installation

The Enveditor Service Provider can be installed via Composer

	"require": {
	  "vidhyar2612/enveditor": "^1.0"
	}


Use composer to install this package.

	composer require vidhyar2612/enveditor


##Registering the Package

Register the service provider within the providers array found in app/config/app.php:

	'providers' => array(
	    // ...

	    vidhyar2612\Enveditor\EnveditorServiceProvider::class
	)

Add an alias within the aliases array found in app/config/app.php:

	'aliases' => array(
	    // ...

	    'Enveditor' => 'vidhyar2612\Enveditor\Facade',
	)
  
## Usage

You can either access the Enveditor store via its facade or inject it by type-hinting towards the abstract class `vidhyar2612\Enveditor\EnveditorStore`.

```php
<?php

	Enveditor::set('ENV_KEY', 'ENV_VALUE');

	Enveditor::get('ENV_KEY');
?>
```
