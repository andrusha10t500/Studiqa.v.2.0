{{--@include('includes.header')--}}
<div class="col-md-3" id="list_users" style="margin-top: 4%">
    <table class="table table-dark table-bordered" id="table">
        <thead>
        <tr>
            <th class="text-center" scope="col"></th>
            <th class="text-center" scope="col">#</th>
            <th class="text-center" scope="col">Event</th>
            <th class="text-center" scope="col">email</th>
            <th class="text-center" scope="col">IP</th>
            <input type="text" id="_token" value="{{ csrf_token() }}" hidden>
        </tr>
        </thead>
        @foreach(DB::select("select * from users where note is null or note like 'organizer'") as $user)
            <tbody>
            <tr>
                <td><input type="button" id="del" value="Del" class="btn btn-danger"></td>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->event }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->ip_adress }}</td>
            </tr>
            </tbody>
        @endforeach
    </table>
</div>
