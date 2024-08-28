<!-- Modal -->
<div class="modal fade" id="modalNuevaOrganizacion" tabindex="-1" aria-labelledby="modalNuevaOrganizacionLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalNuevaOrganizacionLabel">Nueva Organización</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formNuevaOrganizacion" method="POST">
          <div class="row">
            <div class="form-group col-12">
              <label for="nombreOrganizacion" class="form-label">Nombre de la Organización</label>
              <input type="text" class="form-control" id="nombreOrganizacion" name="nombre_organizacion">
            </div>
            <div class="form-group col-sm-3 col-6">
              <label for="regimenFiscal" class="form-label">Régimen Fiscal</label>
              <select class="form-control" id="regimenFiscal" name="regimen_fiscal" required>
                <option value="Persona Fisica" selected>Persona Fisica</option>
                <option value="Persona Moral">Persona Moral</option>
              </select>
            </div>
            <div class="form-group col-sm-3 col-6">
              <label for="rfc" class="form-label">R.F.C <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="rfc" name="rfc" required>
            </div>
            <div class="form-group col-sm-6 col-12">
              <label for="nombreComercial" class="form-label">Nombre Comercial <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="nombre_comercial" name="nombre_comercial" required>
            </div>
            <div class="form-group col-sm-6 col-12">
              <label for="nombre_organizador" class="form-label">Nombre <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="nombre_organizador" name="nombre_organizador" required>
            </div>
            <div class="form-group col-sm-6 col-12">
              <label for="apellido_organizador" class="form-label">Apellidos <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="apellido_organizador" name="apellido_organizador" required>
            </div>
            <div class="form-group col-6">
              <label for="correo" class="form-label">Correo Electrónico <span class="text-danger">*</span></label>
              <input type="email" class="form-control" id="correo_electronico" name="correo_electronico" required>
            </div>
            <div class="form-group col-6">
              <label for="telefono" class="form-label">Teléfono <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="telefono" name="telefono" required>
            </div>
            <div class="form-group col-6">
              <label for="telefonoMovil" class="form-label">Teléfono Móvil</label>
              <input type="text" class="form-control" id="telefonoMovil" name="telefono_movil">
            </div>
            <div class="form-group col-6">
              <label for="estatus" class="form-label">Estatus</label>
              <select class="form-control" id="estatus" name="estatus">
                <option selected>Activo</option>
                <option value="Inactivo">Inactivo</option>
              </select>
            </div>
            <div class="form-group col-6">
              <label for="usuario" class="form-label">Usuario <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="usuario" name="usuario" required>
            </div>
            <div class="form-group col-6">
              <label for="contrasena" class="form-label">Contraseña <span class="text-danger">*</span></label>
              <input type="password" class="form-control" id="contrasena" name="contrasena" required>
            </div>

            <!-- Rol visible para ambos regímenes -->
            <div class="form-group col-sm-6 col-6">
              <label for="rol" class="form-label">Rol</label>
              <select class="form-control" id="rol" name="rol">
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
              </select>
            </div>

            <!-- Datos del Representante Legal (solo para Persona Moral) -->
            <div class="col-12" id="datosRepresentanteLegal" style="display: none; width: 100%;">
              <hr>
              <h5>Datos del Representante Legal</h5>
              <div class="row">
                <div class="form-group col-sm-6 col-6">
                  <label for="nombreRepresentante" class="form-label">Nombre <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="nombre" name="nombre">
                </div>
                <div class="form-group col-sm-6 col-6">
                  <label for="apellidosRepresentante" class="form-label">Apellidos <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="apellidos" name="apellidos">
                </div>
                <div class="form-group col-sm-6 col-6">
                  <label for="correoRepresentante" class="form-label">Correo Electrónico <span class="text-danger">*</span></label>
                  <input type="email" class="form-control" id="correo_representante" name="correo_representante">
                </div>
                <div class="form-group col-sm-6 col-6">
                  <label for="telefonoRepresentante" class="form-label">Teléfono <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="telefono_representante" name="telefono_representante">
                </div>
                <div class="form-group col-sm-6 col-6">
                  <label for="telefonoMovilRepresentante" class="form-label">Teléfono Móvil</label>
                  <input type="text" class="form-control" id="telefonoMovilRepresentante" name="telefono_movil_representante">
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary" id="btnGuardar">Guardar</button>
      </div>
    </div>
  </div>
</div>


<script>
  $(document).ready(function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    // Manejar el envío del formulario
    $('#btnGuardar').on('click', function(event) {
        event.preventDefault(); // Evita que el formulario se envíe de forma tradicional

        // Recolectar los datos del formulario
        var formData = $('#formNuevaOrganizacion').serialize(); // Serializa los datos del formulario

        // Limpiar errores anteriores
        $('.form-group').removeClass('has-error');
        $('.invalid-feedback').remove(); // Asegúrate de que los mensajes de error anteriores se borren
        $('.form-control').removeClass('is-invalid'); // Remover la clase de error de todos los campos

        // Enviar los datos usando AJAX
        $.ajax({
            url: '/omv/crear_organizacion', // Cambia esto por la URL correcta
            type: 'POST',
            data: formData,
            success: function(response) {
                // Asumiendo que la respuesta contiene la nueva lista de OMVs en formato HTML
                $('#omv_list').html(response);

                // Cerrar el modal
                $('#modalNuevaOrganizacion').modal('hide');
            },
            error: function(xhr) {
                var errors = xhr.responseJSON.errors;

                // Iterar sobre los errores y mostrarlos en el formulario
                $.each(errors, function(key, value) {
                    var input = $('#' + key);
                    
                    // Asegúrate de que no haya un mensaje de error duplicado
                    input.next('.invalid-feedback').remove(); // Eliminar mensaje de error anterior si existe
                    input.addClass('is-invalid'); // Añadir clase de error al campo
                    
                    // Mostrar el mensaje de error debajo del campo
                    input.after('<div class="invalid-feedback">' + value[0] + '</div>');
                });
            }
        });
    });




    $('#regimenFiscal').on('change', function() {
      var representanteSection = $('#datosRepresentanteLegal');
      if ($(this).val() === 'Persona Moral') {
        representanteSection.show();
      } else {
        representanteSection.hide();
      }
    });
  });
</script> 