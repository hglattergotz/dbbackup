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

use HGG\DbBackup\CmdBuilder\MySql;

class MySqlTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {}

    protected function tearDown()
    {}

    public function testMySqlTables()
    {
        $username = 'myuser';
        $password = 'mypass';
        $host     = 'localhost';
        $database = 'mydb';
        $tables = array('tbl1', 'tbl2');
        $targetFile = '/backupfolder/mybackup.sql';
        $options = array('--add-drop-table');


        $expected = "mysqldump -u myuser -pmypass -hlocalhost --add-drop-table mydb tbl1 tbl2 > /backupfolder/mybackup.sql";
        $cmdBld = new MySql();
        $cmd = $cmdBld->dump($username, $password, $host, $database, $tables, $targetFile, $options);
        $this->assertEquals($expected, $cmd);
    }

    public function testMySqlDb()
    {
        $username = 'myuser';
        $password = 'mypass';
        $host     = 'localhost';
        $database = 'mydb';
        $tables = array();
        $targetFile = '/backupfolder/mybackup.sql';
        $options = array('--add-drop-table');


        $expected = "mysqldump -u myuser -pmypass -hlocalhost --add-drop-table mydb > /backupfolder/mybackup.sql";
        $cmdBld = new MySql();
        $cmd = $cmdBld->dump($username, $password, $host, $database, $tables, $targetFile, $options);
        $this->assertEquals($expected, $cmd);
    }
}
