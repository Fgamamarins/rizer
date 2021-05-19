@extends('includes.layoutfull')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                    <div class="card-body">
                        <img src="images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/>
                        <h4 class="font-weight-normal mb-3">Em Aberto
                            <i class="mdi mdi-email-open mdi-24px float-right"></i>
                        </h4>
                        <h2 class="mb-5">{{ $dashboardTickets["open_tickets"] }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                    <div class="card-body">
                        <img src="images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/>
                        <h4 class="font-weight-normal mb-3">Em Andamento
                            <i class="mdi mdi-worker mdi-24px float-right"></i>
                        </h4>
                        <h2 class="mb-5">{{ $dashboardTickets["running_tickets"] }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                    <div class="card-body">
                        <img src="images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/>
                        <h4 class="font-weight-normal mb-3">Resolvido(s)
                            <i class="mdi mdi-check mdi-24px float-right"></i>
                        </h4>
                        <h2 class="mb-5">{{ $dashboardTickets["closed_tickets"] }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tickets Recentes</h4>
                        @if(count($resumeTickets) > 0)
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($resumeTickets as $resumeTicket)
                                            <tr>
                                                <td>
                                                    {{ $resumeTicket->subject }}
                                                </td>
                                                <td>
                                                    <label class="badge badge-gradient-status-{{ $resumeTicket->status_enum }}">{{ $ticketStatus[$resumeTicket->status_enum] }}</label>
                                                </td>
                                                <td>
                                                    {{ $resumeTicket->seller->name }}
                                                </td>
                                                <td>
                                                    {{ $resumeTicket->open_ticket_date }}
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
    </div>
@endsection
@push('scripts')
@endpush
