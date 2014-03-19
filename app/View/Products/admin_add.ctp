<!-- Set Title -->
<?php $this->set('title_for_layout', 'Ajouter un nouveau produit') ?>

<?php $this->Html->css('products', null, array('inline' => false)); ?>
    <div class="well">

            <?= $this->Form->create('Product', array('class' => 'form-horizontal', 'role' => 'form', 'type' => 'file', 'inputDefaults' => array('label' => false, 'div' => array('class' => 'col-sm-9')))) ?>
            <fieldset>
                <legend>Ajout de produit</legend>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="Product-name">Nom produit</label>
                        <?= $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Entrer le nom du produit')) ?>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="Product-brand">Marque du produit</label>
                        <?= $this->Form->input('brand_id', array('class' => 'form-control', 'placeholder' => 'Entrer la marque du produit', 'options' => $brands)) ?>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="Product-price">Prix</label>
                        <?= $this->Form->input('price', array('class' => 'form-control', 'placeholder' => 'Prix')) ?>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="Product-price">Poids (en</label>
                        <?= $this->Form->input('weight', array('class' => 'form-control', 'placeholder' => 'Poids')) ?>
                    </div>
                     <div class="form-group">
                        <label class="col-sm-3 control-label" for="Product-desc">Description</label>
                        <?= $this->Ck->input('Product.description', array('class' => 'form-control', 'placeholder' => 'Description du produit')) ?>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for='Product-image'>Photo du produit</label>
                        <div class="col-sm-9">
                            <input name='data[Image][]' type="file" multiple>
                        </div>
                        <div id="images">
                            
                        </div>
                        
                    <?= $this->Form->button('Ajouter une photo', array('class' => 'btn btn-default', 'type' => 'button', 'id' => 'addImage')) ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="Product-name">Catégorie</label>
                        <?= $this->Form->input('category_id', array('class' => 'form-control', 'options' => $categories)) ?>
                    </div>
                    <div id="features">
                        
                    </div>
                </div>
            </fieldset>
            <?= $this->Form->end(array('label' => 'Ajouter le produit', 'class' => 'btn btn-primary')) ?>
    </div>

<script>
    $(function(){

        var i = $('#images input').size() + 1
        
        $('#addImage').on('click', function(e){
            if(i<6){
                $('#images').append('\
                <div class="imageBox">\
                    <div class="col-sm-3">\
                        <label class=control-label" for="Product-image">Photo Annexe '+i+'</label>\
                    </div>\
                    <div class="col-sm-6">\
                        <input name="data[Image][]"" type="file" multiple>\
                    </div>\
                    <?= $this->Form->button("Retirer le champ", array("class" => "btn btn-danger removeImage col-sm-3", "type" => "button")) ?>\
                    <div class="clearfix"></div>\
                </div>\
                ');
                }
            i++;
            e.preventDefault();
        })

        $('body').on('click', ".removeImage", function(e){
            $(this).parent('div').remove();
            i--;
        })

        function getFeatures(categoryId){
            $.ajax({
                url : $('#ProductAdminAddForm').attr('action'),
                type : 'post',
                dataType : 'json',
                data : {categoryId : categoryId},
                success : function(data){
                    appendFeatures(data);
                },
                error : function(){
                    alert('fail');
                }
            })
        }

        $('#ProductCategoryId').on('change', function(e){
            getFeatures(e.target.value);
        })

        $(window).load(function(){
            getFeatures($('#ProductCategoryId').val());
        })

        function appendFeatures(data){
            $('#features').empty();
            var j = 1
            $.each(data, function(i, obj){
            var hiddenField = '<input type="hidden" value="'+i+'" name="data[ProductR]['+j+'][feature_id]">';
                $(
                    '<div class="form-group">\
                        <label class="col-sm-3 control-label" for="Product-name">'+obj+'</label>\
                        <?= $this->Form->input("ProductR.'+j+'.value", array("id" => false, "class" => "form-control")) ?>\
                        '+ hiddenField +'\
                    </div>'
                ).appendTo('#features');
                j++;
            });
        }
    })

</script>

     

