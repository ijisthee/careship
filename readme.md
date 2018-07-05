# Cash Machine 3000

This project simulates a cash machine (ATM).

## Getting Started

* clone the project
* run composer install in root directory of project
 ```
composer install
  ```

### Prerequisites

* Install composer if not installed yet.

```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```

## How to use
* use via CLI from projects root directory and follow the instructions
```
php api.php
```
* use via API endpoint
```
domain/api.php?withdraw=xxx
```
* you can actually only use ?withdraw=xxx
* if you don't use any parameter you'll receive instructions
* via API endpoint you receive a json in this shape like this if you ask for 180

```
domain/api.php?withdraw=280
```
|Note|Amount|
|---|---|
|10|1|
|20|1|
|50|1|
|100|2|



### Tests

From root directory call
```
./vendor/bin/phpunit --bootstrap vendor/autoload.php Tests/Model/CashMachineTest.php
```

## Built With

* [PhpStorm](https://www.jetbrains.com/phpstorm/) - IDE used
* [Google](https://www.google.de/) - Knowledge Base :)

## Author

**Christian Rosick**

## License

This project is licensed under the  GNU General Public License