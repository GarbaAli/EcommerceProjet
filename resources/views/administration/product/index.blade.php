@extends('administration.layout')

@section('contenu')
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Produit</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('admin::products.create') }}"> Creer une nouveau produit</a>
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
            <th>Slug</th>
            <th>Titre</th>
            <th>Subtitre</th>
            <th>Description</th>
            <th>Prix</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $key => $value)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $value->slug }}</td>
            <td>{{ $value->title }}</td>
            <td>{{ $value->subtitle }}</td>
            <td>{{ \Str::limit($value->description, 100) }}</td>
            <td>{{ $value->price }}</td>

            <td>
                <form action="{{ route('admin::products.destroy',$value->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('admin::products.show',$value->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('admin::products.edit',$value->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $data->links() !!}
@endsection
