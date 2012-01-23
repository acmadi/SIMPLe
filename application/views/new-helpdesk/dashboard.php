<script type="text/javascript">
    Highcharts.visualize = function(table, options) {
                // the categories
                options.xAxis.categories = [];
                $('tbody th', table).each( function(i) {
                    options.xAxis.categories.push(this.innerHTML);
                });
                
                // the data series
                options.series = [];
                $('tr', table).each( function(i) {
                    var tr = this;
                    $('th, td', tr).each( function(j) {
                        if (j > 0) { // skip first column
                            if (i == 0) { // get the name and init the series
                                options.series[j - 1] = { 
                                    name: this.innerHTML,
                                    data: []
                                };
                            } else { // add values
                                options.series[j - 1].data.push(parseFloat(this.innerHTML));
                            }
                        }
                    });
                });
                
                var chart = new Highcharts.Chart(options);
            }
                
            // On document ready, call visualize on the datatable.
            $(document).ready(function() {          
                var table = document.getElementById('chartz-source'),
                options = {
                       chart: {
                          renderTo: 'chartz',
                          defaultSeriesType: 'column'
                       },
                       title: {
                          text: 'Grafik Jumlah Tiket Per Hari'
                       },
                       xAxis: {
                       },
                       yAxis: {
                          title: {
                             text: 'Jumlah Tiket'
                          }
                       },
                       tooltip: {
                          formatter: function() {
                             return '<b>'+ this.series.name +'</b><br/>'+
                                this.y +' '+ this.x.toLowerCase();
                          }
                       }
                    };
                
                                    
                Highcharts.visualize(table, options);
            });

</script>
<div class="content">
    <h1>Dashboard</h1>

    <div class="grid_9 alpha" id="chartz">
    </div>

    <div class="grid_3 omega">
        <strong style="font-size: 14px">TELAH TERJAWAB</strong>
        <dl>
            <dd>
            <a href="<?php echo site_url('/helpdesks/list_pertanyaan') ?>">
            <span class="xxlabel red"><?php echo $terjawab ?></span> 
            <span class="xxlabel">TIKET OPEN</span>
            </a>
            </dd>
        </dl>
        <strong style="font-size: 14px">TIKET HARI INI</strong>
        <dl>
            <dd>
            <a href="<?php echo site_url('/helpdesks/list_pertanyaan') ?>">
            <span class="xxlabel red"><?php echo $today_open ?></span> 
            <span class="xxlabel">OPEN</span>
            </a>
            </dd>
            <dd>
            <a href="<?php echo site_url('/helpdesks/list_pertanyaan') ?>">
            <span class="xxlabel red"><?php echo $today_close ?></span> 
            <span class="xxlabel">CLOSE</span>
            </a>
            </dd>
        <dl>
    </div>
</div>