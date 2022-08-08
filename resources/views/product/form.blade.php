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
                            <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
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
                        <th>No</th>
                        <th><?=__('form.nome');?></th>
                        <th><?=__('form.descricao');?></th>
                        <th><?=__('form.valor');?></th>
                        <th width="280px"><?=__('form.acao');?></th>
                    </tr>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->detail }}</td>
                        <td>
                            <form action="{{ route('products.destroy',$product->id) }}" method="POST">
            
                                <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
                
                                <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
            
                                @csrf
                                @method('DELETE')
                
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</x-app-layout>