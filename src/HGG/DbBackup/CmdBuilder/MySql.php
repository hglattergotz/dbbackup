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
 * Command line construction utility for creating MySQL specific commands using
 * mysqldump and mysqladmin.
 *
 * @author Henning Glatter-Götz <henning@glatter-gotz.com>
 */
class MySql implements CmdBuilder
{
    /**
     * Creates a MySQL dump command
     *
     * @param string $username
     * @param string $password
     * @param string $host
     * @param string $database
     * @param array $tables
     * @param string $backupFile
     * @param array $options
     * @access protected
     * @return void
     */
    public function dump($username, $password, $host, $database, array $tables, $backupFile, array $options)
    {
        $components = array('mysqldump');

        $components[] = '-u '.$username;
        $components[] = '-p'.$password;
        $components[] = '-h'.$host;
        $components = array_merge($components, $options);
        $components[] = $database;
        $components = array_merge($components, $tables);
        $components[] = '> '.$backupFile;

        return implode(' ', $components);
    }

    /**
     * Creates a MySQL load command
     *
     * @param mixed $username
     * @param mixed $password
     * @param mixed $host
     * @param mixed $database
     * @param mixed $backupFile
     * @param array $options
     * @access public
     * @return void
     */
    public function load($username, $password, $host, $database, $backupFile, array $options)
    {
        $components = array('mysql');

        $components[] = '-u '.$username;
        $components[] = '-p'.$password;
        $components[] = '-h'.$host;
        $components = array_merge($components, $options);
        $components[] = $database;
        $components[] = '< '.$backupFile;

        return implode(' ', $components);
    }
}

