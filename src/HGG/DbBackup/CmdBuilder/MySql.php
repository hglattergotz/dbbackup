<?php

/*
 * This file is part of the HGG package.
 *
 * (c) 2013 Henning Glatter-Götz <henning@glatter-gotz.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace HGG\DbBackup\CmdBuilder;

use HGG\DbBackup\CmdBuilder\CmdBuilder;

/**
 * MySql
 *
 * @author Henning Glatter-Götz <henning@glatter-gotz.com>
 */
class MySql implements CmdBuilder
{
    /**
     * make
     *
     * @param string $username
     * @param string $password
     * @param string $host
     * @param string $database
     * @param array $tables
     * @param string $targetFile
     * @param array $options
     * @access protected
     * @return void
     */
    public function make($username, $password, $host, $database, array $tables, $targetFile, array $options)
    {
        $components = array('mysqldump');

        $components[] = '-u '.$username;
        $components[] = '-p'.$password;
        $components[] = '-h'.$host;
        $components = array_merge($components, $options);
        $components[] = $database;
        $components = array_merge($components, $tables);
        $components[] = '> '.$targetFile;

        return implode(' ', $components);
    }
}

