<?php
    include_once '../model/IClient.php';
    include_once '../config/CONST.php';

    class Client implements IClient {
        private $conn;
        private $db_table = DBTABLENAME;
        private $id;
        private $first_name;
        private $last_name;
        private $address;
        private $phone_number;
        private $date_added;
        private $assigned_lawyer;
        private $notes;

        public function setClientID($id) {
            $this->id = $id;
        }
        public function setFirstName($first_name) {
            $this->first_name = $first_name;
        }
        public function setLastName($last_name) {
            $this->last_name = $last_name;
        }
        public function setAddress($address) {
            $this->address = $address;
        }
        public function setPhoneNumber($phone_number) {
            $this->phone_number = $phone_number;
        }
        public function setDateAdded($date_added) {
            $this->date_added = $date_added;
        }
        public function setAssignedLawyer($assigned_lawyer) {
            $this->assigned_lawyer = $assigned_lawyer;
        }
        public function setNotes($notes) {
            $this->notes = $notes;
        }

        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }

        // GET ALL Clients
        public function getClients() {
            try {
                $sqlQuery = "SELECT * FROM " . $this->db_table . "";
                $stmt = $this->conn->prepare($sqlQuery);
                $stmt->execute();
                $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                return $result;
            } catch(Exception $e) {
                throw new Exception("Error running Query due to: " . $e);
            }     
        }

        // GET One Client
        public function getClient() {
            try {
                $sqlQuery = "SELECT * FROM ". $this->db_table ." WHERE id = :id";

                $data = [
                    'id' => $this->id
                ];

                $stmt = $this->conn->prepare($sqlQuery);
                $stmt->execute($data);
                $result = $stmt->fetch(\PDO::FETCH_ASSOC);
                return $result;
            } catch(Exception $e) {
                throw new Exception("Error running Query due to: " . $e);
            }
        }

        // CREATE client
        public function createClient(){
            try {
                $sqlQuery = "INSERT INTO ". $this->db_table ." (first_name, last_name, address, phone_number, date_added, assigned_lawyer, notes) VALUES (:first_name, :last_name, :address, :phone_number, :date_added, :assigned_lawyer, :notes)";

                $data = [
                    'first_name' => $this->first_name,
                    'last_name' => $this->last_name,
                    'address' => $this->address,
                    'phone_number' => $this->phone_number,
                    'date_added' => $this->date_added,
                    'assigned_lawyer' => $this->assigned_lawyer,
                    'notes' => $this->notes
                ];       
            
                $stmt = $this->conn->prepare($sqlQuery);
                $stmt->execute($data);
                $status = $stmt->rowCount();
                return $status;
            } catch(Exception $e) {
                throw new Exception("Error running Query due to: " . $e);
            }
        }

        // Update Client
        public function updateClient() {
            try {
               $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        first_name = :first_name, 
                        last_name = :last_name, 
                        address = :address,
                        phone_number = :phone_number,
                        date_added = :date_added, 
                        assigned_lawyer = :assigned_lawyer,
                        notes = :notes
                    WHERE 
                        id = :id";

                $data = [
                        'first_name' => $this->first_name,
                        'last_name' => $this->last_name,
                        'address' => $this->address,
                        'phone_number' => $this->phone_number,
                        'date_added' => $this->date_added,
                        'assigned_lawyer' => $this->assigned_lawyer,
                        'notes' => $this->notes,
                        'id' => $this->id
                    ];            
            
                $stmt = $this->conn->prepare($sqlQuery);
                $stmt->execute($data);
                $status = $stmt->rowCount();
                return $status; 
            } catch(Exception $e) {
                throw new Exception("Error running Query due to: " . $e);
            }
        }

        // DELETE client
        function deleteClient() {
            try {
                $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = :id";
            
                $data = [
                'id' => $this->id
                ];

                $stmt = $this->conn->prepare($sqlQuery);
                $stmt->execute($data);
                $status = $stmt->rowCount();
                return $status;
            } catch(Exception $e) {
                throw new Exception("Error running Query due to: " . $e);
            }         
        }
    }
?>

