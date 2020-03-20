<?php
namespace umbalaconmeogia\testdata\vietnam;

class Name
{
    /**
     * @var string[]
     */
    static private $lastnames;

    /**
     * @var string[][]
     */
    static private $firstnames;

    /**
     * Generate a Vietnamese name for specified gender.
     * @param int $gender 1: Generate a male name, 2: Generate a female name, NULL: Use gender randomly.
     * @return string A name.
     */
    public static function getName($gender = NULL)
    {
        if (!$gender) {
            $gender = rand(1, 2);
        }
        return self::getLastname() . ' ' . self::getFirstname($gender);
    }

    /**
     * Get a lastname randomly.
     * @return string
     */
    private static function getLastname()
    {
        if (!self::$lastnames) {
            // Load data from file.
            self::$lastnames = self::readFileToArray('lastname.txt');
        }
        return self::getRandomValue(self::$lastnames);
    }

    /**
     * Read file into array.
     * @param string $filename
     * @return string[]
     */
    private static function readFileToArray($filename)
    {
        return file(__DIR__ . "/$filename", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    }

    /**
     * Get a firstname randomly.
     * @param int $gender 1: male, 2: female.
     * @return string
     */
    private static function getFirstname($gender)
    {
        if (!self::$firstnames) {
            // Load data from files.
            self::$firstnames = [];
            for ($genderIndex = 1; $genderIndex <= 2; $genderIndex++) {
                self::$firstnames[$genderIndex] = self::readFileToArray("name{$genderIndex}.txt");
            }
        }
        return self::getRandomValue(self::$firstnames[$gender]);
    }

    /**
     * Get a random value from array.
     * @param array $arr
     */
    private static function getRandomValue(&$arr)
    {
        return $arr[array_rand($arr)];
    }
}