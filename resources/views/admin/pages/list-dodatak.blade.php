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
                    <h4>Lista dodataka</h4>
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
                                <th>Naziv dodatka</th>
                                <th>Cena dodatka</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="els">

                            @if(count($data) > 0)

                                @foreach($data as $dodatak)

                                    <tr>
                                        <td>
                                            <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#exampleModal{{ $dodatak->id }}"><i class="fas fa-trash-alt"></i> Obriši</a>
                                        </td>
                                        <td>{{ $dodatak->dodatak_name }}</td>
                                        <td>{{ $dodatak->dodatak_price }} rsd</td>
                                        <td>{{ $dodatak->status }}</td>
                                    </tr>

                                    <div class="modal fade" id="exampleModal{{ $dodatak->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                <a href="/admin/delete-dodatak/{{ $dodatak->id }}" class="btn btn-success">Da</a>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach

                                

                            @else

                                <tr>
                                    <td>Trenutno nema proizvoda</td>
                                </tr> 

                            @endif

                           

                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>





    <script>

        $('#myTable').DataTable({
            "columnDefs": [{
                "searchable": false,
                "targets": [0]
            },{
                "orderable": false,
                "targets": [0]
            }]

        });
    
    </script>

    

@endsection