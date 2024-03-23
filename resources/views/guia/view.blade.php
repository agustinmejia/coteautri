@extends('voyager::master')

@section('content')
    <div class="page-content">
        <div class="analytics-container">
            @if (auth()->user()->hasRole('admin'))
            <div class="row">
                <div class="col-md-12 text-right">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add-modal"><i class="voyager-plus"></i> Nuevo</button>
                </div>
            </div>
            @endif
            <div class="row" style="text-align: center">
                @php
                    $pdf =  \App\Models\IndexPdf::where('status',1)->get();
                @endphp
                @forelse ($pdf as $item)
                    {{-- <div class="col-md-4" style="text-align: center">
                        <div class="col-md-2"></div>
                        <div @if(auth()->user()->hasRole('admin')) class="col-md-8" @else class="col-md-8" @endif style="background-color: #08acf2; margin-top: 1em; border-radius: 20px; height:350px">
                            <br>
                            <i class="fa-solid fa-file-pdf" style="color: #ffffff; font-size: 6em;"></i>
                            <p style="font-size: 22px; color: #ffffff;">{{$item->name}}</p>
                            
                            <a href="{{asset('storage/'.$item->file)}}" download="{{$item->name}}.pdf"  title="Descargar" onclick="download_log('{{$item->name}}')" class="btn btn-success">
                                <i class="fa-solid fa-download"></i><span class="hidden-xs hidden-sm">Descargar</span>
                            </a>
                            @if ($item->url)
                                <a href="{{$item->url}}" target="_blank" class="btn btn-dark" data-toggle="modal">
                                    <i class="fa-solid fa-eye"></i><span class="hidden-xs hidden-sm"> Ver</span>
                                </a>
                            @endif
                        </div>
                        <div class="col-md-2">
                            @if(auth()->user()->hasRole('admin'))
                                <a href="{{route('delete.pdf', ['id'=>$item->id])}}" class="btn btn-danger" data-toggle="modal" style="width: 50px; height:40px">
                                    <i class="fa-solid fa-trash"></i><span class="hidden-xs hidden-sm"><br></span>
                                </a>
                            @endif
                        </div>
                    </div> --}}
                    <div class="col-md-4 col-lg-3">
                        <article class="card">
                            @if(auth()->user()->hasRole('admin'))
                                <div style="position: absolute; top: 10px; right: 10px; z-index: 1">
                                    <a href="{{route('delete.pdf', ['id'=>$item->id])}}" class="btn btn-danger" data-toggle="modal" style="width: 50px; height:40px">
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
                        <h2 class="text-muted">No hay guías subidas</h2>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <form name="form_search" id="form-search" action="{{ route('index.pdf') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal modal-info fade" data-keyboard="false" tabindex="-1" id="add-modal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="voyager-plus"></i> Nueva guía</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <b>Título</b>
                                <input type="text" name="name" placeholder="Ingrese el título del archivo" maxlength="50" class="form-control" required>
                            </div>
                            <div class="form-group col-md-12">
                                <b>Portada</b>
                                <input type="file" accept="image/png, image/jpg" name="cover" class="form-control">
                            </div>
                            <div class="form-group col-md-12">
                                <b>Archivo</b>
                                <input type="file" accept="application/pdf" name="file" id="file" class="form-control text PDFLength" required>
                            </div>
                            <div class="form-group col-md-12">
                                <b>URL</b>
                                <input type="text" name="url" placeholder="Ingrese su url para ver el contenido" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
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
