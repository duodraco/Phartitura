<?php

namespace Cloudson\Phartitura\Project\Version\Comparator;

use Cloudson\Phartitura\Project\Version\Version;

class WildCardVersionTest extends \PHPUnit_Framework_TestCase
{
    /**
    * @test
    * @dataProvider getVersions
    */ 
    public function should_check_that_a_version_match_with_a_rule($vs1, $versionRule)
    {
        $v1 = new Version($vs1);

        $comparator = new WildCardVersion;

        $this->assertTrue($comparator->compare($v1, $versionRule));
    }

     /**
    * @test
    * @dataProvider getVersionsThatNotMatch
    */ 
    public function should_check_that_a_version_not_match_with_a_rule($vs1, $versionRule)
    {
        $v1 = new Version($vs1);

        $comparator = new WildCardVersion;

        $this->assertFalse($comparator->compare($v1, $versionRule));
    }

    public function getVersions()
    {
        return [
            ['1.0.0', '1.0.*'],
            ['2.3.9 ', '2.3.*'],
            ['2.3.12 ', '2.3.*'],
            ['3.3.3', '*'],
        ];
    }

    public function getVersionsThatNotMatch()
    {
        return [
            ['1.0.0','2.0.*'],
            ['2.1.1a','2.0.*'],
        ];
    }
}