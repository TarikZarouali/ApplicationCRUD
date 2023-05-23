<?php
    class SollicitatieValidator
    {
        /**
         * Validat all the input fields of Sollicitatie for the create or update views.
         * @param SollicitatieEntityViewModel $data
         * @return boolean
         */
        public static function validateSollicitatieInputFields(SollicitatieEntityViewModel $data) : bool
        {            
            try
            {
                $isViewValid = false;

                // Voornaam validatie.
                if (empty("$data->Voornaam")) 
                {
                    $data->VoornaamError = 'Voer voornaam in.';
                }
                elseif(!is_string($data->Voornaam))
                {
                    $data->VoornaamError = 'Voornaam is onjuiste tekst formaat.';
                }  
                elseif(strlen($data->Voornaam) > 50)
                {
                    $data->VoornaamError = 'Voornaam is te lang!.';
                }

                // Achternaam validatie.
                if (empty("$data->Achternaam")) 
                {
                    $data->AchternaamError = 'Voer achternaam in.';
                } 
                elseif(!is_string($data->Achternaam))
                {
                    $data->AchternaamError = 'Achternaam is onjuiste tekst formaat.';
                } 
                elseif(strlen($data->Achternaam) > 50)
                {
                    $data->AchternaamError = 'Achternaam is te lang!.';
                }

                // Validate fields
                // Sollicitatie nummer validatie.
                if (is_null($data->Sollicitantnummer)) 
                {
                    $data->SollicitantnummerError = 'Voer sollicitatie nummer in.';
                }
                elseif(!is_int($data->Sollicitantnummer)) 
                {
                    $data->SollicitantnummerError = 'Sollicitant nummer is onjuiste tekst formaat.';
                }

                // Bedrijfnaam validatie.
                if (empty("$data->Bedrijfnaam")) 
                {
                    $data->BedrijfnaamError = 'Voer bedrijfnaam in.';
                } 
                elseif(!is_string($data->Bedrijfnaam))
                {
                    $data->BedrijfnaamError = 'Bedrijfnaam is onjuiste tekst formaat.';
                } 
                elseif(strlen($data->Bedrijfnaam) > 50)
                {
                    $data->BedrijfnaamError = 'Bedrijfnaam is te lang!.';
                }

                // Bedrijfcode validatie.
                if (empty("$data->Bedrijfcode")) 
                {
                    $data->BedrijfcodeError = 'Voer bedrijfcode in.';
                } 
                elseif(!is_string($data->Bedrijfcode))
                {
                    $data->BedrijfcodeError = 'Bedrijfcode is onjuiste tekst formaat.';
                } 
                elseif(strlen($data->Bedrijfcode) > 10)
                {
                    $data->BedrijfcodeError = 'Bedrijfcode is te lang!.';
                }

                // Straat validation.
                if (empty("$data->Straat")) 
                {
                    $data->StraatError = 'Voer straat in.';
                } 
                elseif(!is_string($data->Straat))
                {
                    $data->StraatError = 'Straat is onjuiste tekst formaat.';
                }
                elseif(strlen($data->Straat) > 50)
                {
                    $data->StraatError = 'Straat is te lang!.';
                }

                // Huisnummer validation.
                if (is_null($data->Huisnummer)) 
                {
                    $data->HuisnummerError = 'Voer huisnummer in.';
                } 
                elseif(!is_int($data->Huisnummer))
                {
                    $data->HuisnummerError = 'Huisnummer is onjuiste nummer formaat.';
                }

                // Toevoeging validation
                if(!is_string($data->Toevoeging))
                {
                    $data->ToevoegingError = 'Toevoeging is onjuiste tekst formaat.';
                }
                elseif(strlen($data->Toevoeging) > 10)
                {
                    $data->ToevoegingError = 'Toevoeging is te lang!.';
                }

                // Postcode validation.
                if (empty("$data->Postcode")) 
                {
                    $data->PostcodeError = 'Voer postcode in.';
                } 
                elseif(!preg_match('/^[1-9][0-9]{3} ?(?!sa|sd|ss)[a-z]|[A-Z]{2}$/i', $data->Postcode))
                {
                    $data->PostcodeError  = 'Postcode is ongeldig!.';
                }

                // Plaats validation.
                if (empty("$data->Plaats")) 
                {
                    $data->PlaatsError = 'Voer huisnummer in.';
                }
                elseif(!is_string($data->Plaats))
                {
                    $data->PlaatsError = 'Plaats is onjuiste tekst formaat.';
                }
                elseif(strlen($data->Plaats) > 50)
                {
                    $data->PlaatsError = 'Plaats is te lang!.';
                }

                // Gespreksdatum validation.
                if (empty("$data->Gespreksdatum")) 
                {
                    $data->GespreksdatumError = 'Voer gespreksdatum in.';
                } 
                // elseif(!preg_match($birthDateRegExp, $data->BirthDate))
                // {
                //     $data->BirthDateError = 'BirthDate is incorrect date format.';
                // } 

                // Gesprekstijd validation.
                if (empty("$data->Gesprekstijd")) 
                {
                    $data->GesprekstijdError = 'Voer gesprekstijd in.';
                } 
                // elseif(!preg_match($birthDateRegExp, $data->BirthDate))
                // {
                //     $data->BirthDateError = 'BirthDate is incorrect date format.';
                // } 

                // Opmerking validatie.
                if(!is_string($data->Opmerking))
                {
                    $data->OpmerkingError = 'Opmerking is onjuiste tekst formaat.';
                }
                elseif(strlen($data->Opmerking) > 250)
                {
                    $data->OpmerkingError = 'Opmerking is te lang!.';
                }

                $isVoornaamErrorEmpty           = empty("$data->VoornaamError");
                $isAchternaamErrorEmpty         = empty("$data->AchternaamError");
                $isSollicitantnummerErrorEmpty  = empty("$data->SollicitantnummerError");
                $isBedrijfnaamErrorEmpty        = empty("$data->BedrijfnaamError");
                $isBedrijfcodeErrorEmpty        = empty("$data->BedrijfcodeError");
                $isStraatErrorEmpty             = empty("$data->StraatError");
                $isHuisnummerErrorEmpty         = empty("$data->HuisnummerError");
                $isToevoegingErrorEmpty         = empty("$data->ToevoegingError");
                $isPostcodeErrorEmpty           = empty("$data->PostcodeError");
                $isPlaatsErrorEmpty             = empty("$data->PlaatsError");
                $isGespreksdatumErrorEmpty      = empty("$data->GespreksdatumError");
                $isGesprekstijdErrorEmpty       = empty("$data->GesprekstijdError");
                $isOpmerkingErrorEmpty          = empty("$data->OpmerkingError");

                if (   $isVoornaamErrorEmpty         
                    && $isAchternaamErrorEmpty       
                    && $isSollicitantnummerErrorEmpty
                    && $isBedrijfnaamErrorEmpty      
                    && $isBedrijfcodeErrorEmpty      
                    && $isStraatErrorEmpty           
                    && $isHuisnummerErrorEmpty       
                    && $isToevoegingErrorEmpty       
                    && $isPostcodeErrorEmpty         
                    && $isPlaatsErrorEmpty           
                    && $isGespreksdatumErrorEmpty    
                    && $isGesprekstijdErrorEmpty     
                    && $isOpmerkingErrorEmpty)
                {
                    $isViewValid = true;
                } 
                return $isViewValid;
            }
            catch(Exception $ex)
            {
                error_log("Failed to valide selected Sollicitatie in class SollicitatieValidator->validatSollicitatieInputFields!", 0);
            }
        }
    }
?>