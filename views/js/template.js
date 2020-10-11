/*====================================
=            sidebar menu            =
====================================*/
    
$('.sidebar-menu').tree();


/*=================================
=            datatable            =
=================================*/

$('.tables').dataTable();

/*=====  End of datatable  ======*/

/*=================================
=            inputmask            =
=================================*/

//Datemask dd/mm/yyyy
$('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
//Datemask2 mm/dd/yyyy
$('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
//Money Euro
$('[data-mask]').inputmask()