<?php
    class SollicitatieHelper
    {
        /**
         * Create new empty Sollicitatie object.
         * @return SollicitatieEntityViewModel
         */
        public static function createEmptySollicitatieObject() : SollicitatieEntityViewModel
        {
            $newEmptySollicitatie = new SollicitatieEntityViewModel();

            $newEmptySollicitatie->Id = 0;

            $newEmptySollicitatie->Voornaam = '';
            $newEmptySollicitatie->VoornaamError = '';

            $newEmptySollicitatie->Achternaam = '';
            $newEmptySollicitatie->AchternaamError = '';

            $newEmptySollicitatie->Sollicitantnummer = 0;
            $newEmptySollicitatie->SollicitantnummerError ='';

            $newEmptySollicitatie->Bedrijfnaam = '';
            $newEmptySollicitatie->BedrijfnaamError = '';

            $newEmptySollicitatie->Bedrijfcode = '';
            $newEmptySollicitatie->BedrijfcodeError = '';

            $newEmptySollicitatie->Straat = '';
            $newEmptySollicitatie->StraatError = '';

            $newEmptySollicitatie->Huisnummer = 0;
            $newEmptySollicitatie->HuisnummerError = '';

            $newEmptySollicitatie->Toevoeging = '';
            $newEmptySollicitatie->ToevoegingError = '';

            $newEmptySollicitatie->Postcode = '';
            $newEmptySollicitatie->PostcodeError = '';

            $newEmptySollicitatie->Plaats = '';
            $newEmptySollicitatie->PlaatsError = '';

            $newEmptySollicitatie->Gespreksdatum = '';
            $newEmptySollicitatie->GespreksdatumError = '';

            $newEmptySollicitatie->Gesprekstijd = '';
            $newEmptySollicitatie->GesprekstijdError = '';

            $newEmptySollicitatie->IsActief = '';

            $newEmptySollicitatie->Opmerking = '';
            $newEmptySollicitatie->OpmerkingError = '';

            return $newEmptySollicitatie;
        }

        /**
         * Map the selected database Sollicitatie row from to Sollicitatie object. 
         * @param mixed $selectedSollicitatie
         * @return SollicitatieEntityViewModel
         */
        public static function mapSollicitatieRowToObject(mixed $selectedSollicitatie) : SollicitatieEntityViewModel
        {
            $modifiedSollicitatie                               = new SollicitatieEntityViewModel();

            $modifiedSollicitatie->Id                           = $selectedSollicitatie->Id;

            $modifiedSollicitatie->Voornaam                     = $selectedSollicitatie->Voornaam;
            $modifiedSollicitatie->VoornaamError                = '';

            $modifiedSollicitatie->Achternaam                   = $selectedSollicitatie->Achternaam;
            $modifiedSollicitatie->AchternaamError              = '';

            $modifiedSollicitatie->Sollicitantnummer            = $selectedSollicitatie->Sollicitantnummer;
            $modifiedSollicitatie->SollicitantnummerError       = '';

            $modifiedSollicitatie->Bedrijfnaam                  = $selectedSollicitatie->Bedrijfnaam;
            $modifiedSollicitatie->BedrijfnaamError             = '';

            $modifiedSollicitatie->Bedrijfcode                  = $selectedSollicitatie->Bedrijfcode;
            $modifiedSollicitatie->BedrijfcodeError             = '';

            $modifiedSollicitatie->Straat                       = $selectedSollicitatie->Straat;
            $modifiedSollicitatie->StraatError                  = '';

            $modifiedSollicitatie->Huisnummer                   = $selectedSollicitatie->Huisnummer;
            $modifiedSollicitatie->HuisnummerError              = '';

            $modifiedSollicitatie->Toevoeging                   = !empty("$selectedSollicitatie->Toevoeging") ? $selectedSollicitatie->Toevoeging : ''; 
            $modifiedSollicitatie->ToevoegingError              = '';

            $modifiedSollicitatie->Postcode                     = $selectedSollicitatie->Postcode;
            $modifiedSollicitatie->PostcodeError                = '';

            $modifiedSollicitatie->Plaats                       = $selectedSollicitatie->Plaats;
            $modifiedSollicitatie->PlaatsError                  = '';

            $modifiedSollicitatie->Gespreksdatum                = $selectedSollicitatie->Gespreksdatum;
            $modifiedSollicitatie->GespreksdatumError           = '';

            $modifiedSollicitatie->Gesprekstijd                 = $selectedSollicitatie->Gesprekstijd;
            $modifiedSollicitatie->GesprekstijdError            = '';

            $modifiedSollicitatie->IsActief                     = $selectedSollicitatie->IsActief ? 1 : 0;

            $modifiedSollicitatie->Opmerking                    = !empty("$selectedSollicitatie->Opmerking") ? $selectedSollicitatie->Opmerking : '';
            $modifiedSollicitatie->OpmerkingError               = '';

            return $modifiedSollicitatie;
        }
        
        /**
         * Set the values of input fields from the view to Sollicitatie object.
         * @param [type] $inputPost
         * @param string $methodType
         * @return SollicitatieEntityViewModel
         */
        public static function setInputSollicitatieFieldsToSollicitatieObject($inputPost, string $methodType) : SollicitatieEntityViewModel
        {
            $Sollicitatie = new SollicitatieEntityViewModel();
            
            if($methodType == 'update')
            {
                $Sollicitatie->Id = isset($inputPost['Id']) ? $inputPost['Id']: 0;
            }
            
            $Sollicitatie->Voornaam                     = trim($inputPost['Voornaam']);
            $Sollicitatie->VoornaamError                = '';

            $Sollicitatie->Achternaam                   = trim($inputPost['Achternaam']);
            $Sollicitatie->AchternaamError              = '';

            $Sollicitatie->Sollicitantnummer            = $inputPost['Sollicitantnummer'];
            $Sollicitatie->SollicitantnummerError       = '';

            $Sollicitatie->Bedrijfnaam                  = trim($inputPost['Bedrijfnaam']);
            $Sollicitatie->BedrijfnaamError             = '';

            $Sollicitatie->Bedrijfcode                  = $inputPost['Bedrijfcode'];
            $Sollicitatie->BedrijfcodeError             = '';

            $Sollicitatie->Straat                       = trim($inputPost['Straat']);
            $Sollicitatie->StraatError                  = '';

            $Sollicitatie->Huisnummer                   = $inputPost['Huisnummer'];
            $Sollicitatie->HuisnummerError              = '';

            $Sollicitatie->Toevoeging                   = isset($inputPost['Toevoeging']) ? trim($inputPost['Toevoeging']) : '';
            $Sollicitatie->ToevoegingError              = '';

            $Sollicitatie->Postcode                     = trim($inputPost['Postcode']);
            $Sollicitatie->PostcodeError                = '';

            $Sollicitatie->Plaats                       = trim($inputPost['Plaats']);
            $Sollicitatie->PlaatsError                  = '';

            $Sollicitatie->Gespreksdatum                = trim($inputPost['Gespreksdatum']);
            $Sollicitatie->GespreksdatumError           = '';

            $Sollicitatie->Gesprekstijd                 = trim($inputPost['Gesprekstijd']);
            $Sollicitatie->GesprekstijdError            = '';

            $Sollicitatie->IsActief                     = isset($inputPost['IsActief']) ? 1 : 0;

            $Sollicitatie->Opmerking                    = isset($inputPost['Opmerking']) ? trim($inputPost['Opmerking']) : '';
            $Sollicitatie->OpmerkingError               = '';

            return $Sollicitatie;
        }
    }
?>