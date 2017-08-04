@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <ol class="breadcrumb">
                            <li><a href="{{route('activities.index')}}">Atividades</a></li>
                            <li><a href="{{route('activities.edit', ['id' => $activity->id])}}">Edição</a></li>
                        </ol>
                    </div>

                    <form action="{{route('activities.update', ['id' => $activity->id])}}" method="post">

                        <input name="_method" type="hidden" value="PUT">
                        {{ csrf_field() }}

                        <div class="panel-body">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="form-group">

                                <div class="col-md-12">
                                    <label for="name">Nome: <span class="field-required">*</span></label>
                                    <input type="text" placeholder="Digite o nome" name="name" id="name"
                                           class="form-control" maxlength="255" required="required" value="{{$activity->name}}">
                                </div>

                            </div>

                            <div class="form-group">

                                <div class="col-md-12">
                                    <label for="description">Descrição: <span class="field-required">*</span></label>
                                    <textarea name="description" id="description" rows="3"
                                              placeholder="Digite a descrição" class="form-control" maxlength="600"
                                              required="required">{{$activity->description}}</textarea>
                                </div>

                            </div>

                            <div class="form-group">

                                <div class="col-md-6">
                                    <label for="start_date">Data de início: <span
                                                class="field-required">*</span></label>
                                    <input type="date" name="start_date" id="start_date" required="required"
                                           class="form-control" value="{{$activity->start_date->format('Y-m-d')}}">
                                </div>

                                <br>

                                <div class="col-md-6">
                                    <label for="finish_date">Data de fim: </label>
                                    <input type="date" name="finish_date" id="finish_date"
                                           class="form-control" value="{{!$activity->finish_date ? '' :$activity->finish_date->format('Y-m-d') }}">
                                </div>

                            </div>

                            <div class="form-group">

                                <div class="col-md-6">
                                    <label for="status">Status: <span class="field-required">*</span></label>
                                    <select name="status_id" id="status" class="form-control">
                                        <option value="" selected>Selecione um status</option>
                                        @foreach($allStatus as $status)
                                            @if($status->id == $activity->status_id)
                                                <option value="{!! $status->id !!}" selected>{!! $status->name !!}</option>
                                            @else
                                                <option value="{!! $status->id !!}">{!! $status->name !!}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <br>

                                <div class="col-md-6">
                                    <label for="situation">Situação: <span class="field-required">*</span></label>
                                    <select name="situation" id="situation" class="form-control">
                                        <option value="" selected> Selecione uma situação</option>
                                        <option value="Ativo" {{$activity->situation == 'Ativo' ? 'selected' : ''}}>Ativo</option>
                                        <option value="Inativo" {{$activity->situation == 'Inativo' ? 'selected' : ''}}>Inativo</option>
                                    </select>
                                </div>

                            </div>

                        </div>

                        <div class="panel-footer">
                            <a href="{{route('activities.index')}}" class="btn btn-default">Voltar</a>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
