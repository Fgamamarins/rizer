@extends('includes.layoutfull')
@section('content')
    <div class="content-wrapper">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Vendedores</h4>
                    @if(count($sellers) > 0)
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            Nome
                                        </th>
                                        <th>
                                            Email
                                        </th>
                                        <th>
                                            Telefone
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            Chamado(s) Em Aberto
                                        </th>
                                        <th>
                                            Chamado(s) Em Andamento
                                        </th>
                                        <th>
                                            Chamado(s) Resolvido(s)
                                        </th>
                                        <th>
                                            Ações
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sellers as $seller)
                                        <tr>
                                            <td>
                                                {{ $seller->name }}
                                            </td>
                                            <td>
                                                {{ $seller->email }}
                                            </td>
                                            <td>
                                                {{ $seller->phone }}
                                            </td>
                                            <td>
                                                <label class="badge badge-gradient-status-{{ $seller->status_enum }}">{{ $sellerStatus[$seller->status_enum] }}</label>
                                            </td>
                                            <td>
                                                {{ $seller->open_tickets }}
                                            </td>
                                            <td>
                                                {{ $seller->running_tickets }}
                                            </td>
                                            <td>
                                                {{ $seller->closed_tickets }}
                                            </td>
                                            <td>
                                                <button onclick="location.href='{{ route('sellers.edit', $seller->id) }}'" type="button" class="btn btn-info btn-icon">
                                                    <i class="mdi mdi-pencil"></i>
                                                </button>
                                                <form method="POST" action="{{ route('sellers.destroy', $seller->id) }}">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <button type="button" class="btn btn-danger btn-icon delete">
                                                        <i class="mdi mdi-delete"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class='alert alert-info middle'>Não há vendedores cadastrados, quando houver algum ele aparecerá aqui!</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>


    </script>
@endpush
