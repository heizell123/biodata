jQuery.fn.extend({
    loading: function (param,text='') {
        if(param == 'start'){
            // var loader = '&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-spinner fa-spin"></i> &nbsp;&nbsp;&nbsp;&nbsp;';
            var loader = '<i class="fa fa-chain fa-spin"></i> Processing...';
            $(this).html(loader);
            $(this).attr("disabled",true);
        }else{
            var stop='';
            if(text != '') {
                stop = '<i class="fa fa-upload"></i> '+text;
            }else {
                stop = '<i class="fa fa-save"></i> Save';
            }
            $(this).html(stop)
            $(this).attr("disabled",false);    
        }
    },

});