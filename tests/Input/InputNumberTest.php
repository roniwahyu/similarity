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

namespace Gpupo\Tests\Similarity\Input;

use Gpupo\Similarity\Input\InputNumber;

class InputNumberTest extends TestCaseAbstract
{
    /**
     * @dataProvider dataProviderNumbersWithIgnoredCharacters
     */
    public function testCleanIgnoredCharacters($number, $expected)
    {
        $i = new InputNumber($number, $number);
        $this->assertEquals($expected, $i->getFirst());
        //$this->assertEquals($expected, $i->getSecond());
    }
}
