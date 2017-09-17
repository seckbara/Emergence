function modifier_tarif(id_abon,adher,vers)
{
    console.log(id_abon);
    var url 	= "scripts/modal/detail.php";
    var data = {
        id_abonn: id_abon,
        id_adher: adher,
        id_vers: vers
    };
    ajaxModaltoShow(data, url, 'detail');
}

function ajaxModaltoShow(data, url, idModal) {
    jQuery.ajax({
        type: 'POST',
        data: data,
        url: url,
        async: false,
        success: function(returnData, textStatus, jqXHR) {
            var modalContent = returnData.split('##');
            console.log(returnData);
            $('#'+idModal+' .modal-title').html(modalContent[0]);
            $('#'+idModal+' .modal-body').html(modalContent[1]);
            return true;
        },
        error: function(jqXHR, textStatus, errorThrown) {
            $('#'+idModal).modal('hide');
            return false;
        }
    });
};