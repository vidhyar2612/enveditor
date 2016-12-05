# Laravel 5.X - ENV Editor

[![Build Status](https://travis-ci.org/vidhyar2612/enveditor.svg?branch=master)](https://travis-ci.org/vidhyar2612/enveditor)
[![Latest Stable Version](https://poser.pugx.org/vidhyar2612/enveditor/v/stable)](https://packagist.org/packages/vidhyar2612/enveditor)
[![Total Downloads](https://poser.pugx.org/vidhyar2612/enveditor/downloads)](https://packagist.org/packages/vidhyar2612/enveditor)
[![License](https://poser.pugx.org/vidhyar2612/enveditor/license)](https://packagist.org/packages/vidhyar2612/enveditor)

## Installation

1. Run 'composer require vidhyar2612/enveditor'

2. Add `vidhyar2612\Enveditor\EnveditorServiceProvider::class` to the array of providers in `config/app.php`.

3. Add `'Enveditor' => 'vidhyar2612\Enveditor\Facade'` to the array of aliases in `config/app.php`.
  
## Usage

You can either access the Enveditor store via its facade or inject it by type-hinting towards the abstract class `vidhyar2612\Enveditor\EnveditorStore`.

```php
<?php

	Enveditor::set('ENV_KEY', 'ENV_VALUE');

	Enveditor::get('ENV_KEY');
?>
```
