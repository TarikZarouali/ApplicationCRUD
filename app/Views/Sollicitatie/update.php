<?php
     require_once APPROOT . '/Views/Includes/header.php';
?>

<!-- <div>
    <?php

    $Sollicitatie = $data;
    FormatTextHelper::ConvertStringToJsonFormat($Sollicitatie);
    ?>    
</div> -->

<div class="container container-mvckdemo">
     <div class="wrapper-mvckdemo">
         <div class="form-group">
             <h2>Bijwerken Sollicitatie</h2>
             <form id="UpdateSollicitatie" method="POST" action="<?= URLROOT; ?>/Sollicitatie/update/<?= $data->Id ?>" autocomplete="on">
                 <input type="hidden" name="Id" value="<?= $data->Id ?>">

                 <div class="form-group row">
                    <label class="col-sm-3 control-label">Voornaam *</label>
                    <input type="text" class="input-field-error-message" name="Voornaam" required="true" maxlength="50" value="<?= $data->Voornaam ?>">
                        <span class="invalidFeedback"><?= $data->VoornaamError ?></span>
                    </input>
                 </div>

                 <div class="form-group row">
                    <label class="col-sm-3 control-label">Achternaam *</label>
                    <input type="text" class="input-field-error-message" name="Achternaam" required="true" maxlength="50" value="<?= $data->Achternaam ?>">
                        <span class="invalidFeedback"><?= $data->AchternaamError ?></span>
                    </input>
                 </div>

                 <div class="form-group row">
                    <label class="col-sm-3 control-label">Sollicitantnummer *</label>
                    <input type="number" class="input-field-error-message" name="Sollicitantnummer" required="true" value="<?= $data->Sollicitantnummer ?>">
                        <span class="invalidFeedback"><?= $data->SollicitantnummerError ?></span>
                    </input>
                 </div>

                 <div class="form-group row">
                    <label class="col-sm-3 control-label">Bedrijfnaam</label>
                    <input type="text" class="input-field-error-message" name="Bedrijfnaam" required="true" maxlength="50" value="<?= $data->Bedrijfnaam ?>">
                        <span class="invalidFeedback"><?= $data->BedrijfnaamError ?></span>
                    </input>
                 </div>

                 <div class="form-group row">
                    <label class="col-sm-3 control-label">Bedrijfcode *</label>
                    <input type="text" style="width:11.7rem; class="input-field-error-message" name="Bedrijfcode" required="true" maxlength="10" value="<?= $data->Bedrijfcode ?>">
                        <span class="invalidFeedback"><?= $data->BedrijfcodeError ?></span>
                    </input>
                 </div>
 
                 <div class="form-group row">
                    <label class="col-sm-3 control-label">Straat *</label>
                    <input type="text" class="input-field-error-message" name="Straat" required="true" maxlength="50" value="<?= $data->Straat ?>">
                        <span class="invalidFeedback"><?= $data->StraatError ?></span>
                    </input>
                 </div>
 
                 <div class="form-group row">
                    <label class="col-sm-3 control-label">Huisnummer *</label>
                    <input type="number" class="input-field-error-message" name="Huisnummer" required="true" value="<?= $data->Huisnummer ?>">
                        <span class="invalidFeedback"><?= $data->HuisnummerError ?></span>
                    </input>
                 </div>
 
                 <div class="form-group row">
                    <label class="col-sm-3 control-label">Toevoeging</label>
                    <input type="text" class="input-field-error-message" name="Toevoeging" maxlength="10" value="<?= $data->Toevoeging ?>">
                        <span class="invalidFeedback"><?= $data->ToevoegingError ?></span>
                    </input>
                 </div>
 
                 <div class="form-group row">
                    <label class="col-sm-3 control-label">Postcode *</label>
                    <input type="text" class="input-field-error-message" name="Postcode" required="true" maxlength="10" value="<?= $data->Postcode ?>">
                        <span class="invalidFeedback"><?= $data->PostcodeError ?></span>
                    </input>
                 </div>
 
                 <div class="form-group row">
                    <label class="col-sm-3 control-label">Plaats *</label>
                    <input type="text" class="input-field-error-message" name="Plaats" required="true" maxlength="50" value="<?= $data->Plaats ?>">
                        <span class="invalidFeedback"><?= $data->PlaatsError ?></span>
                    </input>
                 </div>

                 <div class="form-group row">
                    <label class="col-sm-3 control-label">Gespreksdatum *</label>
                    <input type="date" class="input-field-error-message" name="Gespreksdatum" required="true" value="<?= $data->Gespreksdatum ?>"></input> 
                    <span class="invalidFeedback"><?= $data->GespreksdatumError ?></span>
                 </div>

                 <div class="form-group row">
                    <label class="col-sm-3 control-label">Gesprekstijd *</label>
                    <input type="Time" class="input-field-error-message" name="Gesprekstijd" required="true" value="<?= $data->Gesprekstijd ?>"></input> 
                    <span class="invalidFeedback"><?= $data->GesprekstijdError ?></span>
                 </div>
  
                 <div class="form-group row">
                    <label class="col-sm-3 control-label">Is Actief </label>
                    <input type="checkbox" name="IsActief" <?= $data->IsActief == 1 ? 'checked="true"' : '' ?>></input> 
                 </div>
 
                 <div class="form-group row">
                    <label class="col-sm-3 control-label">Opmerking</label>
                    <textarea name="Opmerking" rows="4" cols="40" maxlength="250"><?= $data->Opmerking ?></textarea>
                    <span class="invalidFeedback"><?= $data->OpmerkingError ?></span>
                 </div>
 
                 <div class="form-group row float-lg-right">
                    <a class="btn btn-primary mr-1" href="<?= URLROOT; ?>/Sollicitatie/index">Back</a>
                    <button type="submit" class="btn btn-success">Save</button>
                 </div>
             </form>
         </div>
     </div>
 </div>

<?php
    require_once APPROOT . '/Views/Includes/footer.php';
?>