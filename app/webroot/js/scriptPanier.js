$().ready(function(){
    
    var loadingPanier ;

    $('#recapPanier').on('click', function(){
        $('#listPanier').slideToggle('fast');
    })

    function refreshPanier() {
        $.ajax({
            url: "http://localhost/ecommerce/paniers/checkpanier",
            ifModified:true,
            success: function(content){
                if(content != ""){
                   $('#listPanier').empty();
                   var price = 0;
                    for(var i=0 ; i < content.length ;i++){
                        var newdiv = 
                        $("<div class='block'><strong>" + content[i].Product.count +" x " + content[i].Brand.name + '</strong> - ' +content[i].Product.name +" <small><em> / "+content[i].Product.price+" €</em></small><div><hr class='styleHR'>");
                         
                        $('#listPanier').append(newdiv);
                        price += (content[i].Product.count * content[i].Product.price)
                    } 
                var divTotalPanier = "<div><strong>Total : "+ price +" €</strong></div>";
                $('#listPanier').append(divTotalPanier);

                var divAccederPanier = "<a href='http://localhost/ecommerce/paniers'><button class='accederaupanier btn btn-primary'>Accéder au panier</button></a>";
                $('#listPanier').append(divAccederPanier);
                }
            }
        });   
        countPanier();
    }

    function countPanier(){
         $.ajax({
            url: "http://localhost/ecommerce/paniers/countPanier",
            ifModified:true,
            success: function(content){
                if(content != "0"){
                    //$('#nbrArticles').empty();
                    $('#nbrArticles').html(content);
                }
                else{
                    $('#nbrArticles').html(0);
                }
            }
        });  
    }

        

    loadingPanier = setTimeout(refreshPanier, 100);

    
    $('.addPanier').on('click', function(e){
        $.ajax({
            url : this.href, // La ressource ciblée
            type : 'post', // Le type de la requête HTTP.
            success : function(){
                var notif = $('\
                    <div class="alert alert-success alert-dismissable alert-panier">\
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>\
                         <strong>Ajouté au panier :)</strong>\
                     </div>')
                $('#wrap').append(notif.fadeIn().delay('1000').fadeOut());
            },
            error : function(){
                alert('fail');
            }
        });
        e.preventDefault();
        loadingPanier = setTimeout(refreshPanier, 500);
    })


    // $('.addPanier').on('click', function(e){

    //     $.ajax({
    //        url : 'http://localhost/ecommerce/paniers/checkQuantier/'+this.id, // La ressource ciblée
    //        type : 'GET' // Le type de la requête HTTP.


    //     });
    //     loadingPanier = setTimeout(refreshPanier, 500);
    //     e.preventDefault();
    // })

    // $(".formulaire_chat").submit(function(event){
    //         event.preventDefault();
    //     var message = $('#content_mess').val();
    //     var user = $('#user_id_mess').val();

    //         $.get('http://127.0.0.1/My_webs/membre/chats/send', { 'user_id':user, 'content':message }, function() {
    //                 refreshChat();
    //             });
    //          $('#content_mess').val('');
    //         return false;

    // });

});