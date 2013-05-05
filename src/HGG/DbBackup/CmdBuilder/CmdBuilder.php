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
     * make
     *
     * @param string $username
     * @param string $password
     * @param string $host
     * @param string $database
     * @param array $tables
     * @param string $backupFile
     * @param array $options
     * @access public
     * @return void
     */
    public function make($username, $password, $host, $database, array $tables, $backupFile, array $options);
}
