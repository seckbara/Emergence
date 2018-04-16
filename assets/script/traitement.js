function detail_abonn(id_abon,adher,vers)
{
    console.log(id_abon);
    var url 	= "scripts/modal/detail_abo.php";
    var data = {
        id_abonn: id_abon,
        id_adher: adher,
        id_vers: vers
    };
    ajaxModaltoShow(data, url, 'detail');
}

function detail_adherent(adher)
{
    console.log(adher);
    var url 	= "scripts/modal/detail_adh.php";
    var data = {
        id_adher: adher
    };
    ajaxModaltoShow(data, url, 'detail');
}

function detail_verse(id_vers, id_abonn)
{
    console.log(id_vers, id_abonn);
    var url 	= "scripts/modal/detail_vers.php";
    var data = {
        id_vers: id_vers,
        id_abonn: id_abonn
    };
    ajaxModaltoShow(data, url, 'detail');
}

function modifier_verse(id_vers, id_abon, id_adh){
    console.log(id_vers);
    var url 	= "scripts/modal/update_vers.php";
    var data = {
        id_vers: id_vers,
        id_abon: id_abon,
        id_adhe: id_adh
    };
    console.log(data);
    ajaxModaltoShow(data, url, 'modifier_vers');
}


function update_abonn(id_abonn){
    console.log(id_abonn);
    var url 	= "scripts/modal/update_abonnement.php";
    var data = {
        id_abonn: id_abonn
    };
    console.log(data);
    ajaxModaltoShow(data, url, 'modifier_abonn');
}

function ajout_versement(id_abonn){
    console.log(id_abonn);
    var url 	= "scripts/modal/ajout_versement.php";
    var data = {
        id_abonn: id_abonn
    };
    console.log(data);
    ajaxModaltoShow(data, url, 'ajout_versement');
}

function update_adherent(adher)
{
    console.log(adher);
    var url 	= "scripts/update_adherent.php";
    var data = {
        id_adher: adher
    };
    ajaxModaltoShowUpdate(data, url, 'modifier');
}

function ajaxModaltoShow(data, url, idModal) {
    console.log('ddd');
    jQuery.ajax({
        type: 'POST',
        data: data,
        url: url,
        async: false,
        success: function(returnData, textStatus, jqXHR) {
            console.log(returnData);
            var modalContent = returnData.split('##');
            //console.log(returnData);
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

function ajaxModaltoShowUpdate(data, url, idModal) {
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

