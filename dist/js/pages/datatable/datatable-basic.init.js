/*************************************************************************************/
// -->Template Name: Bootstrap Press Admin
// -->Author: Themedesigner
// -->Email: niravjoshi87@gmail.com
// -->File: datatable_basic_init
/*************************************************************************************/

/****************************************
 *       Basic Table                   *
 ****************************************/
$('#zero_config').DataTable({
    "responsive": true,
    "autoWidth": true,
    "order" : [0, "desc"]
});

/****************************************
 *       Default Order Table           *
 ****************************************/
$('#default_order').DataTable({
    "responsive": true,
    "autoWidth": false,
    "order": [
        [2, "asc"]
    ]
});

/****************************************
 *       Multi-column Order Table      *
 ****************************************/

$('#user_order').DataTable({
    "responsive": true,
    "autoWidth": false,
    buttons: [
        'colvis'
    ]
});

$('#genre_order').DataTable({
    "responsive": true,
    "autoWidth": true,
    "order" : [1, "asc"]
});

$('#publisher_order').DataTable({
    "responsive": true,
    "autoWidth": true,
    "order" : [1, "asc"]
});

$('#authors_order').DataTable({
    "responsive": true,
    "autoWidth": true,
    "order" : [1, "asc"]
});