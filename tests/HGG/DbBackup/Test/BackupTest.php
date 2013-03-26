<?php

/*
 * This file is part of the HGG package.
 *
 * (c) 2013 Henning Glatter-Götz <henning@glatter-gotz.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace HGG\DbBackup\Test;

use HGG\DbBackup\MySqlBackup;

class MySqlBackupTest extends \PHPUnit_Framework_TestCase
{
  protected function setUp()
  {
  }

  protected function tearDown()
  {
  }

  public function testMySqlBackup()
  {
      $this->assertEquals(1, 2);
  }
}
