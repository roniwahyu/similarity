<?php

/*
 * This file is part of gpupo/similarity
 *
 * (c) Gilmar Pupo <g@g1mr.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * For more information, see
 * <http://www.g1mr.com/similarity/>.
 */

namespace Gpupo\Similarity\Input;

class Decorator
{
    /**
     * Remove non alphanumeric characters and replacing multiple spaces with a single space.
     *
     * @param string $string
     *
     * @return string
     */
    public function stripIgnoredCharacters($string)
    {
        $aplhaNumeric = preg_replace("/[^\w\d ]/ui", '', $string);

        return $this->stripMultipleSpaces($aplhaNumeric);
    }

    public function stripStopwords($string, $list)
    {
        usort($list, function ($a, $b) {
            return strlen($b) - strlen($a);
        });

        $addSpaces = function (&$v) {
            $v =  ' '.trim($v).' ';

            return $v;
        };

        array_walk($list, $addSpaces);

        return trim(str_ireplace($list, ' ', $addSpaces($string)));
    }

    public function stripMultipleSpaces($string)
    {
        return $this->stripSpaces($string, ' ');
    }

    public function stripSpaces($string, $replacement = '')
    {
        return preg_replace('!\s+!', $replacement, $string);
    }

    public function onlyNumbers($string)
    {
        $numbers  = preg_replace('/[^0-9]/', '', $string);

        return $this->stripSpaces($numbers);
    }
}
