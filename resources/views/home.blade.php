@extends('layouts.app')

@section('content')
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
                    <li><span>Dashboard</span></li>
                </ol>
            </div>
        </header>

        <!-- start: page -->
        <div class="row">
            <div class="col-lg-12">
                <div class="row mb-3">
                    <div class="col-xl-4">
                        <section class="card card-featured-left card-featured-primary mb-3">
                            <div class="card-body">
                                <div class="widget-summary">
                                    <div class="widget-summary-col widget-summary-col-icon">
                                        <div class="summary-icon bg-primary">
                                            <i class="fas fa-users"></i>
                                        </div>
                                    </div>
                                    <div class="widget-summary-col">
                                        <div class="summary">
                                            <h4 class="title">Users</h4>
                                            <div class="info">
                                                <strong class="amount">{{ $users }}</strong>
                                            </div>
                                        </div>
                                        <div class="summary-footer">
                                            <a class="text-muted text-uppercase" href="{{ route('users.index') }}">(view all)</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col-xl-4">
                        <section class="card card-featured-left card-featured-secondary">
                            <div class="card-body">
                                <div class="widget-summary">
                                    <div class="widget-summary-col widget-summary-col-icon">
                                        <div class="summary-icon bg-secondary">
                                            <i class="fas fa-file"></i>
                                        </div>
                                    </div>
                                    <div class="widget-summary-col">
                                        <div class="summary">
                                            <h4 class="title">Votes Casted</h4>
                                            <div class="info">
                                                <strong class="amount">{{ $votes }}</strong>
                                            </div>
                                        </div>
                                        <div class="summary-footer">
                                            <a class="text-muted text-uppercase" href="#">(View All)</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col-xl-4">
                        <section class="card card-featured-left card-featured-tertiary mb-3">
                            <div class="card-body">
                                <div class="widget-summary">
                                    <div class="widget-summary-col widget-summary-col-icon">
                                        <div class="summary-icon bg-tertiary">
                                            <i class="fas fa-flag"></i>
                                        </div>
                                    </div>
                                    <div class="widget-summary-col">
                                        <div class="summary">
                                            <h4 class="title">Parties</h4>
                                            <div class="info">
                                                <strong class="amount">38</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>

        <div class="row pt-4 mt-1">
            <div class="col-md-12">
                <section class="card">
                    <header class="card-header">
                        <div class="card-actions">
                            <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                            <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                        </div>
        
                        <h2 class="card-title">Data Chart</h2>
                        <p class="card-subtitle">A summary of reported data.</p>
                    </header>
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
                        
                                </style>
                    <div class="card-body">  
                        <figure class="highcharts-figure">
                            <div id="container"></div>
                            <table id="datatable">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Votes</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $data)
                                    <tr>
                                        <th>{{ $data->name }}</th>
                                        <td>{{ $data->data->sum('valid_votes') }}</td>
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
                    </div>
                </section>
            </div>
        </div>
        <!-- end: page -->
    </section>
@endsection
