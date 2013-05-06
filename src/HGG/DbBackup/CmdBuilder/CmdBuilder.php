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

interface CmdBuilder
{
    /**
     * Creates a dump command
     *
     * @param string $username
     * @param string $password
     * @param string $host
     * @param string $database
     * @param array $tables
     * @param string $backupFile
     * @param array $options
     * @access public
     * @return string
     */
    public function dump($username, $password, $host, $database, array $tables, $backupFile, array $options);

    /**
     * Creates a load command
     *
     * @param mixed $username
     * @param mixed $password
     * @param mixed $host
     * @param mixed $database
     * @param array $tables
     * @param mixed $backupFile
     * @param array $options
     * @access public
     * @return string
     */
    public function load($username, $password, $host, $database, $backupFile, array $options);
}
