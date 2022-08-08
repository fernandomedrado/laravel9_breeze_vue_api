<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Produto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2><?=__('form.novo_produto');?></h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('product.index') }}"> <?=__('form.voltar');?></a>
                        </div>
                    </div>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('product.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong><?=__('form.nome');?></strong>
                                <input type="text" name="name" class="form-control" placeholder="<?=__('form.nome');?>">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong><?=__('form.descricao');?></strong>
                                <textarea class="form-control" style="height:150px" name="detail" placeholder="<?=__('form.descricao');?>"></textarea>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary"><?=__('form.enviar');?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>