const url = 'http://localhost/zox-bk/';

var objblog = {
    init:function(){
        objblog.tag();
        objblog.url();
    },
    tag:function(){
        $('#my-tag-list').tags({
            /* tagData:["boilerplate", "tags"],
            suggestions:["basic", "suggestions"],
            excludeList:["not", "these", "words"], */
            beforeAddingTag: function(tag){ 
                let opcion = confirm("Clicka en Aceptar o Cancelar");
                if (opcion == true) {
                    console.log(tag);
                    $(".tag").val($(".tag").val()+tag+"-");
                } else {
                    console.log("Cancelado");
                    removeTag(tag);
                }
            }
        });
    },
    url:function(){
        $(".title").keyup(function(){
            let title = $(this).val();
            $.ajax({
                data: JSON.stringify({ url : title}),
                type: 'POST',
                url: url + 'api/generate_url',
                dataType: 'JSON'
            }).done(function(data){
                $(".url").val(data.url);
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