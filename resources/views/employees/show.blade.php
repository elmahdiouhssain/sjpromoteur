@extends('layouts.layout')
@section('content')
<script src="{{ asset('static/js/jquery.min.js') }}"></script>
<div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="col-xs-12 ">
                            <div class="card mb-3">
                                        <center>
                                        @include('flash-message')
                                        </center>
                            </div>
                            <!-- end card -->
                    </div>
                        <!-- end col -->
                        <input type="hidden" class="employee_id" name="employee_id" value="{{$data['emp']->id}}">
                        <div class="col-xs-12 ">
                            <div class="card mb-3">
                                <div class="card-header"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                <i class="fas fa-money-check-alt"></i> Ajouter un paiement
                                </button></div>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-money-check-alt"></i> Nouveau paiement</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <script>
                                    function findTotal() {
                                        var salaire_total = 0;
                                        var n_jours = document.getElementById("n_jours").value;
                                        var prix_jour = document.getElementById("prix_jour").value;
                                        var salaire_total = n_jours * prix_jour;
                                        document.getElementById("salaire_total").value = salaire_total;
                                    }
                                </script>
                                    <div class="form-group">
                                                    <label>Date de debut : </label>
                                                    <input type="date" name="debut" id="debut" class="debut form-control"> 
                                                    @if ($errors->has('debut'))
                                                            <span style="color: red;">{{ $errors->first('debut') }}</span>
                                                            @endif
                                    </div>
                                    <div class="form-group">
                                                    <label>Date de fin : </label>
                                                    <input type="date" name="fin" id="fin" class="fin form-control"> 
                                                    @if ($errors->has('fin'))
                                                            <span style="color: red;">{{ $errors->first('fin') }}</span>
                                                            @endif
                                    </div>
                                    <div class="form-group">
                                                    <label>Nombre de jours : </label>
                                                    <input type="number" name="n_jours" id="n_jours" class="n_jours form-control"> 
                                                    @if ($errors->has('n_jours'))
                                                            <span style="color: red;">{{ $errors->first('n_jours') }}</span>
                                                            @endif
                                    </div>
                                    <div class="form-group">
                                                    <label>Prix par jour : </label>
                                                    <input type=number step=any name="prix_jour" id="prix_jour" class="prix_jour form-control"> 
                                                    @if ($errors->has('prix_jour'))
                                                            <span style="color: red;">{{ $errors->first('prix_jour') }}</span>
                                                            @endif
                                    </div>
                                    <div class="form-group">
                                                    <label>Total : </label>
                                                    <input type=number step=any onblur="findTotal()" name="salaire_total" id="salaire_total" class="salaire_total form-control"> 
                                                    @if ($errors->has('salaire_total'))
                                                            <span style="color: red;">{{ $errors->first('salaire_total') }}</span>
                                                            @endif
                                    </div>
                                    <div class="form-group">
                                                    <label>Observation : </label>
                                                    <input type=text  name="observation" id="observation" class="observation form-control"> 
                                                    @if ($errors->has('observation'))
                                                            <span style="color: red;">{{ $errors->first('observation') }}</span>
                                                    @endif
                                    </div>
                                    <div class="form-group">
                                                    <label>Realisé par : </label>
                                                    <input readonly type=text value="{{Auth::user()->name}}" name="realise_par" id="realise_par" class="form-control"> 

                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="add_paiement btn btn-danger btn-sm btn-block" type="submit"><i class="fas fa-save"></i> Enregistré</button>
                                         <button type="button" class="btn btn-secondary btn-sm btn-block" data-dismiss="modal">Close</button>
                                        
                                    </div>
                                    </div>
                        
                                </div>
                                </div>
                        <div class="card-body">
                            
                            <div class="card-deck"></div>

                        </div>
                            </div>
                            </div>
                        <div class="col-xs-12 ">
                            <div class="card mb-3">
                        <div class="card-body">
                                  <form action="{{route('scanup', $data['emp']->id  )}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <style>
                                        .container {
                                            max-width: 500px;
                                        }
                                        dl, ol, ul {
                                            margin: 0;
                                            padding: 0;
                                            list-style: none;
                                        }
                                        .imgPreview img {
                                            padding: 8px;
                                            max-width: 100px;
                                        } 
                                    </style>
                                    <div class="form-group">
                            <label for="name">Nom du fichier :</label>
                            <select class="form-control" name="name" id="name" aria-label="Default select example">
                                  <option value="Carte national">Carte national</option>
                            <option value="Contract">Contract</option>
                            <option value="Cnss">Cnss</option>
                            </select>

                          @if ($errors->has('name'))
                                            <span style="color: red;">{{ $errors->first('name') }}</span>
                                            @endif
                            </div>
                        <div class="form-group">
                            <label for="name">Type du fichier :</label>
                            <select class="form-control" name="file_type" id="file_type" aria-label="Default select example">
                                  <option value="PDF">PDF</option>
                                  <option value="IMAGE">IMAGE</option>
                                  <option value="AUTRE">AUTRE</option>
                            </select>

                          @if ($errors->has('type_op'))
                                            <span style="color: red;">{{ $errors->first('type_op') }}</span>
                                            @endif
                            </div>
                                    <div class="user-image mb-3 text-center">
                                        <div class="imgPreview"> </div>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="imageFile[]" class="custom-file-input" id="images" >
                                        @if ($errors->has('imageFile[]'))
                                                            <span style="color: red;">{{ $errors->first('imageFile[]') }}</span>
                                                            @endif
                                                            <br>
                                        <label class="custom-file-label" for="images">Choose image</label>
                                        <button type="submit" class="btn btn-primary btn-sm btn-block"><i class="fas fa-upload"></i> Upload</button>
                                    </form>
                                    </div>
                                    </div>
                                    </div>

                        
                        <div class="col-xs-12 ">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h3 style="color:red;"><i class="far fa-user"></i> : {{ $data['emp']->nom_complete }} || ( {{ $data['emp']->cin }} ) || Fonction :  ( {{ $data['emp']->fonction }} ) ||
                                    @can('employees-delete')
                                    {!! Form::open(['method' => 'DELETE','route' => ['emps.destroy', $data['emp']->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Supprimé', ['class' => 'btn btn-danger btn-sm','onclick'=>"return confirm('Vous etes-sur supprimé l employeé')"]) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                    @can('employees-list')
                                    <a href="{{ route('emps.edit',$data['emp']->id) }}" class="btn btn-dark btn-sm"><i class="fas fa-cog"></i></a>
                                    @endcan
                                    </h3>
                                </div>
                                <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Nom complèt : </label>
                                                    <input readonly class="form-control" name="name" type="text" value="{{ $data['emp']->nom_complete }}" required />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Identité : </label>
                                                    <input readonly class="form-control" name="email" type="email" value="{{ $data['emp']->cin }}" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Caise sociale : </label>
                                                    <input readonly class="form-control" name="id_national" type="text" value="{{ $data['emp']->cnss }}" required />
                                                </div>
                                            </div>
                                            
                                      
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Salaire : (DHS)</label>
                                                    <input readonly class="form-control" name="name" type="text" value="{{ $data['emp']->salaire_total }}" required />
                                                </div>
                                            
                                                </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>N°télèphone : </label>
                                                    <input readonly class="form-control" name="name" type="text" value="{{ $data['emp']->n_telephone }}" required />
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>N°banquer(rib) : </label>
                                                    <input readonly class="form-control" name="email" type="email" value="{{ $data['emp']->n_banquer }}" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Prix/jour (DHS) : </label>
                                                    <input readonly class="form-control" name="name" type="text" value="{{ $data['emp']->prix_jour }}" required />
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>N°Jours : </label>
                                                    <input readonly class="form-control" name="email" type="email" value="{{ $data['emp']->n_jours }}" required />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>N°dossier : </label>
                                                    <input readonly class="form-control" name="n_dossier" type="text" value="{{ $data['emp']->n_dossier }}" required />
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Date debut : </label>
                                                    <input readonly class="form-control" name="date_debut" type="date" value="{{ Carbon\Carbon::parse($data['emp']->date_debut)->format('Y-m-d') }}" required />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Address 1 : </label>
                                                    <input readonly class="form-control" name="addr1" type="text" value="{{ $data['emp']->addr1 }}" required />
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Address 2  : </label>
                                                    <input readonly class="form-control" name="addr2" type="text" value="{{ $data['emp']->addr2 }}" required />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Observation  : </label>
                                                    <textarea class="form-control" readonly name="observation" id="observation" cols="30" rows="10">{{ $data['emp']->observation }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                      <div class="card mb-3">
                                <div class="card-header">
                                    <h3 style="color:black;"><i class="fas fa-passport"></i> Employeé documents  : </h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                           <?php 
                                           $u_imgs = DB::select('select * from employeesimg where cheque_id='.$data['emp']->id);
                                            ?>
                                         
                                            @foreach ($u_imgs as $x)
                                            <div class="card-group">
                                          <div class="card">
                                            <center>
                                            <a href="/employees/{{$x->image_path}}" target="_blank" class="fas fa-file fa-7x"></a>
                                            </center>
                                            <div class="card-body">
                                              <h5 class="card-title">Nom : {{$x->name}}</h5>
                                              <p class="card-text">Type : {{$x->file_type}}</p>
                                            </div>
                                            <div class="card-footer">
                                              <small class="text-muted">Enregitré le : {{$x->created_at}}|
                                              <a href="/emp/docs/del/{{$x->id}}" style="color:red;" class="fas fa-trash"></a>
                                        </small>
                                            </div>
                                          </div>
                                          </div>
                                            @endforeach

                                </div>

                                <!-- end card-body -->
                            </div>
                            <!-- end card -->
                </div>
                <!-- END container-fluid -->
            </div>
            <!-- END content -->
        </div>
        
        <!-- The Modal -->
          <div class="modal fade" id="myModal2">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="container">
                        <center><i class="fas fa-money-check-alt fa-7x" style="color:green;"></i><br>
                            <h2  style="color:green;">Paiement Enregistré avec succée!</h2>
                        </center>
                    </div>
              </div>
            </div>
          </div>
        </div>
                <script>
                $(document).ready(function (){
                fetchpaiements();
                function fetchpaiements(){
                    var emp_id = $('.employee_id').val();
                    $.ajax({
                        type:"GET",
                        url:"/employees/paiement/all/"+emp_id,
                        dataType:"json",
                        success:function (response){
                            $('.card-deck').html("");
                            var i = 0;
                            $.each(response, function(key, item){
                                ++i;
                                $('.card-deck').append('<div class="card">\
                                    <div class="card-body">\
                                    <h5 class="card-title">Montant : '+item.salaire_total+'(DHS)</h5>\
                                    <p>Debut : '+item.debut+'</p>\
                                    <p>Fin : '+item.fin+'</p>\
                                    <p>N°jrs : '+item.n_jours+'</p>\
                                    <p>P/jr : '+item.prix_jour+'(DHS)</p>\
                                    <p>Realisé par : '+item.realise_par+'</p>\
                                    <p class="card-text">Observation : '+item.observation+'.</p>\
                                    <p>Status : <label class="badge badge-success">PAYEE</label></p>\
                                    </div>\<div class="card-footer">\
                                    <small class="text-muted">Enregitré à : '+item.created_at+' <button style="color:red;" class="fas fa-trash" data-toggle="modal" data-target="#myModal3"></button></small>\
                                    <input type="hidden" name="paiement_id" class="paiement_id" id="paiement_id" value="'+item.id+'">\
                                    </div>\
                                    </div>');

                                });
                            //console.log(response);
                                }
                            });
                        };
                    
                    $(document).on('click', '.add_paiement', function (e){
                    e.preventDefault();
                    var data = {
                        'employee_id':$('.employee_id').val(),
                        'debut':$('.debut').val(),
                        'fin':$('.fin').val(),
                        'observation':$('.observation').val(),
                        'n_jours':$('.n_jours').val(),
                        'prix_jour':$('.prix_jour').val(),
                        'salaire_total':$('.salaire_total').val(),
                    }
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type:"POST",
                        url:"/employees/store/paiement",
                        data:data,
                        dataType:"json",
                        success:function (response){
                            if(response.status == 400){
                                $('#savedform_errList').html("");
                                $('#savedform_errList').addClass('alert alert-danger');
                                $.each(response.errors, function (key, err_values){
                                    $('#savedform_errList').append('<span>'+err_values+'</span>');
                                });
                            }
                            else{
                                $('#success_message').addClass('alert alert-success');
                                $('#success_message').text(response.message);
                                $('#exampleModal').modal('hide');
                                $('#myModal2').modal('show');
                                $("#debut").val("");
                                $("#fin").val("");
                                $("#observation").val("");
                                $("#n_jours").val("");
                                $("#prix_jour").val("");
                                $("#salaire_total").val("");
                                fetchpaiements();
                            }
                        }
                    })
                })


                    $(document).on('click', '.delete_paiement', function(e){
                    e.preventDefault();
                    var paiement_id = $(this).val();
                    //var paiement_id = $('#paiement_id').val();
                    $('#delete_paiement_id').val(paiement_id);
                    $('#myModal3').modal('show');

                });
                $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                $(document).on('click', '.delete_paiement_btn', function(e){
                    e.preventDefault();
                    var paiement_id = $('#paiement_id').val();
                    $.ajax({
                        type:"DELETE",
                        url:"/employees/paiement/del/"+paiement_id,
                        data: {paiement_id:paiement_id},
                        success: function (response){
                            console.log(response);
                            $('#success_message').addClass('alert alert-success')
                            $('#success_message').text(response.message);
                            $('#myModal3').modal('hide');
                            fetchpaiements();
                        }
                    })
                })

            });
      
        </script>

        <!-- The Modal -->
          <div class="modal fade" id="myModal3">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="container">
                        <center><i class="fas fa-trash fa-7x" style="color:red;"></i><br>

                            <h2  style="color:red;">Vois etes sur supprimé le paiement !</h2>
                        </center>
                    </div>
              </div>
              <div class="modal-footer">
                  <button class="delete_paiement_btn btn btn-danger">YES</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
              </div>
            </div>
          </div>
        </div>
        @endsection

        