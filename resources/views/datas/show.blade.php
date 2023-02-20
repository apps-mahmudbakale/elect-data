@extends('layouts.app')

@section('content')
<style type="text/css">
    #container {
        height: 400px;
    }
    
    .highcharts-figure,
    .highcharts-data-table table {
        min-width: 310px;
        max-width: 800px;
        margin: 1em auto;
    }
    
    #datatable {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #ebebeb;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
    }
    
    #datatable caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
    }
    
    #datatable th {
        font-weight: 600;
        padding: 0.5em;
    }
    
    #datatable td,
    #datatable th,
    #datatable caption {
        padding: 0.5em;
    }
    
    #datatable thead tr,
    #datatable tr:nth-child(even) {
        background: #f8f8f8;
    }
    
    #datatable tr:hover {
        background: #f1f7ff;
    }
    .highcharts-figure,
.highcharts-data-table table {
    min-width: 310px;
    max-width: 800px;
    margin: 1em auto;
}

.highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #ebebeb;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
}

.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}

.highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
}

.highcharts-data-table td,
.highcharts-data-table th,
.highcharts-data-table caption {
    padding: 0.5em;
}

.highcharts-data-table thead tr,
.highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}

.highcharts-data-table tr:hover {
    background: #f1f7ff;
}
    
            </style>
    <section role="main" class="content-body">
        <header class="page-header">
            <h2>Dashboard</h2>

            <div class="right-wrapper text-right">
                <ol class="breadcrumbs">
                    <li>
                        <a href="">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    <li><span>Datas</span></li>
                </ol>
            </div>
        </header>
        <div class="row">
            <div class="col">
                <section class="card">
                    <header class="card-header">
                        <h2 class="card-title">{{ $data->unit_name }} RESULT</h2>
                    </header>
                    <div class="card-body">
                        <figure class="highcharts-figure">
                            <div id="container"></div>
                            <table id="datatable">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Valid Votes</th>
                                        <th>Invalid Votes</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($parties as $party)
                                    <tr>
                                        <th>{{ $party->name }}</th>
                                        <td>{{ $data->sum_valid($party->id, $data->unit_id) }}</td>
                                        <td>{{ $data->sum_invalid($party->id, $data->unit_id) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </figure>
                        
                     <script type="text/javascript">
                        Highcharts.chart('container', {
                            data: {
                                table: 'datatable'
                            },
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: 'Totals Votes Per Party'
                            },
                            xAxis: {
                                type: 'category'
                            },
                            yAxis: {
                                allowDecimals: false,
                                title: {
                                    text: 'Votes'
                                }
                            },
                            tooltip: {
                                formatter: function () {
                                    return '<b>' + this.series.name + '</b><br/>' +
                                        this.point.y + ' ' + this.point.name.toLowerCase();
                                }
                            }
                        });
                        
                    </script>
                    <figure class="highcharts-figure">
                        <div id="container2"></div>
                    </figure>
                    
                    
                            <script type="text/javascript">
                    Highcharts.chart('container2', {
                        chart: {
                            type: 'pie',
                            options3d: {
                                enabled: true,
                                alpha: 45,
                                beta: 0
                            }
                        },
                        title: {
                            text: 'Pie Representation',
                            align: 'center'
                        },
                        accessibility: {
                            point: {
                                valueSuffix: '%'
                            }
                        },
                        tooltip: {
                            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                        },
                        plotOptions: {
                            pie: {
                                allowPointSelect: true,
                                cursor: 'pointer',
                                depth: 35,
                                dataLabels: {
                                    enabled: true,
                                    format: '{point.name}'
                                }
                            }
                        },
                        series: [{
                            type: 'pie',
                            name: 'Share',
                            data: [
                                @foreach ($parties as $party)
                                ['{{ $party->name }}', {{$data->sum_valid($party->id, $data->unit_id)}}],
                                @endforeach
                            ]
                        }]
                    });
                    
                            </script>
                    </div>
                    <div class="col-md-12">
                        <h2>Collated Result Paper Caption</h2>
                        <img src="{{ $data->caption }}" alt="">
                    </div>
                </section>
            </div>
        </div>
        
    </section>
@endsection
