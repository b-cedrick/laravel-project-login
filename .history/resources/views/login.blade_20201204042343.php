@extends ('base')

@section ('main')
    <div class="container box rounded">
        <div class="row col-sm-8">
            <div class="col-12">
                <h1 class="display-5 text-center">Login</h1>
            <div>
            @if ($errors->any())
                <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                </div><br />
            @endif
                <form >
                    @csrf
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" name="email"/>
                    </div>
                    <div class="form-group">
                        <label for="password">Mots de passe:</label>
                        <input type="password" class="form-control" name="password"/>
                    </div>      
                    <div class="text-center">              
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection