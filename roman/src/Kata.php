<?php

namespace swkberlin;

class Kata
{
    public function convert(int $number) {
        $unities = [
          1 => 'I',
          2 => 'X',
          3 => 'C',
          4 => 'M',
          5 => '',
        ];
        $half_decimal = [
            1 => 'V',
            2 => 'L',
            3 => 'D',
            4 => '',
        ];
        $result = '';
        $i = 1;
        while ($number > 0) {
            $cat = $number % 10;
            $number = (int) ($number / 10);
            $roman_value = $this->createPattern($cat, $unities[$i], $half_decimal[$i], $unities[$i + 1]);
            $result = $roman_value . $result;
            $i++;
        }

        return $result;
    }

    function createPattern($reminder, $unity, $half_decimal, $decimal) {
        $result = [
            0 => '',
            1 => $unity,
            2 => $unity . $unity,
            3 => $unity . $unity . $unity,
            4 => $unity . $half_decimal,
            5 => $half_decimal,
            6 => $half_decimal . $unity,
            7 => $half_decimal . $unity . $unity,
            8 => $half_decimal . $unity . $unity . $unity,
            9 => $unity . $decimal,
        ];
        return $result[$reminder];
    }
}
