@foreach($users as $user)
    <tr>
        <td>{{$user['id']}}</td>
        <td>{{$user['name']}}</td>
        <td>{{$user['email']}}</td>
        <td><a class="mb-xs mt-xs mr-xs btn btn-primary" href="/admin/users/edit?id={{$user['id']}}">Редактировать</a></td>
    </tr>
@endforeach