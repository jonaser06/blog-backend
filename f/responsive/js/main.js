//const url = 'http://localhost/api/';
const url = 'http://api.bitsforcode.xyz/';

var objblog = {
    init:function(){
        objblog.tag("");
        objblog.url();
        objblog.buscatags();
        objblog.editor();
        objblog.inputs();
        objblog.leyenda();
        objblog.fecha();
    },
    test:function(){
        console.log("Hola Mundo");
    },
    fecha: function(){
        $('#datepicker').datepicker({
            
            autoclose: true,
            format: 'yyyy-mm-dd'/* ,
            startDate: fecha, */
        }).datepicker("setDate", new Date());
    },
    leyenda: function(){
        $("body").on("keyup",".leyenda-input",function(){
            var text = $(this).val();
            $(".leyendaImput").val(text);
            $(".leyenda").html(text);
        });

        $(".btn-eliminarImg").on("click", function(){
            $(this).css("display","none");
            $("#zone-upload").css("display","block");
            $( ".previewImg" ).remove();
            $("#zone-upload").val(null);
        });
    },
    inputs: function(){
        if(document.getElementById('zone-upload')){
            document.getElementById('zone-upload').onchange = function () {
                console.log('Selected file: ' + this.value);
    
                var data = new FormData();
                var files = $('#zone-upload')[0].files[0];
                data.append("image",files);
                /* preview */
                var preview = '';
    
                $.ajax({
                    type: "POST",
                    url: url + 'upload_image',
                    data:  data,
                    enctype: 'multipart/form-data',
                    processData: false,  // tell jQuery not to process the data
                    contentType: false,   // tell jQuery not to set contentType
                    dataType: "json",
                    success: function(response)
                    {
                        $(".pathImage").val(response.data[0].path);
                        $(".subiendoimg").css("display","none");
                        var urlimg = response.data[0].base+response.data[0].path+"-0x0.jpg";
                        preview += '<div class="previewImg">';
                        preview += '<img src="'+urlimg+'">';
                        preview += '</div>';
                        $("#upload-image-btn").append(preview);
                        $(".btn-eliminarImg").css("display","block");
                        $(".leyenda").css("margin-bottom","10px");
                    },
                    error: function(err){
                        console.log(err);
                    },
                    beforeSend: function()
                    {
                        $("#zone-upload").css("display","none");
                        $(".subiendoimg").css("display","block"); // some code before request send if required like LOADING....
                    }
                });
                
            }; 
        }
    },
    test:function(){
        var text = $('#some-textarea').summernote('code');
        var contenido = $(".contenido").val(text);
        console.log(text);
    },
    editor:function(){
        $('#some-textarea').summernote();

        $("body").on("keyup",".note-editable",function(){
            var text = $('#some-textarea').summernote('code');
            $(".contenido").val(text);
        });
        
    },
    buscatags:function(){
        var buscatags = ["uno","dos","tres"];
        $("body").on("keyup",".tags-input",function(){
            $(this).autocomplete({
                source: buscatags
            });
        });
    },
    tag:function(result){
        var taglist = [];
        $('#my-tag-list').tags({
            /* tagData:["boilerplate", "tags"],
            suggestions:["basic", "suggestions"],
            excludeList:["not", "these", "words"], */
            /* suggestions:result, */
            beforeAddingTag: function(tag){ 
                let opcion = confirm("Clicka en Aceptar o Cancelar");
                if (opcion == true) {
                    taglist.push(tag);
                    console.log(taglist);
                    $(".tag").val(taglist);
                    /* quitando la obligatoriedad del campo tag */
                    $(".tags-input").removeAttr("required");
                } else {
                    console.log("Cancelado");
                    removeTag(tag);
                }
            },
            beforeDeletingTag: function (tag){
                var taglist2 = [];
                taglist.forEach(function(i){
                    if( tag != i ){
                        taglist2.push(i);
                    }
                });
                taglist = taglist2;
                if(Object.keys(taglist).length == 0){
                    $('.tags-input').prop("required", true);
                }
                console.log(taglist);
                $(".tag").val(taglist);
            }
        });
    },
    url:function(){
        $(".title").keyup(function(){
            let title = $(this).val();
            $.ajax({
                data: JSON.stringify({ url : title}),
                type: 'POST',
                url: url + 'generate_url',
                dataType: 'JSON'
            }).done(function(data){
                console.log(data);
                $(".url").val(data.data);
            });
        });
    },
    btn:function(){
        let tag = $('#my-tag-list').tags().getTags();
        $.ajax({
            type: 'POST',
            url: url + 'api/post',
            dataType: 'JSON'
        }).done(function(data){

        });
        /* tag.forEach(function(element){
            console.log(element);
        }); */
    }
}

$(document).ready(function(){
    objblog.init();
});