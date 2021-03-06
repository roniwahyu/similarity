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

abstract class InputAbstract extends \ArrayObject
{
    public function __construct($first = null, $second = null,
        Array $costs = null)
    {
        if (is_array($first)) {
            $array = array_combine(['first', 'second', 'costs'], $first);
        } else {
            $array = [
                'first'     => $first,
                'second'    => $second,
                'costs'     => $costs,
            ];
        }
        parent::__construct($array, parent::ARRAY_AS_PROPS);

        $this->constructCosts();
    }

    public function setFirst($value)
    {
        return $this->set('first', $value);
    }

    public function setSecond($value)
    {
        return $this->set('second', $value);
    }

    public function setCostsByArray(Array $array)
    {
        $this->setCosts(new Costs($array));
    }

    public function setStopwords(Array $array)
    {
        $this->set('stopwords', $array);
    }

    public function getStopwords()
    {
        return $this->get('stopwords');
    }

    protected function constructCosts()
    {
        $defaultCosts = [1, 0, 1];

        return $this->setCostsByArray(($this->costs) ? $this->costs : $defaultCosts);
    }

    public function setCosts($value)
    {
        return $this->set('costs', $value);
    }

    protected function set($key, $value)
    {
        $this->$key = $value;
    }

    protected function get($key)
    {
        if ($this->offsetExists($key)) {
            return $this->$key;
        }
    }
}
