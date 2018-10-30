Laravel Nova French Datepicker
===============================

## Description

This package is a basic integration of a french datepicker for Laravel Nova (using flatpickr).

## Installation

You may require this package using composer:

```
composer require joffreyc22/nova-french-datepicker
```

You can now use the FrenchDate class by importing it at the top of your file :

```php
use JoffreyC22\FrenchDatepicker\FrenchDate;

FrenchDate::make('start_date')
```

### Screens

<img src="https://raw.githubusercontent.com/JoffreyC22/nova-french-datepicker/master/screens/screen1.png">

The date field will now also appear in french in the index, detail and form parts of the field.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
