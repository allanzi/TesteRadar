@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <ol class="breadcrumb">
                            <li><a href="{{route('activities.index')}}">Atividades</a></li>
                        </ol>
                    </div>

                    <div class="panel-body">
                        <a href="{{route('activities.create')}}" class="btn btn-primary">Criar Atividade</a>
                        <hr>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Descrição</th>
                                    <th>Data de Início</th>
                                    <th>Data de Fim</th>
                                    <th>Status</th>
                                    <th>Situação</th>
                                    <th>Criado em</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($activities as $activity)
                                    <tr class="{{$activity->situation == 'Inativo' ? 'danger' : ''}}">
                                        <td>{!! $activity->id !!}</td>
                                        <td>{!! $activity->name !!}</td>
                                        <td>{!! $activity->description !!}</td>
                                        <td>{!! $activity->start_date->format('d/m/Y') !!}</td>
                                        <td>{!! !$activity->finish_date ? '' :$activity->finish_date->format('d/m/Y') !!}</td>
                                        <td>{!! $activity->status->name !!}</td>
                                        <td>{!! $activity->situation !!}</td>
                                        <td>{!! $activity->created_at->format('d/m/Y') ?? null !!}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="glyphicon glyphicon-cog"></span> Opções <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><button class="btn btn-block btn-danger" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-remove"></span> Excluir</button>
                                                        {{--<a href="#!" ><span class="glyphicon glyphicon-remove"></span> Excluir</a></li>--}}
                                                    <li role="separator" class="divider"></li>
                                                    <li><button onclick="location.href='{{route('activities.edit', ['id' => $activity->id])}}';" {{$activity->status_id == 4 ? 'disabled' : ''}} class="btn btn-block"><span class="glyphicon glyphicon-edit"></span> Editar</button></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Deseja realmente excluir esse item?</h4>
                                                </div>
                                                <div class="modal-body">
                                                    Esta ação não poderá ser revertida
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                    <a href="{{route('activities.delete', ['id' => $activity->id])}}" class="btn btn-danger">Excluir</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="panel-footer">
                        {!! $activities->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
