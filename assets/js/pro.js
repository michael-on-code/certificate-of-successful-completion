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

    if ($('.dropify').length) {
        $('.dropify').dropify({
            messages: {
                default: 'Glissez ou déposez un fichier ici ou cliquez ici',
                replace: 'Glissez ou déposez un fichier ou cliquez ici pour remplacer',
                remove: 'Enlever',
                error: 'Ooops, une erreur a été rencontrée'
            },
            error: {
                'fileSize': 'Le ficher est trop volumineux | {{ value }} max.',
                'fileExtension': "Le format du fichier n'est pas autorisé | {{ value }} autorisé."
            }
        });
        // Used events
        var drEvent = $('#input-file-events').dropify();
        drEvent.on('dropify.beforeClear', function (event, element) {
            return confirm("Voulez vous vraiment supprimer \"" + element.file.name + "\" ?");
        });
        drEvent.on('dropify.afterClear', function (event, element) {
            alert('File deleted');
        });
        drEvent.on('dropify.errors', function (event, element) {
            console.log('Has Errors');
        });
        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function (e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
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

    if($('#total_amount').length){
        var amount_received=0;
        var totalAmount=0;
        $('#total_amount, #amount_received').change(function(){
            var share = 100;
            amount_received = $.trim($('#amount_received').val());
            totalAmount = $.trim($('#total_amount').val());
            if(amount_received==''){
                $('#amount_received').val(totalAmount);
            }else if (parseInt(totalAmount)>=parseInt(amount_received)){
                share = (parseInt(amount_received) / parseInt(totalAmount))*100;
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
        certificateTable.columns( clientData.invisiblesColumns ).visible( false );

        $('select#columnToggle').on('change', function (e) {
            var column = certificateTable.columns($(this).val());
            var allColumns = certificateTable.columns(clientData.allColumns);
            allColumns.visible(false);
            column.visible(true, false);
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
                source: ""+clientData.autocompleteUrl+($(this).attr('data-target'))
                //source: availableTags1
            })
        });
    }
    function getDate( element ) {
        var date;
        try {
            date = $.datepicker.parseDate( dateFormat, element.value );
        } catch( error ) {
            date = null;
        }

        return date;
    }
    $.datepicker.setDefaults( $.datepicker.regional[ "fr" ] );
    if($('.dateRanger').length){
        var dateFormat = 'mm/dd/yy',
            from = $('#dateFrom')
                .datepicker({
                    defaultDate: '+1w',
                    numberOfMonths: 2,
                    dateFormat: "dd/mm/yy",
                    regional : ['fr']
                })
                .on('change', function() {
                    to.datepicker({
                        minDate : getDate( this ),
                        dateFormat: "dd/mm/yy",
                        regional : ['fr']
                    });
                }),
            to = $('#dateTo').datepicker({
                defaultDate: '+1w',
                numberOfMonths: 2,
                dateFormat: "dd/mm/yy",
                regional : ['fr']
            })
                .on('change', function() {
                    from.datepicker({
                        maxDate : getDate( this ),
                        dateFormat: "dd/mm/yy",
                        regional : ['fr']
                    });
                });
    }
    if($('.datepicker').length){
        $('.datepicker').datepicker({
            changeMonth : true,
            changeYear : true,
            dateFormat: "dd/mm/yy",
            regional : ['fr']
        });
    }
    if($('.currencyInput').length){
        $('.currencyInput').each(function(){
            new Cleave(this, {
                numeral: true,
                delimiter: ' ',
                numeralThousandsGroupStyle: 'thousand'
            });
        })
    }
    if($('.number-input').length){
        $('.number-input').each(function(){
            new Cleave(this, {
                numeral: true,
            });
        })
    }
    if ($('.my-summernote')) {
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


});
