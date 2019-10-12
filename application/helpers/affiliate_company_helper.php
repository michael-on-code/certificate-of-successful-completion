<?php
/**
 * Created by PhpStorm.
 * User: MikOnCode
 * Date: 12/10/2019
 * Time: 03:03
 */
function get_add_or_edit_affiliate_company_html_form($edit = false, $company = [])
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
                    echo form_label('Nom de la filiale', 'name');
                    echo form_input([
                        'name' => "company[name]",
                        'class' => 'form-control',
                        'id' => 'name',
                        'required' => '',
                        'placeholder' => 'Nom de la filiale',
                        'value' => set_value('company[name]', maybe_null_or_empty($company, 'name'), true)
                    ]);
                    echo get_form_error("company[name]");
                    //getFieldInfo('')
                    ?>
                </div>
                <div class="form-group">
                    <?php
                    echo form_label('Adresse de la filiale', 'adress');
                    echo form_textarea([
                        'name' => "company[adress]",
                        'class' => 'form-control',
                        'id' => 'adress',
                        'rows' => 3,
                        //'required'=>'',
                        'placeholder' => 'Adresse de la filiale',
                        'value' => set_value('company[adress]', maybe_null_or_empty($company, 'adress'), false)
                    ]);
                    echo get_form_error("company[adress]");
                    //getFieldInfo('')
                    ?>
                </div>

                <?php getFormSubmit($edit ? 'Modifier' : 'Ajouter') ?>
                <?php echo form_close();
                if($edit){
                    ?>
                    <div class="clearfix mg-t-15">
                        <a href="<?= site_url('affiliate-companies') ?>"><i data-feather="arrow-left"></i> Retour à la liste</a>
                    </div>
                    <?php
                }
                ?>
            </form>

        </div>
    </div>
    <?php
}

function getAddOrEditAffiliateCompaniesValidation($edit = false, $companyID = '')
{
    $ci = &get_instance();
    if ($company = $ci->input->post('company')) {
        setFormValidationRules([
            [
                'name'=>'company[name]',
                'label'=>'Nom de la filiale',
                'rules'=>'trim|required|max_length[50]|'.$edit ? "callback_is_unique_on_update[affiliate_companies.name.$companyID]" : 'is_unique[affiliate_companies.name]'
            ],
            [
                'name'=>'company[adress]',
                'label'=>'Adresse de la filiale',
                'rules'=>'trim|max_length[200]'
            ],
        ]);
        if($ci->form_validation->run()){
            $companyID = $ci->affiliate_company_model->insertOrUpdate($company, $companyID);
            get_success_message($edit ? 'Filiale modifiée avec succès': 'Filiale ajoutée avec succès');
            redirect("affiliate-companies/edit/$companyID");
        }else{
            get_error_message();
        }
    }
}