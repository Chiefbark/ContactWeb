<?php
class staticContactList
{
    protected $list;

    /**
     * Creates the ContactList
     */
    public function __construct()
    {
        $this->list = [];
    }

    /**
     * Selects all the Contacts from the database
     */
    public static function selectAll()
    {
        return DaoContact::getInstance()->selectAll();
    }

    /**
     * Returns the list of the ContactList
     * @return mixed the list of the ContactList
     */
    public function getList()
    {
        return $this->list;
    }

    /**
     * Sets the list of the ContactList
     * @param mixed $list the list of the ContactList
     */
    public function setList($list)
    {
        $this->list = $list;
    }

    /**
     * Returns the String representation of the ContactList
     * @return mixed the String representation of the ContactList
     */
    public function __toString()
    {
        return print_r($this, true);
    }
}
class staticContact
{
    protected $id;
    protected $name;
    protected $phone;
    protected $mail;
    protected $comment;

    /**
     * Creates the Contact
     * @param mixed|string $id the id of the Contact [optional value]
     * @param mixed|string $name the name of the Contact [optional value]
     * @param mixed|string $phone the phone of the Contact [optional value]
     * @param mixed|string $mail the mail of the Contact [optional value]
     * @param mixed|string $comment the comment of the Contact [optional value]
     */
    public function __construct($id = '', $name = '', $phone = '', $mail = '', $comment = '')
    {
        $this->id = $id;
        $this->name = $name;
        $this->phone = $phone;
        $this->mail = $mail;
        $this->comment = $comment;
    }

    /**
     * Fills the Contact
     * @param mixed $name the name of the Contact
     * @param mixed $phone the phone of the Contact
     * @param mixed $mail the mail of the Contact
     * @param mixed $comment the comment of the Contact
     * @param mixed|string $id the id of the Contact [optional value]
     */
    public function fill($name, $phone, $mail, $comment, $id = '')
    {
        $this->id = $id;
        $this->name = $name;
        $this->phone = $phone;
        $this->mail = $mail;
        $this->comment = $comment;
    }

    /**
     * Selects a Contact from the database
     * @param mixed $id the id of the Contact to select
     */
    public static function select($id)
    {
        return DaoContact::getInstance()->select($id);
    }

    /**
     * Inserts a Contact into the database
     * @param mixed $contact the Contact to insert
     */
    public static function insert($contact)
    {
        return DaoContact::getInstance()->insert($contact);
    }

    /**
     * Updates a Contact of the database
     * @param mixed $contact the Contact to update
     */
    public static function update($contact)
    {
        return DaoContact::getInstance()->update($contact);
    }

    /**
     * Removes a Contact from the database
     * @param mixed $contact the Contact to delete
     */
    public static function delete($contact)
    {
        return DaoContact::getInstance()->delete($contact);
    }

    /**
     * Returns the id of the Contact
     * @return mixed the id of the Contact
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * Returns the name of the Contact
     * @return mixed the name of the Contact
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Returns the phone of the Contact
     * @return mixed the phone of the Contact
     */
    public function getPhone()
    {
        return $this->phone;
    }
    /**
     * Returns the mail of the Contact
     * @return mixed the mail of the Contact
     */
    public function getMail()
    {
        return $this->mail;
    }
    /**
     * Returns the comment of the Contact
     * @return mixed the comment of the Contact
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Sets the id of the Contact
     * @param mixed $id the id of the Contact
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    /**
     * Sets the name of the Contact
     * @param mixed $name the name of the Contact
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    /**
     * Sets the phone of the Contact
     * @param mixed $phone the phone of the Contact
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }
    /**
     * Sets the mail of the Contact
     * @param mixed $mail the mail of the Contact
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }
    /**
     * Sets the comment of the Contact
     * @param mixed $comment the comment of the Contact
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * Returns the String representation of the Contact
     * @return mixed the String representation of the Contact
     */
    public function __toString()
    {
        return print_r($this, true);
    }
}
