<?php

namespace Printup\Recruit;

class SingleOccurrence // implements SingleOccurrenceInterface
{
    /**
     * Znajduje liczby, które się nie powtarzają
     *
     * @param $input array Tablica liczb
     * @return array
     */
    public function findSingle(array $input): array
    {
        $inputString = json_encode($input);
        $algorithm = array_filter($input, function ($a, $b) use ($inputString) {
            preg_match_all("/$a/", $inputString, $matches);
            $countMatches = count(array_shift($matches));

            return $countMatches == 1;
        }, ARRAY_FILTER_USE_BOTH);

        return array_values($algorithm);
    }
}
