@extends('admin/layouts/mas')

@section('style')

    <style>
        
        .table > tbody > tr > td {
            vertical-align: middle;
        }
    
    </style>

@endsection

@section('data')

    <div class="row">
        <div class="col-12 col-md-12">
            <div class="row">
                <div class="col-12 col-md-12">
                    <h4>Lista Dogadjaja</h4>
                    <div style="border-bottom: 1px solid #c5c5c5; margin-bottom: 30px;"></div>
                </div>
            </div>

            <div class="row" style="margin-bottom: 20px;">

            </div>

            <div class="row activee">
                <div class="col-12 col-md-12">

                    @if(session()->has('success'))
                        <div class="alert alert-success text-center">
                            {{ session()->get('success') }}
                        </div>
                    @endif
    
                    @if(session()->has('messageError'))
                        <div class="alert alert-danger text-center">
                            {{ session()->get('messageError') }}
                        </div>
                    @endif
                    

                    <table class="table table-striped" id="myTable">
                        <thead class="thead-dark">
                            <tr>
                                <th>Akcija</th>
                                <th>Naslov</th>
                                <th>Jezik</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="els">

                            @if(count($rows))

                                @foreach($rows as $data)

                                    <tr>
                                        <td style="width: 20%;">
                                            <a class="btn btn-primary" href="/admin/izmeni-poziciju/{{ $data->id }}"><i class="far fa-edit"></i> Izmeni</a>
                                            <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#exampleModal{{ $data->id }}"><i class="fas fa-trash-alt"></i> Obriši</a>
                                        </td>
                                        <td>{{ $data->title }}</td>
                                        <td>{{ $data->lang }}</td>
                                        <td>@if($data->status == 1) Aktivan @else Neaktivan @endif</td>
                                    </tr>

                                    <div class="modal fade" id="exampleModal{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h4><b>Da li ste sigurni ?</b></h4>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Ne</button>
                                                <a href="/admin/obrisi-poziciju/{{ $data->id }}" class="btn btn-success">Da</a>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach

                                

                            @else

                                <tr>
                                    <td>Trenutno nema pozicija</td>
                                </tr> 

                            @endif

                           

                        </tbody>
                    </table>
                    <div id="paginate">

                    </div>
                </div>
            </div>


        </div>
    </div>

    <script>    
        
        $(document).ready( function () {


            $('#myTable').DataTable({
                "columnDefs": [{
                    "searchable": false,
                    "targets": [0]
                },{
                    "orderable": false,
                    "targets": [0]
                }]

            });
        
        });

    </script>


    

@endsection