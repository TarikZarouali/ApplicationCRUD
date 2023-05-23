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
             <h2>Details van Sollicitatie</h2>
             <form id="DetailsSollicitatie" method="GET" action="<?= URLROOT; ?>/Sollicitatie/details?id=">

                 <div class="form-group row">
                    <label class="col-sm-3 control-label">Voornaam</label>
                    <input type="text" disabled value="<?= $data->Voornaam ?>"></input>
                 </div>

                 <div class="form-group row">
                    <label class="col-sm-3 control-label">Achternaam</label>
                    <input type="text" disabled value="<?= $data->Achternaam ?>"></input>
                 </div>

                 <div class="form-group row">
                    <label class="col-sm-3 control-label">Sollicitantnummer</label>
                    <input type="number" disabled value="<?= $data->Sollicitantnummer ?>"></input>
                 </div> 
             
                <div class="form-group row">
                    <label class="col-sm-3 control-label">Bedrijfnaam</label>
                    <input type="text" disabled value="<?= $data->Bedrijfnaam ?>"></input>
                 </div>
 
                 <div class="form-group row">
                    <label class="col-sm-3 control-label">Bedrijfcode</label>
                    <input type="text" disabled value="<?= $data->Bedrijfcode ?>"></input>
                 </div>

                 <div class="form-group row">
                    <label class="col-sm-3 control-label">Straat</label>
                    <input type="text" disabled value="<?= $data->Straat ?>"></input>
                 </div>

                 <div class="form-group row">
                    <label class="col-sm-3 control-label">Huisnummer</label>
                    <input type="number" style="width:12rem" disabled value="<?= $data->Huisnummer ?>"></input>
                 </div>

                 <div class="form-group row">
                    <label class="col-sm-3 control-label">Toevoeging</label>
                    <input type="text" style="width:12rem" disabled value="<?= $data->Toevoeging ?>"></input>
                 </div>
 
                 <div class="form-group row">
                    <label class="col-sm-3 control-label">Postcode</label>
                    <input type="text" disabled value="<?= $data->Postcode ?>"></input>  
                 </div>
 
                 <div class="form-group row">
                    <label class="col-sm-3 control-label">Plaats</label>
                    <input type="text" disabled value="<?= $data->Plaats ?>"></input> 
                 </div>
 
                 <div class="form-group row">
                    <label class="col-sm-3 control-label">Gespreksdatum</label>
                    <input type="date" disabled value="<?= $data->Gespreksdatum ?>"></input> 
                 </div>
 
                 <div class="form-group row">
                    <label class="col-sm-3 control-label">Gesprekstijd</label>
                    <input type="time" disabled value="<?= $data->Gesprekstijd ?>"></input> 
                 </div>
  
                 <div class="form-group row">
                    <label class="col-sm-3 control-label">Is actief</label>
                    <input type="checkbox" disabled <?= $data->IsActief == 1 ? 'checked="true"' : '' ?>></input> 
                 </div>
 
                 <div class="form-group row">
                    <label class="col-sm-3 control-label">Opmerking</label>
                    <textarea disabled rows="4" cols="40"><?= $data->Opmerking ?></textarea>
                 </div>
 
                 <div class="form-group row float-lg-right">
                     <a class="btn btn-primary mr-1" href="<?php URLROOT; ?>/Sollicitatie/index">Back</a>
                     <a class="btn btn-warning" href="<?php URLROOT; ?>/Sollicitatie/update/<?= $data->Id ?>">Update</a>
                 </div>
             </form>
         </div>
     </div>
 </div>

<?php
    require_once APPROOT . '/Views/Includes/footer.php';
?>