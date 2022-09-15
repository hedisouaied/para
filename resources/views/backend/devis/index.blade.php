@extends('backend.layouts.master')


@section('content')


<div class="main-content">
<div class="col-lg-12">
    @include('backend.layouts.notification')
</div>
<h4 class="box-title text-center">Liste des commandes</h4>
@if (count($devis) != 0)


    <table class="table table-striped table-bordered display" style="width:100%">
        <thead>
            <tr>
                <th>S.N</th>
                <th>Clients</th>
                <th>Produits</th>
                <th>Total</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($devis as $item)



                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>
                        <p><i class="fa fa-user" ></i> {{$item->nom}} {{$item->prenom}}</p>
                        <p><i class="fa fa-phone" ></i> {{$item->phone}}</p>
                        <p><i class="fa fa-map-marker" ></i> {{$item->gouvernorat}}</p>
                        <p><i class="fa fa-map" ></i> {{$item->adresse}}</p>
                    </td>
                    <td>
                        @php
                            $array_prod = explode('/',$item->prod_ids);
                            $array_quantite = explode('/',$item->quantite);
                            $array_prix = explode('/',$item->prix);
                            $total = 0 ;
                        @endphp
                        <ul>

                            @for ($i = 0; $i < count($array_prod); $i++)
                                <li>
                                    <b><a target="_blank" href="{{route('product.detail',\App\Models\Product::where('id',$array_prod[$i])->value('slug'))}}" >{{\App\Models\Product::where('id',$array_prod[$i])->value('title')}}</a> </b> : {{$array_prix[$i]}}TND (Quantité : {{$array_quantite[$i]}})

                                </li>
                                @php
                                    $total = $total + ($array_prix[$i]*$array_quantite[$i]) ;
                                @endphp
                            @endfor

                        </ul>

                    </td>
                    <td>{{$total}}TND</td>


                    <td>

                    <form action="{{route('devis.destroy',$item->id)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="button" data-id="{{$item->id}}" class="float-left dltBtn btn btn-danger btn-sm waves-effect waves-light" style="color:#fff;background-color:#000;"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <h2 class="text-center">Il n'y a pas de commande pour le moment!</h2>
    @endif
</div>

@endsection

@section('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.dltBtn').click(function(e){
            var form=$(this).closest('form');
            var dataID=$(this).data('id');
            e.preventDefault();

            swal({
                title: "Êtes-vous sûr?",
                text: "Une fois supprimé, vous ne pourrez pas récupérer!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                    swal("Poof! supprimée!", {
                    icon: "success",
                    });
                } else {
                    swal("N'est pas supprimée!");
                }
                });
        });
</script>

@endsection
