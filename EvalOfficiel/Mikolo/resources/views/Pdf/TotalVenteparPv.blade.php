<!DOCTYPE html>
<html>
    <h1 align='center'>Total de vente global de {{ $ventes[0]->point_vente->nom }}({{ $ventes[0]->point_vente->emplacement }}) par mois</h1>
    <body>
        <table>
            <tr>
                <th>Mois</th>
                <th>Total Vente</th>
            </tr>
            @foreach ($ventes as $vente)
            <tr>
                <td>{{ $vente->month }}</td>
                <td>{{ $vente->total }}</td>
            </tr>
            @endforeach
        <table>
    </body>
</html>