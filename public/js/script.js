
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

            //    let date_filter = $("#date_filter").val() ?  $("#date_filter").val()  : null;
            //    let probability_filter = [];
            //    let leagueIds = [];
            //    var token = $("meta[name='csrf-token']").attr("content");

            //    $("input:checkbox[name=league]:checked").each(function (){
            //        leagueIds.push($(this).val());
            //    })

            //    $("input:checkbox[name=probability_type]:checked").each(function (){
            //        probability_filter.push($(this).val());
            //    })

            //    if(date_filter || probability_filter.length > 0 || leagueIds.length > 0 || $('.checkAllLeagues').is(":checked")){
            //         $.ajax({
            //         url: `${root}/match-screener/fetch-events`,
            //         method : 'get',
            //         success: function (response)
            //         {
            //             let data = JSON.parse(response);
            //             let html = '';
            //             console.log(data.length)
            //             if(data.length == 0){
            //                 html+='<h5 class="mt-4">No matches available!</h5>'
            //             }
            //             else{
            //                 for (let i = 0; i < Object.keys(data).length; i++) {
            //                     const leagueId= Object.keys(data)[i];
            //                     const matches=data[leagueId];
            //                     const leagueName = data[leagueId][0].leagueName;
            //                     html+=`<h4>${leagueName}</h4>`;
            //                     html+='<div class="white_box_content match_table_content"><div class="table-responsive"><table class="table match_table m-0" id="myTable">'
            //                     html+='<thead><th><th class="text-left"><div>Home team</div><div>Away team</div></th><th><div class="small_width">'
            //                     html+='<div>Probability %</div><div class="flex_between"><span>1</span><span>X</span><span>2</span></div></div>'
            //                     html+='</th><th><div>Prediction</div></th><th><div>BTTS</div></th><th><div>Total Tips</div></th></thead><tbody>'
            //                     $.each(matches,function (index,value){
            //                         html+='<tr id="match">';
            //                         html+='<td><div class="team_logo">';
            //                         html+='<img class="small_img" src="'+value.logo_path+'" alt="" /></div></td>';
            //                         html+='<td class="text-left"><a href="/'+`match/${value.eventSlug}`+'" class="team_name_time">';
            //                         html+='<div class="match_team">'+value.localTeam+'</div>';
            //                         html+='<div class="match_team">'+value.visitorTeam+'</div>';
            //                         html+='<div class="match_date">'+value.matchTime+'</div></a></td>';
            //                         html+='<td class="small_width"><div class="flex_between small_width">';
            //                         html+='<span>';
            //                         if (value.home_prob > value.draw_prob && value.home_prob > value.away_prob){
            //                             html+='<span class="font_weight_600"><b>'+value.home_prob +'</b></span>';
            //                         }
            //                         else{
            //                             html+=value.home_prob ?? 'NA';
            //                         }
            //                         html+='</span><span>';
            //                         if (value.draw_prob > value.home_prob && value.draw_prob > value.away_prob){
            //                             html+='<span class="font_weight_600">'+value.draw_prob+'</span>';
            //                         }
            //                         else{
            //                             html+=value.draw_prob ?? 'NA';
            //                         }
            //                         html+='</span><span>';
            //                         if (value.away_prob > value.home_prob && value.away_prob > value.draw_prob){
            //                             html+='<span class="font_weight_600">'+value.away_prob;+'</span>';
            //                         }
            //                         else{
            //                             html+=value.away_prob ?? 'NA';
            //                         }
            //                         html+='</span></div></td>';
            //                         html+='<td><div class="rounded_box">';
            //                         if(value.home_prob > value.draw_prob && value.home_prob > value.away_prob)
            //                             html+=1;
            //                         else if (value.draw_prob > value.home_prob && value.draw_prob > value.away_prob)
            //                             html+='X'
            //                         else
            //                             html+=2
            //                         html+='</div></td>';
            //                         html+='<td><div class="rounded_box">';
            //                         if (value.btts)
            //                             if (value.btts >= 50)
            //                                 html+='Yes'
            //                             else
            //                                 html+='No'
            //                         else
            //                             html+='NA'
            //                         html+='</div></td>';
            //                         html+='<td><div>'+value.user_tips+'</div></td>';
            //                         html+='</tr>'
            //                     });


            //                     html+='</tbody></table></div></div>'

            //                 }
            //             }
            //             $("#match-div").html(html);
            //         },
            //         error: function (error){
            //             console.log(error)
            //         }
            //         });
            //    }

            //    else

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
    })
