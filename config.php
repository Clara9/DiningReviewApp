<?php
/**
 * Created by PhpStorm.
 * User: leezi
 * Date: 10/11/2018
 * Time: 11:22 PM
 */

class cfgProperties
{
    private static $dbUserName = "";
    private static $dbPassword = "";
    private static $dbAddress = "";
    private static $dbName = "";
    private static $tablePrefix = "";
    private static $confDone = false;

    /**
     * This is the database configuration storage.
     * Please fit database connection details into vars above.
     * When done, be sure to let $confDone = true.
     */

    /**
     * @return string Database Username
     */
    public static function getDbUserName()
    {
        return self::$dbUserName;
    }

    /**
     * @return string Database Password
     */
    public static function getDbPassword()
    {
        return self::$dbPassword;
    }

    /**
     * @return string Database URL
     */
    public static function getDbAddress()
    {
        return self::$dbAddress;
    }

    /**
     * @return string The name of database to use
     */
    public static function getDbName()
    {
        return self::$dbName;
    }

    /**
     * @return string The prefix of tables used
     */
    public static function getTablePrefix()
    {
        return self::$tablePrefix;
    }

    /**
     * @return string If the admin thinks the configuration is done.
     */
    public static function getConfDone()
    {
        return self::$confDone;
    }


}