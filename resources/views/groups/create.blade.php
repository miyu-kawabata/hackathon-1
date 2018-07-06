@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-xs-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    
                </div>
                <div class="panel-body">
                
                </div>
            </div>
            
        </aside>
        <div class="col-xs-8">
            
        {!! Form::model($group, ['route' => 'groups.store']) !!}
            <div class="form-group">
                 {!! Form::label ('groupname','グループ名') !!}
                 {!! Form::text ('groupname',null,['class' => 'form-control']) !!}
            </div>
            
            <div class="form-group">
                 {!! Form::label ('date','開催日') !!}
                 {!! Form::text ('date',null,['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                 {!! Form::label ('description','詳細') !!}
                 {!! Form::text ('description',null,['class' => 'form-control']) !!}
            </div>
            
               {!! Form::submit ('投稿',['class' =>'btn btn-primary']) !!}

            {!! Form::close() !!}

        </div>
        
        <div>
        </div>
    </div>
@endsection