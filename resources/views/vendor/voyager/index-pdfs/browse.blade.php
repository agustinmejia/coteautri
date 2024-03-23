@extends('voyager::master')

@section('content')
    <div class="page-content">
        <div class="analytics-container">
            <div class="row">
                <div class="col-md-6" style="margin-bottom: 0px">
                    <h1><i class="voyager-logbook"></i> Guías Telefónicas</h1>
                </div>
                @if (auth()->user()->hasRole('admin'))
                <div class="col-md-6 text-right" style="margin-bottom: 0px">
                    <a href="{{ route('voyager.index-pdfs.create') }}" class="btn btn-success"><i class="voyager-plus"></i> Nuevo</a>
                </div>
                @endif
                <div class="clearfix"></div>
                <hr style="margin-top: 0px">
            </div>
            <div class="row" style="text-align: center">
                @php
                    $pdf =  \App\Models\IndexPdf::where('status',1)->get();
                @endphp
                @forelse ($pdf as $item)
                    <div class="col-md-4 col-lg-3">
                        <article class="card">
                            @if(auth()->user()->hasRole('admin'))
                                <div style="position: absolute; top: 10px; right: 10px; z-index: 1">
                                    <a href="{{ route('voyager.index-pdfs.edit', $item->id) }}" class="btn btn-info" data-toggle="modal">
                                        <i class="fa-solid fa-edit"></i><span class="hidden-xs hidden-sm"><br></span>
                                    </a>
                                    <a href="#" class="btn btn-danger btn-delete" data-toggle="modal" data-target="#delete-modal" data-action="{{ route('voyager.index-pdfs.destroy', $item->id) }}">
                                        <i class="fa-solid fa-trash"></i><span class="hidden-xs hidden-sm"><br></span>
                                    </a>
                                </div>
                            @endif
                            <img
                                class="card__background"
                                src="{{ $item->cover ? asset('storage/'.$item->cover) : asset('img/guia-default.png') }}"
                                alt="{{ $item->name }}"
                                {{-- width="1920"
                                height="2193" --}}
                            />
                            <div class="card__content | flow">
                                <div class="card__content--container | flow">
                                    <h2 class="card__title">{{ $item->name }}</h2>
                                    {{-- <p class="card__description">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    </p> --}}
                                </div>
                                <div>
                                    @if ($item->url)
                                    <a href="{{ $item->url }}" target="_blank" class="card__button"><i class="voyager-eye"></i> Ver</a>
                                    @endif
                                    <a href="{{ asset('storage/'.$item->file) }}" target="_blank" download="{{ $item->name }}.pdf" class="card__button" onclick="download_log('{{ $item->name }}')"><i class="voyager-download"></i> Descargar</a>
                                </div>
                            </div>
                        </article>
                    </div>
                @empty
                    <div class="col-md-12 text-center">
                        <i class="fa fa-ban text-muted" style="font-size: 50px"></i>
                        <h2 class="text-muted">No hay guías registradas</h2>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/style/cards.css') }}">
@endsection

@section('javascript')
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        $(document).ready(function(){

        });

        function download_log(cad){
            console.log('{{route('download.log')}}/'+cad)
            $.get('{{route('download.log')}}/'+cad, function (data) {
                
            });
        }
    </script>
@stop
