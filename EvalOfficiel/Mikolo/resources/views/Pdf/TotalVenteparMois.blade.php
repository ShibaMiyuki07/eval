<!DOCTYPE html>
<html>
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
</html>