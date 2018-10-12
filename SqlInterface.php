<?php
/**
 * Created by PhpStorm.
 * User: Clara9
 * Date: 10/11/2018
 * Time: 10:48 PM
 */

class SqlInterface
{
    var $dbUsername;
    var $dbPasswd;
    var $dbAddress;

    function __construct()
    {
        if (!$this->initialise()) {
            die("Database is not properly configured. Please modify config.php");
        }
    }

    /**
     *  Initializes the database with credentials stored in config.php
     *  Dies if the credentials are incorrect.
     */
    //TODO: Create the table and database if not present.
    public function initialise()
    {
        require_once "./config.php";
        if (!cfgProperties::getConfDone()) {
            die("config.php is not configured.");
        } else {
            $this->dbUsername = cfgProperties::getDbUsername();
            $this->dbPasswd = cfgProperties::getDbPassword();
            $this->dbAddress = cfgProperties::getDbAddress();
            if (!$this->testDB()) {
                die("The server specified in config.php is not reachable. Please edit.");
            }
        }
        return true;
    }

    /**
     * Test the credentials.
     * @return bool If the database is reachable
     */
    public function testDB()
    {
        $connection = new mysqli($this->dbAddress, $this->dbUsername, $this->dbPasswd);
        if ($connection->connect_error) {
            return false;
        }
        return true;
    }

    /**
     * Stores data into the database
     * @param $name string Name Field. VARCHAR(50)
     * @param $netid string NetID Field. VARCHAR(20)
     * @param $choice int Choice Field. INT
     * @param $subject string Subject Field. VARCHAR(500)
     * @return bool If the insertion is successful.
     */
    public function pushIn($name, $netid, $choice, $subject)
    {
        require_once "./config.php";
        if (!$this->testDB()) {
            return false;
        }
        $prefix = cfgProperties::getTablePrefix();
        $dbname = cfgProperties::getDbName();

        $stateT = <<<EOF
INSERT INTO TABLE %s VALUES("Name" : %s, "NetID" : %s, "Choice" : %s, "Subject": %s)
EOF;
        $stateM = sprintf($stateT, $prefix . "_QueryResult", $name, $netid, $choice, $subject);

        $connection = new mysqli($this->dbAddress, $this->dbUsername, $this->dbPasswd);
        if ($connection->connect_error) {
            die("A database error occured. Please try again later.");
        } else {
            $connection->query(sprintf("USE %s", $dbname));
            if ($connection->query($stateM)) {
                return true;
            } else {
                return false;
            }
        }
    }

    //TODO: Finish this.
    function getData()
    {

    }
}

echo <<<HTML
<html>
<head>
<title>SQL Interfacing class</title>
</head>
<body>
<h1>Cute PHP File</h1>
<p>
LOL. SQL interaction... Private only...
</p>
</body>
</html>
HTML;
