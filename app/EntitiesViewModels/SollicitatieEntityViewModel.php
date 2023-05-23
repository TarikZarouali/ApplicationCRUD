<?php
    /**
     * Database view Sollicitatie fields 
     */
    class SollicitatieEntityViewModel
    {
        private int $Id;       
        
        private string $Voornaam;    
        private string $VoornaamError;

        private string $Achternaam;     
        private string $AchternaamError;

        private int $Sollicitantnummer;    
        private string $SollicitantnummerError;

        private string $Bedrijfnaam;
        private string $BedrijfnaamError;    

        private string $Bedrijfcode;         
        private string $BedrijfcodeError;   

        private string $Straat;
        private string $StraatError;

        private int $Huisnummer;
        private string $HuisnummerError;

        private string $Toevoeging;
        private string $ToevoegingError;

        private string $Postcode;         
        private string $PostcodeError;  

        private string $Plaats;           
        private string $PlaatsError;    

        private string $Gespreksdatum;  
        private string $GespreksdatumError;  

        private string $Gesprekstijd;
        private string $GesprekstijdError; 

        private bool $IsActief; 

        private string $Opmerking;
        private string $OpmerkingError;
        
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