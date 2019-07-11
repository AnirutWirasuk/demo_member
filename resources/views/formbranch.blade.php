@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (empty($branch))
{{ Form::open(['novalidate','route' => 'branch.store','class' => ($errors->any()) ? 'was-validated' : 'needs-validation','method' => 'POST','files' => true]) }}
@else
{{ Form::model($branch,['novalidate','route' => ['branch.update',$branch->id],'class' => ($errors->any()) ? 'was-validated' : 'needs-validation','method' => 'PUT','files' => true]) }}
@endif
<div class="form-group">
    <label for="exampleInputPassword1">Branch Name:</label>
    {{ Form::text('branchname', null,['class' => 'form-control','required','placeholder' => 'Branch Name...']) }}
</div>
<button type="submit" class="btn btn-primary">Submit</button>
{!! Form::close() !!}
