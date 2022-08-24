var responsiveHelper;
var breakpointDefinition = {
    tablet: 1024,
    phone : 480
};
var tableContainer;

jQuery(document).ready(function($)
{
    tableContainer = $("#table-1");
    
    tableContainer.dataTable({
        "sPaginationType": "bootstrap",
        "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "bStateSave": true,
        

        // Responsive Settings
        bAutoWidth     : false,
        fnPreDrawCallback: function () {
            // Initialize the responsive datatables helper once.
            if (!responsiveHelper) {
                responsiveHelper = new ResponsiveDatatablesHelper(tableContainer, breakpointDefinition);
            }
        },
        fnRowCallback  : function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
            responsiveHelper.createExpandIcon(nRow);
        },
        fnDrawCallback : function (oSettings) {
            responsiveHelper.respond();
        }
    });
    
    $(".dataTables_wrapper select").select2({
        minimumResultsForSearch: -1
    });
});
/*
var getMessageDate = function(button1Orbutton2) {

    oMessageDate = $("#tble").dataTable({
          "sDom": "<'row-fluid'<'span6'lT><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
          "aLengthMenu": [
            [5, 25, 50, 100, 250, -1],
            [5, 25, 50, 100, 250, "All"]
          ],
          "iDisplayLength": 5,
          "bSortClasses": true,
          "bPaginate": true,
          "bAutoWidth": false,
          "bProcessing": true,
          "bServerSide": true,
          "bDestroy": true,
          "sAjaxSource": "SOMEPAGE,
        "sScrollY ": "300px ",
        "bScrollCollapse ": true,
        "sPaginationType ": "bootstrap ",
        "bDeferRender ": true,
        "fnServerParams ": function (aoData) {
            aoData.push({ "name ": "iFilterBy ", "value ": button1Orbutton2 });
        },
        " fnRowCallback ": function(nRow, aoData) {

        },

        "fnServerData ": function(sSource, aoData, fnCallback) {
            $.ajax({
                "dataType ": 'json',
                "contentType ": " application / json; charset = utf - 8 ",
                "type ": "GET ",
                "url ": sSource,
                "data ": aoData,
                "error ":
                    function(xhr) {
                         var contentType = xhr.getResponseHeader("Content - Type ");
                        if (xhr.status === 401 && contentType.toLowerCase().indexOf("text / html ") >= 0) {
                            window.location.reload();
                        }
                    },
                "success ":
                    function(msg) {
                        fnCallback(jQuery.parseJSON(msg.d));
                        $("#tble ").show();
                    }
            });
        },
    });
};
*/