$( document ).ready(function() {

    var container_width = $('#plot_container').width();

    $('.flot-container').width(container_width*0.95);
    $('.flot-container').height(256);

    $.ajax({
        url: '/dashboard/get_statistic',
        type: 'GET',
        //data: 'status=accept&stream_id=' + $(this).attr('number'),
        success: function (msg) {

            var rebills = [];

            msg.rebills.forEach(function(item){
                rebills.push([item.timestamp,item.value]);
            });

            var subs = [];

            msg.subs.forEach(function(item){
                subs.push([item.timestamp,item.value]);
            });


            var all_data = [
                {
                    label: "Ребиллы",
                    color: 1,
                    data: rebills
                },
                {
                    label: "Подписки",
                    color: 2,
                    data: subs
                }
            ];

            var nowDate = new Date();
            nowDate.setHours(nowDate.getHours()+3);

            var minus12hours = new Date();
            minus12hours.setHours(minus12hours.getHours() - 9);


            $('.flot-container').plot(all_data,{
                xaxis:{
                    mode:'time',
                    minTickSize: [1, "hour"],
                    //twelveHourClock: true,
                    min: (minus12hours.getTime()),
                    max: (nowDate.getTime())
                },
                yaxis:{
                    //tickSize:1
                }
            })

        },

        error: function () {
            console.log('Error!');
        }
    });


});