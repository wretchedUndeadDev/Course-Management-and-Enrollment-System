<?php
class Admin
{
    //private DB attributes
    private $conn;
    private $admin_table = 'admin';
    private $addr_table = 'admin_address';
    private $phn_table = 'admin_phone';
    private $eml_table = 'admin_email';

    // Basic Properties - native to 'admin' relation
    public $admin_id;
    public $Fname;
    public $Lname;
    public $bio;

    //Complex properties - results of joins between 'admin' and related relations
    public $admin_addresses = array();
    public $admin_phones = array();
    public $admin_emails = array();

    // Constructor
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Login
    //Input: admin_id
    public function login()
    {
        //Create Query
        $query = 'SELECT a.admin_id FROM ' . $this->admin_table . ' AS a
                        WHERE a.admin_id = :aid AND a.lname = :ln
                        LIMIT 0, 1';

        // Prepare Statement
        $stmt = $this->conn->prepare($query);

        // Clean Data
        $this->admin_id = htmlspecialchars(strip_tags($this->admin_id));
        $this->Lname = htmlspecialchars(strip_tags($this->Lname));

        // Bind Data
        $stmt->bindParam('aid', $this->admin_id);
        $stmt->bindParam('ln', $this->Lname);

        // Execute statement
        $stmt->execute();

        // Evaluate result
        $admin_exists = $stmt->rowCount();
        if ($admin_exists == 1) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->admin_id = $row['admin_id'];
        } else {
            $this->admin_id = 0;
        }
    }

    //Get Admin Information
    //Input: admin_id
    public function get_gen_info()
    {
        //Create query
        $query = 'SELECT * FROM ' . $this->admin_table . ' AS a
                        WHERE a.admin_id = :aid
                        LIMIT 0, 1';

        //Preapare Statement
        $stmt = $this->conn->prepare($query);

        //Clean Data
        $this->admin_id = htmlspecialchars(strip_tags($this->admin_id));

        //Bind Data 
        $stmt->bindParam(':aid', $this->admin_id);

        // Execute Statement
        $stmt->execute();

        // Retrieve result
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Set basic Admin object Properties
        $this->admin_id = $row['admin_id'];
        $this->Fname = $row['Fname'];
        $this->Lname = $row['Lname'];
        $this->bio = $row['bio'];
    }

    //Get Admin Addresses
    public function get_addrs()
    {
        //Create query
        $query = 'SELECT aa.address FROM ' . $this->addr_table . ' AS aa
                    WHERE aa.address_id = :aid
                    LIMIT 0, 1';

        //Preapare Statement
        $stmt = $this->conn->prepare($query);

        //Clean Data
        $this->admin_id = htmlspecialchars(strip_tags($this->admin_id));

        //Bind Data 
        $stmt->bindParam(':aid', $this->admin_id);

        // Execute Statement
        $stmt->execute();

        // Return statement (corresponding api call will handle the result)
        return $stmt;
    }

    //Get Admin Phone Numbers
    public function get_phnNums()
    {
        //Create query
        $query = 'SELECT ap.phone_num FROM ' . $this->phn_table . ' AS ap
                    WHERE ap.admin_id = :aid
                    LIMIT 0, 1';

        //Preapare Statement
        $stmt = $this->conn->prepare($query);

        //Clean Data
        $this->admin_id = htmlspecialchars(strip_tags($this->admin_id));

        //Bind Data 
        $stmt->bindParam(':aid', $this->admin_id);

        // Execute Statement
        $stmt->execute();

        // Return statement (corresponding api call will handle the result)
        return $stmt;
    }

    //Get Admin emails
    public function get_emails()
    {
        //Create query
        $query = 'SELECT ae.email FROM ' . $this->eml_table . ' AS ae
                    WHERE ae.admin_id = :aid
                    LIMIT 0, 1';

        //Preapare Statement
        $stmt = $this->conn->prepare($query);

        //Clean Data
        $this->admin_id = htmlspecialchars(strip_tags($this->admin_id));

        //Bind Data 
        $stmt->bindParam(':aid', $this->admin_id);

        // Execute Statement
        $stmt->execute();

        // Return statement (corresponding api call will handle the result)
        return $stmt;
    }
}
