<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Ventas</title>
    <style>
        /* Estilos básicos inspirados en Tailwind */
        body {
            font-family: "Inter", sans-serif;
            background-color: #f7fafc; /* gray-100 */
            color: #2d3748; /* gray-800 */
            padding: 1rem;
            font-size: 12px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 1.5rem;
            border-radius: 0.5rem;
            box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1), 0 4px 6px -2px rgba(0,0,0,0.05);
        }
        .text-center { text-align: center; }
        .font-bold { font-weight: 700; }
        .text-xl { font-size: 1.25rem; }
        .mb-4 { margin-bottom: 1rem; }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }
        th, td {
            border: 1px solid #e2e8f0; /* gray-200 */
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #edf2f7; /* gray-100 */
        }
        .badge {
            display: inline-block;
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
            font-weight: 600;
            color: #fff;
            border-radius: 0.25rem;
        }
        .badge-green { background-color: #48bb78; } /* green-500 */
        .badge-red { background-color: #f56565; } /* red-500 */
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-xl font-bold text-center mb-4">Reporte de Ventas</h1>
        <table>
            <thead>
                <tr>
                    <th>ID Venta</th>
                    <th>Usuario</th>
                    <th>Total</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sales as $sale)
                <tr>
                    <td>{{ $sale->id }}</td>
                    <td>{{ $sale->user->name }}</td>
                    <td>${{ number_format($sale->calculated_total, 2) }}</td>
                    <td>{{ \Carbon\Carbon::parse($sale->sale_date)->format('d/m/Y H:i') }}</td>
                    <td class="text-center">
                        @if($sale->is_active)
                            <span class="badge badge-green">Activo</span>
                        @else
                            <span class="badge badge-red">Inactivo</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
