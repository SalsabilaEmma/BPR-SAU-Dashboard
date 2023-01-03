
// $(function() {
//   var oTable = $('#datatable').DataTable({
//     "oLanguage": {
//       "sSearch": "Filter Data"
//     },
//     "iDisplayLength": -1,
//     "sPaginationType": "full_numbers",

//   });

//   $("#datepicker_from").datepicker({
//     showOn: "button",
//     buttonImage: "",
//     buttonImageOnly: false,
//     "onSelect": function(date) {
//       minDateFilter = new Date(date).getTime();
//       oTable.fnDraw();
//     }
//   }).keyup(function() {
//     minDateFilter = new Date(this.value).getTime();
//     oTable.fnDraw();
//   });

//   $("#datepicker_to").datepicker({
//     showOn: "button",
//     buttonImage: "",
//     buttonImageOnly: false,
//     "onSelect": function(date) {
//       maxDateFilter = new Date(date).getTime();
//       oTable.fnDraw();
//     }
//   }).keyup(function() {
//     maxDateFilter = new Date(this.value).getTime();
//     oTable.fnDraw();
//   });

//     });

//     // Date range filter
//     minDateFilter = "";
//     maxDateFilter = "";

//     $.fn.dataTableExt.afnFiltering.push(
//         function(oSettings, aData, iDataIndex) {
//     if (typeof aData._date == 'undefined') {
//       aData._date = new Date(aData[0]).getTime();
//     }

//     if (minDateFilter && !isNaN(minDateFilter)) {
//       if (aData._date < minDateFilter) {
//         return false;
//       }
//     }

//     if (maxDateFilter && !isNaN(maxDateFilter)) {
//       if (aData._date > maxDateFilter) {
//         return false;
//       }
//     }

//     return true;
//   }
// );

// ------------------------
// $(document).ready(function(){

//     // Datapicker 
//     $( ".datepicker" ).datepicker({
//        "dateFormat": "yy-mm-dd",
//        changeYear: true
//     });
 
//     // DataTable
//     var dataTable = $('#empTable').DataTable({
//       'processing': true,
//       'serverSide': true,
//       'serverMethod': 'post',
//       'searching': true, // Set false to Remove default Search Control
//       'ajax': {
//         'url':'ajaxfile.php',
//         'data': function(data){
//            // Read values
//            var from_date = $('#search_fromdate').val();
//            var to_date = $('#search_todate').val();
 
//            // Append to data
//            data.searchByFromdate = from_date;
//            data.searchByTodate = to_date;
//         }
//       },
//       'columns': [
//          { data: 'emp_name' },
//          { data: 'email' },
//          { data: 'date_of_joining' },
//          { data: 'salary' },
//          { data: 'city' },
//       ]
//    });
 
//    // Search button
//    $('#btn_search').click(function(){
//       dataTable.draw();
//    });
 
//  });

// ..................
