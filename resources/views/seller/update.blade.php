@extends('includes.layoutfull')
@section('content')
    <div class="content-wrapper">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Editar Vendedor</h4>
                    <hr>
                    <form action="{{ route('sellers.update', $seller->id) }}" method="POST">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input required type="text" class="form-control" name="name" placeholder="Ex.: Mauricio" value='{{ $seller->name }}'>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input required type="email" class="form-control" name="email" placeholder="Ex.: john@gmail.com" value='{{ $seller->email }}'>
                        </div>
                        <div class="form-group">
                            <label for="phone">Telefone</label>
                            <input required type="text" class="form-control phone" name="phone" placeholder="Ex.: (11) 99999-9999" value='{{ $seller->phone }}'>
                        </div>
                        <div class="form-group">
                            <label for="status_enum">Status</label>
                            <select required class="form-control" name="status_enum">
                                <option value=''>Selecione uma opção</option>
                                @foreach($sellerStatus as $enum => $status)
                                    <option value='{{ $enum }}' @if($seller->status_enum == $enum) selected @endif>{{ $status }}</option>
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
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    <script>
        jQuery(".phone")
            .mask("(99) 9999-9999?9")
            .focusout(function (event) {
                var target, phone, element;
                target = (event.currentTarget) ? event.currentTarget : event.srcElement;
                phone = target.value.replace(/\D/g, '');
                element = $(target);
                element.unmask();
                if(phone.length > 10) {
                    element.mask("(99) 99999-999?9");
                } else {
                    element.mask("(99) 9999-9999?9");
                }
            });
    </script>
@endpush
