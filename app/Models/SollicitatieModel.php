<?php
    class SollicitatieModel
    {
        private Database $Db;

        /**
         * Constructor SollicitatieModel
         * @param [type] $db
         */
        public function __construct(Database $db = new Database)
        {
            $this->Db = $db;
        }

        /**
         * Fetch the all Sollicitaties from database by using MySql stored procedure.
         * @return mixed
         */
        public function getSollicitatiesUseSpMySql() : array
        {
            try
            {
                // Use sql script to fetch all Sollicitaties from Sollicitatie database.
                $getAllSollicitatiesQuery = "CALL spGetSollicitaties()";

                $this->Db->query($getAllSollicitatiesQuery);

                $result = $this->Db->resultSet();

                return $result ?? [];
            }
            catch(PDOException $ex) 
            {
                error_log("ERROR : Failed to get all Sollicitaties from database in class SollicitatieModel method getSollicitatiesUseSp!", 0);
                die('ERROR : Failed to get all Sollicitaties from database in class SollicitatieModel method getSollicitatiesUseSp! '. $ex->getMessage());
            }
        }
       

        /**
         * Fetch the selected Sollicitatie from database by using MySql stored procedure .
         * @param [type] $id
         * @return SollicitatieEntityViewModel
         */
        public function getSollicitatieByIdUseSPMySql(int $id) : SollicitatieEntityViewModel
        {
            try
            {

                // Call sp from database Sollicitatie.
                $getSelectedApplicant = "CALL spGetSollicitatieBijId(:id)";

                $this->Db->query($getSelectedApplicant);
                $this->Db->bind(':id', $id);
                $result = $this->Db->single();

                $SollicitatieObj = SollicitatieHelper::mapSollicitatieRowToObject($result);
                
                return $SollicitatieObj ?? new SollicitatieEntityViewModel();
            }
            catch(PDOException $ex)
            {
                error_log("ERROR : Failed to get Sollicitatie by id from database in class SollicitatieModel method getSollicitatieByIdUseSP!", 0);
                die('ERROR : Failed to get Sollicitatie by id from database in class SollicitatieModel method getSollicitatieByIdUseSP! '. $ex->getMessage());
            }
        }

       

        /**
         * Modify the selected Sollicitatie in database by using MySql stored procedure.
         *
         * @param SollicitatieEntityViewModel $selectedSollicitatie
         * @return boolean
         */
        public function updateSollicitatieUseSPMySql(SollicitatieEntityViewModel $selectedSollicitatie) : bool
        {  
            try 
            {
                // Call sp from database Sollicitatie.
                $spQuery = "CALL spUpdateSollicitatie(   :id	
                                                        ,:voornaam			
                                                        ,:achternaam	
                                                        ,:sollicitantnummer	
                                                        ,:bedrijfnaam		
                                                        ,:bedrijfcode		
                                                        ,:straat			
                                                        ,:huisnummer		
                                                        ,:toevoeging		
                                                        ,:postcode			
                                                        ,:plaats			
                                                        ,:gespreksdatum		
                                                        ,:gesprekstijd		
                                                        ,:isActief			
                                                        ,:opmerking)";			
                
                $this->Db->query($spQuery);

                // Bind values
                $this->Db->bind(':id', $selectedSollicitatie->Id);
                $this->Db->bind(':voornaam', $selectedSollicitatie->Voornaam);
                $this->Db->bind(':achternaam', $selectedSollicitatie->Achternaam);
                $this->Db->bind(':sollicitantnummer', $selectedSollicitatie->Sollicitantnummer);
                $this->Db->bind(':bedrijfnaam', $selectedSollicitatie->Bedrijfnaam);
                $this->Db->bind(':bedrijfcode', $selectedSollicitatie->Bedrijfcode);
                $this->Db->bind(':straat', $selectedSollicitatie->Straat);
                $this->Db->bind(':huisnummer', $selectedSollicitatie->Huisnummer);
                $this->Db->bind(':toevoeging', $selectedSollicitatie->Toevoeging);
                $this->Db->bind(':postcode', $selectedSollicitatie->Postcode);
                $this->Db->bind(':plaats', $selectedSollicitatie->Plaats);
                $this->Db->bind(':gespreksdatum', $selectedSollicitatie->Gespreksdatum);
                $this->Db->bind(':gesprekstijd', $selectedSollicitatie->Gesprekstijd);
                $this->Db->bind(':isActief', $selectedSollicitatie->IsActief);
                $this->Db->bind(':opmerking', $selectedSollicitatie->Opmerking);
                
                // Execute function
                if ($this->Db->execute()) 
                {
                    error_log("INFO : Selected Sollicitatie has been modified in class SollicitatieModel method updateSollicitatieUseSP!", 0);
                    return true;
                } 
                else 
                {
                    error_log("ERROR : Selected Sollicitatie has been not modified in class SollicitatieModel method updateSollicitatieUseSP!", 0);
                    return false;
                }
            } 
                catch(PDOException $ex) 
                {
                    error_log("ERROR : Failed to update selected Sollicitatie by id from database in class SollicitatieModel method updateSollicitatieUseSP!", 0);
                    die('ERROR : Failed to update selected Sollicitatie from database in class SollicitatieModel method updateSollicitatieUseSP! '. $ex->getMessage());
                }
       }

        

         /**
         * Create new Sollicitatie in database by using MySql stored procedure.
         * @param SollicitatieEntityViewModel $newSollicitatie
         * @return boolean
         */
        public function createSollicitatieUseSPMySql(SollicitatieEntityViewModel $newSollicitatie) : bool
        {
            try
            {
                // Create new Sollicitatie in database.
                $spQuery = "CALL spCreateSollicitatie(   :voornaam			
                                                        ,:achternaam	
                                                        ,:sollicitantnummer	
                                                        ,:bedrijfnaam		
                                                        ,:bedrijfcode		
                                                        ,:straat			
                                                        ,:huisnummer		
                                                        ,:toevoeging		
                                                        ,:postcode			
                                                        ,:plaats			
                                                        ,:gespreksdatum		
                                                        ,:gesprekstijd		
                                                        ,:isActief			
                                                        ,:opmerking)";			
                
                $this->Db->query($spQuery);

                // Bind values
                $this->Db->bind(':voornaam', $newSollicitatie->Voornaam);
                $this->Db->bind(':achternaam', $newSollicitatie->Achternaam);
                $this->Db->bind(':sollicitantnummer', $newSollicitatie->Sollicitantnummer);
                $this->Db->bind(':bedrijfnaam', $newSollicitatie->Bedrijfnaam);
                $this->Db->bind(':bedrijfcode', $newSollicitatie->Bedrijfcode);
                $this->Db->bind(':straat', $newSollicitatie->Straat);
                $this->Db->bind(':huisnummer', $newSollicitatie->Huisnummer);
                $this->Db->bind(':toevoeging', $newSollicitatie->Toevoeging);
                $this->Db->bind(':postcode', $newSollicitatie->Postcode);
                $this->Db->bind(':plaats', $newSollicitatie->Plaats);
                $this->Db->bind(':gespreksdatum', $newSollicitatie->Gespreksdatum);
                $this->Db->bind(':gesprekstijd', $newSollicitatie->Gesprekstijd);
                $this->Db->bind(':isActief', $newSollicitatie->IsActief);
                $this->Db->bind(':opmerking', $newSollicitatie->Opmerking);
               
                // Execute function
                if ($this->Db->execute()) 
                {
                    error_log("INFO : New Sollicitatie has been created in class SollicitatieModel method createSollicitatie!", 0);
                    return true;
                } 
                else 
                {
                    error_log("ERROR : New Sollicitatie has been not created in class SollicitatieModel method createSollicitatie!", 0);
                    return false;
                }
            }
            catch(PDOException $ex) 
            {
                error_log("ERROR : Failed to create new Sollicitatie in database in class SollicitatieModel method createSollicitatie!", 0);
                die('ERROR : Failed to create new Sollicitatie in database in class SollicitatieModel method createSollicitatie '. $ex->getMessage());
            }
        }

      

         /**
         * Delete selected Sollicitatie from database by using MySql stored procedure.
         * @param integer $id
         * @return boolean
         */
        public function deleteSollicitatieUseSPMySql(int $id) : bool
        {
            try
            {
                // Delete the selected Sollicitatie from database. 
                $spQuery = "CALL spDeleteSollicitatie(:id)"; 

                $this->Db->query($spQuery);
                $this->Db->bind(':id', $id);

                // Execute function
                if ($this->Db->execute()) 
                {
                    error_log("INFO : Selected Sollicitatie has been deleted in class SollicitatieModel method deleteSollicitatie!", 0);
                    return true;
                } 
                else 
                {
                    error_log("ERROR : Selected Sollicitatie has been not deleted in class SollicitatieModel method deleteSollicitatie!", 0);
                    return false;
                }
            }
            catch(PDOException $ex)
            {
                error_log("ERROR : Failed to delete selected Sollicitatie in database in class SollicitatieModel method deleteSollicitatie!", 0);
                die('ERROR : Failed to delete selected Sollicitatie in database in class SollicitatieModel method deleteSollicitatie '. $ex->getMessage());
            }
        }

        /**
         * Delete selected Sollicitatie from database by using SqlServer stored procedure.
         * @param integer $id
         * @return boolean
         */
        public function deleteSollicitatieUseSPSqlServer(int $id) : bool
        {
            try
            {
                // Delete the selected Sollicitatie from database. 
                $spQuery = "EXEC [dbo].[spDeleteSollicitatie] @sollicitantId  = :id"; 

                $this->Db->query($spQuery);
                $this->Db->bind(':id', $id);

                // Execute function
                if ($this->Db->execute()) 
                {
                    error_log("INFO : Selected Sollicitatie has been deleted in class SollicitatieModel method deleteSollicitatie!", 0);
                    return true;
                } 
                else 
                {
                    error_log("ERROR : Selected Sollicitatie has been not deleted in class SollicitatieModel method deleteSollicitatie!", 0);
                    return false;
                }
            }
            catch(PDOException $ex)
            {
                error_log("ERROR : Failed to delete selected Sollicitatie in database in class SollicitatieModel method deleteSollicitatie!", 0);
                die('ERROR : Failed to delete selected Sollicitatie in database in class SollicitatieModel method deleteSollicitatie '. $ex->getMessage());
            }
        }
    }
?>