# php-test-data
Library to create some kind of test data

At this time, it support function below.

## 1. Get a Vietnamese name randomly

```php
use umbalaconmeogia\testdata\vietnam\Name;

$name = Name::getName(); // For random gender.
$name = Name::getName(1); // For a male name.
$name = Name::getName(2); // For a female name.
```

## 2. Generate Japanese name (TBD soon)

## 3. Generate Japanese address (TBD soon)