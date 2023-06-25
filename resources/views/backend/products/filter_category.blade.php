@extends('backend.layouts.app')

@section('title', __('Category Product Management'))

@section('content')
<x-backend.card> 
    <x-slot name="header">
        @lang('View Category Product')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link class="card-header-action" :href="route('admin.product.index')" :text="__('Back')" />
    </x-slot>

    <x-slot name="body">
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Price</th>
                <th scope="col">Sale price</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
            @php $count = request()->count && request()->page > 1 ? request()->count : 0; @endphp
            @foreach ( $products as $product)

            @php $count++ @endphp
              <tr>
                <th scope="row">{{ $count }}</th>
                <td><img src="{{ url($product->feature_image) }}" width="50" /></td>
                <td>{{ $product->category->name }}</td>
                <td>{{ $product->name }}</td>
                <td><del>{{ $product->price_label }}</del></td>
                <td>{{ $product->price_sale_label }}</td>
                <td>
                    <a href="{{ route('admin.product.show', $product->id) }}" class="btn btn-xs btn-primary" title="View">View</a>
                    <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-xs btn-primary" title="Edit">Edit</a>
                    <a href="{{ route('admin.product.destroy', $product->id) }}" class="btn btn-xs btn-danger" title="Delete">Delete</a>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
      
          <div style="display: flex; justify-content: center; padding-bottom: 20px; justify-content: space-between; align-items: center;">
            <div>{{ $products->count() }} Products total</div>
            <div>{{ $products->appends(['count' => $count])->links() }}</div>
          </div>
    </x-slot>

    <x-slot name="footer">
        <small class="float-right text-muted">
            
        </small>
    </x-slot>
</x-backend.card>
@endsection