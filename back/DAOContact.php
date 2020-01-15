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
        $query = new MongoDB\Driver\Query(['_id' => new MongoDB\BSON\ObjectId($_id)]);
        $rows = $this->conn->executeQuery("universidad.estudiantes", $query);
        $arr = [];
        foreach ($rows as $row) {
            $node = new Contact($row->_id, $row->name, $row->phone, $row->mail, $row->comment);
            array_push($arr, $node);
        }
        return $arr[0];
    }

    /**
     * Inserts a Contact into the database
     * @param mixed $contact the Contact to insert
     */
    public function insert($contact)
    {
        $bulk = new MongoDB\Driver\BulkWrite;
        $doc = array(
            'name' => $contact->getName(),
            'phone' => $contact->getPhone(),
            'mail' => $contact->getMail(),
            'comment' => $contact->getComment()
        );
        $bulk->insert($doc);
        $this->conn->executeBulkWrite('universidad.estudiantes', $bulk);
    }

    /**
     * Updates a Contact of the database
     * @param mixed $contact the Contact to update
     */
    public function update($contact)
    {
        $bulk = new MongoDB\Driver\BulkWrite;
        $filter = ['_id' => new MongoDB\BSON\ObjectId($contact->getId())];
        $new = ['$set' => [
            'name' => $contact->getName(),
            'phone' => $contact->getPhone(),
            'mail' => $contact->getMail(),
            'comment' => $contact->getComment()
        ]];
        $bulk->update($filter, $new);
        $this->conn->executeBulkWrite('universidad.estudiantes', $bulk);
    }

    /**
     * Removes a Contact from the database
     * @param mixed $contact the Contact to delete
     */
    public function delete($contact)
    {
        $bulk = new MongoDB\Driver\BulkWrite;
        $filter = ['_id' => new MongoDB\BSON\ObjectId($contact->getId())];
        $bulk->delete($filter);
        $this->conn->executeBulkWrite('universidad.estudiantes', $bulk);
    }
}
