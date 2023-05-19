<!DOCTYPE html>
<html>
    <h1 align='center'>Total de Benefice global par mois</h1>
    <body>
        <table>
            <tr>
                <th>Mois</th>
                <th>Prix de vente total</th>
                <th>Perte total</th>
                <th>Prix d'achat total</th>
                <th>Benefice</th>
                <th>Commission</th>
            </tr>
            @for($i = 0;$i<$ventes->count();$i++)
            <tr>
                <td>{{ $ventes->get($i)->month }}</td>
                <td>{{ $ventes->get($i)->prix_vente_mois }}</td>
                <td>{{ $pertes->get($i)->perte_mois }}</td>
                <td>{{ $achats->get($i)->prix_achat_mois }}</td>
                <td>{{ ($ventes->get($i)->prix_vente_mois - ($achats->get($i)->prix_achat_mois + $pertes->get($i)->perte_mois))-$vente::calcul_commission($ventes,$ventes->get($i)->month) }}</td>
                <td>{{ $vente::calcul_commission($ventes,$ventes->get($i)->month) }}</td>
            </tr>
            @endfor
        <table>
    </body>
</html>