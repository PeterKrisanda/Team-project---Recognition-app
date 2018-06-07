function requestpage()
{
    //-----------------------------------------------------------------------
    // 2) Send a http request with AJAX http://api.jquery.com/jQuery.ajax/
    //-----------------------------------------------------------------------
    $.ajax({
        url: 'php/userprofile.php',                  //the script to call to get data
        data: "",                        //you can insert url argumnets here to pass to api.php
                                         //for example "id=5&parent=6"
        dataType: 'json',                //data format
        success: function(data)          //on recieve of reply
        {

            var recognition = ["", "ownership", "cooperation","professionalism", "leadership", "innovation", "skills" ,"special"];

            for(var key in data){
                if(data.hasOwnProperty(key)){
                    var pos = recognition[data[key].badge_id];
                    $('#'+pos).html(data[key].badgecount);
                }
            }

            //--------------------------------------------------------------------
            // 3) Update html content
            //--------------------------------------------------------------------


            //recommend reading up on jquery selectors they are awesome
            // http://api.jquery.com/category/selectors/
        }
    });
};
