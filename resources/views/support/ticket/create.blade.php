@extends('includes.layoutfull')
@section('content')
    <div class="content-wrapper">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Abrir chamado</h4>
                    <hr>
                    <form action="{{ route('support.ticket.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="subject">Assunto</label>
                            <input required type="text" class="form-control" name="subject" placeholder="Ex.: Problema na rede">
                        </div>
                        <div class="form-group">
                            <label for="description">Descrição</label>
                            <textarea required class="form-control" name="description" rows="4" placeholder="Ex.: Tento acessar o site www.x.com.br e ocorre o seguinte problema..."></textarea>
                        </div>
                        <div class="form-group">
                            <label for="open_ticket_date">Data de Criação</label>
                            <input required type="datetime-local" class="form-control" name="open_ticket_date" placeholder="Ex.: Problema na rede">
                        </div>
                        <div class="form-group">
                            <label for="status_enum">Status</label>
                            <select required class="form-control" name="status_enum">
                                <option value=''>Selecione uma opção</option>
                                @foreach($ticketStatus as $enum => $status)
                                    <option value='{{ $enum }}'>{{ $status }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-gradient-primary mr-2">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
@endpush
