
    const root = window.location.protocol + '//' + window.location.host;



    $("#filter-form").submit(function(e){


       e.preventDefault();

       let date_filter = $("#date_filter").val() ?  $("#date_filter").val()  : null;
       let probability_filter = [];
       let categoryIds = [];
       var token = $("meta[name='csrf-token']").attr("content");

       $("input:checkbox[name=category]:checked").each(function (){
           categoryIds.push($(this).val());
       })

       $("input:checkbox[name=probability_type]:checked").each(function (){
           probability_filter.push($(this).val());
       })



        if(date_filter || probability_filter.length > 0 || categoryIds.length > 0 || $('.checkAllCategories').is(":checked")){

            $.ajax({
                url: `${root}/filter`,
                method : 'post',
                data: {
                    date_filter: date_filter,
                    probability_type:probability_filter,
                    _token: token,
                    categories: categoryIds
                },
                success: function (response)
                {
                    $("#product-div").html(response);
                },
                error: function (error){
                    console.log(error)
                }
            });

        }



    });

    // uncheck all categories if check all is checked
    $(".checkAllCategories").click(function(){
        $(".categoryCheckbox").prop('checked', false);
    });


    // uncheck all Categories checkbox if any category is checked
    $(".categoryCheckbox").click(function(){

        $(".checkAllCategories").prop('checked', false);

    });


    // reset all filters
    $("#reset").click(function(){

        let date_filter = $("#date_filter").val() ?  $("#date_filter").val()  : null;
        let probability_filter = [];
        let categoryIds = [];
        var token = $("meta[name='csrf-token']").attr("content");

        $("input:checkbox[name=category]:checked").each(function (){
            categoryIds.push($(this).val());
        })

        $("input:checkbox[name=probability_type]:checked").each(function (){
            probability_filter.push($(this).val());
        })


        // if any filter is selected then reset all filters and table
         if(date_filter || probability_filter.length > 0 || categoryIds.length > 0 || $('.checkAllCategories').is(":checked")){

             $.ajax({
                 url: `${root}/reset`,
                 method : 'post',
                 data: {
                    _token: token,
                },
                 success: function (response)
                 {
                    $("#product-div").html(response);
                       // reset time select
                    $("#date_filter").val($("#date_filter option:first").val());

                    // uncheck all categories
                    $("input:checkbox[name=category]").each(function (){
                        $(this).prop('checked', false);
                    })

                    // uncheck all probability_types
                    $("input:checkbox[name=probability_type]").each(function (){
                        $(this).prop('checked', false);
                    })

                    // uncheck all categories checkbox
                    $(".checkAllCategories").prop('checked', false);
                 },
                 error: function (error){
                     console.log(error)
                 }
             });

         }
    })
