
function filesRequest(formData){
  $.ajax({
    url: 'index.php',
    type: 'POST',
    data: formData,
    async: true,
    cache: false,
    contentType: false,
    processData: false,
    success: function (returndata) {
        try {
            returndata=JSON.parse(returndata); 
        } catch (e) {
            console.log('erreure php JSON.parse : ');
            //console.log(e); 
            console.log(returndata);
        }
        //console.log(returndata.code);
        switchAction(returndata); 
    }
    });
}
   
