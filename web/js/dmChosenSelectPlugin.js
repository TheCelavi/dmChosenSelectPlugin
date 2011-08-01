function initializeSfWidgetFormChosenSelect($context) {
    var $widgets = null;
    if ($context != undefined) $widgets = $($context.find('.sfWidgetFormChosenSelect'));
    else $widgets = $('.sfWidgetFormChosenSelect');
    $.each($widgets, function(){
        $(this).find('select').chosen();
    });    
}; 

(function($) {
    var $check = $('#dm_admin_content');
    if ($check.length >0) initializeSfWidgetFormChosenSelect($(this)); 
})(jQuery);
(function($) {
    $('#dm_page div.dm_widget').bind('dmWidgetLaunch', function() {
        initializeSfWidgetFormChosenSelect($(this));        
    });
})(jQuery);
(function($) {
    $('div.dm.dm_widget_edit_dialog_wrap').live('dmAjaxResponse', function() {
        initializeSfWidgetFormChosenSelect($(this));
    });
})(jQuery);