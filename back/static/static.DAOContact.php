<?php
require_once 'DBConn.php';
class staticContact
{
    protected $conn;

    /**
     * Fills the staticContact
     */
    public static function getInstance()
    {
        return new staticContact();
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
    }

    /**
     * Selects a Contact from the database
     * @param mixed $id the id of the Contact to select
     */
    public function select($id)
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
