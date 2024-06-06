<?php

namespace Printup\Recruit;

class AtBashCipher // implements AtBashCipherInterface
{
    private array $alphabet;

    public function __construct()
    {
        $this->createAlphabet();
    }

    private function createAlphabet(): self
    {
        for ($i = ord('a'); $i <= ord('z'); $i++) {
            $this->alphabet[chr($i)] = chr(ord('z') - ($i - ord('a')));
        }

        return $this;
    }

    public function encrypt(string $input): string
    {
        $alphabet = $this->alphabet;

        return strtr($input, $alphabet);
    }

    public function decrypt(string $input): string
    {
        $alphabet = array_flip($this->alphabet);

        return strtr($input, $alphabet);
    }
}
