<?php

class Database
{
    private $conn;
    private $status_message;
    
    public function __construct($config)
    {
        try {
            $this->conn = new PDO("mysql:host=localhost;dbname=practice",
                                  $config["username"], $config["password"]);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (Exception $e) {
            echo "Could not connect to db.";
            echo $e->getMessage();
        }
    }

    /* 
       #------------------------------------------------------------------ 
       # Returns a table with $tablename.
       # Note that by using query the entered data needs to be escaped
       # to avoid SQL injections.
       #------------------------------------------------------------------ 
     */
    public function getTable($tablename)
    {
        try {
            $result = $this->conn->query("SELECT * FROM $tablename");

            return ($result->rowCount() > 0)
                ? $result
                : false;
        } catch (Exception $e) {
            return false;
        }
    }

    /* 
       #------------------------------------------------------------------ 
       # Runs a prepared statement with specified bindings.
       # Should be used when something should be returned.
       # By using prepared statement there is no need to escape or quote
       # the parameters. 
       # Returns an associative array.
       # Returns false if there was no data returned.
       # Saves status in status variable.
       #------------------------------------------------------------------ 
     */
    public function query_db($query, $bindings)
    {
        $stmt = $this->conn->prepare($query);
        $stmt->execute($bindings);

        $results = $stmt->fetchAll();
        $this->status_message = $stmt->errorInfo();

        return $results ? $results : false;
    }

    
    /*
       #------------------------------------------------------------------
       # Runs a query in the database.
       # Note that $query needs to be "safe", so need to be escaped
       # if it is raw user input. In general, only use this method for 
       # hardcoded queries. 
       # Returns false if there was no data returned. 
       #------------------------------------------------------------------
     */ 
    public function unsafe_query($query)
    {
        try {
            $pdostmt = $this->conn->query($query);
            $result = $pdostmt->fetchAll();
            
            return $result ? $result : false;
        } catch (Exception $e) {
            return false;
        }
    }

    /* 
       #------------------------------------------------------------------ 
       # Runs a prepared statement with specified bindings.
       # Returns true if successfull or false on failure.
       # Saves status in status variable.
       #------------------------------------------------------------------ 
     */
    public function insertQuery($query, $bindings)
    {
        try {
            $stmt = $this->conn->prepare($query);

            $result = $stmt->execute($bindings);
            $this->status_message = $stmt->errorInfo();

            return $result;
        } catch (Exception $e) {
            $this->status_message = $stmt->errorInfo();
            return false;
        }
    }

    /* 
       #------------------------------------------------------------------ 
       # Returns user with specified email.
       # Returns only 1, since email is unique.
       # Returns false if no email was found.
       #------------------------------------------------------------------ 
     */
    public function getUserByEmail($email)
    {
        $binding = array("email" => $email);
        $user = $this->query_db("SELECT * FROM users WHERE email = :email", $binding);
        return $user[0];
    }

    /* 
       #------------------------------------------------------------------ 
       # Returns user with specified username.
       # Returns only 1, since username is unique.
       # Returns false if no user with $username was found.
       #------------------------------------------------------------------ 
     */
    public function getUserByUsername($username)
    {
        $bindings = array("username" => $username);
        $user = $this->query_db("SELECT * FROM users WHERE username = :username", $bindings);
        return $user[0];
    }

    /* 
       #------------------------------------------------------------------ 
       # Returns the user with the specified id.
       # Returns only 1, since id is unique.
       # Returns false if no user with $id was found.
       #------------------------------------------------------------------ 
     */
    public function getUserById($id)
    {
        $bindings = array("id" => $id);
        $user = $this->query_db("SELECT * FROM users WHERE id = :id", $bindings);
        return $user[0];
    }
    
    /* 
       #------------------------------------------------------------------ 
       # Creates user with specified information.
       # If user could not be created, false is returned.
       #------------------------------------------------------------------ 
     */
    public function createUser($username, $email, $password, $name)
    {
        $bindings = array(
            "username" => $username,
            "email"    => $email,
            "password" => $password,
            "name"     => $name
        );
        $query_string = "INSERT INTO users (username, email, password, name) 
VALUES(:username, :email, :password, :name)";
        $result = $this->insertQuery($query_string, $bindings);
        return $result;
    }

    /* 
       #------------------------------------------------------------------ 
       # Returns the status message if set, otherwise null.
       #------------------------------------------------------------------ 
     */
    public function getStatus()
    {
        return (isset($this->status_message))
            ? $this->status_message
            : null;
    }
    /* 
       #------------------------------------------------------------------ 
       # Returns specified amount of posts (kweets)
       # Returns in descending order, since newest tweet probably wants
       # to be displayed first.
       # If no amount is specified, 10 is returned
       #------------------------------------------------------------------ 
     */
    public function getKweets($max_value = 10)
    {
        $kweets = $this->unsafe_query("SELECT * FROM posts ORDER BY id DESC");
        if (count($kweets) > $max_value) {
            return array_slice($kweets, 0, 10);
        } else {
            return $kweets;
        }
    }
}

// --------------- TESTING BELOW: ----------------- //

/*$config = array(
   /*"username" => "root",
   /*"password" => ""
   /*);
   /*$db = new Database($config);
   /*$db->getKweets();

   /* 
   $config = array(
   "username" => "root",
   "password" => ""
   );
   $db = new Database($config);
   /* 
   $bind = array(
   "id" => 1
   );
   $user = $db->query("SELECT * FROM users WHERE id = :id", $bind)[0];
   var_dump($user); */
/* echo $user["username"]; */
/* 
   $user = $db->getUserByEmail("bob@example.com");
   if ( $user )
   print_r($user);
   else
   echo "No user with that email."; */

/* 

   $result = $db->createUser("Lina", "lina@example.com", "password123", "Lina B");

   if ($result) {
   echo "Created user.";
   } else {
   echo "Could not create user. <br>";
   if ($db->getStatus()[1] == 1062) {
   echo "Username or email already in use.";
   // ErrorCode from:
   // http://dev.mysql.com/doc/refman/5.5/en/error-messages-server.html
   }
   }  */

?>
