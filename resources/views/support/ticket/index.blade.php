@extends('includes.layoutfull')
@section('content')
    <div class="content-wrapper">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tickets</h4>
                    @if(count($tickets) > 0)
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            Assunto
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            Vendedor
                                        </th>
                                        <th>
                                            Data de criação
                                        </th>
                                        <th>
                                            Ações
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tickets as $ticket)
                                        <tr>
                                            <td>
                                                {{ $ticket->subject }}
                                            </td>
                                            <td>
                                                <label class="badge badge-gradient-status-{{ $ticket->status_enum }}">{{ $ticketStatus[$ticket->status_enum] }}</label>
                                            </td>
                                            <td>
                                                {{ $ticket->seller->name }}
                                            </td>
                                            <td>
                                                {{ $ticket->open_ticket_date }}
                                            </td>
                                            <td>
                                                <button onclick="location.href='{{ route('support.ticket.edit', $ticket->id) }}'" type="button" class="btn btn-info btn-icon">
                                                    <i class="mdi mdi-pencil"></i>
                                                </button>
                                                <form method="POST" action="{{ route('support.ticket.destroy', $ticket->id) }}">
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
                        <div class='alert alert-info middle'>Não há tickets cadastrados, quando houver algum ele aparacerá aqui!</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
@endpush
