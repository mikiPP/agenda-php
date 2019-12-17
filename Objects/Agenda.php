<?php
class Agenda
{
    // database connnection and table name
    public $conn;
    public $table_name = "Agenda";


    //object properties
    public $name;
    public $number;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function addNewContact($name, $phone)
    {
        $query = "INSERT INTO $this->table_name (Name,Number)
	VALUES (:Name,:Number) on duplicate key update 
	 Number=:Number";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':Name',$name);
        $stmt->bindParam(':Number',$phone);
        $stmt->execute();
        return $stmt;
    }

    public function removeContact($name)
    {
        $query = "DELETE from 
        $this->table_name 
        Where name = :Name";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':Name',$name);
        $stmt->execute();
        return $stmt;

    }

    public function printContactList()
    
    {
        $stmt = $this->getTable();
	echo "<table>";
	echo "<tr> <th> Nom </th> <th> Telefono </th> </tr>";
        while ($row_category = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>"; 
            echo "<td>" .  $row_category["Name"] . "</td>";
	    echo "<td>" .  $row_category["Number"] . "</td>";
	    echo "</tr>";
        }
	echo "<table>";
    }


    public function getTable() 
    {
        $query = "SELECT  *
        from $this->table_name";
                
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

}

