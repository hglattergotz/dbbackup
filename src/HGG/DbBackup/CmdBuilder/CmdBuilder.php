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
     * @param mixed $username
     * @param mixed $password
     * @param mixed $database
     * @param mixed $tables
     * @param mixed $backupFile
     * @param mixed $options
     * @access public
     * @return void
     */
    public function make($username, $password, $database, array $tables, $backupFile, array $options);
}
