function setFileInputProfile(e_id, u_id) //Logo Empresa
{
    $("#photo_profile").fileinput({
        uploadUrl: '/enterprise/uploader/photo_profile/'+e_id,
        maxFilePreviewSize: 10240,
        maxFileCount: 1,
        allowedFileExtensions: ["jpg"],
        overwriteInitial: true,
        initialPreviewAsData: true,
        initialPreviewFileType: 'image',
        showUpload: false,
        showRemove: false,
        append: true
    }).on("filebatchselected", function(event, files){
        $("#photo_profile").fileinput("upload");
    }).on('fileuploaded', function(event, data) {
        alertify.set({ delay: 1000 });
        alertify.log("Enterprise updated...");
        d = new Date();
        $(".photo_profile").attr("src", "/public/uploads/enterprise/profile/"+e_id+"/profile.jpg?"+d.getTime());

    });

}

function setFileInputEdiQ()
{

    $("#ediq_photo").fileinput({
        uploadUrl: '/enterprise/uploader/libro_ediq/',
        maxFilePreviewSize: 999999,
        maxFileCount: 500,
        allowedFileExtensions: ["jpg"],
        overwriteInitial: true,
        initialPreviewAsData: true,
        initialPreviewFileType: 'image',
        showUpload: false,
        showRemove: false,
        append: true
    }).on("filebatchselected", function(event, files){
        $("#ediq_photo").fileinput("upload");
    }).on('fileuploaded', function(event, data) {
        alertify.set({ delay: 1000 });
        alertify.log("Páginas del Libro Generadas...");
    });

}


