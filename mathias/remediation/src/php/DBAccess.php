<?php
//*********************************************************
// Company  : ETML
// Author   : Mathias Groux
// Date     : 18.05.2017
// Summary  : Accesses the database
//            Class with all the fonctions
//*********************************************************
// Modifications: -
// Date   : -
// Author : -
// Reason : -
//*********************************************************


// DB Initialize
class DBAccess {


    // DB information
    const LOGIN = 'root';
    const PWD = '';
    const DB_NAME = 'db_nickname';
    const HOST = 'localhost';

    // DB connector
    private $dbConnect;

    /**
     * Name : dbConnect
     * Summary : DB PDO connection
     * Param : -
     * Return : -
     */
    private function dbConnect()
    {
        // Connexion to db_nickname
        $this->dbConnect = new PDO('mysql:dbname='.self::DB_NAME.';host='.self::HOST, self::LOGIN, self::PWD, array( PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

    } // End dbConnect()

    /**
     * Name : dbUnconnect
     * Summary : DB PDO disconnection
     * Param : -
     * Return : -
     */
    private function dbUnconnect()
    {
        // Connection destroy
        unset($this->dbConnect);

    } // End dbUnconnect()



    /**
     * Name : executeSqlRequest
     * Summary : Request function and execute request
     * Param : $sql = request
     * Return : $data = request result
     */
    private function executeSqlRequest($sql)
    {
        // $dbConnect reception
        $this->dbConnect();

        // Request recherche
        $request = $this->dbConnect->prepare($sql);

        // Request executed
        $request->execute();

        // Attributed thee request all database
        $datas = $request->fetchAll(PDO::FETCH_ASSOC);

        // Empty $request to memory
        $request->closeCursor();

        // Stop the db connection
        $this->dbUnconnect();

        // Return private information
        return($datas);
    } // End executeSqlRequest()



    /**
     * Name : getAllSection
     * Summary : Display section list
     * Param : -
     * Return : $sql = request display all section to db
     */
    public function getAllSection()
    {

        // sql request
        $sql = "SELECT secName FROM t_section";

        // Execute request
        return $this->executeSqlRequest($sql);

    } // End getAllSection()

    /**
     * Name : getAllTeacher
     * Summary : Display teacher list
     * Param : -
     * Return : -
     */
    public function getAllTeacher()
    {

        // sql request
        $sql = "SELECT idTeacher, teaLastName, teaFirstName, teaNickname, secName, teaIsDeleted  FROM t_teacher INNER JOIN t_section ON fkSection = idSection";

        // Execute request
        return $this->executeSqlRequest($sql);

    } // End getAllTeacher()

    /**
     * Name : getTeacher
     * Summary : Display the teacher details by ID
     * Param : $id = teacher id
     * Return : $sql = request display teacher
     */
    public function getTeacher($id)
    {

        // sql request
        $sql = "SELECT * FROM t_teacher INNER JOIN t_section ON fkSection = idSection WHERE idTeacher = $id";

        // Execute request
        return $this->executeSqlRequest($sql)[0];

    } // End getTeacher()

    /**
     * Name : getDeleteTeacher
     * Summary : Display the teacher name by ID
     * Param : $id = teacher id
     * Return : $sql = request delete one teacher
     */
    public function getDeleteTeacher($id)
    {

        // sql request
        $sql = "UPDATE db_nickname.t_teacher SET teaIsDeleted='1' WHERE idTeacher=$id";

        // Execute request
        return $this->executeSqlRequest($sql);

    }// getDeleteTeacher()

    /**
     * Name : getSection
     * Summary : Convert section name on int
     * Param : $extSection = section string
     * Return : $convert = section int
     */
    public function getSection($extSection)
    {
        // sql request
        $convert = "SELECT idSection FROM t_section WHERE secName = '$extSection'";

        // Execute request
        return $this->executeSqlRequest($convert)[0]['idSection'];
    }

    /****************************************** Form function add teacher**********************************************/

    /**
     * Name : getAddTeacher
     * Summary : Add a new entry
     * Param : Last Name, First Name, Gender, Nickname, Nickname origin, Section id, Photo number
     * Return : $sql = Request insert into
     */
    public function getAddTeacher($extLName, $extFName, $extGender, $extNName, $extOrigin, $idSection)
    {
        // Accept slashes
        $origin =addslashes($extOrigin);

        // sql request
        $sql = "INSERT INTO db_nickname.t_teacher (idTeacher, teaLastName, teaFirstName, teaGender, teaNickname, teaOrigin, fkSection) VALUES (NULL, '$extLName', '$extFName', '$extGender', '$extNName', '$origin', $idSection)";

        // Execute request
        return $this->executeSqlRequest($sql);

    }// getDeleteTeacher()

    /****************************************** Form function update teacher**********************************************/

    /**
     * Name : getUpdateTeacher
     * Summary : Update a entry
     * Param : Teacher id, Last Name, First Name, Gender, Nickname, Nickname origin, Section id, Photo number
     * Return : $sql = Request update
     */
    public function getUpdateTeacher($idTeacher, $extLName, $extFName, $extGender, $extNName, $extOrigin, $idSection)
    {
        // Accept slashes
        $origin =addslashes($extOrigin);

        // sql request
        $sql = "UPDATE db_nickname.t_teacher SET teaLastName='$extLName', teaFirstName='$extFName', teaGender='$extGender', teaNickname='$extNName', teaOrigin='$origin', fkSection=$idSection WHERE idTeacher=$idTeacher";

        // Execute request
        return $this->executeSqlRequest($sql);

    }// getDeleteTeacher()

    /**
     * Name : getUser
     * Summary : Find the user in the database and get all the informations
     * Param : $name = login
     * Return : $sql = request return user and password
     */
    public function getUser($login)
    {
        // sql request
        $sql = "SELECT * FROM db_nickname.t_user WHERE useLogin = '$login'";

        // Execute request
        return $this->executeSqlRequest($sql)[0];

    } // End getTeacher()
}


