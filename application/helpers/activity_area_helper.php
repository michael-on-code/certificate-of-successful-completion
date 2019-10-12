<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 12/10/2019
 * Time: 03:03
 */
function get_add_or_edit_actitivy_area_html_form($edit = false, $activity = [])
{
    ?>
    <div class="row">
        <div class="col-md-10">
            <?php
            echo form_open();
            ?>
            <form>

                <div class="form-group">
                    <?php
                    echo form_label("Nom du secteur d'activité", 'name');
                    echo form_input([
                        'name' => "activity[name]",
                        'class' => 'form-control',
                        'id' => 'name',
                        'required' => '',
                        'placeholder' => "Nom du secteur d'activité",
                        'value' => set_value('activity[name]', maybe_null_or_empty($activity, 'name'), true)
                    ]);
                    echo get_form_error("activity[name]");
                    //getFieldInfo('')
                    ?>
                </div>
                <div class="form-group">
                    <?php
                    echo form_label("Description du secteur d'activité", 'description');
                    echo form_textarea([
                        'name' => "activity[description]",
                        'class' => 'form-control',
                        'id' => 'description',
                        'rows' => 3,
                        //'required'=>'',
                        'placeholder' => "Description du secteur d'activité",
                        'value' => set_value('activity[description]', maybe_null_or_empty($activity, 'description'), false)
                    ]);
                    echo get_form_error("activity[description]");
                    //getFieldInfo('')
                    ?>
                </div>

                <?php getFormSubmit($edit ? 'Modifier' : 'Ajouter') ?>
                <?php echo form_close();
                if($edit){
                    ?>
                    <div class="clearfix mg-t-15">
                        <a href="<?= site_url('activity-area') ?>"><i data-feather="arrow-left"></i> Retour à la liste</a>
                    </div>
                    <?php
                }
                ?>
            </form>

        </div>
    </div>
    <?php
}

function getAddOrEditActivityAreaValidation($edit = false, $activityID = '')
{
    $ci = &get_instance();
    if ($activity = $ci->input->post('activity')) {
        setFormValidationRules([
            [
                'name'=>'activity[name]',
                'label'=>"Nom du secteur d'activité",
                'rules'=>'trim|required|max_length[50]|'.$edit ? "callback_is_unique_on_update[activity_area.name.$activityID]" : 'is_unique[activity_area.name]'
            ],
            [
                'name'=>'activity[description]',
                'label'=>"Description du secteur d'activité",
                'rules'=>'trim|max_length[200]'
            ],
        ]);
        if($ci->form_validation->run()){
            $activityID = $ci->activity_area_model->insertOrUpdate($activity, $activityID);
            get_success_message($edit ? 'Filiale modifiée avec succès': 'Filiale ajoutée avec succès');
            redirect("activity-area/edit/$activityID");
        }else{
            get_error_message();
        }
    }
}