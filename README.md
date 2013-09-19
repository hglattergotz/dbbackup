Programmatically create dump files of an entire database or individual tables
in a PHP application. Restore from dump files.

[![Build Status](https://travis-ci.org/hglattergotz/dbbackup.png)](https://travis-ci.org/hglattergotz/dbbackup)

## Installation

Using Composer:

```json
{
    "require": {
        "hglattergotz/dbbackup": "dev-master"
    }
}
```

Download source and manually add to project:

 - Get the zip file [here](http://github.com/hglattergotz/dbbackup/archive/master.zip)

## Supported Databases:

 - MySql

Pull Requests for additional database engines welcome!

## Usage

### Backup entire database

```php
use HGG\DbBackup\CmdBuilder\MySql;
use HGG\DbBackup\DbBackup;

try
{
    $output = '';
    $backup = new DbBackup(new MySql());
    $backup->backupDb('username', 'password', 'localhost', 'database',
        'backupFile', array(), &$output);
    
    // log $output
}
catch (\Exception $e)
{
    // deal with failure
}
```

### Backup specific tables in a database

```php
use HGG\DbBackup\CmdBuilder\MySql;
use HGG\DbBackup\DbBackup;

try
{
    $output = '';
    $backup = new DbBackup(new MySql());
    $backup->backupTables('username', 'password', 'localhost', 'database',
        array('table1', 'table2'), 'backupFile', array(), &$output);
    
    // log $output
}
catch (\Exception $e)
{
    // deal with failure
}
```

### Restore form a dump file

```php
use HGG\DbBackup\CmdBuilder\MySql;
use HGG\DbBackup\DbRestore;

try
{
    $output = '';
    $restore = new DbRestore(new MySql());
    $restore->restore('username', 'password', 'localhost', 'database',
        'backupFile', array(), &$output);
    
    // log $output
}
catch (\Exception $e)
{
    // deal with failure
}
```
