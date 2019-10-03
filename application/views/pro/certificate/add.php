<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 03/10/2019
 * Time: 15:21
 */
?>
<form action="">
    <div class="form-group">
        <label class="d-block">Désignation</label>
        <input placeholder="Désignation de l'attestation" type="text" class="form-control">
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <label class="d-block">Secteur d'activité</label>
            <select class="form-control select2" id="">
                <option value=""></option>
                <option value="BTP">BTP</option>
                <option value="BTP">Electricité</option>
                <option value="BTP">Informatique & Télécom</option>
                <option value="BTP">Numérique</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label class="d-block">Sous Secteur d'activité</label>
            <input  placeholder="Sous Secteur d'activité" type="text" class="form-control my-autocomplete" data-target="sub_activity_area">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <label class="d-block">Date de signature</label>
            <input  placeholder="Date de signature" type="text" class="form-control datepicker" data-target="sub_activity_area">
        </div>
        <div class="form-group col-md-4">
            <label class="d-block">Date d'attribution</label>
            <input  placeholder="Sous Secteur d'activité" type="text" class="form-control datepicker" data-target="sub_activity_area">
        </div>
        <div class="form-group col-md-4">
            <label class="d-block">Période d'éxécution du projet</label>
            <input  placeholder="Période d'éxécution" type="text" class="form-control datepicker" data-target="sub_activity_area">
        </div>

    </div>

</form>
