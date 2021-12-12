<h1>{{$titulo}}</h1>
<table>
    <thead>
        <tr>
            <th>Posicion</th>
            <th>Usuario</th>
            <th>Resultado</th>
            <th>Fecha</th>
        </tr>
    </thead>
    <tbody>
        @for ($i = 0; $i < 5; $i++)
        <tr>
            <td>{{$i+1}}</td>
            <td>{{$podio[$i]->username}}</td>
            <td>{{$podio[$i]->resultado}}</td>
            <td>{{$podio[$i]->fecha}}</td>
        </tr>
        @endfor
    </tbody>
</table>