<?php

require_once 'src/functions.inc.php';

use function App\getTotal;

class functionsTest extends \PHPUnit\Framework\TestCase
{


    /**
     * Create dependencies to mimic the callbacks of getClassification()
     */
    public function testCreateArray(): array
    {
        $input = array();

        $input = array(
            "Programming" => 64,
            "Cloud Computing" => 85,
            "Computing Foundations" => 64,
            "Databases" => 64,
            "Web Development" => 64,
            "Software Engineering" => 64,
            "Data Analysis" => 95,
            "User Experience" => 85,
        );

        $this->assertNotEmpty($input);

        return $input;
    }


    /**
     * @depends testCreateArray
     */
    public function testDoubleWeighted(array $input): array
    {

        $expected = "Programming2";
        $input = App\doubleWeighted($input);

        $this->assertArrayHasKey($expected, $input);
        $this->assertIsArray($input);

        return $input;
    }

    /**
     * @depends testDoubleWeighted
     */
    public function testSumArray(array $input): int
    {

        $expected = 649;
        $total = App\sumArray($input);

        $this->assertEquals($expected, $total);

        return $total;
    }

   /**
     * @depends testDoubleWeighted
     */
    public function testGetTotal(array $input)
    {

        $expected = 'Total marks: 649/900';
        $total = App\getTotal($input);

        $this->assertEquals($expected, $total);
        $this->assertNotNull($total);

    }

    
}
