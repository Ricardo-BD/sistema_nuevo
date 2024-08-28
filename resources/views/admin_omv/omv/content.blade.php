@extends('layouts.app')

@section('content')

@include('admin_omv.omv.modal_agregar')

<div class="p-2">
<!-- Content Header (Page header) -->
<section class="content-header px-0">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-6 p-0">
        <h1>OMV's</h1>
      </div>
      <div class="col-6 text-right p-0">
      	<button class="btn btn-primary" data-toggle="modal" data-target="#modalNuevaOrganizacion">Nueva Organización</button>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<!-- /.row -->
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">

        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 100%;">
            <input type="text" name="table_search" class="form-control float-right" placeholder="Buscar">

            <div class="input-group-append">
              <button type="submit" class="btn btn-default">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
          <thead>
            <tr>
              <th style="width: 5%;">No.</th>
              <th style="width: 70%;">Nombre</th>
              <th style="width: 10%;">Estatus</th>
              <th style="width: 15%;">Acciones</th>
            </tr>
          </thead>
          <tbody id="omv_list">
          	@include('admin_omv.omv.partials.omv_table_body')
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>
</div>
@endsection