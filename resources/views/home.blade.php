@extends('layouts.dashboard')
@push('css')
    <link rel="stylesheet" href="{{asset("css/highcharts.css")}}">
    <style>
        .highcharts-figure{
			display: none;
		}
		.highcharts-figure, .highcharts-data-table table {
			width: 100%;
			margin-left: 0.8rem;
			margin-right: 0.8rem;
			margin-top: 2rem;
		}

		.highcharts-data-table table {
			font-family: Verdana, sans-serif;
			border-collapse: collapse;
			border: 1px solid #EBEBEB;
			margin: 10px auto;
			text-align: center;
			width: 100%;
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
		.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
			padding: 0.5em;
		}
		.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
			background: #f8f8f8;
		}
		.highcharts-data-table tr:hover {
			background: #f1f7ff;
		}
    </style>
@endpush

@section('content')
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">
            <div class="row clearfix g-3">
                <div class="col-lg-8 col-md-12 flex-column">
                    <div class="row row-deck g-3">
                        
                        <div class="col-12 col-xl-12 col-lg-12">
                            <div class="card mb-3 bg-secondary">
                                <div class="card-body text-white d-flex flex-column">
                                    <div class="d-flex align-items-center mb-auto mt-3">
                                        <div class="flex-fill ms-3 text-truncate">
                                            <h3 class=" mb-3">Bienvenue, 
                                                <span class="fw-bold">
                                                    @if (Auth::user())
                                                        {{ Auth::user()->name }}
                                                    @endif
                                                </span>
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <div class="line-height-custom mb-0">
                                            @if (Auth::user()->role === 'ADMIN')
                                                @if ($count >=1 || $categorie >=1 )
                                                    <h6>Vous avez deja un total de <span class="fw-bold">{{ $count }} actualites</span> 
                                                        ainsi que <span class="fw-bold">{{ $categorie }} categories</span>
                                                    </h6> 
                                                @endif
                                            @endif
                                        </div>
                                        
                                    </div>
                                    <div class="col-12 col-lg-7 order-lg-1">
                                        <a class="btn bg-light text-secondary btn-lg lift" href="{{ route('actualite.create') }}"><i class=" me-2 fa fa-plus"></i>Creer une actualite</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (Auth::user()->role === 'ADMIN')
                        <div class="card mb-3 color-bg-200">
                            <div class="card-header py-3">
                                <h6 class="mb-0 fw-bold "></h6>
                            </div>
                            <div class="card-body">
                                <div id="courbe_evolution"></div>
                            </div>
                        </div>
                    @endif
                    
                    <div class="mb-3">
                        <div class="card-header py-3 px-0 no-bg border-0 bg-transparent">
                            <h6 class="mb-0 fw-bold ">Vos derniers actualites </h6>
                            <span class="text-muted">Pour trois derniers mois </span>
                        </div>
                        <div class="row ">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead class="table-dark"> 
                                            <tr>
                                                <th style="width: 50px;">
                                                    <div class="form-check">
                                                        <input class="form-check-input select-all" type="checkbox" name="checkbox">
                                                            
                                                        </label>
                                                    </div> 
                                                </th>
                                                <th>Title</th>
                                                <th>Categorie</th>                       
                                                <th>Cree le</th>                                    
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($news as $item)
                                                <tr>
                                                    <td style="width: 50px;">
                                                        <div class="form-check">
                                                            <input class="form-check-input " type="checkbox" name="checkbox">
                                                                
                                                            </label>
                                                        </div> 
                                                    </td>
                                                    <td class="text-truncate">
                                                        <p class="mb-0 ms-1 d-inline-block">{{ $item->titre }}</p>
                                                    </td>
                                                    <td class="text-truncate">
                                                        <p class="mb-0 ms-1 d-inline-block">{{ $item->categorie->title }}</p>
                                                    </td>                                  
                                                    <td>
                                                        <p class="mb-0 ms-1 d-inline-block">{{ $item->dateformatted() }}</p>
                                                    </td>
                                                    
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="card mb-3 color-bg-200">
                        <div class="card-body">   
                            <div class="upcoming-lessons">
                                <h6 class="mb-3 fw-bold ">Vos dernieres actualites</h6>
                                @foreach ($last as $item)
                                    <div class="card line-lightblue mb-3">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="lesson_name">
                                                    <h6 class="mb-0 fw-bold ">{{ $item->titre }}</h6>
                                                    <small class="text-muted">{{ $item->created_at }}</small>
                                                </div>
                                                <div class="btn-group dropup mr-5">
                                                    <a href="#" class="nav-link mr-3 py-2 px-4 text-muted" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                    <ul class="dropdown-menu border-0 shadow dropdown-menu-end">
                                                        <li><a class="dropdown-item" href="#">Voir plus</a></li>
                                                        @can('update', $item)
                                                            <li><a class="dropdown-item" href="{{route('actualite.edit', $item->id)}}">Editer</a></li>
                                                        @endcan
                                                        
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach 
                            </div>
                        </div>
                    </div>
                    <div class="card bg-dark mb-3">
                        <div class="card-body">
                            <div class="card-header py-3">
                                <h6 class="mb-0 fw-bold text-white">Are you ready next lessons </h6>
                            </div>
                            <div class="digital-clock d-flex justify-content-center align-items-center min-height-220">
                                <figure>
                                    <div class="face top"><p id="s"></p></div>
                                    <div class="face front"><p id="m"></p></div>
                                    <div class="face left"><p id="h"></p></div>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- Row End -->
        </div>
    </div>
@endsection

@push('js')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script>
        Highcharts.chart('courbe_evolution', {
			chart: {
				type: 'spline'
			},
			title: {
				text: "Courbe evolutive de la creation "
			},
			xAxis: {
				type: 'datetime',
				labels: {
					format: '{value:%e-%b-%Y}'
				},
				title: {
					text: "Dates"
				}
			},
			yAxis: {
				title: {
					text: "Nombres"
				},
				min: 0
			},
			tooltip: {
				headerFormat: '<b>{series.name}</b><br>',
				pointFormat: '{point.x:%e. %b %Y} : {point.y} {series.name}'
			},

			plotOptions: {
				series: {
					marker: {
						enabled: true
					}
				}
			},
			// colors: ['#6CF', '#39F', '#06C', '#036', '#000'],
			series: [
            {name: "Categories",
				data: @json($evolution_creation_cat_)},
            {name: "Actualites",
				data: @json($evolution_creation_actu_)}],

			responsive: {
				rules: [{
					condition: {
						maxWidth: 500
					},
					chartOptions: {
						plotOptions: {
							series: {
								marker: {
									radius: 2.5
								}
							}
						}
					}
				}]
			}
		});
    </script>
@endpush