@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Documentos</h1>
        @empty($document)
            <div class="alert alert-warning" role="alert">
                <p>No existe el documento.</p>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Folio</th>
                            <th>Asunto</th>
                            <th>Descripción</th>
                            <th>Fecha del Documento</th>
                            <th>Status</th>
                            <th>Etiqueta(s)</th>
                            <th>Remitente(s)</th>
                            <th>Archivo(s)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $document->folio }}</td>
                            <td>{{ $document->subject }}</td>
                            <td>{{ $document->description }}</td>
                            <td>{{ $document->document_date->format('d-M-Y') }}</td>
                            <td>{{ $document->status->name }}</td>
                            <td>
                                @foreach ($document->tags as $tag)
                                    <p>{{ $tag->name }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($document->senders as $sender)
                                    <p>{{ $sender->name }} - {{ $sender->position }}</p>
                                    <p>{{ $sender->company->acronym }}</p>
                                @endforeach
                            </td>
                            <td>
                                <div class="list-group list-group-light">
                                @foreach ($document->files as $file)
                                    <a class="list-group-item list-group-item-action px-3 border-0" href="{{asset("pdfs/{$file->path}") }}" target="_blank">{{ $file->name }}</a>
                                @endforeach
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endempty
    </div>
@endsection
