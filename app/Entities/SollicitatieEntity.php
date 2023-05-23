<?php
    /**
     * Database table Sollicitatie fields 
     */
    class SollicitatieEntity
    {
        private int $Id;       
        
        private int $SollicitatieNumber;    
        private string $SollicitatieNumberError;

        private string $Gender;    
        private string $GenderError;

        private string $Title;    
        private string $TitleError;

        private string $FirstName;    
        private string $FirstNameError;

        private string $LastName;     
        private string $LastNameError;

        private string $NickName;
        private string $NickNameError;    

        private string $BirthDate;         
        private string $BirthDateError;   

        private string $Street;
        private string $StreetError;

        private int $HomeNumber;
        private string $HomeNumberError;

        private string $NumberExtension;
        private string $NumberExtensionError;

        private string $ZipCode;         
        private string $ZipCodeError;  

        private string $Place;           
        private string $PlaceError;    

        private string $Sollicitatiekey;

        private bool $IsActive;    

        private string $Note;  
        private string $NoteError;  

        private string $DateCreated;
        private string $DateModified;
        
        /**
         * Magic get generator property.
         * @param [type] $property
         * @return void
         */
        public function __get($property) 
        {
            if (property_exists($this, $property)) 
            {
                return $this->$property;
            }
        }
    
        /**
         * Magic set generator property.
         * @param [type] $property
         * @param [type] $value
         */
        public function __set($property, $value) 
        {
            if (property_exists($this, $property)) 
            {
                $this->$property = $value;
            }
        }
    }
?>