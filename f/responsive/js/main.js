var objblog = {
    init:function(){
        objblog.tag();
        objblog.url();
    },
    tag:function(){
        $('#my-tag-list').tags({
            tagData:["boilerplate", "tags"],
            suggestions:["basic", "suggestions"],
            excludeList:["not", "these", "words"],
            beforeAddingTag: function(tag){ 
                let opcion = confirm("Clicka en Aceptar o Cancelar");
                if (opcion == true) {
                    console.log(tag);
                } else {
                    console.log("Cancelado");
                    removeTag(tag);
                }
            }
        });
    },
    url:function(){
        $(".title").change(function(){
            let url = $(this).val();
            $(".url").val(url);
        });
    },
    btn:function(){
        let tag = $('#my-tag-list').tags().getTags();
        tag.forEach(function(element){
            console.log(element);
        });
    }
}

$(document).ready(function(){
    objblog.init();
});