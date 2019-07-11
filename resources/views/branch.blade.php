@extends('layouts.app')
<a href="{{ route('branch.create') }}">Add</a>
{{ session('feedback') }}
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($listdata as $item)
      <tr>
        <th scope="row">1</th>
        <td>{{ $item->branchname }}</td>
        <td><a href="{{ route('branch.edit',['id' => $item->id]) }}">Edit</a></td>
        <td>
                <form method="POST" class="d-inline"
                        action="{{ route('branch.destroy',['id' => $item->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>

        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
  {{ $listdata->links() }}
