$(function(){
            $('.addjs').click(function(){
                var extra_javascript = $.trim($('#extra_javascript').val());
                if(extra_javascript){
                    var extra_javascripts = $('.javascripts li'); 

                    if(extra_javascripts.filter(function(ind,ele){
                        return $.trim($(ele).text()) === extra_javascript;
                    }).length > 0){
                        return;
                    }                

                    $('.javascripts ul').append($('<li>'+extra_javascript+'</li>').addClass('list-group-item').append(' <span class="glyphicon glyphicon-remove"></span>').append('<input type="hidden" name="extra_javascripts[]" value="'+extra_javascript+'" />'));

                    $('#extra_javascript').val('');
                }

            });

            $('.addcss').click(function(){
                var extra_stylesheet = $.trim($('#extra_stylesheet').val());
                if(extra_stylesheet){
                    var extra_stylesheets = $('.stylesheets li');                    
                    
                    if(extra_stylesheets.filter(function(ind,ele){
                        return $.trim($(ele).text()) === extra_stylesheet;
                    }).length>0){
                        return;
                    }

                    $('.stylesheets ul').append($('<li>'+extra_stylesheet+'</li>').addClass('list-group-item').append(' <span class="glyphicon glyphicon-remove"></span>').append('<input type="hidden" value="'+extra_stylesheet+'" name="extra_stylesheets[]"/>'));

                    $('#extra_stylesheet').val('');
                }
            });

            $('.stylesheets').delegate('.glyphicon-remove','click',function(){
                $(this).parent().remove();
            });

            $('.javascripts').delegate('.glyphicon-remove','click',function(){
                $(this).parent().remove();
            });

            $(':input[name=wechat_share]').change(function(){                
                if(this.checked){
                    $(this).closest('.form-group').nextAll().find('.form-control').attr('disabled',false);
                } else{
                    $(this).closest('.form-group').nextAll().find('.form-control').attr('disabled',true);
                }
            });

            $(':input[type=reset]').click(function(){
                $('[name=wechat_title],[name=wechat_content]').attr('disabled',true);                           
            });

            $(':input[name=wechat_share]').trigger('change');
        });