<?php
declare(strict_types=1);

namespace ArkitectTests\unit\Costraints;

use Arkitect\Analyzer\ClassDescription;
use Arkitect\Constraints\HaveNameMatching;
use PHPUnit\Framework\TestCase;

class HaveNameMatchingTest extends TestCase
{
    public function testHappyPath()
    {
        $constraint = new HaveNameMatching("**Class");

        $goodClass = ClassDescription::build('\App\MyClass', 'App')->get();
        $this->assertFalse($constraint->isViolatedBy($goodClass));
    }

    public function testWrongName()
    {
        $constraint = new HaveNameMatching("**GoodName**");

        $badClass = ClassDescription::build('\App\BadNameClass', 'App')->get();
        $this->assertTrue($constraint->isViolatedBy($badClass));
        $this->assertEquals('\App\BadNameClass has a name that doesn\'t match **GoodName**', $constraint->getViolationError($badClass));
    }
}
