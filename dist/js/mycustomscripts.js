/*$(function() {
    $('#dateevenement').datepicker();
    $('#daterapportage').datepicker();
    $('#dateevenementsimilaire').datepicker();
});*/

 //Date picker
 $('#dateevenement').datetimepicker({
    format: 'L'
});

$('#daterapportage').datetimepicker({
    format: 'L'
});


$('#dateevenementsimilaire').datetimepicker({
    format: 'L'
});

$('#date_reponse').datetimepicker({
    format: 'L'
});





//Date and time picker
$('#dateevenement').datetimepicker({ icons: { time: 'far fa-clock' } });
$('#daterapportage').datetimepicker({ icons: { time: 'far fa-clock' } });
$('#dateevenementsimilaire').datetimepicker({ icons: { time: 'far fa-clock' } });
$('#date_reponse').datetimepicker({ icons: { time: 'far fa-clock' } });




$.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN':$('meta[name="_token"]').attr('content')
    }
});






function EnableDisableMvt() {
    $('#mouvement_population').click(function () {
        if ($(this).prop("checked") == true) {
            $('#typemouvement').prop("disabled", false);
            $('#village_provenance').prop("disabled", false);
            $('#village_accueil').prop("disabled", false);
            

            $('#nbre_menages').prop("disabled", false);
            $('#nbre_personnes').prop("disabled", false);
            $('#nbre_femmes').prop("disabled", false);
            $('#nbre_hommes').prop("disabled", false);
            $('#nbre_filles').prop("disabled", false);
            $('#nbre_garcons').prop("disabled", false);
        }
        else if ($(this).prop("checked") == false) {
            $('#typemouvement').prop("disabled", true);
            $('#village_provenance').prop("disabled", true);
            $('#village_accueil').prop("disabled", true);
            

            $('#nbre_menages').prop("disabled", true);
            $('#nbre_personnes').prop("disabled", true);
            $('#nbre_femmes').prop("disabled", true);
            $('#nbre_hommes').prop("disabled", true);
            $('#nbre_filles').prop("disabled", true);
            $('#nbre_garcons').prop("disabled", true);
        }
    });
   
}












$(document).ready(function () {
  
    /*------------------------------------------
    --------------------------------------------
    Lorsque on selectionne la province, charger les territoires
    --------------------------------------------
    --------------------------------------------*/
   // $("#mouvementpopulation").find("input,select").prop("disabled",true);

   $('.table_listalertes').DataTable();

    $('#pcodeprovince').on('change', function () {
       
        var idProvince = $(this).val();          
        $("#pcodeterritoire").html('');
        $.ajax({
            url: 'action_loadterritoiresbyprovince.php',
            type: "POST",
            data: {
                province_id: idProvince,
               // _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function (data) {
                $('#pcodeterritoire').html('<option value="">-- Select --</option>');
                $('#pcodeterritoire').html(data);
            }
        });
     
     
    });





    /*------------------------------------------
    --------------------------------------------
    Lorsque on selectionne le territoire, charger les chefferies
    --------------------------------------------
    --------------------------------------------*/
    $('#pcodeterritoire').on('change', function () {
 

        

    });

});