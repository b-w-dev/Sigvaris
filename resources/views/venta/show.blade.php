@extends('principal')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-4">
                    <h4>Venta</h4>
                </div>
                <div class="col-4 text-center">
                    <a href="{{ route('ventas.index') }}" class="btn btn-primary">
                        <i class="fa fa-bars"></i><strong> Lista de Ventas</strong>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="card-body">
                <div class="row">
                    <div class="col-4 form-group">
                        <label class="control-label">Fecha:</label>
                        <input type="text" class="form-control" value="{{$venta->fecha}}" readonly="">
                    </div>
                    <div class="col-4 form-group">
                        <label class="control-label">Cliente:</label>
                        <input type="text" class="form-control" value="{{$venta->paciente->nombre}}" readonly="">
                    </div>
                    <div class="col-4 form-group">
                        <label class="control-label">Folio:</label>
                        <input type="number" class="form-control" value="{{$venta->id}}" readonly="">
                    </div>
                </div>
                <div class="row">
                    <h5>Productos</h5>
                </div>
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Precio Individual</th>
                                <th>Cantidad</th>
                                <th>Precio total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($venta->productos as $producto)
                            <tr>
                                <td>{{$producto->nombre}}</td>
                                <td>{{$producto->precio}}</td>
                                <td>{{$producto->pivot->cantidad}}</td>
                                <td>{{$producto->precio * $producto->pivot->cantidad}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-4 offset-4 form-group">
                        <label class="control-label">Subtotal:</label>
                        <input type="number" class="form-control" value="{{$venta->subtotal}}" readonly="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 offset-4 form-group">
                        <label class="control-label">Descuento:</label>
                        <input type="text" class="form-control" value="{{$venta->descuento->nombre}} / {{$venta->descuento->valor}}" readonly="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 offset-4 form-group">
                        <label class="control-label">Total:</label>
                        <input type="number" class="form-control" value="{{$venta->total}}" readonly="">
                    </div>
                </div>
            </div>
            </form>

        </div>

    </div>
</div>
@endsection