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
                            <h2>Laravel 9 CRUD Example from scratch - ItSolutionStuff.com</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('product.create') }}"> Create New Product</a>
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <table class="table table-bordered">
                    <tr>
                        <th>N°</th>
                        <th><?=__('form.nome');?></th>
                        <th><?=__('form.descricao');?></th>
                        <th><?=__('form.valor');?></th>
                        <th width="280px"><?=__('form.acao');?></th>
                    </tr>
                    @foreach ([] as $product)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->amount }}</td>
                        <td>
                            <form action="{{ route('product.destroy',$product->id) }}" method="POST">
                                <a class="btn btn-info" href="{{ route('product.show',$product->id) }}"><?=__('form.mostrar');?></a>
                                <a class="btn btn-primary" href="{{ route('product.edit',$product->id) }}"><?=__('form.editar');?></a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><?=__('form.excluir');?></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</x-app-layout>