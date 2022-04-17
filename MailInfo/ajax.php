<?php
/*==============================[Variables]==============================*/
$requestData = json_decode($_POST['strRequest'], true);
$arrAllDataFromTable = array();//массив для переработки
$indexesOfHintEmail = [];
$arrDataForLiveSearching = [];

class objSearcherAcsInfo
{
    private $DB_HOST = 'localhost';
    private $DB_USERNAME = 'root';
    private $DB_PASSWORD = 'root';
    private $DB_NAME = 'task_tz';
    private $DB_PORT = 3306;
    function returnConnectedDBObj()
    {
        return new mysqli($this->DB_HOST, $this->DB_USERNAME, $this->DB_PASSWORD, $this->DB_NAME, $this->DB_PORT);
    }

    function convertDBDataAndReturnArr($DBData)
    {
        $arr = [];
        foreach ($DBData as $key => $value) {
            $arr[$key] = $value;
        }

        return $arr;
    }
    private function getDBQueryAndReturnDBData($objDB, $query)
    {
        return $objDB->query($query);
    }

    function printConnectionSuccess($objDB)
    {
        if ($objDB->host_info)
            echo 'Соединение установлено.';
        else
            die('Ошибка подключения к серверу баз данных.');
    }

    function returnAllDataAssumeElements($objDB, $requestData)
    {
        $strGenerated = 'SELECT user.email, user.id AS id, user_info.name, user_info.sname
      FROM user JOIN user_info ON user_info.user_id = user.id WHERE user.email LIKE ' . '"%'.$requestData.'%"';
        return $this->convertDBDataAndReturnArr($this->getDBQueryAndReturnDBData($objDB, $strGenerated));
    }
}

/*==============================[Logic]==============================*/
function consoleLog($value)
{
    echo "<pre>";
    print_r($value);
    echo "</pre>";
}
/*==============================[Processing variables]==============================*/
$searcher = new objSearcherAcsInfo;
$objDB = $searcher->returnConnectedDBObj();
/*==============================[Living search]==============================*/
if ($indexesOfHintEmail == "") {
    echo json_encode('no suggestion');
} else {
    print_r(json_encode($searcher->returnAllDataAssumeElements($objDB,$requestData)));
}
$objDB->close();