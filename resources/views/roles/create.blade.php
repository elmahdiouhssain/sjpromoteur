@extends('layouts.layout')
@section('content')
<div class="content-page">

            <!-- Start content -->
            <div class="content">

                <div class="container-fluid">

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left">Ajouter un role</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item">Home</li>
                                    <li class="breadcrumb-item active">Ajouter un role</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="card mb-3">
                                <div class="card-header">
                                        <center>
                                        @include('flash-message')
                                        </center>
                                </div>

                                <div class="container">

                                    {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Nom du role :</strong>
                                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                    <script type="text/javascript">  
                                        function selects(){  
                                            var ele=document.getElementsByName('permission[]');  
                                            for(var i=0; i<ele.length; i++){  
                                                if(ele[i].type=='checkbox')  
                                                    ele[i].checked=true;  
                                            }  
                                        }  
                                        function deSelect(){  
                                            var ele=document.getElementsByName('permission[]');  
                                            for(var i=0; i<ele.length; i++){  
                                                if(ele[i].type=='checkbox')  
                                                    ele[i].checked=false;  
                                                  
                                            }  
                                        }             
                                    </script>  
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <input type="button" onclick='selects()' value="Select All"/>  
                                            <input type="button" onclick='deSelect()' value="Deselect All"/> 
                                            <br>
                                            <strong>Permission:</strong>
                                            <br/>
                                            @foreach($permission as $value)
                                                <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                                {{ $value->name }}</label>
                                            <br/>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                                {!! Form::close() !!}

                                </div>
                <!-- END container-fluid -->

            </div>
            <!-- END content -->

        </div>
        <!-- END content-page -->

        @endsection