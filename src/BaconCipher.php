<?php

namespace Printup\Recruit;

class BaconCipher // implements BaconCipherInterface
{
    private array $alphabet;

    public function __construct()
    {
        $this->createAlphabet();
    }

    private function createAlphabet(): self
    {
        for ($i = ord('a'); $i <= ord('z'); $i++) {
            $index = $i - ord('a');
            $this->alphabet[chr($i)] = sprintf('%05b', decbin($index));
        }

        return $this;
    }

    public function encrypt(string $input): string
    {
        $alphabet = $this->alphabet;
        $inputArray = str_split($input);
        $crypted = array_map(function ($e) use ($alphabet) {
            return $alphabet[$e];
        }, $inputArray);

        return implode($crypted);
    }

    public function decrypt(string $input): string
    {
        $alphabet = array_flip($this->alphabet);
        $inputArray = str_split($input, 5);
        $crypted = array_map(function ($e) use ($alphabet) {
            return $alphabet[$e];
        }, $inputArray);

        return implode($crypted);
    }
}
