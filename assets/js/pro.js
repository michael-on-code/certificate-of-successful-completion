
$(function(){
    'use strict';
    var pageUrl = window.location.href.split(/[?#]/)[0];
    if($('#sidebarMenu').length){
        $("#sidebarMenu ul li a").each(function () {
            if (this.href == pageUrl) {
                $(this).addClass("active"); // add active to a
                $(this).parent().prev('a.with-sub').addClass("active"); // add active to parent a if it's a submenu
            }
        });
    }
    if($('.dropdown-menu').length){
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
});
