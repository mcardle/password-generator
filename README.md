[![CI Workflow](https://github.com/mcardle/password-generator/actions/workflows/ci.yml/badge.svg)](https://github.com/mcardle/password-generator/actions/workflows/ci.yml)
[![codecov](https://codecov.io/gh/mcardle/password-generator/branch/8.2/graph/badge.svg?token=RNO0PO27GC)](https://codecov.io/gh/mcardle/password-generator)

# Password Generator

This is just a simple PHP password generator. To generate a strong password simple, just type:

```
echo PasswordGenerator::all(8);
```

The number eight is the length of the password. If you want to specify how many of each chars must be in the string, you can instantiate each generator by itself like this:

```
$numbers = new \McArdle\Generators\NumberGenerator(5);
$lower = new \McArdle\Generators\LowerCaseGenerator(7);
$upper = new \McArdle\Generators\UpperCaseGenerator(9);
$special = new \McArdle\Generators\SpecialCharGenerator(2);

$generators = [
    $numbers,
    $lower,
    $upper,
    $special,
];

$passwordGenerator = new \McArdle\PasswordGenerator($generators);
echo $passwordGenerator->generate();
```

If can of course pass just one or whatever the number of generators you like. You can also create your own, just implement the the:

```
\McArdle\Generators\GeneratorInterface
```

If you need to create something more random with the possibility of a pure special char password but also a pure upper or any other generator, you could do something as follows:

```
$numbers = new \McArdle\Generators\NumberGenerator(35);
$lower = new \McArdle\Generators\LowerCaseGenerator(35);
$upper = new \McArdle\Generators\UpperCaseGenerator(35);
$special = new \McArdle\Generators\SpecialCharGenerator(35);

$passwordGenerator = new \McArdle\PasswordGenerator([
    $numbers, $lower, $upper, $special
]);

echo $passwordGenerator->generate(8);
```
This will return a pass of eight characters but each generator provided a string of 35 characters long.

Since version 8.2, it is also possible to create a password fluently, like this:

```
$password = \McArdle\PasswordGenerator::init()->
    ->special(4)   // The amount of special characters
    ->number(2)    // The amount of numbers
    ->uppercase(6) // The amount of uppercase letters
    ->lowercase(3) // The amount of lowercase letters
    ->generate(8); // The length of the password
```