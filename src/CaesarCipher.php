<?php

namespace Printup\Recruit;

class CaesarCipher // implements CaesarCipherInterface
{
    private array $alphabet;
    private int $shift;

    public function __construct(int $shiftQuantity)
    {
        $this->setShift($shiftQuantity);
        $this->createAlphabet();
    }

    private function createAlphabet(): self
    {
        $shift = $this->getShift();

        for ($a = ord('a'); $a <= ord('z'); $a++) {
            $this->alphabet[chr($a)] = chr(ord('a') + (($a - ord('a') + $shift) % 26));
        }

        return $this;
    }

    public function encrypt(string $input): string
    {
        $string = str_split($input);
        $crypted = "";

        foreach ((array) $string as $char) {
            $crypted .= $char == " " ? " " : $this->alphabet[$char];
        }

        return $crypted;
    }

    public function decrypt(string $input): string
    {
        $decode = array_flip($this->alphabet);
        $string = str_split($input);
        $crypted = "";

        foreach ((array) $string as $char) {
            $crypted .= $char == " " ? " " : $decode[$char];
        }

        return $crypted;
    }

    private function setShift(int $shiftQuantity): self
    {
        $this->shift = $shiftQuantity;

        return $this;
    }

    private function getShift(): int
    {
        return $this->shift;
    }
}
