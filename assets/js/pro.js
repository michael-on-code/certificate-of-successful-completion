$(function () {
    'use strict';
    var pageUrl = window.location.href.split(/[?#]/)[0];
    if ($('#sidebarMenu').length) {
        $("#sidebarMenu ul li a").each(function () {
            if (this.href == pageUrl) {
                $(this).addClass("active"); // add active to a
                $(this).parent().prev('a.with-sub').addClass("active"); // add active to parent a if it's a submenu
            }
        });
    }
    if ($('.dropdown-menu').length) {
        $(".dropdown-menu a").each(function () {
            if (this.href == pageUrl) {
                $(this).addClass("active"); // add active to a
            }
        });
    }

    $(document).on('reset', 'form', function () {
        $(this).find('textarea, input').val('');
        $(this).find('select').val('').trigger('change');
        $(this).find('.my-summernote').each(function () {
            $(this).summernote('code', '')
        });
        $('.dropify-clear').trigger('click');
        $('.my-file-preview-btn').fadeOut();
    });

    if ($('.dropify').length) {
        var myDropify = $('.dropify').dropify({
            messages: {
                default: 'Glissez / déposez un fichier ici ou cliquez ici',
                replace: 'Glissez / déposez un fichier ou cliquez ici pour remplacer',
                remove: 'Enlever',
                error: 'Ooops, une erreur a été rencontrée'
            },
            error: {
                'fileSize': 'Le ficher est trop volumineux | {{ value }} max.',
                'fileExtension': "Le format du fichier n'est pas autorisé | {{ value }} autorisé."
            }
        });

        myDropify.each(function () {
            if($(this).hasClass('auto-upload')){
                $(this).on('change', function () {
                    var data={};
                    var dropifyInput = $(this);
                    var currentForm = dropifyInput.parents('form');
                    var currentFormGroup = dropifyInput.parents('.form-group');
                    var submitBtn = currentForm.find('button[type=submit]');
                    if(this.files && this.files[0]){
                        var fd = new FormData();
                        var target = dropifyInput.attr('data-target');
                        var targetName = dropifyInput.attr('data-target-name');
                        fd.append(target, this.files[0]);
                        fd.append('name', target);
                        fd.append(clientData.csrf_token_name, clientData.csrf_hash);
                        $.ajax({
                            url : clientData.uploadUrl,
                            processData:false,
                            contentType:false,
                            data : fd,
                            type: 'POST',
                            dataType: 'JSON',
                            cache:false,
                            beforeSend : function(){
                                dropifyInput.addClass('upload-on-progress');
                                submitBtn.attr('disabled', true);
                                currentFormGroup.find('label').append(' <span data-toggle="tooltip" data-placement="top" title="Upload en cours" class="spinner-border spinner-border-sm upload-spinner" role="status" aria-hidden="true"></span>');
                            },
                            error: function () {
                                alert('Ooops... Une erreur a été rencontrée');
                            },

                            success: function (response) {
                                //console.log(response);
                                if(response.status){
                                    clientData.csrf_token_name = response.csrf_token_name;
                                    clientData.csrf_hash = response.csrf_hash;
                                    $('input[name="'+targetName+'"]').val(response.fileName);
                                    var previewBtn = currentFormGroup.find('.my-file-preview-btn');
                                    previewBtn.attr('href', clientData.uploadPath+response.fileName);
                                    dropifyInput.removeClass('upload-on-progress');
                                    currentFormGroup.find('label span.upload-spinner').fadeOut();
                                    currentFormGroup.find('label span.upload-spinner').remove();
                                    previewBtn.fadeIn();
                                    if(currentForm.find('.upload-on-progress').length < 1){
                                        submitBtn.removeAttr('disabled')
                                    }
                                }
                            }
                        });
                    }
                });
            }
        });
        myDropify.on('dropify.beforeClear', function(event, element){
            var $this = $(element.element);
            $this.parents('.form-group').find('input[type=hidden]').val('');
            $this.parents('.form-group').find('.my-file-preview-btn').fadeOut();
        });
    }
    if ($('.cutter:not(td.cutter)').length) {
        $('.cutter:not(td.cutter)').line(1, "..");
    }

    if($('input[required]').length){
        $('input[required], select[required], textarea[required]').each(function () {
            $(this).parents('.form-group').find('label:not(.empty)').append(" <span style='color: red'>*</span>");

        });
    }

    $(document).on('click', ".prompt", function (e) {
        e.preventDefault();
        var message = $(this).attr("data-confirm-message"), href = $(this).attr('data-href');
        swal({
            title: "Confirmation",
            text: message,
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: 'Oui',
            cancelButtonText: 'Non',
            closeOnConfirm: false,
            html: false
        }, function () {
            window.location.href = href;
        });
    });

    if ($('#total_amount').length) {
        var amount_received = 0;
        var totalAmount = 0;
        $('#total_amount, #amount_received').change(function () {
            var share = 100;
            amount_received = $.trim($('#amount_received').val());
            totalAmount = $.trim($('#total_amount').val());
            if (amount_received == '') {
                $('#amount_received').val(totalAmount);
            } else if (parseInt(totalAmount) >= parseInt(amount_received)) {
                share = (parseInt(amount_received) / parseInt(totalAmount)) * 100;
                share = parseInt(share);
            }
            $('#akasi_share').val(share);
        });
    }


    if ($('#example1').length) {
        var table = $('#example1').DataTable({
            columnDefs: [{
                'targets': [0], /* column index */
                'orderable': false, /* true or false */
            }],
            //stateSave: true,
            info: false,
            stripe: true,
            ordering: false,
            lengthChange: false,
            language: {
                processing: "Traitement en cours...",
                search: "Rechercher&nbsp;:&nbsp;",
                lengthMenu: "Afficher _MENU_ &eacute;l&eacute;ments",
                info: "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                infoEmpty: "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
                infoFiltered: "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                infoPostFix: "",
                loadingRecords: "Chargement en cours...",
                zeroRecords: "Aucun &eacute;l&eacute;ment &agrave; afficher",
                emptyTable: "Aucune donnée disponible dans le tableau",
                paginate: {
                    first: "Premier",
                    previous: "Pr&eacute;c",
                    next: "Suiv",
                    last: "Dernier"
                },
                aria: {
                    sortAscending: ": activer pour trier la colonne par ordre croissant",
                    sortDescending: ": activer pour trier la colonne par ordre décroissant"
                }
            }
        });


        $('a.toggle-vis').on('click', function (e) {
            e.preventDefault();

            // Get the column API object
            var column = table.column($(this).attr('data-column'));

            // Toggle the visibility
            column.visible(!column.visible());
        });
    }

    if ($('#certificateTable').length) {
        var certificateTable = $('#certificateTable').DataTable({

            //stateSave: true,
            //Is a LifeSAVER
            drawCallback: function( settings ) {
                var api = this.api();

                $('[data-toggle="tooltip"]', api.table().container()).tooltip();
                $('td.cutter', api.table().container()).line(1, "...");
                $('.is-currency:not(.converted)', api.table().container()).each(function () {
                    $(this).text(numeral(parseInt($.trim($(this).text()))).format('0,0'))
                    $(this).addClass('converted')
                });
                /*$('[data-toggle="tooltip"]', api.table().container()).on('mouseenter', function () {
                    $(this).tooltip()
                });*/
            },
            //info: false,
            stripe: true,
            ordering: true,
            columnDefs: [{
                'targets': clientData.unOrderableColumns, /* column index */
                'orderable': false, /* true or false */
            }],
            aaSorting: [],
            //lengthChange: false,
            language: {
                processing: "Traitement en cours...",
                search: "Rechercher&nbsp;:&nbsp;",
                lengthMenu: "Afficher _MENU_ &eacute;l&eacute;ments",
                info: "Affichage de <strong>_START_ &agrave; _END_</strong> ABE sur <strong>_TOTAL_</strong> ABE",
                infoEmpty: "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
                infoFiltered: "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                infoPostFix: "",
                loadingRecords: "Chargement en cours...",
                zeroRecords: "Aucun &eacute;l&eacute;ment &agrave; afficher",
                emptyTable: "Aucune donnée disponible dans le tableau",
                paginate: {
                    first: "Premier",
                    previous: "Pr&eacute;c",
                    next: "Suiv",
                    last: "Dernier"
                },
                aria: {
                    sortAscending: ": activer pour trier la colonne par ordre croissant",
                    sortDescending: ": activer pour trier la colonne par ordre décroissant"
                }
            }
        });
        //Is a Life Saver
        certificateTable.columns(clientData.invisiblesColumns).visible(false);
        certificateTable.$("a[data-toggle=popover]").popover(
            {
                html: true,
                container: 'body',
                sanitize: false,
                content: function () {
                    var target=parseInt($(this).attr('data-target'));
                    return clientData.certificates[target].minifiedPreview;
                },
                title: 'Aperçu rapide <span style="float:right;cursor:pointer;" class="fa fa-times my-close" data-toggle="popover">'
            }
        ).click(function(e) {e.preventDefault();});

        certificateTable.$('.my-global-preview-btn').click(function (e) {
            e.preventDefault();
            var targetID = $(this).attr('data-target');
            var previewHTML = clientData.certificates[targetID].globalPreview;
            $('.modalArea .content').html(previewHTML);
            $('.modalArea .content div.innerContent').each(function () {
                if($.trim($(this).text())==''){
                    $(this).text("Néant");
                }
            })
            $('.modalTriggerContainer a').trigger('click');
        });

        $('.dataTables_length select').addClass('form-control');
        $('.dataTables_length select').css({
            display : 'inline',
            width: 'unset'
        });

        $('select#columnToggle').on('change', function (e) {
            var column = certificateTable.columns($(this).val());
            var allColumns = certificateTable.columns(clientData.allColumns);
            allColumns.visible(false);
            column.visible(true, false);
            if ($('td.cutter').length) {
                $('td.cutter').line(2, "...");
            }
            if ($('[data-toggle="tooltip"]').length) {
                $('[data-toggle="tooltip"]').tooltip()
            }
            if ($('.is-currency:not(.converted)').length) {
                $('.is-currency:not(.converted)').each(function () {
                    $(this).text(numeral(parseInt($.trim($(this).text()))).format('0,0'))
                    $(this).addClass('converted')
                });
            }
        });
    }
    if ($('.select2').length) {
        $('.select2').select2({
            placeholder: 'Sélectionner',
            //searchInputPlaceholder: 'Rechercher'
        });
    }
    if ($('[data-toggle="tooltip"]').length) {
        $('[data-toggle="tooltip"]').tooltip()
    }
    if ($('.my-autocomplete').length) {
        var availableTags1 = [
            "Groupe Electrogène", 'Développement web', 'Site web', 'Application mobile', 'Application web'
        ];
        $('.my-autocomplete').each(function () {
            //console.log(clientData.autocompleteUrl+($(this).attr('data-target')));
            $(this).autocomplete({
                source: encodeURI(clientData.autocompleteUrl + ($(this).attr('data-target')))
                //source: availableTags1
            })
        });
    }

    function getDate(element) {
        var date;
        try {
            date = $.datepicker.parseDate(dateFormat, element.value);
        } catch (error) {
            date = null;
        }

        return date;
    }

    if ($('.dateRanger').length) {
        //$.datepicker.setDefaults($.datepicker.regional["fr"]);
        var dateFormat = 'dd/mm/yy',
            from = $('#dateFrom')
                .datepicker({
                    //defaultDate: '+1w',
                    //numberOfMonths: 2,
                    changeMonth: true,
                    changeYear: true,
                })
                .on('change', function() {
                    console.log(getDate( this ));
                    var date = new Date(getDate( this ));
                    date.setDate(date.getDate() + 1);
                    to.datepicker('option','minDate', date );
                }),
            to = $('#dateTo').datepicker({
                //defaultDate: '+1w',
                //numberOfMonths: 2,
                changeMonth: true,
                changeYear: true,
            })
                .on('change', function() {
                    var date = new Date(getDate( this ));
                    date.setDate(date.getDate() -1);
                    from.datepicker('option','maxDate', date );
                });
    }
    if ($('.datepicker').length) {
        $.datepicker.setDefaults($.datepicker.regional["fr"]);
        $('.datepicker').datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "dd/mm/yy",
            regional: ['fr']
        });
    }
    if ($('.currencyInput').length) {
        $('.currencyInput').each(function () {
            new Cleave(this, {
                numeral: true,
                delimiter: ' ',
                numeralThousandsGroupStyle: 'thousand'
            });
        })
    }
    if($('.is-currency').length){
        /*$('.is-currency').each(function () {
            $(this).text(numeral(parseInt($.trim($(this).text()))).format('0,0'))
        });*/
        /*$('.is-currency').each(function () {
            $(this).text(currency(parseInt($.trim($(this).text())), { separator: ',' }).format())
        });*/
    }
    if ($('.number-input').length) {
        $('.number-input').each(function () {
            new Cleave(this, {
                numeral: true,
            });
        })
    }
    if ($('.my-summernote').length) {
        $('.my-summernote').summernote({
            lang: 'fr-FR',
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph', 'style']],
                ['height', ['height']],
                ['insert', ['link']],
            ],
            height: 130
        });
    }
    if($('.currency-dropdown').length){
        $(document).on('click', '.currency-dropdown a.dropdown-item', function (e) {
            e.preventDefault();
            var button = $(this).parent().prev('button');
            var actualCurrency = $.trim(button.text());
            var choosedCurrency = $.trim($(this).text());
            button.text(choosedCurrency);
            $(this).parent().prepend('<a class="dropdown-item" href="#">'+actualCurrency+'</a>')
            $('[name="certificate[currency]"]').val(choosedCurrency);
            $(this).addClass('choosed-currency-remove');
            var inputDropdownHTML = $(this).parent().parent().html();
            $('.currency-dropdown').parents('.input-group-prepend').each(function () {
               $(this).html(inputDropdownHTML);
               $(this).removeClass('show');
               $(this).find('.currency-dropdown').removeClass("show")
            });
            $('.choosed-currency-remove').remove();
        });
    }

    if ($('[data-toggle="popover"]').length) {
        $(document).on('click', '.my-close', function () {
            var target = $(this).parents().find('.popover');

            var targetID = target.attr('id');
            $('[aria-describedby="'+targetID+'"]').trigger('click');
        })
    }


});
