/*
function createThumbnail(sFile,sId) {
    let oReader = new FileReader();
    oReader.addEventListener('load', function() {
        let oImgElement = document.createElement('img');
        oImgElement.classList.add('imgPreview');
        oImgElement.src = this.result;
        document.getElementById('preview-'+sId).appendChild(oImgElement);
    }, false);

    oReader.readAsDataURL(sFile);

}//function
function changeInputFil(oEvent){
    let oInputFile = oEvent.currentTarget,
        sName = oInputFile.name,
        aFiles = oInputFile.files,
        aAllowedTypes = ['png', 'jpg', 'jpeg', 'gif'],
        imgType;
    document.getElementById('preview-'+sName).innerHTML ='';
    for (let i = 0 ; i < aFiles.length ; i++) {
        imgType = aFiles[i].name.split('.');
        imgType = imgType[imgType.length - 1];
        if(aAllowedTypes.indexOf(imgType) != -1) {
            createThumbnail(aFiles[i],sName);
        }//if
    }//for
}//function

document.addEventListener('DOMContentLoaded',function(){
    let aFileInput = document.forms['formAjout'].querySelectorAll('[type=file]');
    for(let k = 0; k < aFileInput.length;k++){
        aFileInput[k].addEventListener('change', changeInputFil, false);
    }//for
});*/

/*$(document).ready(function() {

    $('#image_url').change(function(evt) {

        let files = evt.target.files;
        let file = files[0];

        if (file) {
            let reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
});*/



$("#inputGroupFile01").change(function(event) {
    RecurFadeIn();
    readURL(this);
});
$("#inputGroupFile01").on('click',function(event){
    RecurFadeIn();
});
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        var filename = $("#inputGroupFile01").val();
        filename = filename.substring(filename.lastIndexOf('\\')+1);
        reader.onload = function(e) {
            debugger;
            $('#blah').attr('src', e.target.result);
            $('#blah').hide();
            $('#blah').fadeIn(500);
            $('.custom-file-label').text(filename);
        }
        reader.readAsDataURL(input.files[0]);
    }
    $(".alert").removeClass("loading").hide();
}
function RecurFadeIn(){
    console.log('ran');
    FadeInAlert("Wait for it...");
}
function FadeInAlert(text){
    $(".alert").show();
    $(".alert").text(text).addClass("loading");
}

