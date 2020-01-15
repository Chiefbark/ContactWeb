<?php
require_once 'DBConn.php';
class DAOContact
{
    protected $conn;

    /**
     * Fills the staticContact
     */
    public static function getInstance()
    {
        return new DAOContact();
    }

    /**
     * Creates the staticContact
     */
    public function __construct()
    {
        $this->conn = DBConn::getConnection();
    }

    /**
     * Selects all the Contact from the database
     */
    public function selectAll()
    {
        $query = new MongoDB\Driver\Query([]);
        $rows = $this->conn->executeQuery("universidad.estudiantes", $query);

        $arr = [];
        foreach ($rows as $row) {
            $node = new Contact($row->_id, $row->name, $row->phone, $row->mail, $row->comment);
            array_push($arr, $node);
        }
        $list = new ContactList();
        $list->setList($arr);
        return $list;
    }

    /**
     * Selects a Contact from the database
     * @param mixed $_id the id of the Contact to select
     */
    public function select($_id)
    {
    }

    /**
     * Inserts a Contact into the database
     * @param mixed $contact the Contact to insert
     */
    public function insert($contact)
    {
    }

    /**
     * Updates a Contact of the database
     * @param mixed $contact the Contact to update
     */
    public function update($contact)
    {
    }

    /**
     * Removes a Contact from the database
     * @param mixed $contact the Contact to delete
     */
    public function delete($contact)
    {
    }
}
