//const url = 'http://localhost/api/';
const url = 'http://api.bitsforcode.xyz/';

var objblog = {
    init:function(){
        objblog.tag("");
        objblog.url();
        objblog.buscatags();
        objblog.editor();
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